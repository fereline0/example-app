<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Http\Requests\WorkRequest;
use App\Http\Requests\WorkUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WorkController extends Controller
{
    use AuthorizesRequests;

    public function edit($id)
    {
        $work = Work::findOrFail($id);

        $this->authorize('edit', $work->user);

        return view('works.edit', compact('work'));
    }
    
    public function update(WorkUpdateRequest $request, $id)
    {
        $work = Work::findOrFail($id);

        $this->authorize('edit', $work->user);

        if ($request->hasFile('image')) {
            if ($work->image) {
                \Storage::disk('public')->delete($work->image);
            }

            $path = $request->file('image')->store('works', 'public');
            $work->image = $path;
        }

        $work->title = $request->input('title');
        $work->description = $request->input('description');
        $work->save();

        return redirect()->route('users.show', $work->user_id)->with('status', 'work-updated');
    }

    public function store(WorkRequest $request, $id)
    {
        $path = $request->file('image')->store('works', 'public');

        $work = Work::create([
            'user_id' => $id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $path,
        ]);

        return redirect()->back()->with('status', 'work-created');
    }

    public function destroy($id)
    {
        $work = Work::findOrFail($id);

        $this->authorize('delete', $work->user);

        if ($work->image) {
            \Storage::disk('public')->delete($work->image);
        }

        $work->delete();

        return redirect()->back()->with('status', 'work-deleted');
    }
}