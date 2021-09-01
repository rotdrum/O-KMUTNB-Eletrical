@extends('layouts.admin-app')

@section('content')

    <div class="vue-container">
        <div class="title-head">
            <h1>เพิ่มข่าวประชาสัมพันธ์</h1>
        </div>

        
        {{-- Card --}}
        <form class="card-main" method="POST" action="{{ route('postnewsAdd') }}"  enctype="multipart/form-data"  id="usrform">
            @csrf

            {{-- Upload image --}}
            <div class="avatar-upload">
                <span class="full-hd">[W-1080] x [H-720] (.png, .jpg, .jpeg)</span>

                <div class="avatar-edit">
                    <input type="file" name="pic" id="imageUpload" accept=".png, .jpg, .jpeg" class="file-upload" />
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
                
                <h4>*เนื้อหารายละเอียด</h4>
                <input type="text" name="title" class="txt-edit" placeholder="เพิ่มหัวข้อหลัก" required>

                <h4>**หมายเหตุ : < br > คือ การขึ้นบรรทัดใหม่</h4>
                <textarea id="area" name="comment" form="usrform" placeholder="เพิ่มเนื้อหา" required></textarea>

                <h4>แนบลิงค์รายละเอียด / อัพโหลดไฟล์</h4>
                <div class="admin-text2">
                    <input type="text" name="filecomment" class="txt-edit2" placeholder="เช่น ดาวโหลดเอกสารหลักสูตรปริญญาตรี">
                    <input type="text" name="url" class="txt-edit2" placeholder="เพิ่ม URL">
                </div>

                <div class="admin-text3">
                    <label for="file-upload-1">อัพโหลดไฟล์
                        <input type="file"  name="file" id="file-upload-1" class="file-upload" accept=".pdf">
                    </label>
                    <p id="filename-1" class="filename">ชื่อไฟล์.pdf</p>
                </div>

                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-remember" name="save" >บันทึกแบบร่าง</button>
                    <button type="submit" class="btn-edit" name="post" >โพสต์</button>
                    <a href="{{route('news_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>

            
        </form>

    </div>   

    <script src="{{asset('js/uploadFile.js')}}"></script>
    

    
@endsection