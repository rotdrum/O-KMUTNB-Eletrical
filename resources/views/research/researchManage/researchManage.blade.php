@extends('layouts.app')

@section('content')
    <div class="vue-container">
<!--

        <div class="title-head">
            <h1>เพิ่มปริญญานิพนธ์</h1>
        </div>

        <form class="researchManage-card" style="margin-bottom: 50px;">
            <input type="text" class="txt-researchManage" value="รหัสปริญญานิพนธ์ : 12345" readonly>
            
            <h4>เกี่ยวกับปริญญานิพนธ์</h4>
            <div class="rm-50">
                <select>
                    <option value="">--- เลือกลักษณะปริญญานิพนธ์---</option>
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
                <a class="btn-cancle" href="{{route('researchManage')}}">ยกเลิก</a>
            </div>
        </form>


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
        <script src="{{asset('js/uploadFile.js')}}"></script>

    -->























        <div class="title-head">
            <h1>จัดการปริญญานิพนธ์</h1>
            <a href="{{route('researchManage_UserAdd')}}" class="btn-addAboutDepartmentUser"><i class="fas fa-plus-circle"></i>เพิ่มปริญญานิพนธ์</a>
        </div>

        <form class="article-container">
            <div class="tr">
                <div class="th">ลำดับ</div>
                <div class="th">รหัส ปพ.</div>
                <div class="th">ปีการศึกษา</div>
                <div class="th">ชื่อปริญญานิพนธ์</div>
                <div class="th">นักศึกษา</div>
                <div class="th">สถานะ</div>
                <div class="th">อัพเดทล่าสุด</div>
                <div class="th">รายละเอียด</div>
            </div>

            @php
                $count = 1; 
            @endphp
            @foreach ($researchs as $research)
                
            <div class="tr">
                <div class="td">
                    <p class="th-responsive">ลำดับ</p>
                    {{ $count }}
                </div>
                <div class="td">
                    <p class="th-responsive">รหัส ปพ.</p>
                    {{ $research->research_id }}
                </div>
                <div class="td">
                    <p class="th-responsive">ปีการศึกษา</p>
                    {{ $research->year }}
                </div>
                <div class="td">
                    <p class="th-responsive">ชื่อปริญญานิพนธ์</p>
                    {{ $research->thai_name }}
                </div>
                <div class="td">
                    <p class="th-responsive">นักศึกษา</p>
                    <p>{{ $research->student_one }}</p>
                    <p>{{ $research->student_two }}</p>
                    <p>{{ $research->student_three }}</p>
                </div>

                @if( $research->status == 1 )
                <div class="td">
                    <p class="th-responsive">สถานะ</p>
                    <div class="th-status">
                        <span class="red"></span>
                        <div class="statusDetail">
                            <p class="red">รอการอนุมัติ</p>
                            <p class="red">({{ $research->file_type }})</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="td">
                    <p class="th-responsive">สถานะ</p>
                    <div class="th-status">
                        <span class="green"></span>
                        <div class="statusDetail">
                            <p class="green">อนุมัติแล้ว</p>
                            <p class="green">({{ $research->file_type }})</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="td">
                    <p class="th-responsive">อัพเดทล่าสุด</p>
                     {{ $research->created_at }}
                </div>
                <div class="td">
                    <p class="th-responsive">รายละเอียด</p>
                    <div class="more">
                        <a class="btn-edit" href="{{asset('storage/')}}/../../storage/app/public/research/{{ $research->file_name }}">ดูรายละเอียด</a>
                        <!--
                        <a class="btn-edit" href="{{route('researchManage_UserEdit', ['id' => $research->id ])}}">ดูรายละเอียด</a>
                        -->
                        {{-- <a class="btn-delete" href="#">ลบ</a> --}}
                    </div>
                </div>
            </div>
            @php
            $count = $count +  1; 
        @endphp
            @endforeach




        </form>

    </div>

    <section class="pagesNav">
        <div class="pagination-section">
            <ul class="pagination first">
                <li><a href="#"><i class="fas fa-chevron-left"></i></a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
            </div>
    </section>

    <script src="{{ asset('js/pagesNavigation.js') }}"></script>

    
@endsection