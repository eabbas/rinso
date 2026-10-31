<?php

namespace App\Http\Controllers;

use App\Models\socialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialMediaController extends Controller
{
    public function create()
    {
        return view('admin.socialMedia.create');
    }

    public function store(Request $request)
    {
        $path=null;
         if (isset($request->icon_path)) {
            $name = $request->icon_path->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->icon_path->storeAs('socialMedia', $fullName, 'public');
        }
        socialMedia::create([
            'title' => $request->title,
            'icon_path' => $path,
            'link' => $request->link,
            'color'=>$request->color
        ]);
        return to_route('socialMedia.list');
    }

    public function index()
    {
        $socialMedias = socialMedia::all();
        return view('admin.socialMedia.index', ['socialMedias' => $socialMedias]);
    }

    public function edit(socialMedia $socialMedia)
    {
        return view('admin.socialMedia.edit', ['socialMedia' => $socialMedia]);
    }

    public function update(Request $request)
    {
        $socialMedia = socialMedia::find($request->id);
        if (isset($request->icon_path)) {
            Storage::disk('public')->delete($socialMedia->icon_path);
            $name = $request->icon_path->getClientOriginalName();
            $path = $request->icon_path->storeAs('socialMedia', $name, 'public');
            $socialMedia->icon_path = $path;
        }
        $socialMedia->title = $request->title;
        $socialMedia->link = $request->link;
        isset($request->color) && $socialMedia->color = $request->color;
        $socialMedia->save();
        return to_route('socialMedia.list');
    }

    public function delete(socialMedia $socialMedia)
    {
        // foreach ($socialMedia->social_addresses as $address) {
        //     $address->delete();
        // }
        $socialMedia->delete();
        return to_route('socialMedia.list');
    }
    public function deleteAll(Request $request)
    {
        if (!isset($request->socialMedias)) {
            return redirect()->back();
        }
        foreach ($request->socialMedias as $socialMedia) {
            $socialMedia->delete();
        }
        return to_route('socialMedia.list');
    }
}
