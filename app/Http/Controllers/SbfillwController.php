<?php

namespace App\Http\Controllers;

use App\Models\Sbfillw;
use Illuminate\Http\Request;

class SbfillwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Daftar Berat Isian Sleeping Bag';
        $data['q'] = $request->q;
        $data['row'] = Sbfillw::where('detail', 'like', '%' . $request->q . '%')->get();
        return view('sbfillw.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Data Berat Isian Sleeping Bag';
        return view('sbfillw.create', $data);
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

        Sbfillw::create($data);

        return redirect('sbfillw');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sbfillw $sbfillw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sbfillw $sbfillw)
    {
        $data['title'] = 'Ubah Data Berat Isian Sleeping Bag';
        $data['row'] = $sbfillw;
        return view('sbfillw.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sbfillw $sbfillw)
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

        $sbfillw->update($data);

        return redirect('sbfillw');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sbfillw $sbfillw)
    {
        $sbfillw->delete();
        return redirect('sbfillw');
    }
}