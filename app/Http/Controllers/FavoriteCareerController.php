<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\favoriteCareer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteCareerController extends Controller
{
    public function create(Request $request)
    {
        $favoriteCareer = favoriteCareer::where('career_id', $request->id)->first();
        if (!$favoriteCareer) {
            favoriteCareer::create(['user_id' => Auth::id(), 'career_id' => $request->id]);
        }
    }

    public function index()
    {
        $favoriteCareers = favoriteCareer::where('user_id', Auth::id())->get();
        $careers = null;
        foreach ($favoriteCareers as $favoriteCareer) {
            $careers[] = career::find($favoriteCareer->career_id);
        }
        if ($careers) {
            return view('admin.favoriteCareer.index', ['careers' => $careers]);
        }
        return to_route('user.profile');
    }

    public function delete(career $career)
    {
        $favoriteCareer = favoriteCareer::where('career_id', $career->id)->first();
        $favoriteCareer->delete();
        return to_route('favoriteCareer.list');
    }
}
