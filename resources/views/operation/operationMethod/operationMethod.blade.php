@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ผังดำเนินงานสหกิจศึกษา</h1>
        </div>
        @foreach ($operation_methods as $operation_method)
        <img class="img-structure" src="{{asset('storage/')}}/../../storage/app/public/operation_method/{{ $operation_method->file_name }}">
        @endforeach
    </div>
@endsection