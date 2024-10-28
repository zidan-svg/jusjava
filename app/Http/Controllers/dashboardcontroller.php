<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class dashboardcontroller extends Controller
{
    // Method untuk menampilkan dashboard
    public function index() : View
    {
        return view('dashboard'); // Mengarahkan ke view admin.dashboard
    }
}
