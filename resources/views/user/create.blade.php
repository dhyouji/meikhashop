@extends('.layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <form class="form-inline">
            <div class="pull-left">
                <h2>{{$title}}</h2>
            </div>
        </form>
    </div>
    
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

    <div class="card-body row g-3 form-group">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text">Nama Pengguna<span class="text-danger">*</span></span>
                <input class="form-control" type="text" name="in_name" placeholder="Nama Pengguna" value="{{ old('in_name') }}" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Email<span class="text-danger">*</span></span>
                <input type="text" class="form-control" placeholder="Alamat Email" name="in_email" value="{{ old('in_email') }}">
                <input type="text" class="form-control text-left" disabled value="{{$domain}}"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Password<span class="text-danger">*</span></span>
                <input class="form-control" type="password" name="in_password" placeholder="Nama Pengguna" value="{{ old('in_name') }}" />
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">Tipe Pengguna<span class="text-danger">*</span></span>
                <select class="form-select" name="in_type">
                @foreach($type as $key => $val)
                <option value="{{ $key }}" {{ ($val == 'User') ? 'selected' : '' }}> {{ $val }} </option>
                @endforeach
                </select>
            </div>
            <div class="input-group mb-3 justify-content-center"">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ url()->previous() }}">Kembali</a>
            </div>
        </form>
        
    </div>
</div>
@endsection