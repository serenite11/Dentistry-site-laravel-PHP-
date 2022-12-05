<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizedController extends \App\Http\Controllers\Controller
{
    public function profile_update(Request $request)
    {
        $validated = $request->validate([
            // 'ava' => 'file',
            'name' => 'required',
            // 'surname' => 'required',
            // 'login' => 'required|unique:users,login',
            // 'date' => 'required',
            // 'pas1' => 'required',
            // 'pas2' => ['required', function ($attribute, $value, $fail) {
            //     global $request;
            //     if ($request->get('pas1') !== $request->get('pas2'))
            //         $fail('The pas1 != pas2');
            // }],
            // 'email' => 'required|email|unique:users,email',
            // 'tel' => 'required|unique:users,tel',
            // 'city' => 'required',
            // 'gdrp' => 'required',
        ]);

        $ava = $request->hasFile('ava') ? $request->file('ava') : false;
        $ava_path_tmp = $ava ? $ava->getPathName() : '';
        $validated['pic'] = $ava ? 'avatars/' . $request->login : '';
        // $validated['password'] = $validated['pas1'];
        // $validated['spam'] = $request->has('spam') ? 1 : 0;


        $user= Auth::user();/*\App\Models\User::findOrFail(Auth::guard()->user()->id);*/
        if ($user->password!=$request->password){
                $user->remember_token=NUll;
        }
        $user->password=$request->password;
        $user->name=$validated['name'];
        $user->save();
        if ($ava) {
            @mkdir('avatars');
            copy($ava_path_tmp, $validated['pic']);
        }
        return view('auth.message', ['message' => 'profile_updated']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}


