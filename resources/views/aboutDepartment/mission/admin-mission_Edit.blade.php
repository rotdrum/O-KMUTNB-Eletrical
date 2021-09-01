@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขข้อมูลเกี่ยวกับภาควิชา</h1>
        </div>

        {{-- Card --}}
        @foreach ($abouts as $about)
        <form class="card-main" method="POST" action="{{ route('postmissionEdit') }}"  enctype="multipart/form-data"  id="usrform">
        @csrf   
            <input type="hidden" name="id" value="{{ $about->id }}">
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
                    <div id="imagePreview" style="background-image: url('{{asset('storage/')}}/../../storage/app/public/about/{{ $about->pic }}');">
                    </div>
                </div>
            </div>


            <div class="admin-editAboutDepartment">
            <input type="text" name="title" class="txt-edit" value="{{ $about->title }}" placeholder="แก้ไขหัวข้อหลัก">
                <textarea name="comment" form="usrform" placeholder="แก้ไขเนื้อหา">{{ $about->comment }}</textarea>
                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-edit">แก้ไข</button>
                    <a href="{{route('mission_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>
        @endforeach 
      
    </div>
@endsection