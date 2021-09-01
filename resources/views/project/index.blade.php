@extends('layouts.app')

@section('content')
<!--header-->
<h3>Project list&nbsp; <a href={{route("project.create")}} class="btn btn-success">Create New</a></h3>
<!--breadcrumb-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Projects</li>
    </ol>
</nav>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Project</th>
            <th scope="col">Manage</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <th scope="row">{{$project->id}}</th>
            <td><a href="{{route('task.index', ['id'=>$project->id])}}">{{$project->name}}</a></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('project.edit', ['id'=>$project->id])}}" data-id="{{$project->id}}" class="btn btn-warning btn-sm"><b>Edit</b></a>
                    <button type="button" data-id="{{$project->id}}" data-url="{{route('project.destroy', ['id'=>$project->id])}}" role="delete" class="btn btn-danger btn-sm"><b>Delete</b></button>
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
