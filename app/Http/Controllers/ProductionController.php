<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Preorder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Daftar Produksi';
        $data['q'] = $request->q;
        $data['row'] = Production::where('status', '1')->get();
        // $data['row'] = Production::where('taskst', 'like', '%' . $request->q . '%')->get();
        $data['user'] = User::all();
        return view('production.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Production $production)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Production $production, $id)
    {
        $coll = Production::where('preorder', $id)->get();
        $sort = $coll->sortByDesc('datetime');
        $data['title'] = 'Rincian Produksi';
        $data['row'] = $sort->all();

        return view('production.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Production $production, $id)
    {
        $title = 'Update Pengerjaan';
        $staff = Auth::user();
        $row = Production::where('id', $id)->first();
        // $row = Production::findorfail($production);
        
        return view('production.edit',compact('row','title','staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Production $production)
    {
        $prod = Production::create([
            'preorder' => $request->in_preorder,
            'taskst' => $request->in_taskst,
            'note' => $request->in_note,
            'datetime' => Carbon::now(),
            'staff' => Auth::id(),
        ]);
        $ProdId = $request->in_id;
        $archv = Production::where('id',$ProdId)->update(['status' => 0]);
        
        return redirect('prod');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Production $production)
    {
        //
    }

    public function homepage(Request $request)
    {
        return view('Home');
    }

    public function tracking(Request $request)
    {
        $po = Preorder::where('tracknum', $request->tracknum)->first()->id;
        $data['prodData'] = Production::where('preorder', $po)->get();
        return view('production.tracking', $data);
    }


}
