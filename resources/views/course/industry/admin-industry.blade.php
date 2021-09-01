@extends('layouts.admin-app')

@section('content')


    <form class="industry-banner">
        <img src="{{asset('img/course1.jpg')}}">
        <!--
        <div class="admin-text3">
          <label for="file-upload-1">อัพโหลดไฟล์
              <input type="file" id="file-upload-1" class="file-upload">
          </label>
          <p id="filename-1" class="filename">ชื่อไฟล์.สกุล</p>
          <input type="submit" class="btn-submit" value="บันทึก">
        </div>
      -->
    </form>

    <div class="industry-container">
        <div class="industry-title">
            หลักสูตรอุตสาหกรรมศาสตรบัณฑิต
        </div>


        <div class="industry-content">

          @foreach ($industrys as $industry)
            <div class="accordion">
              <h4 class="accordion__title">
                {{ $industry->title }}
                <i class="accordion__icon">
                  <div class="line-01"></div>
                  <div class="line-02"></div>
                </i>
              </h4><!-- end .accordion__title -->
              <div class="accordion__content">
                  <p> {{ $industry->comment }}</p>

                  @if($industry->url == "")
                  
                  @else
                  <a href="{{ $industry->url }}" target="_blank"><p>{{ $industry->url }}</p></a>
                  @endif

                  @if($industry->title_file == "")
                  
                  @else
                  <a href="{{asset('storage/')}}/../../storage/app/public/industry/file/{{ $industry->name_file }}" target="_blank"><p>{{ $industry->title_file }}</p></a>
                  @endif

                  <div class="admin-manage">
                      <a href="{{route('industry_Edit', ['id'=>$industry->id])}}" class="btn-edit">แก้ไข</a>
                      <a href="{{route('postindustryDelete', ['id'=>$industry->id])}}" class="btn-delete">ลบ</a>
                  </div>
              </div><!-- end .accordion__content -->
            </div><!-- end .accordion 01 -->
          @endforeach
         

            
           

              <a class="industry-Add" href="{{route('industry_Add')}}">
                <i class="fas fa-plus-circle"></i>
                เพิ่มข้อมูล
              </a>

        </div>
    </div>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="{{ asset('js/uploadFile.js') }}"></script>

    
@endsection