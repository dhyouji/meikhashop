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
        <div class="input-group mb-3">
            <form action="{{ route('prod.update',$row->id) }}" method="POST">
                @csrf
                @method("PUT")
                <input class="form-control" type="hidden" name="in_id" placeholder="Kata Kunci"
                    value="{{ old('in_id', $row->id) }}" />
                <input class="form-control" type="hidden" name="in_preorder" placeholder="Kata Kunci"
                    value="{{ old('in_preorder', $row->preorder) }}" />
                <input class="form-control" type="hidden" name="in_staff" placeholder="Kata Kunci"
                    value="{{ old('in_staff', $staff->id) }}" />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Pengerjaan<span class="text-danger">*</span></span>
            <input class="form-control" type="" name="in_taskst" placeholder="Pengerjaan"
                value="{{ old('in_staff', $row->taskst) }}" />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Catatan<span class="text-danger">*</span></span>
            <input class="form-control" type="" name="in_note" placeholder="Catatan" />
        </div>
        <div class="input-group mb-3 justify-content-center">
            <button class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="{{ url('prod')}}">Kembali</a>
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