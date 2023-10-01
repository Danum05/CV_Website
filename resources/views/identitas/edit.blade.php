@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('identitas/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf 
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('identitas') }}' class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tempat_lahir' value="{{ Session::get('tempat_lahir') }}" id="tempat_lahir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tanggal_lahir' value="{{ Session::get('tanggal_lahir') }}" id="tanggal_lahir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="form-control" name='jenis_kelamin' id="jenis_kelamin">
                    <option value="Laki-Laki" {{ Session::get('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan" {{ Session::get('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
                <select class="form-control" name="agama" id="agama">
                    <option value="Islam" {{ Session::get('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ Session::get('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Hindu" {{ Session::get('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ Session::get('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                </select>
            </div>
        </div>    
        <div class="mb-3 row">
            <label for="kewarganegaraan" class="col-sm-2 col-form-label">Kewarganegaraan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kewarganegaraan' value="{{ Session::get('kewarganegaraan') }}" id="kewarganegaraan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="status">
                    <option value="Menikah" {{ Session::get('status') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="Belum Menikah" {{ Session::get('status') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pas_foto" class="col-sm-2 col-form-label">Pas Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name='pas_foto' id="pas_foto">
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
