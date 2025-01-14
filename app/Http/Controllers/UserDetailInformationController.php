<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailInformationRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;

class UserDetailInformationController extends Controller
{
    use AuthorizesRequests;

    public function update(UserDetailInformationRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('edit', $user);

        $userDetailInformation = $user->detail_information()->firstOrNew();
        $userDetailInformation->fill($request->only('about', 'gender', 'birthday', 'phone_number'));
        $userDetailInformation->user_id = $user->id;

        $userDetailInformation->save();

        return Redirect::route('users.edit', $id)->with('status', 'detail-updated');
    }
}
