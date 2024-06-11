<?php

namespace App\Http\Controllers;

use App\Models\Sbtype;
use Illuminate\Http\Request;

class SbtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Daftar Tipe Sleeping Bag';
        $data['q'] = $request->q;
        $data['row'] = Sbtype::where('detail', 'like', '%' . $request->q . '%')->get();
        return view('sbtype.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Data Tipe Sleeping Bag';
        return view('sbtype.create', $data);
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

        SBtype::create($data);

        return redirect('sbtype');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sbtype $sbtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sbtype $sbtype)
    {
        $data['title'] = 'Ubah Data Tipe Sleeping Bag';
        $data['row'] = $sbtype;
        return view('sbtype.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sbtype $sbtype)
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

        $sbtype->update($data);

        return redirect('sbtype');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sbtype $sbtype)
    {
        $sbtype->delete();
        return redirect('sbtype');
    }
}