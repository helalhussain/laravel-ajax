<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.index');
    }
    public function create()
    {
        return view('teacher.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:10',
            'title'=>'required',
            'institute'=>'required'
        ]);
        $data = Teacher::insert([
            'name'=>$request->name,
            'title'=>$request->title,
            'institute'=>$request->institute
        ]);
        return response()->json($data);

    }
}
