<?php

namespace App\Http\Controllers;

use App\Models\Sbpattern;
use Illuminate\Http\Request;

class SbpatternController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Daftar Pola Sleeping Bag';
        $data['q'] = $request->q;
        $data['row'] = Sbpattern::where('detail', 'like', '%' . $request->q . '%')->get();
        return view('sbpattern.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Data Pola Sleeping Bag';
        return view('sbpattern.create', $data);
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

        Sbpattern::create($data);

        return redirect('sbpattern');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sbpattern $sbpattern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sbpattern $sbpattern)
    {
        $data['title'] = 'Ubah Data Pola Sleeping Bag';
        $data['row'] = $sbpattern;
        return view('sbpattern.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sbpattern $sbpattern)
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

        $sbpattern->update($data);

        return redirect('sbpattern');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sbpattern $sbpattern)
    {
        $sbpattern->delete();
        return redirect('sbpattern');
    }
}