@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>วิดีโอเกี่ยวกับภาควิชา</h1>
            <a href="{{route('activityVideo_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มวิดีโอ</a>
        </div>

        <div class="video-container">
            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/YUXaOBneENU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="btn-manageVideo">
                    <a class="btn-edit" href="{{route('activityVideo_Edit')}}" class="btn-edit">แก้ไข</a>
                    <a class="btn-delete" href="#" class="btn-delete">ลบ</a>
                </div>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/5k8jyL_CJMg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="btn-manageVideo">
                    <a class="btn-edit" href="{{route('activityVideo_Edit')}}" class="btn-edit">แก้ไข</a>
                    <a class="btn-delete" href="#" class="btn-delete">ลบ</a>
                </div>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/MkA_0FdmKQ8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="btn-manageVideo">
                    <a class="btn-edit" href="{{route('activityVideo_Edit')}}" class="btn-edit">แก้ไข</a>
                    <a class="btn-delete" href="#" class="btn-delete">ลบ</a>
                </div>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/jYKsn4SdUCQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="btn-manageVideo">
                    <a class="btn-edit" href="{{route('activityVideo_Edit')}}" class="btn-edit">แก้ไข</a>
                    <a class="btn-delete" href="#" class="btn-delete">ลบ</a>
                </div>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/jYKsn4SdUCQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="btn-manageVideo">
                    <a class="btn-edit" href="{{route('activityVideo_Edit')}}" class="btn-edit">แก้ไข</a>
                    <a class="btn-delete" href="#" class="btn-delete">ลบ</a>
                </div>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/jYKsn4SdUCQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="btn-manageVideo">
                    <a class="btn-edit" href="{{route('activityVideo_Edit')}}" class="btn-edit">แก้ไข</a>
                    <a class="btn-delete" href="#" class="btn-delete">ลบ</a>
                </div>
            </div>
        </div>

    </div>
    {{-- end container --}}

    
@endsection