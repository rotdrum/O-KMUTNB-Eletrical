@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>เพิ่มข้อมูลเกี่ยวกับภาควิชา</h1>
        </div>

        {{-- Card --}}
        <form class="card-main" id="usrform" method="POST" action="{{route("postmissionAdd")}}"  enctype="multipart/form-data">
        @csrf
            {{-- Upload image --}}
            <div class="avatar-upload">
                <span class="full-hd">[W-1080] x [H-720]</span>
                <div class="avatar-edit">
                    <input type='file' name="pic" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload">
                        <i class="fas fa-pencil-alt"></i>
                    </label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('{{asset('img/mission1.jpg')}}');">
                    </div>
                </div>
            </div>

            <div class="admin-editAboutDepartment">
                <input type="text" name="title" class="txt-edit" placeholder="เพิ่มหัวข้อหลัก">
                <textarea name="comment" name="comment" form="usrform" placeholder="เพิ่มเนื้อหา"></textarea>
                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-edit">เพิ่ม</button>
                    <a href="{{route('mission_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>
    </div>
@endsection