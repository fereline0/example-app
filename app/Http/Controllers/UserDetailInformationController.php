<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetailInformation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserDetailInformationController extends Controller
{
    use AuthorizesRequests;

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->authorize('edit', $user);

        $userDetailInformation = $user->detail_information()->firstOrNew();

        $userDetailInformation->fill($request->only('about', 'gender', 'birthday'));
        $userDetailInformation->user_id = $user->id;
        
        $userDetailInformation->save();

        return redirect()->back()->with('status', 'detail-updated');
    }
}