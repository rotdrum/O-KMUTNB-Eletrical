@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ข่าวประชาสัมพันธ์</h1>
            <a href="{{route('activityImage_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มกิจกรรม</a>
        </div>

        <div class="news-container">

            {{-- card-news --}}
            <div class="news-info">
                <div class="news-top">
                    <div class="news-detail-date">18-03-2563</div>
                    <img src="{{asset('img/activity.jpg')}}" alt="">
                </div>
                <div class="news-bottom">
                    <a href="">ยีราฟเกมส์ ครั้งที่ 59</a>
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis tempora, voluptas minus inventore excepturi quos sunt. Exercitationem minus distinctio eos quisquam ab quas. Est provident ipsa qui doloribus quasi quis. Maxime possimus sint voluptate consequatur quod nam vero voluptates recusandae, dolore pariatur placeat repellendus fuga exercitationem sed? Quae impedit maiores accusantium esse, consequatur inventore excepturi, in provident, laborum consectetur ex velit rerum animi. Incidunt molestias, voluptatum perspiciatis molestiae aliquid iure soluta at in ducimus aliquam ipsam? Iure cupiditate incidunt sunt minus explicabo dolorem velit quo cum ducimus consequatur ratione beatae ipsa tempora dolor harum provident, autem dolores maxime eligendi perferendis!</span>
                    <div class="admin-news">
                        <a class="btn-Edit" href="{{route('activityImage_Edit')}}" class="btn-edit">แก้ไข</a>
                        <a class="btn-Delete" href="#" class="btn-delete">ลบ</a>
                    </div>
                </div>
            </div>
            

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