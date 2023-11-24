
@extends('layout.template')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Identity Details</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $data->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{ $data->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $data->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $data->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $data->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{ $data->agama }}</td>
                            </tr>
                            <tr>
                                <th>Kewarganegaraan</th>
                                <td>{{ $data->kewarganegaraan }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $data->status }}</td>
                            </tr>
                            <tr>
                                <th>Pas Foto</th>
                                <td>
                                    <img src="{{ asset('pas_foto/' . $data->pas_foto) }}" alt="Pas Foto" width="100">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <a href="{{ url('identitas') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection