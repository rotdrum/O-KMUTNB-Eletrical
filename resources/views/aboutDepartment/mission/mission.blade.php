@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ข้อมูลเกี่ยวกับภาควิชา</h1>
        </div>

        @foreach ($abouts as $about)
        <div class="card-mission">
            <div class="mission-img">
                <img src="{{asset('storage/')}}/../../storage/app/public/about/{{ $about->pic }}" alt="">
            </div>
            <div class="mission-info">
                <h1>{{ $about->title }}</h1>
                <p>{{  $about->comment }}</p>
            </div>
        </div>
        @endforeach
     

    
    </div>
@endsection