@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>เพิ่มกิจกรรมภาควิชา</h1>
        </div>

        
        {{-- Card --}}
        <form class="card-main" id="usrform" method="POST" action="{{ route('postactivityimgAdd') }}"  enctype="multipart/form-data">
        @csrf
            {{-- Upload image --}}
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' name="pic" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload">
                        <i class="fas fa-pencil-alt"></i>
                    </label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('{{asset('img/activity.jpg')}}');">
                    </div>
                </div>
            </div>

            <div class="admin-editAboutDepartment">
                <h4>*เนื้อหารายละเอียด</h4>
                <input type="text"  name="title" class="txt-edit" placeholder="เพิ่มหัวข้อหลัก">

                <h4>**หมายเหตุ : < br > คือ การขึ้นบรรทัดใหม่</h4>
                <textarea id="area"  name="comment" form="usrform" placeholder="เพิ่มเนื้อหา"></textarea>

                <h4>แนบลิงค์รายละเอียด / อัพโหลดไฟล์</h4>
                <div class="admin-text2">
                    <input type="text" name="filecomment"  class="txt-edit2" placeholder="เช่น ดาวโหลดเอกสารหลักสูตรปริญญาตรี">
                    <input type="text" name="url" class="txt-edit2" placeholder="เพิ่ม URL">
                </div>

                <div class="admin-text3">
                    <label for="file-upload-1">อัพโหลดไฟล์
                        <input type="file" name="file"  id="file-upload-1" class="file-upload">
                    </label>
                    <p id="filename-1" class="filename">ชื่อไฟล์.สกุล</p>
                </div>

                <div class="admin-manageAboutDapartmentEdit">
                    <button class="btn-remember"  name="save" >บันทึกแบบร่าง</button>
                    <button type="submit" name="post"  class="btn-edit">โพสต์</button>
                    <a href="{{route('activity_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>

    </div>   

    <script src="{{asset('js/uploadFile.js')}}"></script>

@endsection