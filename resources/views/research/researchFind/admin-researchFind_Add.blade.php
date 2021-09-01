@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>เพิ่มปริญญานิพนธ์</h1>
        </div>

        <form class="researchManage-card">
            <input type="text" class="txt-researchManage" value="รหัสปริญญานิพนธ์ : 12345" readonly>
            
            <h4>เกี่ยวกับปริญญานิพนธ์</h4>
            <div class="rm-50">
                <select>
                    <option value="">--- เลือกลักษณะปริญญานิพนธ์ ---</option>
                    <option value="">ปริญญานิพนธ์ใหม่</option>
                    <option value="">พัฒนาปริญญานิพนธ์</option>
                </select>

                <select>
                    <option value="">--- เลือกประเภทปริญญานิพนธ์ ---</option>
                    <option value="">วงจรแปรผันทางไฟฟ้า</option>
                    <option value="">การขับเคลื่อนทางไฟฟ้า</option>
                    <option value="">การควบคุมระบบอัตโนมัติ</option>
                    <option value="">เครื่องมือวัด</option>
                    <option value="">ระบบไฟฟ้ากำลัง</option>
                </select>
            </div>
            <select class="selDepartment">
                <option value="">--- เลือกรูปแบบปริญญานิพนธ์ ---</option>
                <option value="">ออกแบบและจัดสร้าง</option>
                <option value="">พัฒนาโปรแกรม</option>
                <option value="">จำลองการทำงาน</option>
                <option value="">สื่อการเรียนการสอน</option>
            </select>
            
            <input type="text" class="txt-researchManage" placeholder="กรอกชื่อปริญญานิพนธ์ (ภาษาไทย)">
            <input type="text" class="txt-researchManage" placeholder="กรอกชื่อปริญญานิพนธ์ (ภาษาอังกฤษ)">
            <div class="rm-50">
                <select>
                    <option value="">--- เลือกปีการศึกษา ---</option>
                    <option value="">2564</option>
                    <option value="">2563</option>
                    <option value="">2562</option>
                    <option value="">2561</option>
                    <option value="">2560</option>
                    <option value="">2559</option>
                    <option value="">2558</option>
                    <option value="">2557</option>
                    <option value="">2556</option>
                    <option value="">2555</option>
                    <option value="">2554</option>
                </select>

                <select>
                    <option value="">--- เลือกภาคเรียน ---</option>
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
            </div>
            <select class="selDepartment">
                <option value="">--- เลือกห้องเรียน ---</option>
                <option value="">PnET (PE)-R</option>
                <option value="">PnET (PE)-2R</option>
                <option value="">PnET (CT)-R</option>
                <option value="">PnET (CT)-2R</option>
                <option value="">PNT-R</option>
                <option value="">PNT-T</option>
            </select>

            <h4>อาจารย์ที่ปรึกษา</h4>
            <select id="teacher-main">
                <option value="">--- เลือกที่ปรึกษาหลัก ---</option>
                <option value="">ผศ.ดร.เกียรติคุณ เคลือนุตยางกูร</option>
                <option value="">ผศ.ดร.เกียรติคุณ เคลือนุตยางกูร</option>
                <option value="">ผศ.ดร.เกียรติคุณ เคลือนุตยางกูร</option>
                <option value="">ผศ.ดร.เกียรติคุณ เคลือนุตยางกูร</option>
            </select>
            <select id="teacher-sub">
                <option value="">--- เลือกที่ปรึกษาร่วม ---</option>
                <option value="">ผศ.ดร.เกียรติคุณ เคลือนุตยางกูร</option>
                <option value="">ผศ.ดร.เกียรติคุณ เคลือนุตยางกูร</option>
                <option value="">ผศ.ดร.เกียรติคุณ เคลือนุตยางกูร</option>
                <option value="">ผศ.ดร.เกียรติคุณ เคลือนุตยางกูร</option>
            </select>
            <div class="check-input">
                <input type="text" class="txt-researchManage" placeholder="กรอกที่ปรึกษาร่วม">
                <input type="text" class="txt-researchManage" placeholder="กรอกที่ปรึกษาร่วม">
            </div>
            <a onclick="advisor()" class="btn-add-advisor"><i class="fas fa-file-alt"></i>อื่น ๆ</a>


            <h4>คณะผู้จัดทำ</h4>
            <input type="text" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 1">
            <input type="text" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 2">
            <input type="text" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 3">
            
            <h4>ประเภทไฟล์</h4>
            <select class="selDepartment">
                <option value="">--- เลือกประเภทไฟล์ ---</option>
                <option value="">หัวข้อปริญญานิพนธ์</option>
                <option value="">ก้าวหน้าปริญญานิพนธ์</option>
                <option value="">ป้องกันปริญญานิพนธ์</option>
                <option value="">ปริญญานิพนธ์ฉบับสมบูรณ์</option>
            </select>

            <div class="admin-text3">
                <label for="file-upload-1">อัพโหลดไฟล์
                   <input type="file" id="file-upload-1" class="file-upload">
                </label>
                <p id="filename-1" class="filename">อัพโหลดได้เฉพาะไฟล์ word และ pdf</p>
            </div>
        
            <div class="research-commit">
                <a class="btn-submit">บันทึก</a>
                <a class="btn-cancle" href="{{route('researchFind_Admin')}}">ยกเลิก</a>
            </div>
        </form>
        

    </div>

    <script src="{{asset('js/uploadFile.js')}}"></script>
    <script>
        $(".check-input").hide();

        function advisor() {
            $(document).ready(function() {
                $('#teacher-sub').toggle();
                $('.check-input').toggle();
                // $(".check-input").addClass("display-flex");
                // $(".btn-add-advisor").addClass("display-none");
            });
        }
    </script>

@endsection