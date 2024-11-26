<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetailInformation;

class UserDetailInformationController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $userDetailInformation = $user->detail_information()->firstOrNew();

        $userDetailInformation->fill($request->only('about', 'gender', 'birthday'));
        $userDetailInformation->user_id = $user->id;
        
        $userDetailInformation->save();

        return redirect()->back()->with('status', 'detail-updated');
    }
}