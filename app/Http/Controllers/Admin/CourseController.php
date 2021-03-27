<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::where('status', 2)->paginate(8);

        return view('admin.courses.index', compact('courses'));
    }
}
