@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ข่าวสารงานวิจัย</h1>
            <div class="manage-temp">
                <a href="{{route('researchNews_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มข่าว</a>
                <!--
                <a href="{{route('researchNews_Temp')}}" class="btn-addAboutDepartmentUser"><i class="fas fa-clipboard"></i>แบบร่าง</a>
                -->
            </div>
        </div>

        <div class="news-container">
            @foreach ($news as $new)
            {{-- card-news --}}
            <div class="news-info">
                <div class="news-top">
                    <div class="news-detail-date">{{ $new->created_at }}</div>
                    <img src="{{asset('storage/')}}/../../storage/app/public/research_news/pic/{{ $new->pic }}" alt="">
                </div>
                <div class="news-bottom">
                    <a href="#">{{ $new->title }}</a>
                    <span>{{ $new->comment }}</span>
                    <div class="admin-news">
                        <a class="btn-Edit" href="{{route('researchNews_Edit', ['id' => $new->id])}}" class="btn-edit">แก้ไข</a>
                        <a class="btn-Delete" href="{{route('postresearchMethodDelete', ['id' => $new->id])}}" class="btn-delete">ลบ</a>
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