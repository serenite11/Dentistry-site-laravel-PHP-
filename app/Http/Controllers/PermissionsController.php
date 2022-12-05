<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PermissionsController extends Controller
{
    public function getAllUsers(Request $request){
        $users = User::where('group_id','!=','1')->where('id', '!=', auth()->id())->get();
        return view('auth.editor',compact([
            'users'
        ]));
    }
    public function addUser(Request $request){
        $validated = $request->validate([
            'ava' => 'file',
            'name' => 'required',
            'surname' => 'required',
            'login' => 'required|unique:users,login',
            'date' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
            'tel' => 'required|unique:users,tel',
            'city' => 'required',
        ]);
        $ava = $request->hasFile('ava') ? $request->file('ava') : false;
        $ava_path_tmp = $ava ? $ava->getPathName() : '';
        $validated['pic'] = $ava ? 'avatars/' . $request->login : '';
        $validated['spam'] = $request->has('spam') ? 1 : 0;
        if ($ava) {
            @mkdir('avatars');
            copy($ava_path_tmp, $validated['pic']);
        }
        $user=new User();
        $user->pic=$validated['pic'];
        $user->name=$request->name;
        $user->surname=$request->surname;
        $user->login=$request->login;
        $user->date=$request->date;
        $user->password=$validated['password'] ;
        $user->tel=$request->tel;
        $user->email=$request->email;
        $user->city=$request->city;
        $user->group_id=$request->group_id;
        $user->spam=$validated['spam'];
        $user->save();
        return redirect()->route('auth.editor');
    }
    public function editUser($id){
        $user=User::find($id);
        $permissions=Permission::all();
        return view('auth.edit',[
            'user'=>$user,
            'permissions'=>$permissions
        ]);
    }
    public function updateUser(Request $request){
        $user=User::findOrFail($request->id);
        if (($request->group_id==1 || $request->group_id==2)&&(Auth::user()->group_id!=1)){
            return redirect()->back()->with('success', 'Вы не имеете данного разрешения');
        }
        $user->group_id=$request->group_id;
        $user->save();
        $users = User::where('group_id','!=','1')->where('id', '!=', auth()->id())->get();
        return redirect()->route('auth.editor');
    }
    public function deleteUser($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function resetPassword($id){
        $user=User::find($id);
        $user->forceFill([
            'password' => Str::random(10)
        ])->setRememberToken(Str::random(20));
        $user->save();
        return redirect()->back();
    }
    public function blockUser($id){
        $user=User::find($id);
        $user->status='ban';
        $user->save();
        return redirect()->back();
    }
    public function unblockUser($id){
        $user=User::find($id);
        $user->status='unban';
        $user->save();
        return redirect()->back();
    }
    public function getAllGroups(Request $request){
        $permissions = Permission::orderBy('id')->get();
        return view('auth.createGroup',compact([
            'permissions'
        ]));
    }
    public function addGroup(Request $request){
        $permission=new Permission();
        $permission->group_name=$request->group_name;
        $permission->permission='user';
        $permission->save();
        return redirect()->back();
    }
    public function createUser(){
        $permissions=Permission::all();
        return view('auth.create',['permissions'=>$permissions]);
    }
}
