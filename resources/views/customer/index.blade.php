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
                <a class="btn btn-primary" href="{{ route('customer.create') }}"><i class="bi bi-plus-lg"></i> Tambah Pemesan</a>
            </div>
        </form>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach($row as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->phone }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('customer.edit', $row) }}">Ubah</a>
                    <form method="POST" action="{{ route('customer.destroy', $row) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection