<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Post;
class UsersController extends Controller
{
    public function index()
    {
        return view('users.index',['users' => User::all()]);
    }
    public function create()
    {
        return view('users.create');
    }

    public function makeAdmin($user)
    {
        $user = User::find($user);
        $user->role = 'admin';
        $user->save();
        session()->flash('adminGranted','Privillage granted successfully.');
           return redirect( route('users.index') );
    }
    public function removeAdmin($user)
    {
        $user = User::find($user);
        $user->update([
            'role' => 'writer'
        ]);
        
        session()->flash('adminRemoved','Privillage revooked successfully.');
           return redirect( route('users.index') );
        return redirect(route('users.index'));
    }

    public function AdminsOnly()
    {
        $admins = User::where('role','admin')->get();
        return view('users.index',['users' => $admins]);
    }
    public function EditeProfile($user)
    {
        return view('users.profile',['users' =>$user]);
    }
    public function update($user, Request $request)
    {
        $user = Profile::where('user_id',$user)->get()->first();
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->about = $request->about;
        if($request->hasFile('ProfileImage'))
        {
            $image = $request->ProfileImage->store('ProfileImages','public');
            $user->image = $image;
        }

        $user->save();
        session()->flash('edited', 'Profile edited successfully.');
        return redirect( route('users.editeProfile', $user->id) );
    }
    public function allUserPosts($user)
    {
        $posts = Post::where('user_id', $user)->get();
        return view ('posts.index',['posts' =>$posts]);
    }
}
