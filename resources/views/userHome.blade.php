@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    You are logged in {{ auth()->user()->name }} with type user
                    {{ __('You are logged in!') }}


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
    @endsection