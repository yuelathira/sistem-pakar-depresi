<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengetahuan;
use App\Models\Penyakit;
use App\Models\Gejala;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengetahuans = Pengetahuan::all();

        return view('admin.pengetahuan', compact('pengetahuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah', ["name" => "Pengetahuan"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gejala_id' => 'required',
            'believe' => 'required',
            'diagnosa_check' => 'required|array',
        ]);

        $data = $request->all();
        $data["plausability"] = 1 - $request->believe;
        $data["diagnosa_check"] = json_encode($data["diagnosa_check"]);

        Pengetahuan::create($data);

        return redirect()->route('admin.pengetahuan.index')
            ->with('success', 'Pengetahuan created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengetahuan $pengetahuan)
    {
        return view('admin.edit-pengetahuan', compact('pengetahuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengetahuan $pengetahuan)
    {
        $request->validate([
            'gejala_id' => 'required',
            'believe' => 'required',
            'diagnosa_check' => 'required|array',
        ]);

        $data = $request->all();
        $data["plausability"] = 1 - $request->believe;
        $data["diagnosa_check"] = json_encode($data["diagnosa_check"]);

        $pengetahuan->update($data);

        return redirect()->route('admin.pengetahuan.index')
            ->with('success', 'Pengetahuan updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengetahuan $pengetahuan)
    {
        $pengetahuan->delete();

        return redirect()->route('admin.pengetahuan.index')
            ->with('success', 'Pengetahuan deleted successfully');
    }
}
