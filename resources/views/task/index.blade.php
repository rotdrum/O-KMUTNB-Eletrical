@extends('layouts.app')

@section('content')
<!--header-->
<h3>Task list&nbsp; <a href={{route("task.create", ['project_id' => $project_id])}} class="btn btn-success">Create New</a></h3>
<!--breadcrumb-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">task</li>
    </ol>
</nav>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Task</th>
            <th scope="col">Manage</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <th scope="row">{{$task->id}}</th>
            <td scope="row">{{$task->name}}</td>
            <td scope="row">{{$task->description}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('task.edit', ['id'=>$task->id])}}" data-id="{{$task->id}}" class="btn btn-warning btn-sm"><b>Edit</b></a>
                    <button type="button" data-id="{{$task->id}}" data-url="{{route('task.destroy', ['id'=>$task->id])}}" role="delete" class="btn btn-danger btn-sm"><b>Delete</b></button>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
@section('custom-js')
<script>
    $(document).ready(function(){
        //binding
        $("button[role=delete]").click(function(e){
            let confirmDelete = confirm("Are you sure ?");
            if(!confirmDelete) return false;
            $parent = $(this).parents('tr');
            $.ajax({
                url: $(this).data('url'),
                type: "DELETE",
                method: "DELETE",
                success: function(data){
                    $parent.remove();
                    console.log("removed");
                },
                error: function(data){
                    alert("Something wrong while deleting!!");
                }
            })
        });
    });
</script>
@endsection
