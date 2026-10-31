<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\field;
use App\Models\institute;
use App\Models\lesson;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;



class LessonController extends Controller
{
    public function create(institute $institute , field $field){
        return view('admin.lesson.create' , ['institute'=>$institute , 'fieldId'=>$field]);
    }

    public function store(Request $request){
        $field = field::find($request->field_id);
        $image = null;
        if (isset($request->image)) {
                $name = $request->image->getClientOriginalName();
                $fullName = Str::uuid() . '_' . $name;
                $image = $request->file('image')->storeAs('files', $fullName, 'public');
            }
            lesson::create([
                'title' => $request->title,
                'description' => $request->description,
                'duration' => $request->duration,
                'price' => $request->price,
                'discount' => $request->discount,
                'image' => $image,
                'video' => $request->video,
                'field_id' => $request->field_id,
            ]);
            return to_route('institute.lesson_list' , [$field->institute]);
    }

    public function index(){
       $lessons = lesson::all();
       return view('admin.lesson.index' , ['lessons'=>$lessons]);
    }

    public function edit(lesson $lesson){
        $fields = field::all();
        return view('admin.lesson.edit' , ['lesson'=>$lesson , 'fields'=>$fields]);
    }

    public function update(Request $request){
        $field = field::find($request->field_id);
        $lesson = lesson::find($request->id);
        $image = null;
        if (isset($request->image)) {
            if ($lesson->image) {
                Storage::disk('public')->delete($lesson->image);
            }
            $pictureName = $request->image->getClientOriginalName();
            $fullPictureName = Str::uuid() . '_' . $pictureName;
            $image = $request->file('image')->storeAs('files', $fullPictureName, 'public');
        }
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->image = $image;
        $lesson->duration = $request->duration;
        $lesson->price = $request->price;
        $lesson->discount = $request->discount;
        $lesson->video = $request->video;
        $lesson->field_id = $request->field_id;
        $lesson->save();
        return to_route('institute.lesson_list' , [$field->institute]);
    }

    public function class_list(lesson $lesson){
        return view('admin.lesson.class_list' , ['lesson'=>$lesson]);
    }
    
    public function single(lesson $lesson){
        return view('admin.lesson.single' , ['lesson'=>$lesson]);
    }

    public function delete(lesson $lesson){
       lesson::find($lesson->id)->delete();
        return to_route('lesson.lessons');
    }
    

}
