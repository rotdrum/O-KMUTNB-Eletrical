@extends('layouts.app')

@section('content')
<!--header-->
<h3>Edit {{$model->name}}</h3>
<!--breadcrumb-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.index')}}">Project</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
<form action={{route('project.update', $model->id)}} method="POST">
    @method("PUT")
    @csrf
    <input type="hidden" name="id" value="{{$model->id}}"/>
    <div class="form-group">
        <label for="name">Project's name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Project's name" value="{{$model->name}}">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
