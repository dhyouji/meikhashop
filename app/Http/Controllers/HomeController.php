<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Preorder;
use App\Models\Customer;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request): View
    {
        $data['title'] = 'Dashboard';
        $type = auth()->user()->type;

        if ($type == "2") {
            $data['q'] = $request->q;
            $data['row'] = Preorder::where('customer',  'like', '%' . $request->q . '%')
                ->orWhere('datetime',  'like', '%' . $request->q . '%')
                ->orWhere('status',  'like', '%' . $request->q . '%')->get();
            return view('managerHome', $data);
        } elseif ($type == "1") {
            $data['q'] = $request->q;
            $data['row'] = Preorder::where('customer',  'like', '%' . $request->q . '%')
                ->orWhere('datetime',  'like', '%' . $request->q . '%')
                ->orWhere('status',  'like', '%' . $request->q . '%')->get();
            $data['row1'] = Production::where('status', 1)->get();
            return view('adminHome', $data);
        } elseif ($type == "0") {
            $data['q'] = $request->q;
            $data['row1'] = Production::Where('status', 1)
                ->orWhere('preorder',  'like', '%' . $request->q . '%')
                ->orWhere('note',  'like', '%' . $request->q . '%')
                ->orWhere('datetime',  'like', '%' . $request->q . '%')->get();
            return view('userHome', $data);
        } else {
            return view('welcome');
        }
    }
}
