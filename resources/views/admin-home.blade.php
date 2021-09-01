@extends('layouts.admin-app')

@section('content')

{{-- Slide Show --}}
<div class="slideContainer">
    <div class="slider">
        @foreach ($banners as $banner)
            <div class="slide active" id='s{{ $banner->id }}'><a href="{{ $banner->url }}" target="_blank"><img src="{{asset('storage/')}}/../../storage/app/public/banner/{{ $banner->file }}"></a></div>
        @endforeach

       
    </div>

    <div class="prev"><i class="fa fa-chevron-left fa-2x"></i></div>
    <div class="next"><i class="fa fa-chevron-right fa-2x"></i></div>

    <div class="bols">
        <span data-get="#s1" class="clicked"></span>
        <span data-get="#s2"></span>
        <span data-get="#s3"></span>
        <span data-get="#s4"></span>
        <span data-get="#s5"></span>
        <span data-get="#s6"></span>
    </div>
</div>

<span class="text-wh" style="font-weight: 600;">[w-1750] x [h-480] (.png, .jpg, .jpeg)</span>

<div class="admin-changeImage">

    <label >
        <a  onclick="banner1()">เปลี่ยนภาพที่ 1</a>
    </label>
    <label >
        <a  onclick="banner2()">เปลี่ยนภาพที่ 2</a>
    </label>
    <label >
        <a  onclick="banner3()">เปลี่ยนภาพที่ 3</a>
    </label>
    <label >
        <a  onclick="banner4()">เปลี่ยนภาพที่ 4</a>
    </label>
    <label >
        <a  onclick="banner5()">เปลี่ยนภาพที่ 5</a>
    </label>
    <label >
        <a  onclick="banner6()">เปลี่ยนภาพที่ 6</a>
    </label>
</div>

<!-- Container Body -->
<div class="main-container">
    <div class="card-news">
        <div class="card-container-admin">
            <div class="admin-addNews">
                <a href="{{route('news_Admin')}}" class="a-topic">ข่าวประชาสัมพันธ์</a>
                <div class="add-news">
                    <a href="{{route('news_Add')}}" class="btn-addNews"><i class="fas fa-plus-circle"></i>เพิ่มข่าว</a>
                    <a href="{{route('news_Temp')}}" class="btn-tempNews"><i class="fas fa-clipboard"></i>แบบร่าง</a>
                </div>
            </div>
            <hr>
            <!-- ROW -->
            <div class="news-row">
                @foreach ($news as $new)
                <div class="card-news-info">
                    <div class="card-news-top">
                    <img src="{{asset('storage/')}}/../../storage/app/public/news/pic/{{ $new->pic }}" alt="">
                    </div>
                    <div class="card-news-bottom">
                        <a href="{{route('news_Edit', ['id'=>$new->id])}}">{{ $new->title }}</a>
                        <span>
                            @php
                                echo strip_tags("$new->comment","<br>");
                            @endphp
                        </span>
                        <div class="admin-manageNews">
                            <a href="{{route('news_Edit', ['id'=>$new->id])}}" class="btn-editNews">แก้ไข</a>
                            <a href="{{route('deleteindexNews', ['id'=>$new->id])}}" class="btn-deleteNews">ลบ</a>
                        </div>
                    </div>
                </div>
                @endforeach

                

                
            </div> <!-- end row -->
        </div> <!-- card container -->
        <a href="{{route('news_Admin')}}" class="btn-readall">
            อ่านข่าวทั้งหมด    
        </a>  
    </div> <!-- card news -->

    <div class="information">
        <a class="card-info" href="http://acdserv.kmutnb.ac.th/academic-calendar" target="_blank">
            <i class="far fa-calendar-alt"></i>
            <p href="#">ปฏิทินการศึกษา</p>
        </a>
        <a class="card-info" href="http://klogic.kmutnb.ac.th:8080/kris/index.jsp" target="_blank">
            <i class="fab fa-leanpub"></i>
            <p href="#">ลงทะเบียนเรียน</p>
        </a>
        <a class="card-info" href="https://grade.icit.kmutnb.ac.th/" target="_blank">
            <i class="fas fa-chalkboard-teacher"></i>
            <p href="#">ประเมินอาจารย์</p>
        </a>
        <a class="card-info" href="http://cit.kmutnb.ac.th/examination/" target="_blank">
            <i class="fas fa-file-pdf"></i>
            <p href="#">คลังข้อสอบ</p>
        </a>
        <a class="card-info" href="https://cit.kmutnb.ac.th/main/%E0%B8%94%E0%B8%B2%E0%B8%A7%E0%B9%82%E0%B8%AB%E0%B8%A5%E0%B8%94" target="_blank">
            <i class="fas fa-file-word"></i>
            <p>ดาวน์โหลดเอกสาร</p>
        </a>
    </div>

</div> <!-- main container -->
<script>
    function banner1() {
        Swal.fire({
            icon: 'info',
            title: 'แก้ไขรูปภาพที่ 1',
            html: '<form method="POST" action="{{route("bannerpost")}}" enctype="multipart/form-data" >' +
                    '@csrf' +
                    '<input type="hidden" name="id" value="1">' +
                    '<label for="file-upload-1">อัพโหลดไฟล์ ' +
                    '<input type="file"  name="file" id="file-upload-1" class="file-upload" accept=".png, .jpg, .jpeg" >' +
                    '</label><br/>' +
                    'URL <input  type="text" name="url" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                    '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                  '</form>' ,
            showConfirmButton: false,
        })
    }

    function banner2() {
        Swal.fire({
            icon: 'info',
            title: 'แก้ไขรูปภาพที่ 2',
            html: '<form method="POST" action="{{route("bannerpost")}}" enctype="multipart/form-data" >' +
                    '@csrf' +
                    '<input type="hidden" name="id" value="2">' +
                    '<label for="file-upload-1">อัพโหลดไฟล์ ' +
                    '<input type="file"  name="file" id="file-upload-1" class="file-upload" accept=".png, .jpg, .jpeg" >' +
                    '</label><br/>' +
                    'URL <input  type="text" name="url" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                    '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                  '</form>' ,
            showConfirmButton: false,
        })
    }

    function banner3() {
        Swal.fire({
            icon: 'info',
            title: 'แก้ไขรูปภาพที่ 3',
            html: '<form method="POST" action="{{route("bannerpost")}}"  enctype="multipart/form-data">' +
                    '@csrf' +
                    '<input type="hidden" name="id" value="3">' +
                    '<label for="file-upload-1">อัพโหลดไฟล์ ' +
                    '<input type="file"  name="file" id="file-upload-1" class="file-upload" accept=".png, .jpg, .jpeg" >' +
                    '</label><br/>' +
                    'URL <input  type="text" name="url" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                    '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                  '</form>' ,
            showConfirmButton: false,
        })
    }

    function banner4() {
        Swal.fire({
            icon: 'info',
            title: 'แก้ไขรูปภาพที่ 4',
            html: '<form method="POST" action="{{route("bannerpost")}}" enctype="multipart/form-data" >' +
                    '@csrf' +
                    '<input type="hidden" name="id" value="4">' +
                    '<label for="file-upload-1">อัพโหลดไฟล์ ' +
                    '<input type="file"  name="file" id="file-upload-1" class="file-upload" accept=".png, .jpg, .jpeg" >' +
                    '</label><br/>' +
                    'URL <input  type="text" name="url" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                    '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                  '</form>' ,
            showConfirmButton: false,
        })
    }

    function banner5() {
        Swal.fire({
            icon: 'info',
            title: 'แก้ไขรูปภาพที่ 5',
            html: '<form method="POST" action="{{route("bannerpost")}}" enctype="multipart/form-data" >' +
                    '@csrf' +
                    '<input type="hidden" name="id" value="5">' +
                    '<label for="file-upload-1">อัพโหลดไฟล์ ' +
                    '<input type="file"  name="file" id="file-upload-1" class="file-upload" accept=".png, .jpg, .jpeg" >' +
                    '</label><br/>' +
                    'URL <input  type="text" name="url" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                    '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                  '</form>' ,
            showConfirmButton: false,
        })
    }

    function banner6() {
        Swal.fire({
            icon: 'info',
            title: 'แก้ไขรูปภาพที่ 6',
            html: '<form method="POST" action="{{route("bannerpost")}}"  enctype="multipart/form-data">' +
                    '@csrf' +
                    '<input type="hidden" name="id" value="6">' +
                    '<label for="file-upload-1">อัพโหลดไฟล์ ' +
                    '<input type="file"  name="file" id="file-upload-1" class="file-upload" accept=".png, .jpg, .jpeg" >' +
                    '</label><br/>' +
                    'URL <input  type="text" name="url" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                    '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                  '</form>' ,
            showConfirmButton: false,
        })
    }
</script>
@endsection
