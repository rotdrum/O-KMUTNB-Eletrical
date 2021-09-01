@extends('layouts.app')

@section('content')
@foreach ($activitys as $activity)
    <div class="vue-container">
        <div class="nd-image">
            <img src="{{asset('storage/')}}/../../storage/app/public/activity/pic/{{ $activity->pic }}">
        </div>
        <span class="title-news">{{ $activity->title }}</span>
        <span class="title-date"><i class="far fa-clock"></i>20/03/2563</span>
        <div class="hr-news"></div>
        <span class="title-news-content">{{ $activity->comment }}</span>
        @if( $activity->file == "")

        @elseif ( $activity->filecomment == "" )
            <a class="title-link" href="{{asset('storage/')}}/../../storage/app/public/activity/file/{{ $activity->file }}" target="__blank">สิ่งที่แนบมาด้วย</a>
        @else
            <a class="title-link" href="{{asset('storage/')}}/../../storage/app/public/activity/file/{{ $activity->file }}" target="__blank">{{ $activity->filecomment }}</a>
        @endif

        <a class="title-link" href="{{ $activity->url }}" target="__blank">{{ $activity->url }}</a>
    </div>
@endforeach
    
@endsection