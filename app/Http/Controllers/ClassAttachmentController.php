<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson_class;
use App\Models\class_attachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClassAttachmentController extends Controller
{
    public function create(){
       $classes = lesson_class::all();
       return view('admin.classAttachment.create' , ['classes'=>$classes]);
    }

    public function store(Request $request){
       if (isset($request->file_path)) {
        $name = $request->file_path->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $file_path = $request->file('file_path')->storeAs('files', $fullName, 'public');
    }
        if (isset($request->image)) {
        $name =  $request->image->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $image = $request->file('image')->storeAs('files', $fullName, 'public');
    }
        class_attachment::create([
        'title' => $request->title,
        'description' => $request->description,
        'file_path' => $file_path,
        'image' => $image,
        'type' => $request->type,
        'lesson_class_id'=>$request->lesson_class_id,
      ]);
      return to_route('classAttachment.index');
    }

    public function index(){
        $classAttachments = class_attachment::all();
        $classes = lesson_class::all();
        return view('admin.classAttachment.index' , ['classAttachments'=>$classAttachments , 'classes'=>$classes]);
    }
 
    public function edit(class_attachment $classAttachment){
        $classes = lesson_class::all();
        return view('admin.classAttachment.edit', ['classAttachment'=>$classAttachment , 'classes'=>$classes]);
    }

    public function update(Request $request){
        $classAttachment = class_attachment::find($request->id);
        if (isset($request->image)) {
         if ($classAttachment->image){
                Storage::disk('public')->delete($classAttachment->image);
            }
            $pictureName = $request->image->getClientOriginalName();
            $fullPictureName = Str::uuid() . '_' . $pictureName;
            $picturePath = $request->file('image')->storeAs('files', $fullPictureName, 'public');
            $classAttachment->image = $picturePath;
        }
            $classAttachment->title = $request->title;
            $classAttachment->description = $request->description;
            $classAttachment->file_path = $request->file_path;
            $classAttachment->type = $request->type;
            $classAttachment->lesson_class_id = $request->lesson_class_id;
            $classAttachment->save();
            return to_route('clas$classAttachment.index');
    }

    public function delete(class_attachment $classAttachment){
        class_attachment::find($classAttachment->id)->delete();
         return to_route('classAttachment.index');
    }
}
