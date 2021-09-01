@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>วิธีนำลิงค์ iframe URL จาก Youtube</h1>
        </div>
        
        <div class="idk-youtube">
            <h2>1.เลือกเมนู "แชร์" อยู่บริเวณด้านล่างคลิป</h2>
            <img src="{{asset('img/idk1.png')}}">
            <h2>2.เลือกเมนู "ฝัง"</h2>
            <img src="{{asset('img/idk2.png')}}">
            <h2>3.คัดลอก iframe ทั้งหมดนำมาใส่</h2>
            <img src="{{asset('img/idk3.png')}}">

        </div>
        <a class="btn-add-video" href="{{route('activityVideo_Add')}}">เพิ่มวิดีโอเกี่ยวกับภาควิชา</a>

    </div>   
@endsection