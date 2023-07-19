<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Pengetahuan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();

        return view('home', compact("artikel"));
    }
}
