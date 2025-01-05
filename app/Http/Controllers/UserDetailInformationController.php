<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailInformationRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class UserDetailInformationController extends Controller
{
    use AuthorizesRequests;

    public function update(UserDetailInformationRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('edit', $user);

        $userDetailInformation = $user->detail_information()->firstOrNew();

        if ($request->hasFile('resume')) {
            if ($userDetailInformation->resume) {
                Storage::disk('public')->delete($userDetailInformation->resume);
            }

            $path = $request->file('resume')->store('resumes', 'public');
            $userDetailInformation->resume = $path;
        }

        $userDetailInformation->fill($request->only('about', 'gender', 'birthday', 'phone_number'));
        $userDetailInformation->user_id = $user->id;

        $userDetailInformation->save();

        return redirect()->back()->with('status', 'detail-updated');
    }

    public function deleteResume($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('edit', $user);

        if ($user->detail_information && $user->detail_information->resume) {
            Storage::disk('public')->delete($user->detail_information->resume);
            $user->detail_information->resume = null;
            $user->detail_information->save();
        }

        return redirect()->back()->with('status', 'resume-deleted');
    }
}
