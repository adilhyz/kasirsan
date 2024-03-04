<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataHidup;

class HidupController extends Controller
{
    public function index()
    {
        $getCuy = DataHidup::getCuy('home');
        $getBat = DataHidup::getbatereCuy();
        $data = array_merge($getCuy, $getBat);
        return view('home', $data);
    }
    public function about()
    {
        $data = DataHidup::getCuy('about');
        return view('about', $data);
    }
}
