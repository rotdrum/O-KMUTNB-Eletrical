@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ประวัติความเป็นมา</h1>
            <a href="{{route('aboutDepartment_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มข้อมูล</a>
        </div>

        <div class="timeline-body">
            
            
            {{-- timeline --}}
            @foreach ($storys as $story)
            <div class="timeline-item">
                <p class="time">พ.ศ.{{ $story->year }}</p>
                <div class="timeline-content">
                    <h2 class="title">{{ $story->title }}</h2>
                    <p class="timeline">{{ $story->comment }}</p>
                    <div class="admin-manageAboutDapartment">
                        <a href="{{route('aboutDepartment_Edit', ['id'=>$story->id])}}" class="btn-edit">แก้ไข</a>
                        <a href="{{route('aboutDepartmentDelete', ['id'=>$story->id])}}" class="btn-delete">ลบ</a>
                    </div>
                </div>
            </div>
            @endforeach
            

         
            
        </div>
    </div>
@endsection