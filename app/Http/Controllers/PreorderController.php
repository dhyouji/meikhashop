<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Preorder;
use App\Models\Customer;
use App\Models\Production;
use App\Models\Sbfillw;
use App\Models\Sbpattern;
use App\Models\Sbsize;
use App\Models\Sbtype;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class PreorderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Daftar Pre Order';
        $data['q'] = $request->q;
        $data['row'] = Preorder::where('customer',  'like', '%' . $request->q . '%')
        ->orWhere('datetime',  'like', '%' . $request->q . '%')
        ->orWhere('status',  'like', '%' . $request->q . '%')->get();
        return view('preorder.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Pre-order';
        return view('preorder.create', $data);
    }
    public function create1(Request $request)
    {
        $data['customer'] = $request->session()->get('customer');
        $data['preorder'] = $request->session()->get('preorder');
        return view('preorder.create1', $data);
    }    
    public function postcreate1(Request $request)
    {
        $validatedData = $request->validate([
            'in_name' => 'required',
            'in_address'=>'required',
            'in_phone'=>'required',
        ]);

        $data = array(
            'name' => $request->in_name,
            'address' => $request->in_address,
            'phone' => $request->in_phone,
        );

        if(empty($request->session()->get('customer'))){
            $customer = new Customer();
            $customer->fill($data);
            $request->session()->put('customer', $customer);
        }else{
            $customer = $request->session()->get('customer');
            $customer->fill($data);
            $request->session()->put('customer', $customer);
        }
        return redirect()->route('preorder.create2');
    }
    public function create2(Request $request)
    {
        $data['customer'] = $request->session()->get('customer');
        $data['sbdata'] = $request->session()->get('sbdata');
        return view('preorder.create2', $data);
    }

    public function postcreate2(Request $request)
    {
        $validatedData = $request->validate([
            'in_type' => 'required',
            'in_finner'=>'required',
            'in_fouter'=>'required',
            'in_pattern'=>'required',
            'in_fillw'=>'required',
            'in_size'=>'required',
        ]);

        $data = array(
         'type' => $request->in_type,
         'finner' => $request->in_finner,
         'fouter' => $request->in_fouter,
         'pattern' => $request->in_pattern,
         'fillw' => $request->in_fillw,
         'size' => $request->in_size,
         'note' => $request->in_note,
     );

        if(empty($request->session()->get('sbdata'))){
            $sbdata = new Preorder();
            $sbdata->fill($data);
            $request->session()->put('sbdata', $sbdata);
        }else{
            $sbdata = $request->session()->get('sbdata');
            $sbdata->fill($data);
            $request->session()->put('sbdata', $sbdata);
        }
        return redirect()->route('preorder.create3');
    }

    public function create3(Request $request)
    {
        $data['customer'] = $request->session()->get('customer');
        $data['sbdata'] = $request->session()->get('sbdata');
        return view('preorder.create3', $data);
    }

    public function postcreate3(Request $request)
    {
        $customer = $request->session()->get('customer');
        $sbdata = $request->session()->get('sbdata');

        $customer = Customer::create([
            'name' => $customer->name,
            'address' => $customer->address,
            'phone' => $customer->phone,
        ]);
        $customerid = $customer->id;

        $preorder = Preorder::create([
            'type' => $sbdata->type,
            'finner' => $sbdata->finner,
            'fouter' => $sbdata->fouter,
            'pattern' => $sbdata->pattern,
            'fillw' => $sbdata->fillw,
            'size' => $sbdata->size,
            'note' => $sbdata->note,
            'datetime' => Carbon::now(),
            'customer' => $customerid,
        ]);
        $preorderId = $preorder->id;
        $typeId = Sbtype::where(['key' => $preorder->type])->first()->id;
        $patternId = Sbpattern::where(['key' => $preorder->pattern])->first()->id;
        $fillwId = Sbfillw::where(['key' => $preorder->fillw])->first()->id;
        $sizeId = Sbsize::where(['key' => $preorder->size])->first()->id;
    
        $tracknum = "$preorderId$customerid$typeId$patternId$fillwId$sizeId";
        $tracknum = Preorder::where('id',$preorderId)->update(['tracknum' => $tracknum]);

        $prod = Production::create([
            'preorder' => $preorderId,
            'taskst' => "Antrian",
            'note' => "Dalam Antrian",
            'datetime' => Carbon::now(),
            'staff' => "",
        ]);

        $request->session()->forget('customer');
        $request->session()->forget('sbdata');
        $request->session()->forget('preorder');
        return redirect()->route('preorder.index');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'in_type' => 'required',
            'in_fabric'=>'required',
            'in_pattern'=>'required',
            'in_fillw'=>'required',
            'in_size'=>'required',
        ]);

        $preorder = Preorder::create([
            'type' => $request->in_type,
            'fabric' => $request->in_fabric,
            'pattern' => $request->in_pattern,
            'fillw' => $request->in_fillw,
            'size' => $request->in_size,
            'note' => $request->in_note,
            'datetime' => Carbon::now(),
            'status' => $request->status,
            'customer' => $request->in_customer,
        ]);
        $preorderId = $preorder->id;
        $prod = Production::create([
            'id_preorder' => $preorderId,
            'pengerjaan' => "Antrian",
            'note' => "Dalam Antrian",
            'datetime' => Preorder::orderBy('datetime', 'desc')->first()->datetime,
            'staff' => Auth::id(),
        ]);

        return redirect('preorder');
    }

    /**
     * Display the specified resource.
     */
    public function show(Preorder $preorder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Preorder $preorder)
    {
        $data['title'] = 'Ubah Data Pre-order';
        $data['row'] = $preorder;
        return view('preorder.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Preorder $preorder)
    {
        $request->validate([
            'in_type' => 'required',
            'in_finner'=>'required',
            'in_fouter'=>'required',
            'in_pattern'=>'required',
            'in_fillw'=>'required',
            'in_size'=>'required',
        ]);

        $preorder->type = $request->in_type;
        $preorder->finner = $request->in_finner;
        $preorder->fouter = $request->in_fouter;
        $preorder->pattern = $request->in_pattern;
        $preorder->fillw = $request->in_fillw;
        $preorder->size = $request->in_size;
        $preorder->note = $request->in_note;
        $preorder->save();
        
        return redirect()->route('preorder.index')->with('Sukses','Pembaharuan Data Pengguna Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Preorder $preorder)
    {
        $preorder->delete();
        return redirect('preorder');
    }
     
    public function invoice(Preorder $preorder)
    {
        $data['po'] = $preorder ;
        $tracknum = $preorder->tracknum;
        $data['cust'] = Customer::where('id', $preorder->customer)->first();
        // return view('preorder.invoice', $data);
        $pdf = PDF::loadView('preorder.invoice', $data);
        return $pdf->stream("invoice-$tracknum.pdf");
        // return $pdf->stream();
        // return Pdf::view('preorder.invoice', $data)->name('invoice-2023-04-10.pdf')->download();
    }
}
