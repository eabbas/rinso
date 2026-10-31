<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\institute;
use App\Models\field;
use Illuminate\Support\Facades\Storage;


class FieldController extends Controller
{
    public function create(institute $institute){
        return view('admin.field.create' , ['institute'=>$institute]);
    }

     public function store(Request $request){
            $institute = institute::find($request->institute_id);
            if(isset($request->image)) {
                $name = $request->image->getClientOriginalName();
                $fullName = Str::uuid() . '_' . $name;
                $image = $request->file('image')->storeAs('files', $fullName, 'public');
                field::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $image,
                    'phone' => $request->phone,
                    'status' => $request->status,
                    'institute_id' => $institute->id,
                ]);
            }else{
                field::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'phone' => $request->phone,
                    'status' => $request->status,
                    'institute_id' => $institute->id,
                ]);
            }
             return to_route('institute.field_list' , ['institute'=>$institute]);
    }

     public function index(){
        $fields = field::all();
        return view('admin.field.index' , ['fields'=>$fields]);
    }
    
    public function edit(field $field){
        $institutes = institute::all();
        return view('admin.field.edit' , ['field'=>$field , 'institutes'=>$institutes]);
    }

    public function update(Request $request){
        $institute = institute::find($request->institute_id);
        $field = field::find($request->id);
        if (isset($request->image)) {
            if ($field->image) {
                Storage::disk('public')->delete($field->image);
            }
            $pictureName = $request->image->getClientOriginalName();
            $fullPictureName = Str::uuid() . '_' . $pictureName;
            $image = $request->file('image')->storeAs('files', $fullPictureName, 'public');
            $field->image = $image;
        }
        $field->title = $request->title;
        $field->description = $request->description;
        $field->image =$image;
        $field->status = $request->status;
        $field->institute_id = $request->institute_id;
        $field->save();
        return to_route('institute.field_list' , ['institute'=>$institute]);
        }

        public function lesson_list(field $field){
            return view('admin.field.lesson_list' , ['field'=>$field]);
        }

        public function single(field $field){
            return view('admin.field.single', ['field'=>$field]);
        }

         public function delete(field $field){
         field::find($field->id)->delete();
         return to_route('field.fields');
    }
}
