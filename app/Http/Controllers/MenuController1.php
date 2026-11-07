<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\menu;
use App\Models\qr_code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MenuController extends Controller
{
    public function create(career $career)
    {
        $user = Auth::user();
        return view('admin.menu.create', ['user' => $user, 'career' => $career]);
    }

    public function store(Request $request)
    {
        $valueCount = 1;
        $menu_data = $request->menu_data;
        foreach ($menu_data as $key => $data) {
            if (isset($data['menu_image'])) {
                $name = $data['menu_image']->getClientOriginalName();
                $fullName = time() . '_' . $name;
                $path = $data['menu_image']->storeAs('images', $fullName, 'public');
                $menu_data[$key]['menu_image'] = $path;
            } else {
                $data['menu_image'] = null;
            }
            foreach ($data['values'] as $gKey => $value) {
                if (isset($value['gallery'])) {
                    $itemName = $value['gallery']->getClientOriginalName();
                    $itemFullName = time() . '_' . $itemName;
                    $itemPath = $value['gallery']->storeAs('images', $itemFullName, 'public');
                    $menu_data[$key]['values'][$gKey]['gallery'] = $itemPath;
                } else {
                    $value['gallery'] = null;
                }
                $menu_data[$key]['values'][$gKey]['id'] = $valueCount;
                $valueCount++;
            }
        }
        $career_id = $request->career_id;
        $menu_data = json_encode($menu_data);
        $menu_id = menu::insertGetId(['menu_data' => $menu_data, 'qr_num' => $request->qr_num, 'career_id' => $career_id]);
        for ($i = 0; $i < $request->qr_num; $i++) {
            $random = Str::random(10);
            $link = "famenu.ir/qrcode/$career_id/" . $random;
            $qr_svg = QrCode::size(100)->generate($link);
            $fileName = 'qrcodes/' . $career_id . '_' . $random . '.svg';
            Storage::disk('public')->put($fileName, $qr_svg);
            qr_code::create(['qr_path' => $fileName, 'career_id' => $career_id, 'menu_id' => $menu_id, 'slug' => 'qrcode/' . $career_id . '/' . $random]);
        }
        return to_route('career.careers', [Auth::user()]);
    }

    public function index(career $career)
    {
        $user = Auth::user();
        $career->menu->menu_data;
        return view('admin.menu.menu', ['career' => $career, 'user' => $user]);
    }

    public function edit(menu $menu)
    {
        $user = Auth::user();
        return view('admin.menu.edit', ['menu' => $menu, 'user' => $user]);
    }

    public function update(Request $request)
    {
        $menu_data = $request->menu_data;
        foreach ($menu_data as $key => $data) {
            $name = $data['menu_image']->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $data['menu_image']->storeAs('images', $fullName, 'public');
            $menu_data[$key]['menu_image'] = $path;
            foreach ($data['values'] as $gKey => $value) {
                $itemName = $value['gallery']->getClientOriginalName();
                $itemFullName = time() . '_' . $itemName;
                $itemPath = $value['gallery']->storeAs('images', $itemFullName, 'public');
                $menu_data[$key]['values'][$gKey]['gallery'] = $itemPath;
            }
        }
        $menu = menu::find($request->menu_id);
        $menu->menu_data = json_encode($menu_data);
        $menu->career_id = $request->career_id;
        $qr_count = 0;
        $career_id = $menu->career_id;
        if ($request->qr_num) {
            if ($request->qr_num > $menu->qr_num) {
                $qr_count = $request->qr_num - $menu->qr_num;
                while ($qr_count) {
                    $random = Str::random(10);
                    $link = "famenu.ir/qrcodes/$career_id/" . $random;
                    $qr_svg = QrCode::size(100)->generate($link);
                    $fileName = 'qrcodes/' . $career_id . '_' . $random . '.svg';
                    Storage::disk('public')->put($fileName, $qr_svg);
                    qr_code::create(['qr_path' => $fileName, 'career_id' => $career_id, 'menu_id' => $request->menu_id, 'slug' => 'qrcode/' . $career_id . '/' . $random]);
                    $qr_count--;
                }
            }
            // if ($request->qr_num<=$menu->qr_num) {
            //     # code...
            // }
        }
        $menu->qr_num = $request->qr_num;
        $menu->save();
        return to_route('career.careers', [Auth::user()]);
    }

    public function delete(menu $menu)
    {
        $user = Auth::user();
        foreach ($menu->qr_codes as $qr_code) {
            Storage::disk('public')->delete($qr_code->qr_path);
            $qr_code->delete();
        }
        $menu->delete();
        return to_route('user.profile', [$user]);
    }

    public function qr_codes(menu $menu)
    {
        $user = Auth::user();
        return view('admin.menu.qrcodes', ['menu' => $menu, 'user' => $user]);
    }
}
