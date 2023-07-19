<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $hasil = Hasil::find($id);
        $date = Carbon::now()->toDateString();
        $data = ['title' => 'Example PDF', 'hasil' => $hasil];
        // $pdf = PDF::loadView('result', $data);
        $pdf = PDF::loadView('result-pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);
        $name = "result" . $date;

        return $pdf->download($name . '.pdf');
    }
}
