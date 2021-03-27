<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::where('status', 2)->paginate(8);

        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course){

        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course){

        $this->authorize('revision', $course);

        if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image){
            return back()->with('info', 'No se puede publicar un curso que no esté completo');
        }

       $course->status = 3;
       $course->save();

       //Envio de correos
       $mail = new ApprovedCourse($course);

       Mail::to($course->teacher->email)->queue($mail);

       return redirect()->route('admin.courses.index')->with('info', 'El curso se publicó con éxito');
    }

}
