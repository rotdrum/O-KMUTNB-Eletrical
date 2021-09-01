@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>รอการอนุมัติปริญญานิพนธ์</h1>
        </div>

        <form class="article-container">
            <!--
            <div class="article-tools">
                <div class="article-search">
                    <input class="search" type="search" placeholder="ค้นหาปริญญานิพนธ์">
                    <i class="fas fa-search"></i>
                    <button>ค้นหา</button>
                </div>
                <div class="article-filter">
                    <select class="status">
                        <option value="">---สถานะ---</option>
                        <option value="">รอตรวจสอบ</option>
                        <option value="">ผ่านการเสนอหัวข้อฯ</option>
                        <option value="">ผ่านการสอบก้าวหน้า</option>
                        <option value="">ผ่านการสอบป้องกัน</option>
                        <option value="">ปริญญานิพนธ์เสร็จสมบูรณ์</option>
                        <option value="">ตกค้างปริญญานิพนธ์</option>
                        <option value="">ยกเลิกหัวข้อปริญญานิพนธ์</option>
                    </select>
                    <select class="edu-year">
                        <option value="">---ปีการศึกษา---</option>
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
                    <select class="adviser">
                        <option value="">---อาจารย์ที่ปรึกษาหลัก/ร่วม---</option>
                        <option value="">อาจารย์ที่ปรึกษาหลัก</option>
                        <option value="">อาจารย์ที่ปรึกษาร่วม</option>
                    </select>
                </div>
            </div>
        -->



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
                
            {{-- card row --}}
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
                <div class="td">
                    <p class="th-responsive">สถานะ</p>
                    <div class="th-status">
                        <span class="red"></span>
                        <div class="statusDetail">
                            <p class="red">รอการอนุมัติ</p>
                            <p class="red">({{$research->file_type}})</p>
                        </div>
                    </div>
                </div>
                <div class="td">
                    <p class="th-responsive">อัพเดทล่าสุด</p>
                    {{ $research->updated_at }}
                </div>
                <div class="td">
                    <p class="th-responsive">รายละเอียด</p>
                    <div class="more">
                        <a class="btn-approve" href="{{route('postresearchApprove', ['$id' => $research->id])}}">อนุมัติ</a>
                        <a class="btn-notApprove" href="{{route('researchFindDelete', ['id' => $research->id ] )}}">ไม่อนุมัติ</a>
                        <a class="btn-more" href="{{route('researchApproveDetail_Admin', ['$id' => $research->id])}}">เพิ่มเติม</a>
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