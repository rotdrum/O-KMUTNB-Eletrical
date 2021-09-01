@extends('layouts.app')

@section('content')
<!--header-->
<h3>Create New task</h3>
<!--breadcrumb-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('task.index', ['project_id' => $project_id ])}}">task</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<form action={{route('task.store', ['project_id' => $project_id ])}} method="POST">
    @method("POST")
    @csrf
    <div class="form-group">
        <label for="name">task's name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="task's name">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
