<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkList;
use App\Models\role_user;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CheckListController extends Controller
{
    public function form(){
        return view('admin.checkListFolder.checkListForm');
    }
    public function store(Request $request){
//        dd($request->all());
        $checkList=checkList::create([
            'programming_time'=>isset($request->programming_time)?$request->programming_time:0,
            'programming_description'=>isset($request->programming_description)?$request->programming_description:null,
            'english_time'=>isset($request->english_time)?$request->english_time:0,
            'english_description'=>isset($request->english_description)?$request->english_description:null,
            'reading_time'=>isset($request->reading_time)?$request->reading_time:0,
            'reading_description'=>isset($request->reading_description)?$request->reading_description:null,
            'user_id'=>Auth::id(),
            'description'=>isset($request->description)?$request->description:null
        ]);
        return  to_route('checkList.myList');
    }
    public function list(){
        $userChekList=checkList::where('user_id',Auth::id())->get();
        return view('admin.checkListFolder.myCheckLists',[ 'chekLists'=>$userChekList]);
    }
    public function single($id){
        $userChekList=checkList::find($id);
        $user=User::find($userChekList->user_id);
        return view('admin.checkListFolder.checkListSingle',[ 'chekList'=>$userChekList , 'user'=>$user]);
    }
    public function userslist(){
        $checkListUsers=[];
        $users=user::all();
        foreach ($users as $user) {
            $user->role;
            if($user->role[0]->title=='admin' || $user->role[0]->title=='official_student'){
                $checkListUsers[]=$user;
            }
        }
//        dd($admins);
        return view('admin.checkListFolder.checkListUsers',['users'=>$checkListUsers]);
    }
    public function userChekList($id){
        $user=User::find($id);
        $user->checkLists;
//        dd($user);
        return view('admin.checkListFolder.chekListUser',['chekLists'=>$user->checkLists , 'user'=>$user]);
    }
    public function allUsersCheckLists(){
        $checkLists=checkList::all();
//        return $checkLists;
        foreach ($checkLists as $checkList) {
            $checkList->user;
        }
        return view('admin.checkListFolder.allCheckLists',['checkLists'=>$checkLists]);
    }
    public function edit($id){
        $checkList=checkList::find($id);
        return view('admin.checkListFolder.checkListEditForm',['checkList'=>$checkList]);
    }
    public function update(Request $request){
        $checkList=checkList::find($request->checkList_id);

//        dd($checkList);

//        dd($request->all());
        $checkList->programming_time = isset($request->programming_time)?$request->programming_time:0;
        $checkList->programming_description = isset($request->programming_description)?$request->programming_description:null;
        $checkList->english_time = isset($request->english_time)?$request->english_time:0;
        $checkList->english_description = isset($request->english_description)?$request->english_description:null;
        $checkList->reading_time = isset($request->reading_time)?$request->reading_time:0;
        $checkList->reading_description = isset($request->reading_description)?$request->reading_description:null;
        $checkList->description = isset($request->description)?$request->description:null;
        $checkList->save();
        return  to_route('checkList.myList');

    }

    public function delete($id){
        checkList::find($id)->delete();
        if(Auth::user()->phoneNumber=='09147794595'){
            return  to_route('checkList.all_user_check_lists');
        }else{
            return  to_route('checkList.myList');
        }



    }
}
