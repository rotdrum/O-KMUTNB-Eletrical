@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>วิดีโอเกี่ยวกับภาควิชา</h1>
        </div>

        <div class="video-container">
            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/YUXaOBneENU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/5k8jyL_CJMg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/MkA_0FdmKQ8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/jYKsn4SdUCQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/jYKsn4SdUCQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="video-card">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/jYKsn4SdUCQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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