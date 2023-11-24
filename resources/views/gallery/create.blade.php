@extends('layout.template')

@section('konten')
<form action='{{ url("gallery") }}' method='post' enctype="multipart/form-data">
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
        <a href='{{ url("gallery") }}' class="btn btn-secondary"><< Kembali</a>
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
@endsection
