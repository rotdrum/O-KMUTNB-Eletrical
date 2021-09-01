@extends('layouts.app')

@section('content')

{{-- Slide Show --}}
<div class="slideContainer">
    <div class="slider">
        @foreach ($banners as $banner)
            <div class="slide active" id='s{{ $banner->id }}'><a href="{{ $banner->url }}" target="_blank"><img src="{{asset('storage/')}}/../../storage/app/public/banner/{{ $banner->file }}"></a></div>
        @endforeach
     
    </div>

    <div class="prev"><i class="fa fa-chevron-left fa-2x"></i></div>
    <div class="next"><i class="fa fa-chevron-right fa-2x"></i></div>

    <div class="bols">
        <span data-get="#s1" class="clicked"></span>
        <span data-get="#s2"></span>
        <span data-get="#s3"></span>
        <span data-get="#s4"></span>
        <span data-get="#s5"></span>
        <span data-get="#s6"></span>
    </div>
</div>


<!-- Container Body -->
<div class="main-container">
    <div class="card-news">
        <div class="card-container">
            <a href="{{route('news')}}" class="a-topic">ข่าวประชาสัมพันธ์</a>
            <hr>
            <!-- ROW -->
        

            <div class="news-row">

            @foreach ($news as $new)
                <div class="card-news-info">
                    <div class="card-news-top">
                        <div class="news-date">{{ $new->created_at }}</div>
                        <img src="{{asset('storage/')}}/../../storage/app/public/news/pic/{{ $new->pic }}" alt="">
                    </div>
                    <div class="card-news-bottom">
                        <a href="{{route('newsDetail',['id'=>$new->id])}}">{{ $new->title }}</a>
                        <span>{{ $new->comment }}</span>
                        @isset($username)
                        @foreach ($personals as $personal)
                        <a class="btn-readmore" href="{{route('newsDetailPersonal',['id'=>$new->id , $username])}}">อ่านต่อ</a>
                        @endforeach
                        @else
                        <a class="btn-readmore" href="{{route('newsDetail',['id'=>$new->id])}}">อ่านต่อ</a>
                        @endisset
                    </div>
                </div>
            @endforeach

           
            </div> <!-- end row -->
        </div> <!-- card container -->
        @isset($username)
        @foreach ($personals as $personal)
        <a href="{{route('newsPersonal', $username )}}" class="btn-readall">
            อ่านข่าวทั้งหมด    
        </a>  
        @endforeach
        @else
        <a href="{{route('news')}}" class="btn-readall">
            อ่านข่าวทั้งหมด    
        </a>  
        @endisset

    </div> <!-- card news -->

    <div class="information">
        <a class="card-info" href="http://acdserv.kmutnb.ac.th/academic-calendar" target="_blank">
            <i class="far fa-calendar-alt"></i>
            <p href="#">ปฏิทินการศึกษา</p>
        </a>
        <a class="card-info" href="http://klogic.kmutnb.ac.th:8080/kris/index.jsp" target="_blank">
            <i class="fab fa-leanpub"></i>
            <p href="#">ลงทะเบียนเรียน</p>
        </a>
        <a class="card-info" href="https://grade.icit.kmutnb.ac.th/" target="_blank">
            <i class="fas fa-chalkboard-teacher"></i>
            <p href="#">ประเมินอาจารย์</p>
        </a>

        <a class="card-info" href="http://cit.kmutnb.ac.th/examination/" target="_blank">
            <i class="fas fa-file-pdf"></i>
            <p href="#">คลังข้อสอบ</p>
        </a>
        <a class="card-info" href="https://cit.kmutnb.ac.th/main/%E0%B8%94%E0%B8%B2%E0%B8%A7%E0%B9%82%E0%B8%AB%E0%B8%A5%E0%B8%94" target="_blank">
            <i class="fas fa-file-word"></i>
            <p>ดาวน์โหลดเอกสาร</p>
        </a>
    </div>

</div> <!-- main container -->


    

@endsection
