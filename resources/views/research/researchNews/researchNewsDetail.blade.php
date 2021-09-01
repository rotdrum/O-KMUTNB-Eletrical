@extends('layouts.app')

@section('content')

@foreach ($researchs as $research)
    
    <div class="vue-container">
        <div class="nd-image">
            <img src="{{asset('storage/')}}/../../storage/app/public/research_news/pic/{{ $research->pic }}">
        </div>
        <span class="title-news">{{ $research->titile }}</span>
        <span class="title-date"><i class="far fa-clock"></i>{{ $research->created_at }}</span>
        <div class="hr-news"></div>
        <span class="title-news-content">{{ $research->comment }}</span>
        @if( $research->url == "" )

        @else
        <a class="title-link" href="{{ $research->url }}" target="__blank">ลิงค์ที่แนบมาด้วย</a>
        @endif
        @if( $research->file == "" )

        @else
        <a class="title-link" href="{{asset('storage/')}}/../../storage/app/public/research_news/file/{{ $research->file }}" target="__blank">ไฟล์ที่แนบมาด้วย</a>
        @endif
    </div>
       
@endforeach
    
@endsection