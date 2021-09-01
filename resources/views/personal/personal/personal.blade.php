@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>บุคลากร</h1>
        </div>
        @foreach ($personalss as $personal)
               {{-- card-personal --}}
            <div class="card-personal">
            <div class="personal-img">
                <img src="{{asset('storage/')}}/../../storage/app/public/personal/pic/{{ $personal->pic_name }}" alt="">
            </div>
            <div class="personal-info">
                <h1>{{ $personal->name_thai }}</h1>
                <h3>{{ $personal->position }}</h3>
                @isset($username)
                @foreach ($personals as $personal)
                <a href="{{route('personalDetailPersonal', ['id'=>$personal->id, $username])}}">ดูรายละเอียด</a>

                @endforeach
                @else
                <a href="{{route('personalDetail', ['id'=>$personal->id])}}">ดูรายละเอียด</a>

                @endisset
            </div>
            </div>
        @endforeach
     

    </div>
@endsection