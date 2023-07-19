<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
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
        $penggunas = User::all();

        return view('admin.pengguna', compact('penggunas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah', ["name" => "Pengguna"]);
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        return redirect()->route('admin.pengguna.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        return view('admin.edit-pengguna', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        if ($request->password == NULL) {
            User::where('id', $pengguna->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role'],
            ]);
        } else {
            User::where('id', $pengguna->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => $request['role'],
            ]);
        }

        return redirect()->route('admin.pengguna.index')
            ->with('success', 'user updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        $pengguna->delete();

        return redirect()->route('admin.pengguna.index')
            ->with('success', 'user deleted successfully');
    }

    // public function search(Request $request)
    // {
    // 	$keyword = $request->search;
    //     $penggunas = User::where('name', 'like', "%" . $keyword . "%")->paginate(5);
    //     return view('admin.user.show', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);

    // }

}
