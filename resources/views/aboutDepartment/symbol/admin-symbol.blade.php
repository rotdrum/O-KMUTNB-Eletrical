@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>สัญลักษณ์</h1>
            <a href="{{route('symbol_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มสัญลักษณ์</a>
        </div>

        <div class="symbol-row">

            
        @foreach ($emblems as $emblem)
        <div class="symbol-card">
            <img src="{{asset('storage/')}}/../../storage/app/public/emblem/{{ $emblem->pic }}">
            <h2>{{ $emblem->title }}</h2>
            <p>{{ $emblem->comment }}</p>
            <div class="admin-manage">
                <a class="btn-edit" href="{{route('symbol_Edit', ['id'=>$emblem->id])}}" class="btn-edit">แก้ไข</a>
                <a class="btn-delete" href="{{route('symbolDelete', ['id'=>$emblem->id])}}" class="btn-delete">ลบ</a>
            </div>
        </div>
        @endforeach

         
        </div>
    </div>
@endsection