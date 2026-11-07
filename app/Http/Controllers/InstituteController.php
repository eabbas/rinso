<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\institute;
use App\Models\province_cities;
use App\Models\master_institute;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class InstituteController extends Controller
{
    public function create(institute $institute){
        $provinces = province_cities::where('parent', 0)->get();
        $institutes = institute::all();
        // if(Auth::user()->institutes == Null){
        //     $institutes =  $institute->user->load('institutes');
        //     return view('admin.institute.create' ,['provinces'=>$provinces , 'institutes'=>$institutes , 'request'=>$institute]);
        // }else{
            return view('admin.institute.create' ,['provinces'=>$provinces , 'institute'=>$institute , 'institutes'=>$institutes]);

        // }
        // dd($institutes);
    }

    public function store(Request $request){
        // dd($request->all());
           $user = Auth::user();
           $logo = null;
           $cover_img = null;
           if(isset($request->logo)) {
                $name = $request->logo->getClientOriginalName();
                $fullName = Str::uuid() . '_' . $name;
                $logo = $request->file('logo')->storeAs('files', $fullName, 'public');
            }
            if(isset($request->cover_img)) {
                $name = $request->cover_img->getClientOriginalName();
                $fullName = Str::uuid() . '_' . $name;
                $cover_img = $request->file('cover_img')->storeAs('files', $fullName, 'public');
            }
             institute::create([
                'title' => $request->title,
                'description' => $request->description,
                'logo' => $logo,
                'cover_img' => $cover_img,
                'phone' => $request->phone,
                'website' => $request->website,
                'address' => $request->address,
                'user_id' => $user->id,
                'email' => $request->email,
                'city_id' => $request->city,
                'parent_id' =>$request->parent_id,
             ]);
             return to_route('institute.institutes');
    }

    public function index(){
        $instiutes = institute::all();
        return view('admin.institute.index' , ['institutes'=>$instiutes]);
    }

    public function edit(institute $institute){
        // dd($institute->province_city);
         $provinces = province_cities::where('parent', 0)->get();
         $cities = province_cities::where('parent', 1)->get();
        return view('admin.institute.edit', ['provinces'=>$provinces , 'institute'=>$institute , 'cities'=>$cities]);
    }

    public function update(Request $request){
        $logo = null;
        $cover_img = null;
        $institute = institute::find($request->id);
        if(isset($request->logo)) {
                $name = $request->logo->getClientOriginalName();
                $fullName = Str::uuid() . '_' . $name;
                $logo = $request->file('logo')->storeAs('files', $fullName, 'public');
            }
            if(isset($request->cover_img)) {
                $name = $request->cover_img->getClientOriginalName();
                $fullName = Str::uuid() . '_' . $name;
                $cover_img = $request->file('cover_img')->storeAs('files', $fullName, 'public');
            }
            $institute->title = $request->title;
            $institute->description = $request->description;
            $institute->logo = $logo;
            $institute->cover_img = $cover_img;
            $institute->phone = $request->phone;
            $institute->website = $request->website;
            $institute->address = $request->address;
            $institute->user_id = $request->user_id;
            $institute->city_id = $request->city;
            $institute->save();
            return to_route('institute.institutes');
    }

    public function single(institute $institute){
        $lesson_classes = null;
        $parent = institute::find($institute->parent_id);
        foreach ($institute->lessons as $lesson){
                $lesson_classes = $lesson->lesson_classes;
        }
        // dd($lesson->classes);
        return view('admin.institute.single' , ['institute'=>$institute , 'parent'=>$parent , 'lesson_classes'=>$lesson_classes]);

    }

    public function add_master(institute $institute){
        // dd($institute->master);
        return view('admin.institute.add_master', ['institute'=>$institute]);
    }

    public function master_store(Request $request){
        $institute = institute::find($request->id);
        $user = User::where('phoneNumber' , $request->phone)->get();
       foreach($user as $master){
        master_institute::create([
            'institute_id' => $request->id,
            'master_id' => $master->id,
        ]);
       }
       return to_route('institute.single' , ['institute'=>$institute]);
    }

    public function master_list(institute $institute){
        return view('admin.institute.master_list' , ['institute'=>$institute]);
    }

    public function student_list(institute $institute){
        return view('admin.institute.student_list' , ['institute'=>$institute]);
    }

    public function field_list(institute $institute){
        return view('admin.institute.field_list' , ['institute'=>$institute]);
    }

    public function lesson_list(institute $institute){
        return view('admin.institute.lesson_list' , ['institute'=>$institute]);
    }

    public function class_list(institute $institute){
        return view('admin.institute.class_list' , ['institute'=>$institute]);
    }

    public function master_classes(user $master){
        if (!$master) {
            $master = Auth::user();
        }
        $master->load('lesson_classes');
        return view('admin.institute.master_classes' , ['master'=>$master]);
    }

     public function branch_list(institute $institute){
        return view('admin.institute.branch_list' , ['institute'=>$institute]);
    }

     public function delete(institute $institute){
         institute::find($institute->id)->delete();
         return to_route('institute.institutes');
    }
    
     public function master_delete(user $master){
        foreach($master->institutes as $institute){
            master_institute::where('institute_id',$institute->id)->where('master_id' , $master->id)->delete();
            return to_route('institute.master_list' , [$institute]);
        }
    }

     public function student_delete(user $student){
        foreach($student->user_institutes as $institute){
            master_institute::where('institute_id',$institute->id)->where('master_id' , $student->id)->delete();
            return to_route('institute.student_list' , [$institute]);
        }
    }

     public function user_institute(user $user = null){
        if (!$user) {
            $user = Auth::user();
        }
        return view('admin.institute.user_institute', ['user' => $user]);
    }

     public function master_institute(user $user = null){
        if (!$user) {
            $master = Auth::user();
        }
        return view('admin.institute.master_institutes', ['master' => $master]);
    }

     public function myClasses(institute $institute){
        $user = Auth::user();
        return view('admin.institute.myClasses', ['user' => $user , 'institute'=>$institute]);
    }

    
    public function deleteAll(Request $request)
    {
        if (!isset($request->institutes)) {
            return redirect()->back();
        }
        foreach ($request->institutes as $institute_id) {
            $institute = institute::find($institute_id);
            if (count($institute->masters)) {
                foreach ($institute->masters as $master) {
                    $master->delete();
                }
            }
            if (count($institute->fields)) {
                foreach ($institute->fields as $field) {
                    if (count($field->lessons)) {
                        foreach ($field->lessons as $lesson) {
                            if (count($lesson->menu_items)) {
                                foreach ($lesson->lesson_classes as $class) {
                                    // if (count($class->students)) {
                                    //     foreach ($class->students as $student) {
                                    //         $student->delete();
                                    //     }
                                    // }
                                    $class->delete();
                                }
                            }
                            $lesson->delete();
                        }
                    }
                    $field->delete();
                }
            }
            $institute->delete();
        }
        return redirect()->back();
    }
}
