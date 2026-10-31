<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\general_qrCodes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class GeneralQrCodesController extends Controller
{
    public function create()
    {
        return view('admin.generalQrCodes.create');
    }

    public function store(Request $request)
    {
        $random = Str::random(10);
        $link = $request->link;
        $qr_svg = QrCode::size(100)->generate($link);
        $fileName = 'generalQrCodes/' . $link . '_' . $random . '.svg';
        Storage::disk('public')->put($fileName, $qr_svg);
        general_qrCodes::create([
            'link' => $link,
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $fileName,
            'user_id' => Auth::id(),
        ]);
        return to_route('generalQrCodes.list');
    }

    public function list()
    {
        $qrCodes = general_qrCodes::where('user_id', Auth::id())->get();
        return view('admin.generalQrCodes.index', ['qrCodes' => $qrCodes]);
    }

    public function edit(Request $request)
    {
        $generalQrCode = general_qrCodes::find($request->id);
        return response()->json($generalQrCode);
    }

    public function update(Request $request)
    {
        $qrCode = general_qrCodes::find($request->id);
        Storage::disk('public')->delete($qrCode['image_path']);
        $random = Str::random(10);
        $link = $request->values[0];
        $qr_svg = QrCode::size(100)->generate($link);
        $fileName = 'generalQrCodes/' . $link . '_' . $random . '.svg';
        Storage::disk('public')->put($fileName, $qr_svg);
        $qrCode->link = $link;
        $qrCode->title = $request->values[1];
        $qrCode->description = $request->values[2];
        $qrCode->image_path = $fileName;
        $result = $qrCode->save();
        return response()->json($qrCode);
    }

    public function delete(general_qrCodes $generalQrCodes)
    {
        Storage::disk('public')->delete($generalQrCodes['image_path']);
        $generalQrCodes->delete();
        return to_route('generalQrCodes.list');
    }
}
