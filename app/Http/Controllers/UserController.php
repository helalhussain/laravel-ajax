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
}
