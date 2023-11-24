@extends('layout_user.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('identitas_user/'.$data->id) }}' method='post' enctype="multipart/form-data">
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
    <a href='{{ url("identitas_user/{$data->id}") }}' class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ old('nama', $data->nama) }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name='pekerjaan' value="{{ old('pekerjaan', $data->pekerjaan) }}" id="pekerjaan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tempat_lahir' value="{{ old('tempat_lahir', $data->tempat_lahir) }}" id="tempat_lahir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tanggal_lahir' value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" id="tanggal_lahir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="form-select" name='jenis_kelamin' id="jenis_kelamin">
                    <option value="Laki-Laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
                <select class="form-select" name="agama" id="agama">
                    <option value="Islam" {{ old('agama', $data->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama', $data->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama', $data->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama', $data->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama', $data->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Khonghucu" {{ old('agama', $data->agama) == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                </select>
            </div>
        </div>    
        <div class="mb-3 row">
            <label for="kewarganegaraan" class="col-sm-2 col-form-label">Kewarganegaraan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kewarganegaraan' value="{{ old('kewarganegaraan', $data->kewarganegaraan) }}" id="kewarganegaraan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select class="form-select" name="status" id="status">
                    <option value="Belum Menikah" {{ old('status', $data->status) == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    <option value="Menikah" {{ old('status', $data->status) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
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
