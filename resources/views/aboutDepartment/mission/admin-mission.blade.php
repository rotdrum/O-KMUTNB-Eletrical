@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ข้อมูลเกี่ยวกับภาควิชา</h1>
            <a href="{{route('mission_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มข้อมูล</a>
        </div>

        @foreach ($abouts as $about)
            <div class="card-mission">
                <div class="mission-img">
                    <img src="{{asset('storage/')}}/../../storage/app/public/about/{{ $about->pic }}"  alt="">
                </div>
                <div class="mission-info">
                    <h1>{{ $about->title }}</h1>
                    <p>{{ $about->comment }}</p>
                    <div class="admin-manageMission">
                        <a href="{{route('mission_Edit', ['id'=>$about->id])}}" class="btn-edit">แก้ไข</a>
                        <a href="{{route('missionDelete', ['id'=>$about->id])}}" class="btn-delete">ลบ</a>
                    </div>
                </div>
            </div>
        @endforeach


       
    </div>
@endsection