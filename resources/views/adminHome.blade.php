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
                    <p>You are logged in {{ auth()->user()->name }} with type Admin
                        {{ __('You are logged in!') }}

                    <p><a href="{{ route('user.index') }}">Manajemen Pengguna</a>
                    <p><a href="{{ route('sbtype.index') }}">Manajemen Tipe Sleeping Bag</a>
                    <p><a href="{{ route('sbpattern.index') }}">Manajemen Pola Sleeping Bag</a>
                    <p><a href="{{ route('sbsize.index') }}">Manajemen Ukuran Sleeping Bag</a>
                    <p><a href="{{ route('sbfillw.index') }}">Manajemen Berat Isian Sleeping Bag</a>
                    <p><a href="{{ route('customer.index') }}">Manajemen Pelanggan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection