@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">Latest Orders</h3>
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
                        <th>Tanggal Order</th>
                        <th>Customer</th>
                        <th>Status Produksi</th>
                        <th>Tanggal Produksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @foreach($row->take(5) as $row)
                    <?php $prodid = DB::table('productions')->where('preorder',$row->id)->value('id') ?>
                    <tr>
                        <td><a href="pages/examples/invoice.html">PO{{$row->id}}</a></td>
                        <td>{{$no++}}</td>
                        <td>{{$row->datetime}}</td>
                        <td>{{DB::table('customers')->where('id',$row->customer)->value('name')}}</td>
                        <td><span
                                class="badge badge-success">{{DB::table('productions')->where('preorder',$row->id)->value('taskst')}}</span>
                        </td>
                        <td>{{DB::table('productions')->where('preorder',$row->id)->value('datetime')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        <a href="{{ route('preorder.create1') }}" class="btn btn-sm btn-info float-left">Place New Order</a>
        <a href="{{ route('preorder.index') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
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