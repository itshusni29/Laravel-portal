@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Permintaan Training</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Training</th>
                <th scope="col">Tanggal Training</th>
                <th scope="col">Trainer</th>
                <th scope="col">Jumlah Peserta</th>
                <th scope="col">Tempat</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permintaanTrainings as $permintaanTraining)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $permintaanTraining->judul_training }}</td>
                    <td>{{ $permintaanTraining->tanggal_training }}</td>
                    <td>{{ $permintaanTraining->trainer }}</td>
                    <td>{{ $permintaanTraining->jumlah_peserta }}</td>
                    <td>{{ $permintaanTraining->tempat }}</td>
                    <td>
                        <span class="badge badge-warning">{{ ucfirst($permintaanTraining->status) }}</span>
                    </td>
                    <td>
                        <form action="{{ route('permintaan-training.approve', $permintaanTraining->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                        </form>
                        <form action="{{ route('permintaan-training.decline', $permintaanTraining->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
