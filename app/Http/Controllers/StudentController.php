<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudent(Request $request){

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');

        $student=new Student ;
        $student->name =$request->name;
        $student->email =$request->email;
        $student->image =$filePath;
        $student->save();


        return response()->json(['res'=>'Data success Created']);
    }

    public function listStudent(){
        $students=Student::all();
        return response()->json(['students'=>$students]);
    }
}
