@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ประวัติความเป็นมา</h1>
        </div>

        <div class="timeline-body">

            @foreach ($storys as $story)
            {{-- timeline --}}
            <div class="timeline-item">
                <p class="time">{{ $story->year }}</p>
                <div class="timeline-content">
                    <h2 class="title">{{ $story->title }}</h2>
                    <p class="timeline">{{ $story->comment }}</p>
                </div>
            </div>
            @endforeach

            
        </div>
    </div>
@endsection