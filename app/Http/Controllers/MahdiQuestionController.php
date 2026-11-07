<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahdiTest;
use App\Models\mahdiQuestion;
use App\Models\mahdiQuestion_option;

class MahdiQuestionController extends Controller
{
    public function create(mahdiTest $test){
        return view('guys.mrChemistry.question.create',['test'=>$test]);
    }

    public function store(Request $request, mahdiTest $test){
        foreach($request->question as $question){
            $insertedQuestion = mahdiQuestion::create([
                'title' => $question['title'],
                'description' => $question['description'],
                'mahdiTest_id'=>$test->id
            ]);

            foreach($question['answer'] as $key => $answer){
                mahdiQuestion_option::create([
                    'mahdiQuestion_id' => $insertedQuestion->id,
                    'option' => $answer,
                    'right_answer'=>$key == $question['correct'] ? 1 : 0,
                ]);
            }
        }
        return to_route('mquestion.list',['test'=>$test]);
    }

    public function index(mahdiTest $test){
        $test->load(['questions'=>function($query){
            $query->with(['options'=>function($q){
                $q->orderBy('id','asc')->get();
            }]);
        }]);
        return view('guys.mrChemistry.question.index',['test'=>$test]);
    }
    public function delete(mahdiQuestion $question){
        mahdiQuestion_id::where('mahdiQuestion_id',$question->id)->delete();
        $question->delete();
        return redirect()->back();
    }

    public function edit(mahdiQuestion $question){
        $question->load(['options'=>function($query){
            $query->orderBy('id','asc')->get();
        }]);
        return response()->json($question);
    }

    public function update(Request $request, mahdiQuestion $question){
        $question->title = $request->title;
        $question->description = $request->description;
        mahdiQuestion_option::where('mahdiQuestion_id', $question->id)->delete();
        foreach($request->answers as $key => $answer){
            mahdiQuestion_option::create([
                'mahdiQuestion_id' => $question->id,
                'option' => $answer,
                'right_answer'=>$key == $request->correct ? 1 : 0,
            ]);
        }
        $question->save();
        $question->load(['options'=>function($query){
            $query->orderBy('id','asc')->get();
        }]);
        return response()->json($question);
    }
}
