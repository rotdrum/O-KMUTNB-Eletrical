@extends('layouts.app')

@section('content')
    <div class="industry-banner">
        <img src="{{asset('img/course1.jpg')}}">
    </div>

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
                </div><!-- end .accordion__content -->
              </div><!-- end .accordion 01 -->
              
            @endforeach

            

        </div>
    </div>
    <script src="{{ asset('js/accordion.js') }}"></script>
    
@endsection