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
          หลักสูตรวิศวกรรมศาสตรมหาบัณฑิต
        </div>


        <div class="industry-content">

          @foreach ($engineermasters as $engineermaster)
            <div class="accordion">
                <h4 class="accordion__title">
                  {{ $engineermaster->title }}
                  <i class="accordion__icon">
                    <div class="line-01"></div>
                    <div class="line-02"></div>
                  </i>
                </h4><!-- end .accordion__title -->
                <div class="accordion__content">
                  <p> {{ $engineermaster->comment }}</p>
               
                  @if($engineermaster->url == "")
                      
                  @else
                  <a href="{{ $engineermaster->url }}" target="_blank"><p>{{ $engineermaster->url }}</p></a>
                  @endif
    
                  @if($engineermaster->title_file == "")
                  
                  @else
                  <a href="{{asset('storage/')}}/../../storage/app/public/engineermaster/file/{{ $engineermaster->name_file }}" target="_blank"><p>{{ $engineermaster->title_file }}</p></a>
                  @endif
    
                    <div class="admin-manage">
                        <a href="{{route('engineer-master_Edit', ['id'=>$engineermaster->id])}}" class="btn-edit">แก้ไข</a>
                        <a href="{{route('postengineerMasterDelete', ['id'=>$engineermaster->id])}}" class="btn-delete">ลบ</a>
                    </div>
                </div><!-- end .accordion__content -->
              </div><!-- end .accordion 01 -->
          @endforeach
              


              <a class="industry-Add" href="{{route('engineer-master_Add')}}">
                <i class="fas fa-plus-circle"></i>
                เพิ่มข้อมูล
              </a>

        </div>
    </div>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="{{ asset('js/uploadFile.js') }}"></script>

    
@endsection