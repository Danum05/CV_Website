@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('organisasi/'.$data->id) }}' method='post' enctype="multipart/form-data">
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
    <a href='{{ url('organisasi') }}' class="btn btn-secondary"><< kembali</a>
    <div class="mb-3 row">
        <label for="identitas_id" class="col-sm-2 col-form-label">ID Identitas</label>
        <div class="col-sm-10">
            {{ $data->identitas_id}}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama_organisasi" class="col-sm-2 col-form-label">Nama Organisasi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama_organisasi' value="{{ old('nama_organisasi', $data->nama_organisasi) }}" id="nama_organisasi">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='jabatan' value="{{ old('jabatan', $data->jabatan) }}" id="jabatan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tahun_awal" class="col-sm-2 col-form-label">Tahun Awal</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='tahun_awal' value="{{ old('tahun_awal', $data->tahun_awal) }}" id="tahun_awal">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tahun_akhir" class="col-sm-2 col-form-label">Tahun Akhir</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='tahun_akhir' value="{{ old('tahun_akhir', $data->tahun_akhir) }}" id="tahun_akhir">
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
