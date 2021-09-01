@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>เพิ่มวิดีโอเกี่ยวกับภาควิชา</h1>
        </div>

        
        {{-- Card --}}
        <form class="card-main" id="usrform" method="POST" action="{{route('postactivityAdd')}}">
        @csrf
            <div class="admin-editAboutDepartment">
                <input type="text" class="txt-edit" name="iframe" placeholder="ลิงค์ iframe URL จาก Youtube">
                <div class="idk-link">
                    <a href="{{route('idkYoutube')}}">ฉันไม่เข้าใจ ฉันต้องนำลิงค์มาจากที่ไหน?</a>
                </div>
                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-edit">เพิ่ม</button>
                    <a href="{{route('activity_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>

    </div>   
@endsection