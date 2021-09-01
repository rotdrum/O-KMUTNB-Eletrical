@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>โครงสร้างองค์กร</h1>
            <a href="{{route('structure_Edit')}}" class="btn-addAboutDepartment"><i class="fas fa-pencil-alt"></i>แก้ไขรูปภาพ</a>
        </div>
        @foreach ($structures as $structure)
            <img class="img-structure" src="{{asset('storage/')}}/../../storage/app/public/structure/{{ $structure->pic }}">
        @endforeach
    </div>
@endsection