<?php

namespace App\Http\Controllers;

use App\Models\pages;
use App\Models\site_link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteLinkController extends Controller
{
    public function create(pages $pages)
    {
        return view('admin.siteLink.create', ['pages' => $pages]);
    }

    public function store(Request $request)
    {
        // $path = null;
        // if (isset($reqeust->icon_path)) {
        //     $name = $request->icon_path->getClientOriginalName();
        //     $fullName = time() . '_' . $name;
        //     $path = $request->icon_path->storeAs('socialMedia', $fullName, 'public');
        // }
        $id = site_link::insertGetId([
            'address' => 'https://' . $request->address,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'page_id' => $request->page_id,
            // 'icon_path' => $path
        ]);
        $data = site_link::find($id);
        return response()->json($data);
    }

    public function index()
    {
        $siteLinks = site_link::all();
        return view('admin.siteLink.index', ['siteLinks' => $siteLinks]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $link = site_link::find($id);
        return response()->json($link);
    }

    public function update(Request $request)
    {
        $siteLink = site_link::find($request->id);
        // if ($request->icon_path) {
        //     if ($siteLink->icon_path) {
        //         Storage::disk('public')->delete($siteLink->icon_path);
        //     }
        //     $name = $request->icon_path->getClientOriginalName();
        //     $fullName = time() . '_' . $name;
        //     $path = $request->icon_path->storeAs('socialMedia', $fullName, 'public');
        //     $siteLink->icon_path = $path;
        // }
        $siteLink->address = $request->address;
        $siteLink->title = $request->title;
        $siteLink->save();
        return response()->json($siteLink);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $siteLink = site_link::find($id);
        $siteLink->delete();
        return response()->json('ok');
    }
}
