<?php

namespace App\Http\Controllers\Extension\Kiosk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KioskClinicController extends Controller
{
    public function index()
    {
        return view('pages.extension.kiosk.clinic.index');
    }
}
