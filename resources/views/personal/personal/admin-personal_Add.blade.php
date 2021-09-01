@extends('layouts.admin-app')

@section('content')
    <form class="vue-container" method="POST" action="{{ route('postpersonalAdd') }}"  enctype="multipart/form-data">
    @csrf
        <div class="profile-container">
            <div class="profile-left">

                {{-- card --}}
                <div class="profile-card">

                    {{-- Upload image --}}
                    <div class="avatar-upload">
                        <span class="symbol">[W-1500] x [H-1000]</span>
                        <div class="avatar-edit-profile">
                            <input required  type='file' id="imageUpload" name="pic_name" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload">
                                <i class="fas fa-pencil-alt"></i>
                            </label>
                        </div>
                        <div class="avatar-preview-profile">
                            <div id="imagePreview" style="background-image: url('{{asset('img/personal1.jpg')}}');">
                            </div>
                        </div>
                    </div>

                    <input class="input-display name" id="displayName" placeholder="ชื่อ-นามสกุล" readonly>
                    <input class="input-display position" id="displayPosition" placeholder="ตำแหน่ง" readonly>
                </div>

            </div>
            <div class="profile-right">

                {{-- card --}}
                <div class="profile-card">
                    <h2>รายละเอียด</h2>
                    <div class="profile-detail">
                        <p>ชื่อ-สกุล (ไทย)</p>
                        <input required  type="text" name="name_thai" id="firstname" placeholder="ชื่อ-นามสกุล (ไทย)" oninput="displayName.value = firstname.value">
                    </div>
                    <div class="profile-detail">
                        <p>ชื่อ-สกุล (อังกฤษ)</p>
                        <input required  type="text" name="name_eng" placeholder="ชื่อ-นามสกุล (อังกฤษ)">
                    </div>
                    <div class="profile-detail">
                        <p>ตำแหน่ง</p>
                        <select required  class="sel-room" name="position" >
                            <option value="">--- เลือกตำแหน่ง ---</option>
                            <option value="หัวหน้าภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า">หัวหน้าภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า</option>
                            <option value="รองหัวหน้าภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า">รองหัวหน้าภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า</option>
                            <option value="หัวหน้าสาขาวิชาเทคโนโลยีวิศวกรรมไฟฟ้าและอิเล็กทรอนิกส์กำลัง">หัวหน้าสาขาวิชาเทคโนโลยีวิศวกรรมไฟฟ้าและอิเล็กทรอนิกส์กำลัง</option>
                            <option value="ผู้ช่วยฝ่ายประกันคุณภาพการศึกษา">ผู้ช่วยฝ่ายประกันคุณภาพการศึกษา</option>
                            <option value="อาจารย์ประจำ">อาจารย์ประจำ</option>
                            <option value="วิศวกร">วิศวกร</option>
                            <option value="เลขาฯและเจ้าหน้าที่">เลขาฯและเจ้าหน้าที่</option>
                        </select>
                    </div>
                    <div class="profile-detail">
                        <p>ชื่อย่อ</p>
                        <input required  type="text" name="initial" placeholder="XXX">
                    </div>
                    <div class="profile-detail">
                        <p>อีเมล</p>
                        <input required  type="text" name="email" placeholder="example@cit.kmutnb.ac.th">
                    </div>
                    <div class="profile-detail">
                        <p>ติดต่อ</p>
                        <input required  type="text" name="contact" placeholder="เช่น ห้องพักครู">
                    </div>
                    <div class="profile-detail">
                        <p>โทรศัพท์</p>
                        <input required  type="text" name="tel" placeholder="0X-XXX-XXXX">
                    </div>
                </div>

                {{-- card --}}
                <div class="profile-card" >
                    <h2>วุฒิทางการการศึกษา</h2>
                    <div id="edu">
                        <div class="profile-detail">
                            <input class="course-id" type="text" placeholder="ปริญญาตรี" value="ปริญญาตรี">
                            <input name="bachelor" type="text" placeholder="วิทยาลัยเทคนิคอุตสาหกรรม">
                        </div>
                    </div>

                    <div id="edu">
                        <div class="profile-detail">
                            <input class="course-id" type="text" placeholder="ปริญญาโท" value="ปริญญาโท">
                            <input name="master" type="text" placeholder="วิทยาลัยเทคนิคอุตสาหกรรม">
                        </div>
                    </div>


                    <div id="edu">
                        <div class="profile-detail">
                            <input class="course-id" type="text" placeholder="ปริญญาเอก" value="ปริญญาเอก">
                            <input name="phd" type="text" placeholder="วิทยาลัยเทคนิคอุตสาหกรรม">
                        </div>
                    </div>


                    {{--
                    <a class="add-edu">
                        <i class="fas fa-plus-circle"></i>เพิ่มวุฒิการศึกษา
                        <script>
                            $('.add-edu').click(function(){
                                $('#edu').append('<div class="profile-detail" id="edu"><input class="course-id" type="text" placeholder="ปวช"><input type="text" placeholder="วิทยาลัยเทคนิคอุตสาหกรรม"></div>');
                            });
                        </script>
                    </a>
                    --}}
                </div>

                {{-- card --}}
                <div class="profile-card">
                    <h2>ภาระงานสอน/ความเชี่ยวชาญ</h2>
                    <div id="subject">
                        <div class="profile-detail">
                            <input name="edu_m1" class="course-id" type="text" placeholder="020413100">
                            <input name="edu_s1" type="text" placeholder="Electrical Works and Instrument">
                        </div>
                    </div>
                    <div id="subject">
                        <div class="profile-detail">
                            <input name="edu_m2"  class="course-id" type="text" placeholder="020413100">
                            <input name="edu_s2"  type="text" placeholder="Electrical Works and Instrument">
                        </div>
                    </div>
                    <div id="subject">
                        <div class="profile-detail">
                            <input name="edu_m3"  class="course-id" type="text" placeholder="020413100">
                            <input name="edu_s3"  type="text" placeholder="Electrical Works and Instrument">
                        </div>
                    </div>
                    <div id="subject">
                        <div class="profile-detail">
                            <input name="edu_m4"  class="course-id" type="text" placeholder="020413100">
                            <input name="edu_s4"  type="text" placeholder="Electrical Works and Instrument">
                        </div>
                    </div>
                    <div id="subject">
                        <div class="profile-detail">
                            <input name="edu_m5"  class="course-id" type="text" placeholder="020413100">
                            <input name="edu_s5"  type="text" placeholder="Electrical Works and Instrument">
                        </div>
                    </div>
                    {{-- 
                    <a class="add-subject">
                        <i class="fas fa-plus-circle"></i>เพิ่มวิชา
                        <script>
                            $('.add-subject').click(function(){
                                $('#subject').append('<div class="profile-detail" id="subject"><input class="course-id" type="text" placeholder="020413100"><input type="text" placeholder="Electrical Works and Instrumen"></div>');
                            });
                        </script>
                    </a>
                    --}}
                </div>

                {{-- card --}}
                <div class="profile-card">
                    <h2>รายละเอียดเพิ่มเติม</h2>
                    <div class="admin-text3">
                        <label for="file-upload-1">อัพโหลดไฟล์
                            <input required  name="file_name"  type="file" id="file-upload-1" accept=".pdf" class="file-upload">
                        </label>
                        <p id="filename-1" class="filename">ชื่อไฟล์.pdf</p>
                    </div>
                </div>
                

            </div>
        </div>

        <div class="admin-manage">
            <button class="btn-edit" >บันทึก</button>
            <a class="btn-delete" href="{{route('personal_Admin')}}" class="btn-delete">ยกเลิก</a>
        </div>
    </form>

    <script src="{{asset('js/uploadFile.js')}}"></script>

@endsection