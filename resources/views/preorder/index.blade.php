@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form>
            <div class="input-group mr-1">
                <input class="form-control" type="text" name="q" value="{{ $q}}" placeholder="Pencarian..." />
                <button class="btn btn-success" type="submit"><i class="bi bi-arrow-clockwise"></i> Cari</button>
                <button class="btn btn-warning"><i class="bi bi-arrow-clockwise"></i> Refresh</button>
                <a class="btn btn-primary" href="{{ route('preorder.create1') }}"><i class="bi bi-plus-lg"></i> Tambah
                    Preorder Sleeping Bag</a>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>Type</th>
                    <th>Pattern</th>
                    <th>Fabric Inner</th>
                    <th>Fabric Outer</th>
                    <th>Fill</th>
                    <th>Size</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach($row as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->datetime }}</td>
                <td>{{ DB::table('customers')->where('id',$row->customer)->value('name')}}</td>
                <td>{{ DB::table('sbtypes')->where('key',$row->type)->value('detail')}}</td>
                <td>{{ DB::table('sbpatterns')->where('key',$row->pattern)->value('detail')}}</td>
                <td>{{ $row->finner }}</td>
                <td>{{ $row->fouter }}</td>
                <td>{{ DB::table('sbfillws')->where('key',$row->fillw)->value('detail')}}</td>
                <td>{{ DB::table('sbsizes')->where('key',$row->size)->value('detail')}}</td>
                <td>{{ $row->note }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('preorder.edit', $row) }}">Ubah</a>
                    <a class="btn btn-sm btn-success" href="{{ route('preorder.invoice', $row->id) }}">Invoice</a>
                    <form method="POST" action="{{ route('preorder.destroy', $row) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="card-footer clearfix">
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop