<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Daftar Pelanggan';
        $data['q'] = $request->q;
        $data['row'] = Customer::where('name',  'like', '%' . $request->q . '%')
        ->orWhere('phone',  'like', '%' . $request->q . '%')
        ->orWhere('address',  'like', '%' . $request->q . '%')->get();
        return view('customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Data Pemesan';
        return view('customer.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'in_name' => 'required',
            'in_address' => 'required',
            'in_phone' => 'required',
        ]);

        $data = array(
            'name' => $request->in_name,
            'address' => $request->in_address,
            'phone' => $request->in_phone,
        );

        Customer::create($data);

        return redirect('customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $data['title'] = 'Ubah Data Pemesan';
        $data['row'] = $customer;
        return view('customer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'in_name' => 'required',
            'in_address' => 'required',
            'in_phone' => 'required',
        ]);

        $data = array(
            'name' => $request->in_name,
            'address' => $request->in_address,
            'phone' => $request->in_phone,
        );

        $customer->update($data);

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customer');
    }
}
