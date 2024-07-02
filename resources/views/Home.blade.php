{{-- @extends('.layouts.base') --}}
@extends('adminlte::page')
@section('content')
<div class="content bg">
    <div id="item1">
        <img class="responsive" src="assets/img/logo_landscape.png">
        <h1 style="font-size: 200%;margin-top: -10px;text-align:center;">Preorder Tracking</h1>
    </div>
    <form method="GET" action="{{ route('track') }}">
        <div class="input-group">
            <input type="text" class="form-control" name="tracknum" placeholder="preorder_number...">
            <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">Submit
                </button>
            </span>
        </div>
    </form>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="assets/css/home.css">
@endsection