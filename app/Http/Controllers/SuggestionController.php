<?php

namespace App\Http\Controllers;
use App\Models\suggestion;

use Illuminate\Http\Request;

class SuggestionController extends Controller
{
   public function create()
    {
        return view("admin.suggestion.create");

    }

    public function store(Request $request)
    {
        suggestion::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return to_route('suggestion.list');
    }

    public function index()
    {
        $suggestions = suggestion::all();
        return view('admin.suggestion.index', ['suggestions' => $suggestions]);
    }
  public function delete(suggestion $suggestion)
    {
        $suggestion->delete();
        return to_route('suggestion.list');
    }
}
