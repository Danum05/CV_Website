@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('kontak/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf 
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif 
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('kontak') }}' class="btn btn-secondary"><< kembali</a>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='email' value="{{ Session::get('email') }}" id="email">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='alamat' value="{{ Session::get('alamat') }}" id="alamat">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='no_telepon' value="+62{{ Session::get('no_telepon') }}" id="no_telepon">
        </div>
    </div> 
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection
