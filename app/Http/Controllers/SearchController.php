<?php

namespace App\Http\Controllers;

use App\Models\ecomm;
use App\Models\menu;
use App\Models\pages;
use App\Models\category;
use App\Models\socialMedia;
use App\Models\User;
use App\Models\page_category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('search', '');
        $datas = [];
        $datas['title'] = $keyword;
        $datas['pages'] = pages::where('title', 'like', '%' . $keyword . '%')->orWhere('subTitle', 'like', '%' . $keyword . '%')->orWhere('description', 'like', '%' . $keyword . '%')->get();
        $categories = page_category::all();
        $socialMedias = socialMedia::all();
        return view('client.search.index', ['datas' => $datas, 'searchTitle' => $datas['title'], 'categories'=>$categories , 'socialMedias'=>$socialMedias]);
    }

    
public function getFilters(Request $request)
{
    $filters = $request->input('filters');

    $keyword = $filters['keyword'] ?? '';
    $sortType = $filters['sortType'] ?? 'desc';
    $sortBy = $filters['sortBy'] ?? 'id';

    $fromDate = $filters['fromDate'] ?? null;
    $toDate = $filters['toDate'] ?? null;

    $categoryIds = $filters['category'] ?? ['all'];
    $socialMediaIds = $filters['socialMedia'] ?? ['all'];

    $pages = pages::where(function ($query) use ($fromDate, $toDate, $keyword) {

        if (!empty($fromDate) && !empty($toDate)) {
            $query->whereBetween('date', [$fromDate, $toDate]);
        }

        if (!empty($keyword)) {
            $query->orWhere('title', 'like', '%' . $keyword . '%')->orWhere('subTitle', 'like', '%' . $keyword . '%')->orWhere('description', 'like', '%' . $keyword . '%');
        }

    });

    if (!in_array('all', $categoryIds)) {
        $pages->whereIn('category_id', $categoryIds);
    }

    if (!in_array('all', $socialMediaIds)) {
        $pages->whereIn('id', function ($query) use ($socialMediaIds) {
            $query->select('page_id')
                ->from('social_addresses')
                ->whereIn('socialMedia_id', $socialMediaIds);
        });
    }

    $pages = $pages->orderBy($sortBy, $sortType)->get();

    return response()->json($pages);
}

    // public function getFilters(Request $request){
    //     $filters = $request->input('filters');
    //     // return response()->json($filters);
    //     $keyword = $filters['keyword'];
    //     $sortType = $filters['sortType'];
    //     $sortBy = $filters['sortBy'];
    //     $fromDate = $filters['fromDate'];
    //     $toDate = $filters['toDate'];
    //     $categoryIds = isset($filters['category']) ? $filters['category'] : ['all'];
    //     $socialMediaIds = isset($filters['socialMedia']) ? $filters['socialMedia'] : ['all'];

    //     if(count($categoryIds) == 1 && in_array('all', $categoryIds)){
    //         $categories = page_category::select('id')->get();
    //         $categoryIds = [];
    //         foreach($categories as $category){
    //             $categoryIds[]=$category->id;
    //         }
    //     }
    //     if(count($socialMediaIds) == 1 && in_array('all', $socialMediaIds)){
    //         $socialMedias = socialMedia::select('id')->get();
    //         $socialMediaIds = [];
    //         foreach($socialMedias as $social){
    //             $socialMediaIds[]=$social->id;
    //         }
    //     }

    //     $pages = pages::where(function ($query) use ($fromDate, $toDate){

    //         $query->whereBetween('date', [$fromDate, $toDate]);

    //     })->orWhere('title', 'like', '%'.$keyword.'%')->orWhere('subTitle', 'like', '%' . $keyword . '%')->orWhere('description', 'like', '%' . $keyword . '%');

    //     $categories = page_category::whereIn('id', $categoryIds)->with(['pages'])->get();
    //     $socialMedias = socialMedia::whereIn('id', $socialMediaIds)->with(['pages'])->get();

    //     $pages = $pages->orderBy($sortBy, $sortType)->get();
    //     $result = [$pages, $categories, $filters, $categoryIds , $socialMedias];
    //     return response()->json($result);
    // }
}
