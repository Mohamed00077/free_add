<?php

namespace App\Http\Controllers;

use App\Models\Ad;

class HomeController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->get();
        return view('home', compact('ads'));
    }
}