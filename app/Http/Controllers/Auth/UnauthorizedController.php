<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UnauthorizedController extends \App\Http\Controllers\Controller
{
    public function register_do(Request $request)
    {
        $validated = $request->validate([
            'ava' => 'file',
            'name' => 'required',
            'surname' => 'required',
            'login' => 'required|unique:users,login',
            'date' => 'required',
            'pas1' => 'required',
            'pas2' => ['required', function ($attribute, $value, $fail) {
                global $request;
                if ($request->get('pas1') !== $request->get('pas2'))
                    $fail('The pas1 != pas2');
            }],
            'email' => 'required|email|unique:users,email',
            'tel' => 'required|unique:users,tel',
            'city' => 'required',
            'gdrp' => 'required',
        ]);
        $ava = $request->hasFile('ava') ? $request->file('ava') : false;
        $ava_path_tmp = $ava ? $ava->getPathName() : '';
        $validated['pic'] = $ava ? 'avatars/' . $request->login.'.jpg':'';
        $validated['password'] = md5($validated['pas1']);
        $validated['spam'] = $request->has('spam') ? 1 : 0;

        $user = \App\Models\User::create($validated);
        if ($ava) {
            @mkdir('avatars');
            copy($ava_path_tmp, $validated['pic']);
        }
        if (!Auth::guard()->attempt($validated))
            return view('auth.message', ['message' => 'register_done_but_auth_error']);
        $to_name = $user->login;
        $to_email = $user->email;
        Mail::send('auth.register_done_mail', ['name' => $user->name], function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Успешная регистрация');
        });
        return view('auth.message', ['message' => 'register_done']);
    }
    public function login_do(Request $request)
    {
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        $validated['password'] = md5($validated['validated']);
        if (!Auth::guard()->attempt($validated))
            return view('auth.message', ['message' => 'auth_error']);
        if (auth()->check()&&auth()->user()->remember_token!=NULL){
            return response()->view('auth.message', ['message' => 'auth_reset_password']);
        }
        return view('auth.profile');
    }
}
