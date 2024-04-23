@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <img src="{{ asset('images/' . $image->image_path) }}" class="card-img-top" alt="{{ $image->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $image->title }}</h5>
        </div>
    </div>
</div>
@endsection
