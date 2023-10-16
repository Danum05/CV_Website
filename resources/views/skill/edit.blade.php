@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('skill/'.$data->id) }}' method='post' enctype="multipart/form-data">
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
    <a href='{{ url('skill') }}' class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="identitas_id" class="col-sm-2 col-form-label">ID Identitas</label>
            <div class="col-sm-10">
                {{ $data->identitas_id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="skill" class="col-sm-2 col-form-label">Skill</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_skill' value="{{ old('nama_skill', $data->nama_skill) }}" id="nama_skill">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="persen_skill" class="col-sm-2 col-form-label">Persentase</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='persen_skill' value="{{ old('persen_skill', $data->persen_skill) }}" id="persen_skill">
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
