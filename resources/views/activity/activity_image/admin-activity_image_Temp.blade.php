@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แบบร่างกิจกรรมภาควิชา</h1>
            <a href="{{route('activity_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มกิจกรรม</a>
        </div>

        <div class="news-container">

            @foreach ($activitys as $activity)
            {{-- card-news --}}
            <div class="news-info">
                <div class="news-top">
                    <div class="news-detail-date">{{ $activity->created_at }}</div>
                    <img src="{{asset('storage/')}}/../../storage/app/public/activity/pic/{{ $activity->pic }}" alt="">
                </div>
                <div class="news-bottom">
                    <a href="#">{{ $activity->title }}</a>
                    <span>{{ $activity->comment }}</span>
                    <div class="admin-news">
                        <a class="btn-Post" href="{{route('activityUpdateStatus', ['id'=>$activity->id])}}">โพสต์</a>
                        <a class="btn-Edit" href="{{route('activity_Edit', ['id'=>$activity->id])}}">แก้ไข</a>
                        <a class="btn-Delete" href="{{route('activityTempDelete', ['id'=>$activity->id])}}">ลบ</a>
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