@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">Produksi Terbaru</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>POID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Dikerjakan Oleh</th>
                        <th>Tanggal Pengerjaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($row1->take(5) as $row)
                    @php
                    $cust = DB::table('preorders')->where('id',$row->preorder)->value('customer');
                    $prodid = DB::table('productions')->where('preorder',$row->id)->value('id');
                    @endphp
                    <tr>
                        <td><a href="pages/examples/invoice.html">PO{{$row->preorder}}</a></td>
                        <td>{{DB::table('customers')->where('id',$cust)->value('name')}}</td>
                        <td><span class="badge badge-success">{{$row->taskst}}</span></td>
                        <td>{{DB::table('users')->where('id',$row->staff)->value('name')}}</td>
                        <td>{{$row->datetime}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('prod.edit', $prodid)}}">Update
                                Pengerjaan</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        <!-- <a href="{{ route('preorder.create1') }}" class="btn btn-sm btn-info float-left">Place New Order</a> -->
        <a href="{{ route('prod.index') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop