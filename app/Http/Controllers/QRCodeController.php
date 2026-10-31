<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qr_code;
use Illuminate\Support\Facades\Storage;
use App\Models\career;

class QrCodeController extends Controller
{
    public function delete(Request $request){
        $qr_code = qr_code::find($request->id);
        $count = $qr_code->career->qr_count;
        $count-=1;
        $qr_code->career->qr_count = $count;
        $qr_code->career->save();
        Storage::disk('public')->delete($qr_code->qr_path);
        $qr_code->delete();
        return response()->json($qr_code);
    }

    public function load(career $career, string $slug){
        $career->count += 1;
        $career->save();
        $user = $career->user;
        $user->scan_count += 1;
        $user->save();
        return to_route('client.menu', [$career, $slug]);
    }
   
    public function edit(Request $request){
        $qrcode = qr_code::find($request->id);
        return response()->json($qrcode);
    }
    public function update(Request $request){
        $qr_code = qr_code::find($request->id);
        $qr_code->description = $request->description;
        $qr_code->save();
        return response()->json($qr_code);
    }
}
