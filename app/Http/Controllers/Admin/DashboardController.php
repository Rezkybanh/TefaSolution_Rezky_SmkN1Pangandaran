<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;

class DashboardController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('vendor.backpack.dashboard', compact('layanans'));
    }
}