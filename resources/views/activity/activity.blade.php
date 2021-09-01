@extends('layouts.app')

@section('content')


    <div class="vue-container">
        <div class="title-head">
            <h1>ประมวลภาพกิจกรรม</h1>
        </div>

        <div class="activity-image">
            <div id="activity-image-slick">

                @foreach ($activitys as $activity)

                @isset($username)
                @foreach ($personals as $personal)
                <a class="activity-card" href="{{route('activityImageDetailPersonal', ['id'=>$activity->id, $username])}}" target="__blank">
                    <div class="activity-card-img">
                        <img src="{{asset('storage/')}}/../../storage/app/public/activity/pic/{{ $activity->pic }}">
                    </div>
                    <h4>{{ $activity->title }}</h4>
                </a>
                @endforeach
                @else
                <a class="activity-card" href="{{route('activityImageDetail', ['id'=>$activity->id])}}" target="__blank">
                    <div class="activity-card-img">
                        <img src="{{asset('storage/')}}/../../storage/app/public/activity/pic/{{ $activity->pic }}">
                    </div>
                    <h4>{{ $activity->title }}</h4>
                </a>
                @endisset


   
                @endforeach

            </div>
        </div>

        <div class="title-head">
            <h1>วิดีโอ</h1>
        </div>

        <div class="activity-video">
            <div id="activity-video-slick">
                
                @foreach ($activityvideos as $activityvideo)
                <div class="activity-card"> 
                @php
                    $str =  $activityvideo->iframe ;
                    echo html_entity_decode($str);
                @endphp
                </div>
                @endforeach
            
            </div>
        </div>

       

        
    </div>

    {{-- Slick --}}
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $('#activity-image-slick').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 3,
        prevArrow: false,
        nextArrow: false,
        responsive: [
            {
            breakpoint: 700,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
        });

        $('#activity-video-slick').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 3,
        prevArrow: false,
        nextArrow: false,
        responsive: [
            {
            breakpoint: 700,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
        });
    </script>
    
@endsection