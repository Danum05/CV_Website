@extends('layout_user.template')
@section('konten')
    <div class="container">
        <h2>Skill by Identitas</h2>

        @if ($identitas)
            <h3>Identitas: {{ $identitas->nama }}</h3>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Skill</th>
                    <th>Persen Skill</th>
                    <th>Action</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $skill)
                    <tr>
                        <td>{{ $skill->nama_skill }}</td>
                        <td>{{ $skill->persen_skill }}</td>
                        <td>
                            <a href='{{ url("skill_user/$skill->id/edit") }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url("skill_user/$skill->id") }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tidak ada skill untuk identitas ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url("skill_user/create") }}' class="btn btn-primary">Create</a>
        </div>
    </div>
@endsection
