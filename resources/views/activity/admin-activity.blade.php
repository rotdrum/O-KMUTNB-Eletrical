@extends('layouts.admin-app')

@section('content')


    <div class="vue-container">

        <div class="title-head">
            <h1>ประมวลภาพกิจกรรม</h1>
            <div class="manage-temp">
                <a href="{{route('activity_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มกิจกรรม</a>
                <a href="{{route('activity_Temp')}}" class="btn-addAboutDepartmentUser"><i class="fas fa-clipboard"></i>แบบร่าง</a>
            </div>
        </div>


        <div class="activity-image">
            <div id="activity-image-slick">

            @foreach ($activitys as $activity)
                {{-- Image card --}}
                <div class="activity-card">
                    <div class="activity-card-img">
                        <img src="{{asset('storage/')}}/../../storage/app/public/activity/pic/{{ $activity->pic }}">
                    </div>
                    <h4>{{ $activity->title }}</h4>
                    <button class="btn-edit" onclick="window.location.href='{{route('activity_Edit', ['id'=>$activity->id])}}'" class="btn-edit">แก้ไข</button>
                    <button class="btn-delete" onclick="window.location.href='{{route('activityIndexDelete', ['id'=>$activity->id])}}'" class="btn-delete">ลบ</button>
                </div>
            @endforeach

             
            </div>
        </div>







        <div class="title-head">
            <h1>วิดีโอ</h1>
            <a href="{{route('activityVideo_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มวิดีโอ</a>
        </div>

        <div class="activity-video">
            <div id="activity-video-slick">

                @foreach ($activityvideos as $activityvideo)
                {{-- video card --}}
                <div class="activity-card">
                    <div id="test"></div>

                    @php
                        $str =  $activityvideo->iframe ;
                        echo html_entity_decode($str);
                    @endphp
                      
                    <button class="btn-edit" onclick="window.location.href='{{route('activityVideo_Edit', [ 'id' => $activityvideo->id ])}}'" class="btn-edit">แก้ไข</button>
                    <button class="btn-delete" onclick="window.location.href='{{route('activityVideoDelete', [ 'id' => $activityvideo->id ])}}'" class="btn-delete">ลบ</button>
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