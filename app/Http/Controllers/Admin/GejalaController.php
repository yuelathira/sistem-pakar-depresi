<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GejalaController extends Controller
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
        $gejalas = Gejala::all();

        return view('admin.gejala', compact('gejalas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah', ["name" => "Gejala"]);
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
            'kodegejala' => 'required',
            'namagejala' => 'required',
        ]);

        Gejala::create($request->all());

        return redirect()->route('admin.gejala.index')
            ->with('success', 'Gejala created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Gejala $gejala)
    {
        return view('admin.edit-gejala', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'kodegejala' => 'required',
            'namagejala' => 'required',
        ]);

        $gejala->update($request->all());

        return redirect()->route('admin.gejala.index')
            ->with('success', 'Gejala updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gejala $gejala)
    {
        $gejala->delete();

        return redirect()->route('admin.gejala.index')
            ->with('success', 'Gejala deleted successfully');
    }
}
