<?php

namespace App\Http\Controllers;

use App\Models\favorite_categories;
use App\Models\favorites;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteCategoriesController extends Controller
{
  public function store(Request $request)
  {
    $favoriteCat_id = favorite_categories::insertGetId([
      'title' => $request->title,
      'user_id' => Auth::id()
    ]);
    $category = favorite_categories::find($favoriteCat_id);
    return response()->json($category);
  }
  public function delete(Request $request)
  {
    // return response()->json($request->all());
    $favoriteCat_id = favorites::where('cat_id', $request->cat_id)->get();
    foreach ($favoriteCat_id as $catId) {
      $catId->delete();
    }
    favorite_categories::find($request->cat_id)->delete();
    return response()->json('ok');
  }
}
