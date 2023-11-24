@extends('layout.template')
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
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $skill)
                    <tr>
                        <td>{{ $skill->nama_skill }}</td>
                        <td>{{ $skill->persen_skill }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Tidak ada skill untuk identitas ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
