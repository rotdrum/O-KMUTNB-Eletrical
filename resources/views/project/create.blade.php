@extends('layouts.app')

@section('content')
<!--header-->
<h3>Create New Project</h3>
<!--breadcrumb-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.index')}}">Project</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>

<form class="" action="{{URL::to('/uploadfile')}}" enctype="multipart/form-data" method="post">
    <input type="file" name="work" value="">
    <input type="text" name="_token" value="{{ csrf_token() }}">
    <br/>
    <button type="submit" name="button">Upload </button>
</form>

<form action={{route('project.store')}} method="POST">
    @method("POST")
    @csrf
    <div class="form-group">
        <label for="name">Project's name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Project's name">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
