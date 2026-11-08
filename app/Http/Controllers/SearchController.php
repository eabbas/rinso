<?php

namespace App\Http\Controllers;

use App\Models\ecomm;
use App\Models\menu;
use App\Models\pages;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('search', '');
        $datas = [];
        $datas['title'] = $keyword;
        $datas['pages'] = pages::where('title', 'like', '%' . $keyword . '%')->get();
        return view('client.search.index', ['datas' => $datas, 'searchTitle' => $datas['title']]);
    }
}
