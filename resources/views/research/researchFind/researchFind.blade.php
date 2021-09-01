@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ค้นหาปริญญานิพนธ์</h1>
        </div>
        
        
        <div class="article-container" >
       
            <div class="article-tools">

                @isset($username)
                @foreach ($personals as $personal)

                @endforeach
                @else
                <form method="POST" action="{{ route('researchFindSearch') }}">
                    @csrf
                        <div class="article-search">
                            <input class="search" type="search" name="search" placeholder="ค้นหา ชื่อปริญญานิพนธ์ หรือ ชื่อนักศึกษา หรือ ปีการศึกษา">
                            <i class="fas fa-search"></i>
                            <button>
                                <i class="fas fa-search-plus"></i>
                                ค้นหา
                            </button>
                        </div>
                    </form>
    
                    <p class="article-p header2">คัดแยกปริญญานิพนธ์</p>
                    <form method="POST" action="{{ route('researchFindSearchSelect') }}">
                    @csrf
                        <div class="article-filter">
                        <select name="file_type" class="adviser" required>
                            <option value="">--สถานะปริญญานิพนธ์---</option>
                            <option value="หัวข้อปริญญานิพนธ์">ผ่านหัวข้อปริญญานิพนธ์</option>
                            <option value="ก้าวหน้าปริญญานิพนธ์">ผ่านก้าวหน้าปริญญานิพนธ์</option>
                            <option value="ป้องกันปริญญานิพนธ์">ผ่านป้องกันปริญญานิพนธ์</option>
                            <option value="ปริญญานิพนธ์ฉบับสมบูรณ์">ปริญญานิพนธ์ฉบับสมบูรณ์</option>
    
                        </select>
             
                        <select name="teacher" class="adviser" required>
                            <option value="">---อาจารย์ที่ปรึกษาหลัก/ร่วม---</option>
                            @foreach ($personalss as $personal)
                                <option value="{{ $personal->id }}">{{ $personal->name_thai }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-filter-search"><i class="fas fa-filter"></i> กรอง</button>
                    </div>
    
                </form>
                @endisset
            
        
            </div>




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
                $research_check_id = "";
            @endphp
            @foreach ($researchs as $research)
          
            @if($research_check_id ==  $research->research_id )
           
            @else
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
                    @php
                        

                    @endphp

                    @isset($username)
                    @foreach ($personals as $personal)
                    <a class="btn-read" href="{{route('researchFindDetailPersonal', ['id' => $research->id , $username ] )}}">เพิ่มเติม</a>

                    @endforeach
                    @else
                    <a class="btn-read" href="{{route('researchFindDetail', ['id' => $research->id ] )}}">เพิ่มเติม</a>

                    @endisset

                </div>
            </div>
            @endif
           
            @php
                $count = $count +  1; 
                $research_check_id =  $research->research_id  ;
            @endphp

            @endforeach


   

        </div>

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