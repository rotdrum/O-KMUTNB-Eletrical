@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขปริญญานิพนธ์</h1>
        </div>

        @foreach ($researchs as $research)
            
        <form class="researchManage-card" method="POST" action="{{ route('postresearchFindEdit') }}" >
        @csrf
          
            <h4>รหัสปริญญานิพนธ์</h4>
            <input type="hidden" name="id" class="txt-researchManage" value="{{ $research->id }}" readonly>
            <input type="text" name="research_id" class="txt-researchManage" value="{{ $research->research_id }}" readonly>
            
            <h4>เกี่ยวกับปริญญานิพนธ์</h4>
            <div class="rm-50">
                <select name="research_look">
                    <option value="{{ $research->research_look }}">{{ $research->research_look }}</option>
                    <option value="ปริญญานิพนธ์ใหม่">ปริญญานิพนธ์ใหม่</option>
                    <option value="พัฒนาปริญญานิพนธ์">พัฒนาปริญญานิพนธ์</option>
                </select>

                <select name="research_type">
                    <option value="{{ $research->research_type }}">{{ $research->research_type }}</option>
                    <option value="วงจรแปรผันทางไฟฟ้า">วงจรแปรผันทางไฟฟ้า</option>
                    <option value="การขับเคลื่อนทางไฟฟ้า">การขับเคลื่อนทางไฟฟ้า</option>
                    <option value="การควบคุมระบบอัตโนมัติ">การควบคุมระบบอัตโนมัติ</option>
                    <option value="เครื่องมือวัด">เครื่องมือวัด</option>
                    <option value="ระบบไฟฟ้ากำลัง">ระบบไฟฟ้ากำลัง</option>
                </select>
            </div>
            <select class="selDepartment" name="format">
                <option value="{{ $research->format }}">{{ $research->format }}</option>
                <option value="ออกแบบและจัดสร้าง">ออกแบบและจัดสร้าง</option>
                <option value="พัฒนาโปรแกรม">พัฒนาโปรแกรม</option>
                <option value="จำลองการทำงาน">จำลองการทำงาน</option>
                <option value="สื่อการเรียนการสอน">สื่อการเรียนการสอน</option>
            </select>
            <input type="text" name="thai_name" value="{{ $research->thai_name }}" class="txt-researchManage" placeholder="กรอกชื่อปริญญานิพนธ์ (ภาษาไทย)">
            <input type="text" name="eng_name" value="{{ $research->eng_name }}" class="txt-researchManage" placeholder="กรอกชื่อปริญญานิพนธ์ (ภาษาอังกฤษ)">
            <div class="rm-50">
                <select name="year">
                    <option value="{{ $research->year }}">{{ $research->year }}</option>
                    <option value="2564">2564</option>
                    <option value="2563">2563</option>
                    <option value="2562">2562</option>
                    <option value="2561">2561</option>
                    <option value="2560">2560</option>
                    <option value="2559">2559</option>
                    <option value="2558">2558</option>
                    <option value="2557">2557</option>
                    <option value="2556">2556</option>
                    <option value="2555">2555</option>
                    <option value="2554">2554</option>
                </select>

                <select name="term">
                    <option value="{{ $research->term }}">{{ $research->term }}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <select class="selDepartment" name="class">
                <option value="{{ $research->class }}">{{ $research->class }}</option>
                <option value="PnET (PE)-R">PnET (PE)-R</option>
                <option value="PnET (PE)-2R">PnET (PE)-2R</option>
                <option value="PnET (CT)-R">PnET (CT)-R</option>
                <option value="PnET (CT)-2R">PnET (CT)-2R</option>
                <option value="PNT-R">PNT-R</option>
                <option value="PNT-T">PNT-T</option>
            </select>

            <h4>อาจารย์ที่ปรึกษา</h4>
            <select id="teacher-main" name="teacherid_one">
                <option value="{{ $research->teacherid_one }}">{{ $teacher1 }}</option>
                @foreach ($personals as $personal)
                    <option value="{{ $personal->id }}">{{ $personal->name_thai }}</option>
                @endforeach
            </select>
            <select id="teacher-sub" name="teacherid_two">
                <option value="{{ $research->teacherid_two }}">{{ $teacher2 }}</option>
                @foreach ($personals as $personal)
                    <option value="{{ $personal->id }}">{{ $personal->name_thai }}</option>
                @endforeach
            </select>

            <!--

            <div class="check-input">
                <input type="text" value="{{ $research->research_id }}" class="txt-researchManage" placeholder="กรอกที่ปรึกษาร่วม">
                <input type="text" value="{{ $research->research_id }}" class="txt-researchManage" placeholder="กรอกที่ปรึกษาร่วม">
            </div>

            <a onclick="advisor()" class="btn-add-advisor"><i class="fas fa-file-alt"></i>อื่น ๆ</a>
            -->
            
            <h4>คณะผู้จัดทำ</h4>
            <input type="text" name="student_one" value="{{ $research->student_one }}" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 1">
            <input type="text" name="student_two" value="{{ $research->student_two }}" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 2">
           <!--
            <input type="text" value="{{ $research->student_three }}" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 3">
           -->
            <h4>ประเภทไฟล์</h4>
            <select class="selDepartment" name="file_type" >
                <option value="{{ $research->file_type }}">{{ $research->file_type }}</option>
                <option value="หัวข้อปริญญานิพนธ์">หัวข้อปริญญานิพนธ์</option>
                <option value="ก้าวหน้าปริญญานิพนธ์">ก้าวหน้าปริญญานิพนธ์</option>
                <option value="ป้องกันปริญญานิพนธ์">ป้องกันปริญญานิพนธ์</option>
                <option value="ปริญญานิพนธ์ฉบับสมบูรณ์">ปริญญานิพนธ์ฉบับสมบูรณ์</option>
            </select>

            <!--
            <div class="admin-text3">
                <label for="file-upload-1">อัพโหลดไฟล์
                   <input type="file" id="file-upload-1" class="file-upload">
                </label>
                <p id="filename-1" class="filename">อัพโหลดได้เฉพาะไฟล์ word และ pdf</p>
            </div>
        -->
            <div class="research-commit">
                <button class="btn-submit">บันทึก</button>
                <a class="btn-cancle" href="{{route('researchFind_Admin')}}">ยกเลิก</a>
            </div>
        </form>
        
        @endforeach

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