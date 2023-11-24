@extends('layout_user.template')

@section('konten')
<form action='{{ url('skill_user') }}' method='post' enctype="multipart/form-data">
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
    <div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url("skill_user/" . Session::get('identitas_id')) }}' class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="identitas_id" class="col-sm-2 col-form-label">ID Identitas</label>
            <div class="col-sm-10">
                <select class="form-select" name="identitas_id" id="identitas_id">
                    @foreach ($identitasData as $identitas)
                        <option value="{{ $identitas->id }}" @if(Session::get('identitas_id') == $identitas->id) selected @endif>
                            {{ $identitas->id }} - {{ $identitas->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>       
        <div class="mb-3 row">
            <label for="nama_skill" class="col-sm-2 col-form-label">Skill</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_skill' value="{{ Session::get('nama_skill') }}" id="nama_skill">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="persen_skill" class="col-sm-2 col-form-label">Persentase</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='persen_skill' value="{{ Session::get('persen_skill') }}" id="persen_skill">
            </div>
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection
