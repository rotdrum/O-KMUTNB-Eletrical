@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขวิดีโอเกี่ยวกับภาควิชา</h1>
        </div>

        @foreach ($activityvideos as $activityvideo)
        
        {{-- Card --}}
        <form class="card-main" id="usrform" method="POST" action="{{route('postactivityEdit')}}" >
        @csrf
            <div class="admin-editAboutDepartment">
            <input name="id" type="hidden" value="{{ $activityvideo->id }}">
            <input name="iframe" type="text" class="txt-edit" value=" {{ $activityvideo->iframe }}" placeholder="ลิงค์ iframe URL จาก Youtube">
                <div class="idk-link">
                    <a href="{{route('idkYoutube')}}">ฉันไม่เข้าใจ ฉันต้องนำลิงค์มาจากที่ไหน?</a>
                </div>
                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-edit">แก้ไข</button>
                    <a href="{{route('activity_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>
        @endforeach

    </div>   
@endsection