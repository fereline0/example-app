<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ResumeController extends Controller
{
    use AuthorizesRequests;

    public function update(ResumeRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('edit', $user);

        $resume = $user->resume()->firstOrNew();

        if ($request->hasFile('resume')) {
            if ($resume->file_path) {
                Storage::disk('public')->delete($resume->file_path);
            }

            $path = $request->file('resume')->store('resumes', 'public');
            $resume->file_path = $path;
        }

        $resume->user_id = $user->id;
        $resume->save();

        return redirect()->back()->with('status', 'resume-updated');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('edit', $user);

        $resume = $user->resume;

        if ($resume && $resume->file_path) {
            Storage::disk('public')->delete($resume->file_path);
            $resume->delete();
        }

        return redirect()->back()->with('status', 'resume-deleted');
    }
}
