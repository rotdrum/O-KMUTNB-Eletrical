@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ค้นหาโครงการสหกิจ</h1>
        </div>

       

        @isset($username)
        @foreach ($personals as $personal)
        <form class="article-container" method="POST" action="{{ route('operationFindSearchPersonal', $username) }}" >
        @csrf
        <div class="article-tools">
            <div class="article-search">
                <input class="search" name="search" type="search" placeholder="ค้นหาสถานประกอบการ หรือ รหัสนักศึกษา">
                <i class="fas fa-search"></i>
                <button>ค้นหา</button>
            </div>
        </div>

        @endforeach
        @else
        <form class="article-container" method="POST" action="{{ route('operationFindSearch') }}" >
        @csrf
        <div class="article-tools">
            <div class="article-search">
                <input class="search" name="search" type="search" placeholder="ค้นหาสถานประกอบการ หรือ รหัสนักศึกษา">
                <i class="fas fa-search"></i>
                <button>ค้นหา</button>
            </div>
        </div>

        @endisset
     



            {{-- row card --}}
            <div class="trr">
                <div class="thh">ลำดับ</div>
                <div class="thh">สถานประกอบการ</div>
                <div class="thh">ระยะเวลาออกสหกิจ</div>
                <div class="thh">ชื่อนักศึกษา</div>
                <div class="thh">รายละเอียด</div>
            </div>
            @php
                $count = 1 ;
            @endphp
            @foreach ($operations as $operation)
            <div class="trr">
                <div class="tdd">
                    <p class="th-responsive">ลำดับ</p>
                    {{ $count }}
                </div>
                <div class="tdd">
                    <p class="th-responsive">สถานะประกอบ</p>
                    {{ $operation->address }}
                </div>
                <div class="tdd">
                    <p class="th-responsive">ระยะเวลาออกสหกิจ</p>
                    {{ $operation->date_start }} ถึง {{ $operation->date_end }}
                </div>
                <div class="tdd">
                    <p class="th-responsive">ชื่อนักศึกษา</p>
                    <p>{{ $operation->student_id }}</p>
                    <p>{{ $operation->student_name }}</p>
                </div>
                <div class="tdd">
                    <p class="th-responsive">รายละเอียด</p>
                    @isset($username)
                    @foreach ($personals as $personal)
                    <a class="btn-read" href="{{route('operationFindDetailPersonal', ['id'=>$operation->id, $username])}}">เพิ่มเติม</a>

                    @endforeach
                    @else
                    <a class="btn-read" href="{{route('operationFindDetail', ['id'=>$operation->id])}}">เพิ่มเติม</a>


                    @endisset
                </div>
            </div>
            @php
                $count = $count + 1 ;
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