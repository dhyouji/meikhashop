@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <a href="{{ route('user.index') }}">Manajemen Pengguna</a>
                <a href="{{ route('customer.index') }}">Manajemen Pelanggan</a>
                <a href="{{ route('sbtype.index') }}">Manajemen Tipe Sleeping Bag</a>
                <a href="{{ route('sbpattern.index') }}">Manajemen Pola Sleeping Bag</a>
                <a href="{{ route('sbsize.index') }}">Manajemen Ukuran Sleeping Bag</a>
                <a href="{{ route('sbfillw.index') }}">Manajemen Berat Isian Sleeping Bag</a>
                <a href="{{ route('preorder.index') }}">Manajemen Preorder</a>
                <a href="{{ route('prod.index') }}">Manajemen Produksi</a>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{-- You are logged in {{ auth()->user()->name }} with type admin
                    {{ __('You are logged in!') }} --}}

                    <div name="PO">
                        <table class="table table-bordered table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Order</th>
                                    <th>Customer</th>
                                    <th>Status Produksi</th>
                                    <th>Tanggal Produksi</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            @foreach($row->take(5) as $row)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$row->datetime}}</td>
                                <td>{{DB::table('customers')->where('id',$row->customer)->value('name')}}</td>
                                <td>{{DB::table('productions')->where('preorder',$row->id)->value('taskst')}}</td>
                                <td>{{DB::table('productions')->where('preorder',$row->id)->value('datetime')}}</td>
                                <?php $prodid = DB::table('productions')->where('preorder',$row->id)->value('id') ?>
                                {{-- <td><a class="btn btn-sm btn-warning"
                                        href="{{ route('prod.show', $prodid)}}">Rincian
                                        Produksi</a></td> --}}
                            </tr>
                            @endforeach
                            <form class="form">
                                <div class="input-group mr-1">
                                    <a class="btn btn-primary" href="{{ route('preorder.create1') }}"><i
                                            class="bi bi-plus-lg"></i> Tambah Preorder Sleeping Bag</a>
                                    <a class="btn btn-primary" href="{{ route('preorder.index') }}"><i
                                            class="bi bi-plus-lg"></i>
                                        Lihat Semua Pemesanan</a>
                                </div>
                            </form>
                    </div>

                    <div name="prod">
                        <table class="table table-bordered table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Customer[PO_ID]</th>
                                    <th>Status</th>
                                    <th>Staff</th>
                                    <th>Tanggal Produksi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php $no1 = 1 ?>
                            @foreach($row1->take(5) as $row)
                            <tr>
                                <td>{{$no1++}}</td>
                                @php
                                $poID = $row->preorder;
                                $cust = DB::table('preorders')->where('id',$row->preorder)->value('customer');
                                @endphp
                                <td>{{DB::table('customers')->where('id',$cust)->value('name')}}
                                    [{{$row->preorder}}]</td>
                                <td>{{DB::table('productions')->where('preorder',$row->id)->value('taskst')}}</td>
                                <td>{{DB::table('users')->where('id',$row->staff)->value('name')}}</td>
                                <td>{{DB::table('productions')->where('preorder',$row->id)->value('datetime')}}</td>
                                <?php $prodid = DB::table('productions')->where('preorder',$row->id)->value('id') ?>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('prod.show', $prodid)}}">Rincian
                                        Produksi</a>
                                </td>
                            </tr>
                            @endforeach
                            <form class="form">
                                <div class="input-group mr-2">
                                    <a class="btn btn-primary" href="{{ route('preorder.create1') }}"><i
                                            class="bi bi-plus-lg"></i> Tambah Preorder Sleeping Bag</a>
                                    <a class="btn btn-primary" href="{{ route('prod.index') }}"><i
                                            class="bi bi-plus-lg"></i>
                                        Lihat Semua Produksi</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection