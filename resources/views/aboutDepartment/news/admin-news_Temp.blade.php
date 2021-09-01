@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แบบร่างข่าวประชาสัมพันธ์</h1>
            <a href="{{route('news_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มข่าว</a>
        </div>

        <div class="news-container">

            {{-- card-news --}}
            @foreach ($news as $new)
            <div class="news-info">
                <div class="news-top">
                    <div class="news-detail-date">{{ $new->created_at }}</div>
                    <img src="{{asset('storage/')}}/../../storage/app/public/news/pic/{{ $new->pic }}" alt="">
                </div>
                <div class="news-bottom">
                    <a  href="{{route('news_Edit', ['id'=>$new->id])}}">{{ $new->title }}</a>
                    <span>
                        @php
                            echo strip_tags("$new->comment","<br>");
                        @endphp
                    </span>
                    <div class="admin-news">
                        <a class="btn-Post" href="{{route('updatestatusNews', ['id'=>$new->id])}}">โพสต์</a>
                        <a class="btn-Edit" href="{{route('news_Edit', ['id'=>$new->id])}}">แก้ไข</a>
                        <a class="btn-Delete" href="{{route('deleteTempNews', ['id'=>$new->id])}}">ลบ</a>
                    </div>
                </div>
            </div>
            @endforeach

            
        </div>

    </div>
        {{-- end container --}}

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