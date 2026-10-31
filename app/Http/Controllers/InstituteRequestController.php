<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\institute;
use App\Models\user;
use App\Models\field;
use App\Models\institute_request;
use App\Models\master_institute;
use Illuminate\Support\Facades\Auth;

use PhpParser\Node\Stmt\Foreach_;

class InstituteRequestController extends Controller
{
    public function create(institute $institute){
        return view('admin.instituteRequest.form' , ['institute'=>$institute]);
    }

    public function store(Request $request){
        if(Auth::user()){
            institute_request::create([
                'user_id' => Auth::id(),
                'institute_id' => $request->institute_id,
                'field_id' => $request->field_id,
                'status'=> 0,
            ]);
        }
        return to_route('institute.single' , [$request->institute_id]);
    }

    public function requests(institute $institute){
        if(count($institute->requests)){
            foreach($institute->requests as $request){
               $field = field::find($request->field_id);
            }
            return view('admin.instituteRequest.requests' , ['request'=>$request , 'field'=>$field , 'institute'=>$institute]);
        }else{
            return view('admin.instituteRequest.requests' , ['institute'=>$institute]);
        }
    }

    public function approveRequest($userId, $instituteId){
    
    $userRequest = institute_request::where('user_id', $userId)->where('institute_id', $instituteId)->first();
    $userRequest->status = 1;
    $userRequest->save();
    master_institute::create([
        'institute_id' => $instituteId,
        'master_id' => $userId,
    ]);
    
    return redirect()->back();
  }

  public function userDelete(user $user, institute $institute){
        institute_request::where('user_id' , $user->id)->delete();
        return to_route('request.requests', [$institute]);
    }
}
