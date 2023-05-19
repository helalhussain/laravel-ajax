<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function user()
     {
        if(request()->ajax()){
            return DataTables::eloquent(User::query())->make(true);
        }
        //   $users = User::paginate(10);
         return view('user');
    }

    public function addUser()
    {
        return view('add_user');
    }
    public function add(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'file'=>'required'
        ]);
        $file = $request->file('file');
         $fileName = time().''.$file->getClientOriginalName();
         $filePath = $file->storeAs('images',$fileName,'public');

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->image = $filePath;
        $user->save();

        return response()->json([
            'res'=>'Created successfully',
        ]);
    }
}
