@extends('layouts.app')

@section('content')
@foreach ($contacts as $contact)
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขติดต่อภาควิชา</h1>
        </div>

        {{-- container content --}}
        <div class="contactFindDetail">
            <div class="contact-map">
                @php
                $str =  $contact->url ;
                echo html_entity_decode($str);
                @endphp
            </div>

            <div class="contact-detail">

                {{-- card privacy --}}
                <div class="contact-card">
                    <h2>ติดต่อ</h2>
                    <div class="profile-detail">
                        <p>หน่วยงานที่ติดต่อ</p>
                        <p>
                            @php
                            $str =  $contact->university ;
                            echo html_entity_decode($str);
                            @endphp
                        </p>
                    </div>

             
                    <div class="profile-detail">
                        <p>ที่อยู่ภาควิชา</p>
                        <p>
                            @php
                            $str =  $contact->address ;
                            echo html_entity_decode($str);
                            @endphp
                        </p>
                    </div>
                </div>

                {{-- card contact --}}
                <form class="contact-card">
                    <h2>ส่งข้อความถึงเรา</h2>
                    <div class="profile-detail">
                        <p>ชื่อ-สกุล</p>
                        @if ( empty(Auth::user()->id) )           
                            <input type="text" class="txt-info" placeholder="กรอกชื่อ">
                        @else 
                            <input type="text" class="txt-info" placeholder="กรอกชื่อ" value="{{ Auth::user()->tname }}{{ Auth::user()->fname }} {{ Auth::user()->lname }}"> 
                        @endif
                    </div>

                    <div class="profile-detail">
                        <p>อีเมล</p>
                        @if ( empty(Auth::user()->id) )           
                            <input type="text" class="txt-info" placeholder="กรอกอีเมล">
                        @else 
                            <input type="text" class="txt-info" placeholder="กรอกอีเมล" value="{{ Auth::user()->email }}">
                        @endif
                    </div>

                    <div class="profile-detail">
                        <p>หัวข้อที่ติดต่อ</p>
                        <input type="text" class="txt-info" placeholder="กรอกหัวข้อ">
                    </div>

                    <div class="profile-detail">
                        <p>รายละเอียด</p>
                        <textarea type="text" class="txt-info" placeholder="กรอกรายละเอียด"></textarea>
                    </div>

                    <button class="btn-send">ส่งข้อความ</button>
                </form>

            </div>
        </div> {{--end container content --}}


    </div> {{--end vue container --}}
@endforeach
@endsection