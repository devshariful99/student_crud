<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\facades\Validator;
use Illuminate\Support\Facades\Storage;



class StudentController extends Controller
{
    public function index(){
        $s['students'] = Student::all();
        return view('student.index',$s);
    }
    public function create(){
        return view('student.create');
    }
    public function store(StudentRequest $req){
        $insert = new Student();

        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $filename = $req->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("students/", $filename, 'public');
            $insert->image = $path;
        }
        
        $insert->name = $req->name;
        $insert->roll = $req->roll;
        $insert->reg = $req->reg;
        $insert->email = $req->email;
        $insert->save();
        return redirect()->route('student.index');
    }
    public function edit($id){
        $s['student'] = Student::findOrFail($id);
        return view('student.edit',$s);
    }
    public function update(StudentRequest $req, $id){
        $student = Student::findOrFail($id); 
    
        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store("students", 'public');
            // Delete old image if exists
            Storage::delete('public/' . $student->image);
            $student->image = $path; // Assign new image path
        }
    
        $student->name = $req->name;
        $student->roll = $req->roll;
        $student->reg = $req->reg;
        $student->email = $req->email;
        $student->updated_at = Carbon::now();
        $student->update();
        
        return redirect()->route('student.index');
    }
    


    public function delete($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index');
    }
    public function status($id){
        $student = Student::findOrFail($id);
        if($student->status == 1){
            $student->status = 0;
        }else{
            $student->status = 1;
        }
        $student->update();
        return redirect()->route('student.index');
    }

    public function show($id){
        $student = Student::find($id);
        return view('student.show')->with('students', $student);
    }
        
   
}
