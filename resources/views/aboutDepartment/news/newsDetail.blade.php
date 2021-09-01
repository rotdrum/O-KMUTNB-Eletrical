@extends('layouts.app')

@section('content')

@foreach ($news as $new)
<div class="vue-container">
    <div class="nd-image">
        <img src="{{asset('storage/')}}/../../storage/app/public/news/pic/{{ $new->pic }}">
    </div>
    <span class="title-news">{{ $new->title}} </span>
    <span class="title-date"><i class="far fa-clock"></i>{{ $new->created_at }}</span>
    <div class="hr-news"></div>
    <span class="title-news-content">{{ $new->comment }}</span>
    @if (empty($new->url))

    @else
        <a class="title-link" href="{{ $new->url }}" target="__blank">ลิงค์เอกสาร</a>
    @endif
    <a class="title-link" href="{{asset('storage/')}}/../../storage/app/public/news/file/{{ $new->file }}" target="__blank">{{ $new->filecomment }}</a>
</div>
@endforeach

       
    
@endsection