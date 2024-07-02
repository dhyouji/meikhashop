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
    </div>
    <div class="card-body">
        <form action="{{ route('customer.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text">Pemesan<span class="text-danger">*</span></span>
                <input class="form-control" type="text" name="in_name" placeholder="Nama Pemesan"
                    value="{{ old('in_name') }}" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Alamat<span class="text-danger">*</span></span>
                <input class="form-control" type="text" name="in_address" placeholder="Alamat Pengiriman Pemesan"
                    value="{{ old('in_address') }}" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Kontak<span class="text-danger">*</span></span>
                <input class="form-control" type="text" name="in_phone" placeholder="No Telepon"
                    value="{{ old('in_phone') }}" />
            </div>
            <div class="input-group mb-3 justify-content-center">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ url('customer')}}">Kembali</a>
            </div>
        </form>
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