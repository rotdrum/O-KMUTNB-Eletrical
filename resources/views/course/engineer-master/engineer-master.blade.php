@extends('layouts.app')

@section('content')
    <div class="industry-banner">
        <img src="{{asset('img/course1.jpg')}}">
    </div>

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
    
                </div><!-- end .accordion__content -->
              </div><!-- end .accordion 01 -->
          @endforeach
              
           
        </div>
    </div>
    <script src="{{ asset('js/accordion.js') }}"></script>
    
@endsection