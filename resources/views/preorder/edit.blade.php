@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('preorder.update',$row) }}" enctype="multipart/form-data">
      @method('PUT')
      <div class="form-group flex-center">
        <table class="table" id="example1" width="100%" cellspacing="0">
          <tr>
            <td>Tipe</td>
            <td><select name="in_type">
                @php
                $data_type = DB::table('sbtypes')->orderBy('key','desc')->get();
                @endphp
                @foreach ($data_type as $row1)
                <option value="{{$row1->key}}" @if($row1->key == $row->type) {{"
                  selected"}}@endif>{{$row1->key}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Kain Inner</td>
            <td><input type="text" class="form-control" name="in_finner" value="{{$row->finner}}"></td>
          </tr>
          <tr>
            <td>Kain Outer</td>
            <td><input type="text" class="form-control" name="in_fouter" value="{{$row->fouter}}"></td>
          </tr>
          <tr>
            <td>Pola</td>
            <td><select name="in_pattern">
                @php
                $data_ptrn = DB::table('sbpatterns')->orderBy('key','desc')->get();
                @endphp
                @foreach ($data_ptrn as $row1)
                <option value="{{$row1->key}}" @if($row1->key == $row->pattern) {{"
                  selected"}}@endif>{{$row1->key}}</option>
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
                @foreach ($data_fl as $row1)
                <option value="{{$row1->key}}" @if($row1->key == $row->fill_weight) {{"
                  selected"}}@endif>{{$row1->key}}</option>
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
                @foreach ($data_sz as $row1)
                <option value="{{$row1->key}}" @if($row1->key == $row->size) {{"
                  selected"}}@endif>{{$row1->key}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Note</td>
            <td><input type="text" class="form-control" name="in_note" value="{{$row->note}}"></td>
          </tr>
        </table>
      </div>
      <div>
        <center>
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-warning">Reset</button>
          <button type="button" class="btn btn-danger"
            onclick="window.location.href='{{route('preorder.index')}}'">Back</button>
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