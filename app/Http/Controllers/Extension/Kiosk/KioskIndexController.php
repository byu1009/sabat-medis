<?php

namespace App\Http\Controllers\Extension\Kiosk;

use App\Http\Controllers\Controller;
use App\Models\CounterReg;
use App\Models\CounterValue;
use App\Models\SystemAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KioskIndexController extends Controller
{
    public function index()
    {
        $value = CounterValue::where('cvalue_status', '1')->get();

        return view('pages.extension.kiosk.index', compact('value'));
    }

    public function get_tikcet_counter($prefix)
    {
        $prefix_block = [
            0 => 'a', // register
            1 => 'b', // rawat inap
        ];

        if (array_search($prefix, $prefix_block) == '') {
            return redirect()->back();
        } else {
            $lastcount = CounterReg::where('counter_date', date('Y-m-d'))->count();
            $lastqueue = CounterReg::where('counter_date', date('Y-m-d'))
                ->where('counter_prefix', $prefix)
                ->latest()
                ->value('counter_num');

            $queue = $lastqueue + 1;

            $input = [
                'counter_reg' => strtoupper($prefix) . date('Ymd') . sprintf("%03d", $lastcount + 1),
                'counter_date' => date('Y-m-d'),
                'counter_time' => date('H:i:s'),
                'counter_prefix' => strtoupper($prefix),
                'counter_num' => $queue,
                'counter_queue' => strtoupper($prefix) . $queue,
                'counter_eksekutif' => '0'
            ];

            CounterReg::create($input);

            return redirect()->route('kiosk.ticketcounter', Crypt::encrypt($input['counter_reg']));
        }
    }

    public function ticket_counter($id)
    {
        $creg = Crypt::decrypt($id);
        $about = SystemAbout::all();

        $find = CounterReg::where('counter_reg', $creg)->get();

        return view('pages.extension.kiosk.paper.ticket_counter', compact('find', 'about'));
    }
}
