<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\specialUser;
Use App\Models\pages;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SpecialUserController extends Controller
{
    public function store(Request $request){
    //    return response()->json($request->all());
        $user_id = 0;
        $flag = true;
        if(isset($request->user_id)){
            $user_id = $request->user_id;
        }
        if(!isset($request->user_id)){
            $user_id = Auth::id();
        }
        // $datas = specialUser::where('page_id', $request->input('page_id'))->get();
        $datas = specialUser::where('type', $request->type)->get();
        $idArr = $datas->pluck('user_id')->toArray();
        if(in_array($user_id, $idArr)){
            $flag = false;
            return response()->json($flag);
        }
//        return response()->json([$request->all(), $flag, $datas]);

        specialUser::create([
            'page_id'=>$request->input('page_id'),
            'user_id'=>$user_id,
            'type'=>$request->type
        ]);
        return response()->json($flag);
    }

    public function index(pages $pages){
        return view('admin.specialUser.index', ['page'=>$pages]);
    }

    public function delete(User $user, pages $pages){
        specialUser::where('page_id', $pages->id)->where('user_id', $user->id)->delete();
        return redirect()->back();
    }
    public function customerPage($page_id)
    {
        return redirect()->back();
    }
}
