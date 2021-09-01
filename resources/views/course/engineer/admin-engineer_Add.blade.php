@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>เพิ่มหลักสูตร</h1>
        </div>

        {{-- Card --}}
        <form class="card-main" id="usrform" method="POST" action="{{ route('postengineerAdd') }}"  enctype="multipart/form-data">
        @csrf
            <div class="admin-editAboutDepartment">

                <h4>*เนื้อหารายละเอียด</h4>
                <input required name="title"  type="text" class="txt-edit" placeholder="แก้ไขหัวข้อหลัก">

                <h4>**หมายเหตุ : < br > คือ การขึ้นบรรทัดใหม่</h4>
                <textarea id="area" required name="comment" form="usrform" placeholder="แก้ไขเนื้อหา"></textarea>

      

                <h4>*หมายเหตุ : ไม่จำเป็นต้องกรอกลิงค์</h4>
                <div class="admin-text2">
                    <input type="text"  name="title_file" class="txt-edit2" placeholder="เช่น ดาวโหลดเอกสารหลักสูตรปริญญาตรี">
                    <input type="text" name="url" class="txt-edit2" placeholder="เพิ่ม URL">
                </div>

             {{-- card --}}
             <div class="profile-card">
                <h4>อัพโหลดไฟล์</h4>
                <div class="admin-text3">
                    <label for="file-upload-1">อัพโหลดไฟล์
                        <input required  name="name_file"  type="file" id="file-upload-1" accept=".pdf" class="file-upload">
                    </label>
                    <p id="filename-1" class="filename">ชื่อไฟล์.pdf</p>
                </div>
            </div>
            
                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-edit">บันทึก</button>
                    <a href="{{route('engineer_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>

    </div>   

    <script src="{{asset('js/uploadFile.js')}}"></script>

@endsection