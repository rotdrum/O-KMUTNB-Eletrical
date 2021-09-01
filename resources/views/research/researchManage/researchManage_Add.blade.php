@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>เพิ่มปริญญานิพนธ์</h1>
        </div>
        @if ($researchs == "[]")
        <form class="researchManage-card"   method="POST" action="{{ route('postresearchManageAdd') }}"  enctype="multipart/form-data">
            @csrf
                <!--
                <h4>รหัสปริญญานิพนธ์</h4>
                <input  name="research_id"  required type="text" class="txt-researchManage" value="12345" readonly>
                -->
                <h4>เกี่ยวกับปริญญานิพนธ์</h4>
                <div class="rm-50">
                    <select  name="research_look"  required> 
                        <option value="">--- เลือกลักษณะปริญญานิพนธ์ ---</option>
                        <option value="ปริญญานิพนธ์ใหม่">ปริญญานิพนธ์ใหม่</option>
                        <option value="พัฒนาปริญญานิพนธ์">พัฒนาปริญญานิพนธ์</option>
                    </select>
    
                    <select  name="research_type"  required>
                        <option value="">--- เลือกประเภทโปรเจค ---</option>
                        <option value="วงจรแปรผันทางไฟฟ้า">วงจรแปรผันทางไฟฟ้า</option>
                        <option value="การขับเคลื่อนทางไฟฟ้า">การขับเคลื่อนทางไฟฟ้า</option>
                        <option value="การควบคุมระบบอัตโนมัติ">การควบคุมระบบอัตโนมัติ</option>
                        <option value="เครื่องมือวัด">เครื่องมือวัด</option>
                        <option value="ระบบไฟฟ้ากำลัง">ระบบไฟฟ้ากำลัง</option>
                    </select>
                </div>
                <select  name="format"  required class="selDepartment">
                    <option value="">--- เลือกรูปแบบปริญญานิพนธ์ ---</option>
                    <option value="ออกแบบและจัดสร้าง">ออกแบบและจัดสร้าง</option>
                    <option value="พัฒนาโปรแกรม">พัฒนาโปรแกรม</option>
                    <option value="จำลองการทำงาน">จำลองการทำงาน</option>
                    <option value="สื่อการเรียนการสอน">สื่อการเรียนการสอน</option>
                </select>
                <input required  name="thai_name"  type="text" class="txt-researchManage" placeholder="กรอกชื่อโปรเจค (ภาษาไทย)">
                <input required  name="eng_name"  type="text" class="txt-researchManage" placeholder="กรอกชื่อโปรเจค (ภาษาอังกฤษ)">
                <div class="rm-50">
                    <select  name="year"  required>
                        <option value="">--- เลือกปีการศึกษา ---</option>
                        <option value="2567">2567</option>
                        <option value="2566">2566</option>
                        <option value="2565">2565</option>
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
    
                    <select name="term"  required>
                        <option value="">--- เลือกภาคเรียน ---</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <select  name="class"  required class="selDepartment">
                    <option value="">--- เลือกห้องเรียน ---</option>
                    <option value="PnET (PE)-R">PnET (PE)-R</option>
                    <option value="PnET (PE)-2R">PnET (PE)-2R</option>
                    <option value="PnET (CT)-R">PnET (CT)-R</option>
                    <option value="PnET (CT)-2R">PnET (CT)-2R</option>
                    <option value="PNT-R">PNT-R</option>
                    <option value="PNT-T">PNT-T</option>
                </select>
    
                <h4>อาจารย์ที่ปรึกษา</h4>
                <select  name="teacherid_one"  required id="teacher-main">
                    <option value="">--- เลือกที่ปรึกษาหลัก ---</option>
                    @foreach ($personals as $personal)
                        <option value="{{ $personal->id }}">{{ $personal->name_thai }}</option>
                    @endforeach
                </select>
                <select  name="teacherid_two" required  id="teacher-sub">
                    <option value="">--- เลือกที่ปรึกษาร่วม ---</option>
                    @foreach ($personals as $personal)
                        <option value="{{ $personal->id }}">{{ $personal->name_thai }}</option>
                    @endforeach
                </select>
                <select  name="teacherid_three"   id="teacher-sub">
                    <option value="">--- เลือกที่ปรึกษาร่วม ---</option>
                    @foreach ($personals as $personal)
                        <option value="{{ $personal->id }}">{{ $personal->name_thai }}</option>
                    @endforeach
                </select>
    
    <!-- 
                <div class="check-input">
                <input  name="teachername_two"  type="text" class="txt-researchManage" placeholder="กรอกที่ปรึกษาร่วม">
                <input type="text" class="txt-researchManage" placeholder="กรอกที่ปรึกษาร่วม"> 
                </div>
                <a onclick="advisor()" class="btn-add-advisor"><i class="fas fa-file-alt"></i>อื่น ๆ</a>
    -->
    
                <h4>คณะผู้จัดทำ</h4>
                <input  name="student_one"  required type="text" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 1" value="{{ Auth::user()->tname }}{{ Auth::user()->fname }} {{ Auth::user()->lname }}">
                <input  name="student_two"  type="text" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 2">
                <input  name="student_three"  type="text" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 3">
             

                <h4>ประเภทไฟล์</h4>
                <select  name="file_type"  required class="selDepartment">
                    <option value="">--- เลือกประเภทไฟล์ ---</option>
                    <option value="หัวข้อปริญญานิพนธ์">หัวข้อปริญญานิพนธ์</option>
                    <option value="ก้าวหน้าปริญญานิพนธ์">ก้าวหน้าปริญญานิพนธ์</option>
                    <option value="ป้องกันปริญญานิพนธ์">ป้องกันปริญญานิพนธ์</option>
                    <option value="ปริญญานิพนธ์ฉบับสมบูรณ์">ปริญญานิพนธ์ฉบับสมบูรณ์</option>
                </select>
    
                <div class="admin-text3">
                    <label for="file-upload-1">อัพโหลดไฟล์
                       <input name="file_name" required type="file" id="file-upload-1" accept=".pdf" class="file-upload">
                    </label>
                    <p id="filename-1" class="filename">อัพโหลดได้เฉพาะไฟล์ pdf</p>
                 </div>
            
                <div class="research-commit">
                    <button class="btn-submit">บันทึก</button>
                    <a class="btn-cancle" href="{{route('researchManage')}}">ยกเลิก</a>
                </div>
            </form>
        @else
        @php
            $flag = 0 ;
        @endphp
        @foreach ($researchs as $research)
            @if($flag == 0)
                <form class="researchManage-card"   method="POST" action="{{ route('postresearchManageAdd2') }}"  enctype="multipart/form-data">
                    @csrf
                        <h4>รหัสปริญญานิพนธ์</h4>
                        <input  name="research_id"  required type="text" class="txt-researchManage" value="{{ $research->research_id }}" readonly>
                        <h4>เกี่ยวกับปริญญานิพนธ์</h4>
                        <div class="rm-50">
                            <select  name="research_look"  required> 
                                <option value="{{ $research->research_look }}">{{ $research->research_look }}</option>
                                <option value="ปริญญานิพนธ์ใหม่">ปริญญานิพนธ์ใหม่</option>
                                <option value="พัฒนาปริญญานิพนธ์">พัฒนาปริญญานิพนธ์</option>
                            </select>
            
                            <select  name="research_type"  required>
                                <option value="{{ $research->research_type }}">{{ $research->research_type }}</option>
                                <option value="วงจรแปรผันทางไฟฟ้า">วงจรแปรผันทางไฟฟ้า</option>
                                <option value="การขับเคลื่อนทางไฟฟ้า">การขับเคลื่อนทางไฟฟ้า</option>
                                <option value="การควบคุมระบบอัตโนมัติ">การควบคุมระบบอัตโนมัติ</option>
                                <option value="เครื่องมือวัด">เครื่องมือวัด</option>
                                <option value="ระบบไฟฟ้ากำลัง">ระบบไฟฟ้ากำลัง</option>
                            </select>
                        </div>
                        <select  name="format"  required class="selDepartment">
                            <option value="{{ $research->format }}">{{ $research->format }}</option>
                            <option value="ออกแบบและจัดสร้าง">ออกแบบและจัดสร้าง</option>
                            <option value="พัฒนาโปรแกรม">พัฒนาโปรแกรม</option>
                            <option value="จำลองการทำงาน">จำลองการทำงาน</option>
                            <option value="สื่อการเรียนการสอน">สื่อการเรียนการสอน</option>
                        </select>
                        <input required  name="thai_name"  type="text" class="txt-researchManage" value="{{ $research->thai_name }}">
                        <input required  name="eng_name"  type="text" class="txt-researchManage" value="{{ $research->eng_name }}">
                        <div class="rm-50">
                            <select  name="year"  required>
                                <option value="{{ $research->year }}">{{ $research->year }}</option>
                                <option value="2567">2567</option>
                                <option value="2566">2566</option>
                                <option value="2565">2565</option>
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
            
                            <select name="term"  required>
                                <option value="{{ $research->term }}">{{ $research->term }}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <select  name="class"  required class="selDepartment">
                            <option value="{{ $research->class }}">{{ $research->class }}</option>
                            <option value="PnET (PE)-R">PnET (PE)-R</option>
                            <option value="PnET (PE)-2R">PnET (PE)-2R</option>
                            <option value="PnET (CT)-R">PnET (CT)-R</option>
                            <option value="PnET (CT)-2R">PnET (CT)-2R</option>
                            <option value="PNT-R">PNT-R</option>
                            <option value="PNT-T">PNT-T</option>
                        </select>
            
                       <!-- <h4>อาจารย์ที่ปรึกษา</h4> -->
                        <input  name="teacherid_one"  required type="hidden" class="txt-researchManage" value="{{ $research->teacherid_one }}" readonly>
                        <input  name="teacherid_two"  required type="hidden" class="txt-researchManage" value="{{ $research->teacherid_two }}" readonly>
                        <input  name="teacherid_three"  required type="hidden" class="txt-researchManage" value="{{ $research->teacherid_two }}" readonly>

               
            
            <!-- 
                        <div class="check-input">
                        <input  name="teachername_two"  type="text" class="txt-researchManage" placeholder="กรอกที่ปรึกษาร่วม">
                        <input type="text" class="txt-researchManage" placeholder="กรอกที่ปรึกษาร่วม"> 
                        </div>
                        <a onclick="advisor()" class="btn-add-advisor"><i class="fas fa-file-alt"></i>อื่น ๆ</a>
            -->
            
                        <h4>คณะผู้จัดทำ</h4>
                        <input  name="student_one"  required type="text" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 1" value="{{ $research->student_one }}">
                        <input  name="student_two"  type="text" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 2" value="{{ $research->student_two }}">
                        <input  name="student_three"  type="text" class="txt-researchManage" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 3" value="{{ $research->student_three }}">

                        <h4>ประเภทไฟล์</h4>
                        <select  name="file_type"  required class="selDepartment">
                            <option value="">--- เลือกประเภทไฟล์ ---</option>
                            <option value="หัวข้อปริญญานิพนธ์">หัวข้อปริญญานิพนธ์</option>
                            <option value="ก้าวหน้าปริญญานิพนธ์">ก้าวหน้าปริญญานิพนธ์</option>
                            <option value="ป้องกันปริญญานิพนธ์">ป้องกันปริญญานิพนธ์</option>
                            <option value="ปริญญานิพนธ์ฉบับสมบูรณ์">ปริญญานิพนธ์ฉบับสมบูรณ์</option>
                        </select>
            
                        <div class="admin-text3">
                            <label for="file-upload-1">อัพโหลดไฟล์
                               <input name="file_name" required type="file" id="file-upload-1" accept=".pdf" class="file-upload">
                            </label>
                            <p id="filename-1" class="filename">อัพโหลดได้เฉพาะไฟล์ pdf</p>
                         </div>
                    
                        <div class="research-commit">
                            <button class="btn-submit">บันทึก</button>
                            <a class="btn-cancle" href="{{route('researchManage')}}">ยกเลิก</a>
                        </div>
                    </form>
                    @php
                        $flag = 1 ;
                    @endphp
            @else

            @endif
            @endforeach
        @endif
        

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