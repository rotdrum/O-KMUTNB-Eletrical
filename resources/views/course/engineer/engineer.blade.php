@extends('layouts.app')

@section('content')
    <div class="industry-banner">
        <img src="{{asset('img/course1.jpg')}}">
    </div>

    <div class="industry-container">
        <div class="industry-title">
            หลักสูตรวิศวกรรมศาสตรบัณฑิต
        </div>


        <div class="industry-content">

          @foreach ($engineers as $engineer)

            <div class="accordion">
                <h4 class="accordion__title">
                  {{ $engineer->title }}
                  <i class="accordion__icon">
                    <div class="line-01"></div>
                    <div class="line-02"></div>
                  </i>
                </h4><!-- end .accordion__title -->
                <div class="accordion__content">
                  <p> {{ $engineer->comment }}</p>
               
                  @if($engineer->url == "")
                      
                  @else
                  <a href="{{ $engineer->url }}" target="_blank"><p>{{ $engineer->url }}</p></a>
                  @endif
    
                  @if($engineer->title_file == "")
                  
                  @else
                  <a href="{{asset('storage/')}}/../../storage/app/public/engineer/file/{{ $engineer->name_file }}" target="_blank"><p>{{ $engineer->title_file }}</p></a>
                  @endif
                </div><!-- end .accordion__content -->
              </div><!-- end .accordion 01 -->
            
          @endforeach

            

        </div>
    </div>
    <script src="{{ asset('js/accordion.js') }}"></script>
    
@endsection