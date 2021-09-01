<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า') }}</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/png" sizes="16x16">

    {{-- Sweet alert 2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- JQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/imageSlideShow.js') }}"></script>
    <script src="{{ asset('js/navbarResponsive.js') }}"></script>
    <script src="{{ asset('js/imageUploadPreview.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- Styles CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Stlye slick --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

        {{-- Sweet Alert 2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</head>

<body>
    {{-- button back to top --}}
    <a class="back-to-top" href="#">
        <i class="fas fa-arrow-up"></i>
    </a>

    {{-- nav --}}
    <div class="nav">
        <div class="nav-container">
        <div class="nav-left">
            <a href="{{route('index')}}">
            <img src="{{asset('img/logo.png')}}">
            </a>
            <div class="nl-title">
            <h2><a href="{{route('index')}}">ภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า</a></h2>
            <h4><a href="{{route('index')}}">วิทยาลัยเทคโนโลยีอุตสาหกรรม</a></h4>
            </div>
        </div>
        <div class="nav-right">
            @if ( empty(Auth::user()->id) )           
                <a href="{{route('login')}}"><i class="fas fa-user"></i>เข้าสู่ระบบ</a>
                <a onclick="myFunction()" class="aj">บุคลากร</a>
            @else 
                <a href="{{route('editProfile')}}"><i class="fas fa-user"></i>{{ Auth::user()->tname }}{{ Auth::user()->fname }} {{ Auth::user()->lname }}</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="aj">ออกจากระบบ</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endif
        </div>
        </div>
    </div>

<div class="vue-container">
    <div class="card-login">
        <form class="register" method="POST" action="{{ route('postsetpassword') }}">
        @csrf
            <p style="text-align: center;">กำหนดรหัสผ่านใหม่</p>
            
            <input type="hidden" name="id" class="txt-login" readonly  value="{{ Auth::user()->id }}" >

            <input type="text" name="username" class="txt-login" readonly  value="บัญชีผู้ใช้ : {{ Auth::user()->username }}" >
          
            {{-- set password --}}
            <input type="password" name="password_a" class="txt-login" value="" required placeholder="กำหนดรหัสผ่านใหม่">
            {{-- set password Again --}}
            <input type="password" name="password_b" class="txt-login" value="" required placeholder="กำหนดรหัสผ่านใหม่อีกครั้ง">

            {{-- Button submit --}}
            <div class="btn-row-register">
                <input type="submit" value="บันทึก" class="btn btn-register">
                <a href="{{route('index')}}" class="btn btn-cancel">ยกเลิก</a>
            </div>

        </form>
    </div>
</div>
</body>
