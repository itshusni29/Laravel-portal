@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Image</h1>
    <form action="{{ route('images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ $image->title }}"><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
