<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\educational_base;
use App\Models\mahdiTest;

class MahdiTestController extends Controller
{
    public function create(){
        $educationalBase = educational_base::all();
        return view('guys.mrChemistry.test.create', ['educationalBase' => $educationalBase]);
    }

    public function store(Request $request){
        mahdiTest::create($request->all());
        return to_route('mtest.list');
    }

    public function index(){
        $tests = mahdiTest::all();
        $bases = educational_base::all();
        return view('guys.mrChemistry.test.list', ['tests'=>$tests, 'bases'=>$bases]);
    }
    public function edit(mahdiTest $test){
        $educationalBase = educational_base::all();
        return view('guys.mrChemistry.test.edit', ['test'=>$test , 'educationalBase' => $educationalBase]);
    }
    public function update(Request $request){
        $test=mahdiTest::find($request->id);
        $test->update($request->all());
        return to_route('mtest.list');
    }
    public function single(mahdiTest $test){
        $test->base;
        $test->questions;
        return view('guys.mrChemistry.test.single', ['test'=>$test]);
    }
    public function delete(mahdiTest $test){
        $test->delete();
        return to_route('mtest.list');
    }

    public function edub(){
        $all = educational_base::all();
        return response()->json($all);
    }
}
