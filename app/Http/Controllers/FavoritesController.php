<?php

namespace App\Http\Controllers;

use App\Models\favorite_categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\favorites;


class FavoritesController extends Controller
{
    public function create(Request $request)
    {
        if (Auth::check()) {
            $favorites = favorites::where('user_id', Auth::id())->where('item_id', $request->item_id)->get();
            $favorite_categories = favorite_categories::all();
            $data['favorite'] = $favorites;
            $data['all'] = $favorite_categories;
            return response()->json($data);
        }
        return response()->json(['code' => 304]);
    }
    public function store(Request $request)
    {
        $favorites = favorites::where('item_id', $request->favoriteDataArray[0])->get();
        foreach ($favorites as $favorite) {
            $favorite->delete();
        }
        // $multipeFavorite = isset($request->multipleFavorite) ? $request->multipleFavorite : [1];
        if ($request->multipleFavorite) {

            $multipeFavorite = $request->multipleFavorite;
            foreach ($multipeFavorite as $catId) {
                $favorite = favorites::create([
                    'user_id' => Auth::id(),
                    'item_id' => $request->favoriteDataArray[0],
                    'type' => $request->favoriteDataArray[1],
                    'cat_id' => $catId
                ]);
            }
        }

        return response()->json('ok');
    }

    public function delete(Request $request)
    {
        $favorites = favorites::where('type', $request->favoriteType)->where('item_id', $request->item_id)->get();
        foreach ($favorites as $favorite) {
            $favorite->delete();
        }
        return response()->json('ok');
    }
}
