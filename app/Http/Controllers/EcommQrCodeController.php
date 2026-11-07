<?php

namespace App\Http\Controllers;

use App\Models\ecomm;
use App\Models\ecomm_qrCode;
use Illuminate\Http\Request;

class EcommQrCodeController extends Controller
{
  public function load(ecomm $ecomm, string $slug)
  {
    $user = $ecomm->user;
    $user->scan_count += 1;
    $user->save();
    return view('client.ecomm.ecomm_menu', ['ecomm' => $ecomm, 'slug' => $slug]);
  }
}
