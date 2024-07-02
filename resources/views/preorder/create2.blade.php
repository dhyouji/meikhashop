@extends('adminlte::page')

@section('title', 'Spesifikasi Sleeping Bag')

@section('content_header')
<h1>Spesifikasi Sleeping Bag</h1>
@stop

@section('content')
<div class="card">
  @if ($errors->any())
  <div class="alert alert-danger">
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
    <form method="post" action="{{ route('preorder.postcreate2') }}" enctype="multipart/form-data">
      <div class="form-group flex-center">
        <table class="table" id="example1" width="100%" cellspacing="0">
          <tr>
            <td>Seri</td>
            <td><select name="in_type">
                @php
                $data_srs = DB::table('sbtypes')->orderBy('key','desc')->get();
                @endphp
                @foreach ($data_srs as $row)
                <option value="{{ $row->key ?? '' }}" {{ (request()->session()->get('sbdata.type') == $row->key) ?
                  'selected' : '' }}>{{$row->detail}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Kain Inner</td>
            <td><input type="text" class="form-control" name="in_finner" value="{{ $sbdata->finner ?? '' }}"></td>
          </tr>
          <tr>
            <td>Kain Outer</td>
            <td><input type="text" class="form-control" name="in_fouter" value="{{ $sbdata->fouter ?? '' }}"></td>
          </tr>
          <tr>
            <td>Pola</td>
            <td><select name="in_pattern">
                @php
                $data_ptrn = DB::table('sbpatterns')->orderBy('key','desc')->get();
                @endphp
                @foreach ($data_ptrn as $row)
                <option value="{{ $row->key ?? '' }}" {{ (request()->session()->get('sbdata.pattern') == $row->key) ?
                  'selected' : '' }}>{{$row->detail}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Berat Isian</td>
            <td><select name="in_fillw">
                @php
                $data_fl = DB::table('sbfillws')->orderBy('key','desc')->get();
                @endphp
                @foreach ($data_fl as $row)
                <option value="{{ $row->key ?? '' }}" {{ (request()->session()->get('sbdata.fillw') == $row->key) ?
                  'selected' : '' }}>{{$row->detail}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Ukuran</td>
            <td><select name="in_size">
                @php
                $data_sz = DB::table('sbsizes')->orderBy('key','desc')->get();
                @endphp
                @foreach ($data_sz as $row)
                <option value="{{ $row->key ?? '' }}" {{ (request()->session()->get('sbdata.size') == $row->key) ?
                  'selected' : '' }}>{{$row->detail}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Note</td>
            <td><input type="text" class="form-control" name="in_note" value="{{ $preorder->note ?? '' }}"></td>
          </tr>
        </table>
      </div>
      <div>
        <center>
          <button type="submit" class="btn btn-primary">Lanjut</button>
          {{-- <button type="reset" class="btn btn-warning">Reset</button> --}}
          {{-- <button type="button" class="btn btn-danger"
            onclick="window.location.href='{{route('preorder.index')}}'">Back</button> --}}
          <a type="button" href="{{ route('preorder.create1') }}" class="btn btn-warning">Kembali</a>
        </center>
      </div>
      @csrf
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