@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขข่าวประชาสัมพันธ์</h1>
        </div>
        @foreach ($news as $new)
        {{-- Card --}}
        <form class="card-main" method="POST" action="{{ route('postnewsEdit', ['id'=>$new->id]) }}"  enctype="multipart/form-data"  id="usrform">
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
                    <div id="imagePreview" style="background-image: url('{{asset('storage/')}}/../../storage/app/public/news/pic/{{ $new->pic }}');">
                    </div>
                </div>
            </div>


            <div class="admin-editAboutDepartment">
                <h4>*เนื้อหารายละเอียด</h4>
            <input type="text"  name="title"  class="txt-edit" placeholder="แก้ไขหัวข้อหลัก" value="{{ $new->title }}">

                <h4>**หมายเหตุ : < br > คือ การขึ้นบรรทัดใหม่</h4>
                <textarea id="area" name="comment" form="usrform" placeholder="แก้ไขเนื้อหา">{{ $new->comment }}</textarea>

                <h4>แนบลิงค์รายละเอียด / อัพโหลดไฟล์</h4>
                <div class="admin-text2">
                <input type="text" name="filecomment" class="txt-edit2" placeholder="เช่น ดาวโหลดเอกสารหลักสูตรปริญญาตรี" value="{{ $new->filecomment }}">
                <input type="text" name="url" class="txt-edit2" placeholder="เพิ่ม URL" value="{{ $new->url }}">
                </div>

                <div class="admin-text3">
                    <label for="file-upload-1">อัพโหลดไฟล์
                        <input type="file" name="file"  id="file-upload-1" class="file-upload" accept=".pdf">
                    </label>
                    <p id="filename-1" class="filename">ชื่อไฟล์.สกุล</p>
                </div>

                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-edit">แก้ไข</button>
                    <a href="{{route('news_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>
        @endforeach

    </div>   

    <script src="{{asset('js/uploadFile.js')}}"></script>
@endsection