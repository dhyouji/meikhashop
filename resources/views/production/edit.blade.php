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
        <form action="{{ route('prod.update',$row->id) }}" method="POST" enctype="multipart/form-data">
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
</div>
<div class="input-group mb-3">
    <span class="input-group-text">Upload Gambar<span class="text-danger">*</span></span>
    <input class="form-control" type="file" name="in_image" />
</div>
<div class="input-group mb-3 justify-content-center">
    <button class="btn btn-primary">Simpan</button>
    <a class="btn btn-danger" href="{{ url()->previous() }}">Kembali</a>
</div>
</form>
</div>
</div>
@endsection