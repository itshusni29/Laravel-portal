@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Training Request</h1>
        <form action="{{ route('training-requests.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="judul_training">Training Title:</label>
                <input type="text" class="form-control" id="judul_training" name="judul_training" required>
            </div>
            <div class="form-group">
                <label for="tanggal_training">Training Date:</label>
                <input type="date" class="form-control" id="tanggal_training" name="tanggal_training" required>
            </div>
            <div class="form-group">
                <label for="trainer">Trainer:</label>
                <input type="text" class="form-control" id="trainer" name="trainer" required>
            </div>
            <div class="form-group">
                <label for="jumlah_peserta">Number of Participants:</label>
                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" required>
            </div>
            <div class="form-group">
                <label for="tempat">Location:</label>
                <input type="text" class="form-control" id="tempat" name="tempat" required>
            </div>
            <div class="form-group">
                <label for="nama_manager">Manager's Name:</label>
                <select class="form-control" id="nama_manager" name="nama_manager" required>
                    <option value="">Select Manager</option>
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_general_manager">General Manager's Name:</label>
                <select class="form-control" id="nama_general_manager" name="nama_general_manager" required>
                    <option value="">Select General Manager</option>
                    @foreach($generalManagers as $generalManager)
                        <option value="{{ $generalManager->id }}">{{ $generalManager->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
