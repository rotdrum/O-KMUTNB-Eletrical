@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>สัญลักษณ์</h1>
        </div>

        <div class="symbol-row">
            @foreach ($emblems as $emblem)
            <div class="symbol-card">
                <img src="{{asset('storage/')}}/../../storage/app/public/emblem/{{ $emblem->pic }}">
                <h2>{{ $emblem->title }}</h2>
                <p>{{ $emblem->comment }}</p>
            </div>
            @endforeach
          

       
        </div>
    </div>
@endsection