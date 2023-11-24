@extends('layout_user.template')

@section('konten')
    <div class="container">
        <h2>Kontak by Identitas</h2>

        @if ($identitas)
            <h3>Identitas: {{ $identitas->nama }}</h3>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Action</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $kontak)
                    <tr>
                        <td>{{ $kontak->email }}</td>
                        <td>{{ $kontak->alamat }}</td>
                        <td>{{ $kontak->no_telepon }}</td>
                        <td>
                            <a href='{{ url("kontak_user/$kontak->id/edit") }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url("kontak_user/$kontak->id") }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada data kontak untuk identitas ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pb-3">
            <a href='{{ url("kontak_user/create") }}' class="btn btn-primary">Create</a>
        </div>
    </div>
@endsection
