<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $data['title'] = 'Daftar Pengguna';
        $data['q'] = $request->q;
        $data['row'] = User::where('name', 'like', '%' . $request->q . '%')->get();
        $data['type'] = ['2' => 'Manager', '1' => 'Admin', '0' => 'User'];
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Data Pengguna';
        $data['type'] = ['2' => 'Manager', '1' => 'Admin', '0' => 'User'];
        $data['domain'] = '@gia.com';
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'in_name' => 'required',
            'in_email' => 'required|unique:users,email',
            'in_password' => 'required',
            'in_type' => 'required',
        ]);

        $user = new User();
        $user->name = $request->in_name;
        $user->email = "$request->in_email@gia.com";
        $user->password = Hash::make($request->in_password);
        $user->type = $request->in_type;
        $user->save();

        return redirect()->route('user.index')->with('Sukses','Tambah Pengguna Berhasil.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data['title'] = 'Ubah Data Pengguna';
        $data['row'] = $user;
        $data['type'] = ['2' => 'Manager', '1' => 'Admin', '0' => 'User'];
        $data['domain'] = '@gia.com';
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'in_name' => 'required',
            'in_email' => 'required',
            'in_type' => 'required',
        ]);
        $email = " $request->in_email@gia.com";
        $user->name = $request->in_name;
        $user->email = $email;
        if ($request->in_password)
        $user->password = Hash::make($request->in_password);
        $user->type = $request->in_type;
        $user->save();
        return redirect()->route('user.index')->with('Sukses','Pembaharuan Data Pengguna Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
     $user->delete();
     return redirect()->route('user.index')->with('Sukses','Hapus Data Pengguna Berhasil');
    }
}
