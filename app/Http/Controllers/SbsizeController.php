<?php

namespace App\Http\Controllers;

use App\Models\Sbsize;
use Illuminate\Http\Request;

class SbsizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Daftar Ukuran Sleeping Bag';
        $data['q'] = $request->q;
        $data['row'] = Sbsize::where('detail', 'like', '%' . $request->q . '%')->get();
        return view('sbsize.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Data Ukuran Sleeping Bag';
        return view('sbsize.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'in_key' => 'required',
            'in_detail' => 'required',
            'in_status' => 'required',
        ]);

        $data = array(
            'key' => $request->in_key,
            'detail' => $request->in_detail,
            'status' => $request->in_status,
        );

        Sbsize::create($data);

        return redirect('sbsize');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sbsize $sbsize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sbsize $sbsize)
    {
        $data['title'] = 'Ubah Data Ukuran Sleeping Bag';
        $data['row'] = $sbsize;
        return view('sbsize.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sbsize $sbsize)
    {
        $request->validate([
            'in_key' => 'required',
            'in_detail' => 'required',
            'in_status' => 'required',
        ]);

        $data = array(
            'key' => $request->in_key,
            'detail' => $request->in_detail,
            'status' => $request->in_status,
        );

        $sbsize->update($data);

        return redirect('sbsize');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sbsize $sbsize)
    {
        $sbsize->delete();
        return redirect('sbsize');
    }
}