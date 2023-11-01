@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('gallery/'.$data->id) }}' method='post' enctype="multipart/form-data">
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
    <a href='{{ url('gallery') }}' class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="identitas_id" class="col-sm-2 col-form-label">ID Identitas</label>
            <div class="col-sm-10">
                {{ $data->identitas_id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name='foto' id="foto">
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
