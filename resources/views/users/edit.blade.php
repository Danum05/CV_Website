@extends('layout_supermin.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('users/'.$data->id) }}' method='post' enctype="multipart/form-data">
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
    <a href='{{ url('users') }}' class="btn btn-secondary"><< kembali</a>
    <div class="mb-3 row">
        <label for="identitas_id" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
            {{ $data->identitas_id}}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='name' value="{{ old('name', $data->name) }}" id="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='email' value="{{ old('email', $data->email) }}" id="email">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='password' value="{{ old('password', $data->password) }}" id="password">
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
