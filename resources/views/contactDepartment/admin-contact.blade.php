@extends('layouts.admin-app')

@section('content')
@foreach ($contacts as $contact)
<form class="vue-container" method="POST" action="{{ route('postcontactEdit') }}">
    @csrf
        <div class="title-head">
            <h1>แก้ไขติดต่อภาควิชา</h1>
        </div>


        <div class="contactFindDetail">
            <div class="contact-map">
                <div class="update-card">
                    <h2>แผนที่ภาควิชา</h2>
                    <input type="hidden" name="id" value="{{$contact->id}}"  >
                    <input type="text" name="url" class="txt-map" value="{{$contact->url}}" placeholder="URL Google map">
                    <h2 style="margin-top: 50px;">วิธีการนำเอาลิงค์ URL Google map</h2>
                    <h4>1.ค้นหาสถานที่ และเลือกเมนู "แชร์"</h4>
                    <div class="img-map">
                        <img src="{{asset('img/map1.png')}}">
                    </div>
                    <h4>2.เลือกเมนู "Embed a map"</h4>
                    <div class="img-map">
                        <img src="{{asset('img/map2.png')}}">
                    </div>
                    <h4>3.ทำการคลิกปุ่ม "Copy HTML"</h4>
                    <div class="img-map">
                        <img src="{{asset('img/map3.png')}}">
                    </div>
                </div>
            </div>

            <div class="contact-detail">
                {{-- card privacy --}}
                <div class="contact-card">
                    <h2>ติดต่อ</h2>
                    <div class="profile-detail">
                        <p>หน่วยงานที่ติดต่อ</p>
                        <input type="text" name="university" class="txt-info" value="{{$contact->university}}" placeholder="กรอกชื่อมหาลัยฯ">
                    </div>

                    <div class="profile-detail">
                        <p>ที่อยู่</p>
                        <input type="text" name="address" class="txt-info" value="{{$contact->address}}" placeholder="กรอกที่อยู่">
                    </div>

                    <div class="btn-commit">
                        <button class="btn-save">บันทึก</button>
                        <a href="{{ route('indexAdmin') }}" class="btn-cancle">ยกเลิก</a>
                    </div>
                </div>


                

            </div>
        </div>

    </form>
    @endforeach

@endsection