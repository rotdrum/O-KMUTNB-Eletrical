@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ข่าวสารงานวิจัย</h1>
        </div>

        <div class="news-container">

            @foreach ($researchs as $research)
                
            {{-- card-news --}}
            <div class="news-info">
                <div class="news-top">
                    <div class="news-detail-date">{{ $research->created_at }}</div>
                    <img src="{{asset('storage/')}}/../../storage/app/public/research_news/pic/{{ $research->pic }}">
                </div>

                @isset($username)
                @foreach ($personals as $personal)
                <div class="news-bottom">
                    <a href="{{route('researchNewsDetailPersonal', [ "id" => $research->id , $username ])}}">{{ $research->title }}</a>
                    <span>{{ $research->comment }}</span>
                    <a class="btn-readmore" href="{{route('researchNewsDetailPersonal', [ "id" => $research->id , $username  ])}}">อ่านต่อ</a>
                </div>
                @endforeach
                @else
                <div class="news-bottom">
                    <a href="{{route('researchNewsDetail', [ "id" => $research->id ])}}">{{ $research->title }}</a>
                    <span>{{ $research->comment }}</span>
                    <a class="btn-readmore" href="{{route('researchNewsDetail', [ "id" => $research->id ])}}">อ่านต่อ</a>
                </div>
                @endisset

       
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