@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('pendidikan/'.$data->id) }}' method='post' enctype="multipart/form-data">
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
    <a href='{{ url('pendidikan') }}' class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="identitas_id" class="col-sm-2 col-form-label">ID Identitas</label>
            <div class="col-sm-10">
                {{ $data->identitas_id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Instansi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_instansi' value="{{ old('nama_instansi', $data->nama_instansi) }}" id="nama_instansi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_jurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_jurusan' value="{{ old('nama_jurusan', $data->nama_jurusan) }}" id="nama_jurusan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='tahun_masuk' value="{{ old('tahun_masuk', $data->tahun_masuk) }}" id="tahun_masuk">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun_lulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='tahun_lulus' value="{{ old('tahun_lulus', $data->tahun_lulus) }}" id="tahun_lulus">
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
