<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pages;
use App\Models\ecomm;
use App\Models\menu;

class SearchController extends Controller
{
    public function search(Request $request){
        if (!$request->search) {

            $request->search = '';
        }
        $datas = [];
        $datas['title'] = $request->search;
        $datas['pages'] = pages::where('title', 'like', "%" . $request->search . "%")->get();
        // $datas['menu'] = menu::where('title', 'like', "%" . $request->search . "%")->get();
        // $datas['ecomm'] = ecomm::where('title', 'like', "%" . $request->search . "%")->get();
        return view('client.search.index', ['datas' => $datas, 'searchTitle' => $request->search]);
    }
}
