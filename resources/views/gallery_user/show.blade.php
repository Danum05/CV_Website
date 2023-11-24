@extends('layout_user.template')

@section('konten')
    <div class="container">
        <h2>Gallery by Identitas</h2>

        @if ($identitas)
            <h3>Identitas: {{ $identitas->nama }}</h3>
        @endif

        <div class="row">
            @forelse ($data as $gallery)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('foto/' . $gallery->foto) }}" class="card-img-top" alt="{{ $gallery->foto }}">
                        <div class="card-body">
                            <!-- Add more details as needed -->
                            <a href='{{ url("gallery_user/$gallery->id/edit") }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url("gallery_user/$gallery->id") }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>Tidak ada data gallery untuk identitas ini.</p>
                </div>
            @endforelse
        </div>

        <div class="pb-3">
            <a href='{{ url("gallery_user/create") }}' class="btn btn-primary">Create</a>
        </div>
    </div>
@endsection
