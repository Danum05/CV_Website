@extends('layout_user.template')

@section('konten')
    <div class="container">
        <h2>Data Pendidikan</h2>

        @if ($identitas)
            <h3>Identitas: {{ $identitas->nama }}</h3>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Instansi</th>
                    <th>Nama Jurusan</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Lulus</th>
                    <th>Action</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $pendidikan)
                    <tr>
                        <td>{{ $pendidikan->nama_instansi }}</td>
                        <td>{{ $pendidikan->nama_jurusan }}</td>
                        <td>{{ $pendidikan->tahun_masuk }}</td>
                        <td>{{ $pendidikan->tahun_lulus }}</td>
                        <td>
                            <a href='{{ url("pendidikan_user/$pendidikan->id/edit") }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url("pendidikan_user/$pendidikan->id") }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada pendidikan untuk identitas ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url("pendidikan_user/create") }}' class="btn btn-primary">Create</a>
        </div>
    </div>
@endsection
