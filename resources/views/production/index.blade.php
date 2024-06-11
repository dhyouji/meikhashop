@extends('.layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <form class="form-inline">
        <div class="pull-left">
            <h2>{{$title}}</h2>
        </div>
            <div class="input-group mr-1">
                <input class="form-control" type="text" name="q" value="{{ $q}}" placeholder="Pencarian..." />
                <button class="btn btn-success"><i class="bi bi-arrow-clockwise"></i> Refresh</button>
            </div>
        </form>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card-body table-responsive">
        <form>
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>POId</th>
                    <th>Pengerjaan</th>
                    <th>Catatan</th>
                    <th>Tanggal & Waktu</th>
                    <th>Di Kerjakan Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @php 
            $no = 1;
            $row = $row->sortBy('datetime');
            @endphp
            @foreach($row as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->preorder }}</td>
                <td>{{ $row->taskst }}</td>
                <td>{{ $row->note }}</td>
                <td>{{ $row->datetime }}</td>
                <td>{{ DB::table('users')->where('id',$row->staff)->value('name')}}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('prod.edit', $row->id) }}">Update Pengerjaan</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('prod.show', $row->preorder) }}">Rincian Produksi</a>
                </td>
            </tr>
            @endforeach
        </table>
    </form>
    </div>
</div>
@endsection