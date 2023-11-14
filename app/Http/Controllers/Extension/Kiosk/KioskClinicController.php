<?php

namespace App\Http\Controllers\Extension\Kiosk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KioskClinicController extends Controller
{
    public function __construct()
    {
        $this->url = "http://localhost/sabat-bridging-khanza";
        $this->username = 'masB';
        $this->password = '*#cobaajadulu*#';
    }

    public function index()
    {
        return view('pages.extension.kiosk.clinic.index');
    }

    public function curl_patient_check(Request $request)
    {
        $data = array(
            'mrnum' => $request->mrnum,
        );

        $curl = curl_init($this->url . '/patient/check');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            // 'Content-Type: application/json',
            // 'Content-Length: ' . strlen(json_encode($data))
            'usere: ' . $this->username,
            'passe: ' . $this->password
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
