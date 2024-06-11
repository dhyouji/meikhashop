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
        <form action="{{ route('sbsize.update', $row->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="input-group mb-3">
                <span class="input-group-text">Keyword<span class="text-danger">*</span></span>
                <input class="form-control" type="text" name="in_key" placeholder="Kata Kunci" value="{{ old('in_key', $row->key) }}" />
            </div>
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text">Rincian<span class="text-danger">*</span></span>
                <input class="form-control" type="text" name="in_detail" placeholder="Kata Kunci" value="{{ old('in_detail', $row->detail )}}" />
            </div>
            <div class="">
                <input class="form-check-input" type="radio" name="in_status"  value="1" {{$row->status == 'Tersedia'? 'checked' : ''}}> <label class="form-check-label">Tersedia</label>
                <input class="form-check-input" type="radio" name="in_status"  value="0" {{$row->status == 'Tidak Tersedia'? 'checked' : ''}}> <label class="form-check-label">Tidak Tersedia</label>
            </div>
            <div class="input-group mb-3 justify-content-center">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ url()->previous() }}">Kembali</a>
            </div>
        </form>
        
    </div>
</div>
@endsection