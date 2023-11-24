@extends('layout_user.template')

@section('konten')
    <div class="container">
        <h2>Identitas Detail</h2>

        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('pas_foto/' . $data->pas_foto) }}" alt="{{ $data->nama }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama }}</h5>
                        <p class="card-text"><strong>Pekerjaan:</strong> {{ $data->pekerjaan }}</p>
                        <p class="card-text"><strong>Tempat Lahir:</strong> {{ $data->tempat_lahir }}</p>
                        <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $data->tanggal_lahir }}</p>
                        <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $data->jenis_kelamin }}</p>
                        <p class="card-text"><strong>Agama:</strong> {{ $data->agama }}</p>
                        <p class="card-text"><strong>Kewarganegaraan:</strong> {{ $data->kewarganegaraan }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ $data->status }}</p>

                        <a href='{{ url("identitas_user/{$data->id}/edit") }}' class="btn btn-warning">Edit</a>
                        
                        @if ($data->nama === 'Data Not Inputted Yet')
                            <div class="pb-3">
                                <a href='{{ url("identitas_user/{$data->id}/create") }}' class="btn btn-primary">Create</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
