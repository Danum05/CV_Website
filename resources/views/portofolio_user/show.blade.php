@extends('layout_user.template')

@section('konten')
    <div class="container">
        <h2>Portofolio by Identitas</h2>

        @if ($identitas)
            <h3>Identitas: {{ $identitas->nama }}</h3>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Proyek</th>
                    <th>Deskripsi</th>
                    <th>Foto Proyek</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $portofolio)
                    <tr>
                        <td>{{ $portofolio->nama_proyek }}</td>
                        <td>{{ $portofolio->deskripsi }}</td>
                        <td>
                            <img src="{{ asset('foto_proyek/' . $portofolio->foto_proyek) }}" alt="{{ $portofolio->nama_proyek }}" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>
                            <a href='{{ url('portofolio_user/'.$portofolio->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('portofolio_user/'.$portofolio->id) }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada portofolio untuk identitas ini.</td>
                    </tr>
                @endforelse
            </tbody>
                        <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
                <a href='{{ url('portofolio_user/create') }}' class="btn btn-primary">+ Tambah Data</a>
            </div>
        </table>
    </div>
@endsection
