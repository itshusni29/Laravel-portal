@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manager Approval</h1>
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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainingRequests as $trainingRequest)
                    @if ($trainingRequest->nama_manager == Auth::user()->name)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $trainingRequest->judul_training }}</td>
                            <td>{{ $trainingRequest->tanggal_training }}</td>
                            <td>{{ $trainingRequest->trainer }}</td>
                            <td>{{ $trainingRequest->jumlah_peserta }}</td>
                            <td>{{ $trainingRequest->tempat }}</td>
                            <td>{{ $trainingRequest->nama_manager }}</td>
                            <td>
                                <!-- Tambahkan tombol untuk menyetujui permintaan -->
                                <form action="{{ route('approveByManager', $trainingRequest->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
