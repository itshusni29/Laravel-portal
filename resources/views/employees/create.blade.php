@extends('layouts.app')

@section('content')
<div class="container">
<h1>Create Image</h1>
<form action="{{ url('employee') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>
        <input class="form-control" name="photo" type="file" id="photo">
 
         
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
</div>


@endsection
