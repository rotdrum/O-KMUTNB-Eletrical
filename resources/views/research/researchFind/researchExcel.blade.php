@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ค้นหาปริญญานิพนธ์</h1>
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
                </div>
                <div class="td">
                    <p class="th-responsive">สถานะ</p>
                    <div class="th-status">
                        <span class="step1"></span>
                        <p class="step1">ผ่าน{{ $research->file_type }}</p>
                    </div>
                </div>
                <div class="td">
                    <p class="th-responsive">อัพเดทล่าสุด</p>
                    {{ $research->updated_at }}
                </div>
                <div class="td">
                    <p class="th-responsive">รายละเอียด</p>
                    <a class="btn-read" href="{{route('researchFindDetail', ['id' => $research->id ] )}}">เพิ่มเติม</a>
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