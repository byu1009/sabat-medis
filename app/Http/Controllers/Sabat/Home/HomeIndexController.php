<?php

namespace App\Http\Controllers\Sabat\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.sabatmedis.home.index');
    }
}
