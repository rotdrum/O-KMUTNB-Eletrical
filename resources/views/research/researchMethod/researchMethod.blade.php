@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ผังดำเนินงานสอบป้องกันและจัดทำเล่ม ปริญญานิพนธ์ฉบับสมบูรณ์</h1>
        </div>
        @foreach ($researchpics as $researchpic)

        <img class="img-structure" src="{{asset('storage/')}}/../../storage/app/public/researchpic/{{ $researchpic->pic }}">
        @endforeach
   
    </div>
@endsection