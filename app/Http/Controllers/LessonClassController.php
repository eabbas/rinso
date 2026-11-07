<?php

namespace App\Http\Controllers;

use App\Models\class_student;
use App\Models\institute;
use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\lesson_class;
use App\Models\requests;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\master_institute;
use App\Models\user_institute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\savePreviousUrlMiddleware;


class LessonClassController extends Controller
{
    public function create(institute $institute){
        return view('admin.lessonClass.create' , ['institute'=>$institute]);
    }

    public function store(Request $request){
        $lesson = lesson::find($request->lesson_id);
        $image = null;
        if(isset($request->image)) {
                $name = $request->image->getClientOriginalName();
                $fullName = Str::uuid() . '_' . $name;
                $image = $request->file('image')->storeAs('files', $fullName, 'public');
            }
                lesson_class::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image,
                'lesson_id' => $request->lesson_id,
                'master_id' => $request->master_id,
             ]);
             return to_route('institute.class_list' , [$lesson->field->institute]);
    }

    public function index(){
        $classes = lesson_class::all();
        return view('admin.lessonClass.index' , ['classes'=>$classes]);
    }

    public function edit(lesson_class $class){
        $lessons = lesson::all();
        return view('admin.lessonClass.edit' , ['class'=>$class , 'lessons'=>$lessons]);
    }

    public function update(Request $request){
        $lesson = lesson::find($request->lesson_id);
        $class = lesson_class::find($request->id);
        $image = null;
        if (isset($request->image)) {
            if ($class->image) {
                Storage::disk('public')->delete($class->image);
            }
            $pictureName = $request->image->getClientOriginalName();
            $fullPictureName = Str::uuid() . '_' . $pictureName;
            $image = $request->file('image')->storeAs('files', $fullPictureName, 'public');
            $class->image = $image;
        }
        $class->title = $request->title;
        $class->description = $request->description;
        $class->image =$image;
        // $class->assignment = $request->assignment;
        $class->lesson_id = $request->lesson_id;
        $class->master_id = $request->master_id;
        $class->save();
        return to_route('institute.class_list' , [$lesson->field->institute]);
    }

    public function single(lesson_class $class){
        return view('admin.lessonClass.single' , ['class'=>$class]);
    }

    public function comment(lesson_class $class){
        $comment = $class->load('class_comments');
        return view('admin.lessonClass.comments', ['class'=>$class , 'comment'=>$comment]);
    }

    public function add_master(lesson_class $class){
        return view('admin.lessonClass.add_master', ['class'=>$class]);
    }

    public function add_student(lesson_class $class){
        return view('admin.lessonClass.add_student', ['class'=>$class]);
    }


    public function student_store(Request $request){
        $institute = institute::find($request->institute_id);
        $class = lesson_class::find($request->id);
        $user = user::where('phoneNumber' , $request->phone)->get();
        foreach($user as $student){
            // if(!$student->id){
                class_student::create([
                    'class_id' => $class->id,
                    'student_id' => $student->id,
                ]);
                user_institute::create([
                    'institute_id' => $institute->id,
                    'user_id' => $student->id,
                ]);
                // dd($student);
            // }
        }
        return to_route('class.student_list' , ['class'=>$class]);
    }


    public function student_list(lesson_class $class){
        $class->load('students');
        // dd($x);
        return view('admin.lessonClass.student_list' , ['class'=>$class]);
    }

     public function user_classes(user $user = null){
        if (!$user) {
            $user = Auth::user();
        }
        return view('admin.lessonClass.user_classes', ['user' => $user]);
    }

     public function master_classes(user $user = null){
        if (!$user) {
            $user = Auth::user();
        }
        return view('admin.lessonClass.master_classes', ['user' => $user]);
    }

    public function student_delete(user $student){
        foreach($student->student_classes as $class){
            class_student::where('class
            _id',$class->id)->where('student_id' , $student->id)->delete();
            return to_route('class.student_list' , [$class]);
        }
    }
    // public function student_list(){
    //     $students = class_student::all();
    //     return view('admin.lessonClass.student_list' , ['students'=>$students]);
    // }

    public function master_store(Request $request){
        $class = lesson_class::find($request->id);
        $user = user::where('phoneNumber' , $request->phone)->get();
       foreach($user as $master){
           $class->master_id = $master->id;
           $class->save();
           if(!$master->id){
               master_institute::create([
                   'institute_id' => $request->institute_id,
                   'master_id' => $master->id,
                ]);
           }
        }
       return to_route('class.single' , ['class'=>$class]);
    }

    public function attachments(lesson_class $class){
        return view('admin.lessonClass.attachments' , ['class'=>$class]);
    }


    // public function delete_master(lesson_class $class){
    //     user::where('phoneNumber' , $class->master->phoneNumber)->delete();
    //     return to_route('class.single' , [$class]);
    // }

    public function delete(lesson_class $class){
         lesson_class::find($class->id)->delete();
         return to_route('class.classes');
    }
}
