<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;

class ResumeController extends Controller
{
    use AuthorizesRequests;

    public function update(ResumeRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('edit', $user);
        $resume = $user->resume()->firstOrNew();

        $resume->user_id = $user->id;
        $resume->city_id = $request->input('city_id');
        $resume->work_schedule_id = $request->input('work_schedule_id');
        $resume->work_type_id = $request->input('work_type_id');
        $resume->experience_id = $request->input('experience_id');
        $resume->detail_experience = $request->input('detail_experience');
        $resume->background_id = $request->input('background_id');
        $resume->detail_background = $request->input('detail_background');
        $resume->salary = $request->input('salary');
        $resume->save();

        if ($request->has('skills')) {
            $resume->skills()->sync($request->input('skills'));
        } else {
            $resume->skills()->detach();
        }

        return Redirect::route('users.edit', $id)->with('status', 'resume-updated');
    }
}
