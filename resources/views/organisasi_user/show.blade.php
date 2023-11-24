@extends('layout_user.template')

@section('konten')
    <div class="container">
        <h2>Organisasi by Identitas</h2>

        @if ($identitas)
            <h3>Identitas: {{ $identitas->nama }}</h3>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Organisasi</th>
                    <th>Jabatan</th>
                    <th>Tahun Awal</th>
                    <th>Tahun Akhir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $organisasi)
                    <tr>
                        <td>{{ $organisasi->nama_organisasi }}</td>
                        <td>{{ $organisasi->jabatan }}</td>
                        <td>{{ $organisasi->tahun_awal }}</td>
                        <td>{{ $organisasi->tahun_akhir }}</td>
                        <td>
                            <a href='{{ url("organisasi_user/$organisasi->id/edit") }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url("organisasi_user/$organisasi->id") }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data organisasi untuk identitas ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pb-3">
            <a href='{{ url("organisasi_user/create") }}' class="btn btn-primary">Create</a>
        </div>
    </div>
@endsection
