<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Pengetahuan;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    

    public function admin()
    {
        $gejalas = Gejala::all();
        $users = User::all();
        $diagnosas = Diagnosa::all();
        $pengetahuans = Pengetahuan::all();
        return view('admin.home', compact("gejalas", "pengetahuans", "diagnosas", "users"));
    }
}
