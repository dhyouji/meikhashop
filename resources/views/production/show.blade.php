@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="card">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-header">
        @php
        $preordr = \App\Models\Preorder::where(['id' => $row[0]->preorder])->first();
        $custmr = \App\Models\Customer::where(['id' => $preordr->customer])->first();
        @endphp
        Customer : {{ $custmr->name }}
        @php echo str_repeat('&nbsp', 5) @endphp
        Tanggal Order : {{ $preordr->datetime }}
    </div>
    <div class="card-body">
        @foreach ($row as $row)
        <div class="card-body">
            {{ Carbon\Carbon::parse($row->datetime)->translatedFormat('l, d-m-Y') }}
            {{ Carbon\Carbon::parse($row->datetime)->format('h:i') }}
            <h5 class="card-title">{{ $row->taskst }}</h5>
            <p class="card-text">catatan : {{ $row->note }}</p>
        </div>
        @endforeach
    </div>
    <div class="card-footer clearfix">
        <div class="input-group mb-3 justify-content-center">
            <a class="btn btn-sm btn-warning" href="{{ route('prod.edit', $row->id) }}">Update Pengerjaan</a>
            <a class="btn btn-danger" href="{{ url('prod') }}">Kembali</a>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop