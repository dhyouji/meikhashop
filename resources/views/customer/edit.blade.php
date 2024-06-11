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
        <form action="{{ route('customer.update', ['customer' => $row->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text">Pemesan<span class="text-danger">*</span></span>
                <input class="form-control" type="text" name="in_name" placeholder="Nama Pemesan" value="{{ old('in_name', $row->name) }}" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Alamat<span class="text-danger">*</span></span>
                <input class="form-control" type="text" name="in_address" placeholder="Alamat Pengiriman Pemesan" value="{{ old('in_address', $row->address) }}" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Kontak<span class="text-danger">*</span></span>
                <input class="form-control" type="text" name="in_phone" placeholder="No Telepon" value="{{ old('in_phone', $row->phone) }}" />
            </div>
            <div class="input-group mb-3 justify-content-center">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ url()->previous() }}">Kembali</a>
            </div>
        </form>
        
    </div>
</div>
@endsection