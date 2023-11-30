<?php

namespace App\Http\Controllers\Extension\Kiosk;

use App\Http\Controllers\Controller;
use App\Models\SabatmedisClinic;
use App\Models\SabatmedisPayment;
use App\Models\SabatmedisVisit;
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

    public function payment()
    {
        $data = SabatmedisPayment::where('pay_status', '1')
            ->where('pay_code', 'A09')
            ->orWhere('pay_code', 'BPJ')
            ->get();

        return $data;
    }

    public function visit()
    {
        $data = SabatmedisVisit::where('visit_status', '1')
            ->where('visit_code', '1')
            ->orWhere('visit_code', '3')
            ->get();

        return $data;
    }

    // =========================== //

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

    public function curl_payment_sync()
    {
        $curl = curl_init($this->url . '/payment/check');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            // 'Content-Type: application/json',
            // 'Content-Length: ' . strlen(json_encode($data))
            'usere: ' . $this->username,
            'passe: ' . $this->password
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        SabatmedisPayment::truncate();

        foreach (json_decode($response, true) as $d) {
            SabatmedisPayment::create([
                'pay_code' => $d['kode'],
                'pay_name' => $d['nama'],
                'pay_status' => $d['status']
            ]);
        }
    }

    public function curl_clinic_sync()
    {
        $curl = curl_init($this->url . '/clinic/check');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            // 'Content-Type: application/json',
            // 'Content-Length: ' . strlen(json_encode($data))
            'usere: ' . $this->username,
            'passe: ' . $this->password
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        SabatmedisClinic::truncate();
        foreach (json_decode($response) as $c) {
            SabatmedisClinic::create([
                'clinic_code' => $c->kode,
                'clinic_name' => $c->nama,
                'clinic_status' => $c->status
            ]);
        }

        $data = SabatmedisClinic::where('clinic_status', '1')
            ->where('clinic_code', 'U0002')
            ->orWhere('clinic_code', 'U0003')
            ->orWhere('clinic_code', 'U0004')
            ->orWhere('clinic_code', 'U0005')
            ->orWhere('clinic_code', 'U0006')
            ->get();

        return $data;
    }

    public function curl_doctor_sync(Request $request)
    {
        // return $request->all();
        $data = [
            'day' => $request->day,
            'clinic' => $request->clinic,
        ];

        $curl = curl_init($this->url . '/doctor/check');
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
