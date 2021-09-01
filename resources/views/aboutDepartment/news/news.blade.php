@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ข่าวประชาสัมพันธ์</h1>
        </div>

        <div class="news-container">
            @foreach ($news as $new)
            {{-- card-news --}}
            <div class="news-info">
                <div class="news-top">
                    <div class="news-detail-date">{{ $new->created_at }}</div>
                    <img src="{{asset('storage/')}}/../../storage/app/public/news/pic/{{ $new->pic }}" alt="">
                </div>
                <div class="news-bottom">
                    @isset($username)
                    @foreach ($personals as $personal)
                    <a href="{{route('newsDetailPersonal', ['id'=>$new->id , $username])}}">{{ $new->title }}</a>
                    <span>{{ $new->comment }}</span>
                    <a class="btn-readmore" href="{{route('newsDetailPersonal', ['id'=>$new->id , $username])}}">อ่านต่อ</a>

                    @endforeach
                    @else
                    <a href="{{route('newsDetail', ['id'=>$new->id])}}">{{ $new->title }}</a>
                    <span>{{ $new->comment }}</span>
                    <a class="btn-readmore" href="{{route('newsDetail', ['id'=>$new->id])}}">อ่านต่อ</a>

                    @endisset

                  
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