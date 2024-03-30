@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Permintaan Training</h1>
    <a href="{{ route('training-requests.create') }}" class="btn btn-primary mb-3">Tambah Permintaan Training</a>
    
    @if ($trainingRequests->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Training</th>
                <th scope="col">Tanggal Training</th>
                <th scope="col">Trainer</th>
                <th scope="col">Jumlah Peserta</th>
                <th scope="col">Tempat</th>
                <th scope="col">Nama Manager</th>
                <th scope="col">Nama General Manager</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainingRequests as $trainingRequest)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $trainingRequest->judul_training }}</td>
                <td>{{ $trainingRequest->tanggal_training }}</td>
                <td>{{ $trainingRequest->trainer }}</td>
                <td>{{ $trainingRequest->jumlah_peserta }}</td>
                <td>{{ $trainingRequest->tempat }}</td>
                <td>{{ $trainingRequest->manager->name }}</td> <!-- Menggunakan relasi manager -->
                <td>{{ $trainingRequest->generalManager->name }}</td> <!-- Menggunakan relasi generalManager -->
                <td>
                    @if(Auth::check() && Auth::user()->id == $trainingRequest->created_by)
                    <a href="{{ route('training-requests.edit', $trainingRequest->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('training-requests.destroy', $trainingRequest->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Tidak ada permintaan training yang tersedia.</p>
    @endif
</div>
@endsection
