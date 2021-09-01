@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>เพิ่มข้อมูลโครงการสหกิจ</h1>
        </div>

        <form class="operationFindDetail">
            <div class="operation-map">
                <div class="update-card">
                    <h2>แผนที่สหกิจศึกษา</h2>
                    <input type="text" class="txt-map" placeholder="URL Google map">
                    <h2 style="margin-top: 50px;">วิธีการนำเอาลิงค์ URL Google map</h2>
                    <h4>1.ค้นหาสถานที่ และเลือกเมนู "แชร์"</h4>
                    <div class="img-map">
                        <img src="{{asset('img/map1.png')}}">
                    </div>
                    <h4>2.เลือกเมนู "Embed a map"</h4>
                    <div class="img-map">
                        <img src="{{asset('img/map2.png')}}">
                    </div>
                    <h4>3.ทำการคลิกปุ่ม "Copy HTML"</h4>
                    <div class="img-map">
                        <img src="{{asset('img/map3.png')}}">
                    </div>
                </div>
            </div>

            <div class="operation-detail">

                {{-- card privacy --}}
                <div class="operation-card">
                    <h2>ข้อมูลส่วนตัว</h2>
                    <div class="profile-detail">
                        <p>รหัสนักศึกษา</p>
                        <input type="text" class="txt-info" placeholder="กรอกรหัสนักศึกษา">
                    </div>

                    <div class="profile-detail">
                        <p>ชื่อ-สกุล</p>
                        <input type="text" class="txt-info" placeholder="กรอกชื่อ-นามสกุล">
                    </div>

                    <div class="profile-detail">
                        <p>ห้อง</p>
                        <select class="sel-room">
                            <option value="">--- เลือกห้อง ---</option>
                        </select>
                    </div>

                    <div class="profile-detail">
                        <p>เบอร์โทรศัพท์</p>
                        <input type="text" class="txt-info" placeholder="กรอกโทรศัพท์">
                    </div>

                    <div class="profile-detail">
                        <p>อีเมล</p>
                        <input type="text" class="txt-info" placeholder="example@email.com">
                    </div>
                </div>

                {{-- card operation --}}
                <div class="operation-card">
                    <h2>ข้อมูลการออกสหกิจ</h2>
                    <div class="profile-detail">
                        <p>สถานประกอบการ</p>
                        <input type="text" class="txt-info" placeholder="กรอกชื่อสถานประกอบการ">
                    </div>

                    <div class="profile-detail">
                        <p>ห้อง</p>
                        <select class="sel-room">
                            <option value="">--- ประเภทสถานประกอบการ ---</option>
                            <option value="">บริษัท</option>
                            <option value="">บริษัทห้างร้าน</option>
                            <option value="">องค์กรภาครัฐ</option>
                            <option value="">โรงงาน</option>
                        </select>
                    </div>

                    <p id="date-hide">ระยะเวลาตั้งแต่</p>
                    <div class="profile-detail" id="profile-detail-date">
                        <p class="fixed">ระยะเวลาตั้งแต่</p>
                        <input type="text" class="txt-date" placeholder="วันที่">
                        <select class="sel-month">
                            <option value="">---เดือน---</option>
                            <option value="">มกราคม</option>
                            <option value="">กุมภาพันธ์</option>
                            <option value="">มีนาคม</option>
                            <option value="">เมษายน</option>
                            <option value="">พฤษภาคม</option>
                            <option value="">มิถุนายน</option>
                            <option value="">กรกฎาคม</option>
                            <option value="">สิงหาคม</option>
                            <option value="">กันยายน</option>
                            <option value="">ตุลาคม</option>
                            <option value="">พฤษจิกายน</option>
                            <option value="">ธันวาคม</option>
                        </select>
                        <input type="text" class="txt-date" placeholder="25XX">
                    </div>

                    <p id="date-hide">จนถึง</p>
                    <div class="profile-detail" id="profile-detail-date">
                        <p class="fixed">จนถึง</p>
                        <input type="text" class="txt-date" placeholder="วันที่">
                        <select class="sel-month">
                            <option value="">---เดือน---</option>
                            <option value="">มกราคม</option>
                            <option value="">กุมภาพันธ์</option>
                            <option value="">มีนาคม</option>
                            <option value="">เมษายน</option>
                            <option value="">พฤษภาคม</option>
                            <option value="">มิถุนายน</option>
                            <option value="">กรกฎาคม</option>
                            <option value="">สิงหาคม</option>
                            <option value="">กันยายน</option>
                            <option value="">ตุลาคม</option>
                            <option value="">พฤษจิกายน</option>
                            <option value="">ธันวาคม</option>
                        </select>
                        <input type="text" class="txt-date" placeholder="25XX">
                    </div>

                    <div class="profile-detail">
                        <p>บุคคลที่จะเรียนถึง</p>
                        <input type="text" class="txt-info" placeholder="กรอกชื่อผู้ที่จะเรียนถึง">
                    </div>

                    <div class="profile-detail">
                        <p>พี่เลี้ยง</p>
                        <input type="text" class="txt-info" placeholder="กรอกชื่อพี่เลี้ยง">
                    </div>

                    <div class="profile-detail">
                        <p>เบอร์โทรพี่เลี้ยง</p>
                        <input type="text" class="txt-info" placeholder="กรอกเบอร์โทรพี่เลี้ยง">
                    </div>
                </div>

                <div class="btn-commit">
                    <a href="#" class="btn-save">บันทึก</a>
                    <a href="{{route('operationFind_Admin')}}" class="btn-cancle">ยกเลิก</a>
                </div>

            </div>
        </form> {{-- end container --}}

        <table class="show-update" style="margin-top: 50px;">
            <tr>
                <th>ลำดับ</th>
                <th>ไฟล์สหกิจศึกษา</th>
                <th>วันที่ส่ง</th>
                <th>จัดการ</th>
            </tr>

            <tr>
                <td>1</td>
                <td><a href="#">แบบแจ้งแผนการปฏิบัติงานสหกิจศึกษา</a></td>
                <td>31 มีนาคม 2563</td>
                <td><button class="btn-delete">ลบ</button></td>
            </tr>

            <tr>
                <td>2</td>
                <td><a href="#">แบบแจ้งโครงการสหกิจศึกษา</a></td>
                <td>1 เมษายน 2563</td>
                <td><button class="btn-delete">ลบ</button></td>
            </tr>
        </table>



    </div>

    <script src="{{asset('js/uploadFile.js')}}"></script>

@endsection