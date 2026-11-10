<?php

namespace App\Http\Controllers;

use App\Models\aboutUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function create_edit(aboutUs $aboutUs = null)
    {
        return view('admin.aboutUs.create', ['aboutUs' => $aboutUs]);
    }
    public function updateOrcreate(Request $request)
    {
        $id = $request->id ?? 1;
        $aboutUs = aboutUs::find($id);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image_title' => $request->image_title,
            'image_description' => $request->image_description,
        ];
        if ($request->hasFile('image')) {
            if ($aboutUs && $aboutUs->image) {
                Storage::disk('public')->delete($aboutUs->image);
            }
            $data['image'] = $request->file('image')->store('aboutUs', 'public');
        }
        aboutUs::updateOrCreate(
            ['id' => $id],
            $data
        );

        return to_route('aboutUs.list');
    }

    public function index()
    {
        $allAboutUs = aboutUs::all();
        return view('admin.aboutUs.index', ['allAboutUs' => $allAboutUs]);
    }

    public function delete(aboutUs $aboutUs)
    {
        if ($aboutUs->image) {
            Storage::disk('public')->delete($aboutUs->image);
        }
        $aboutUs->delete();
        return redirect('/aboutUs/aboutUs');
    }

    public function clientList()
    {
        $aboutUs = aboutUs::all();
        return view("client.aboutUs.aboutUsList", ['aboutUs' => $aboutUs]);
    }
}
