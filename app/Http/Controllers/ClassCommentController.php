<?php

namespace App\Http\Controllers;

use App\Models\class_comment;
use App\Models\lesson_class;
use Illuminate\Http\Request;

class ClassCommentController extends Controller
{
    public function store(Request $request){
         $class = lesson_class::find($request->lesson_class_id);
         class_comment::create([
            'comment'=>$request->comment,
            'lesson_class_id'=>$request->lesson_class_id,
            'user_id'=>$request->user_id,
        ]);
        // dd($comment);
        return to_route('class.comments' , ['class'=>$class]); 
    }

     public function delete(class_comment $comment){
         class_comment::find($comment->id)->delete();
         return to_route('class.comments' ,[$comment->lesson_class]);
    }
}
