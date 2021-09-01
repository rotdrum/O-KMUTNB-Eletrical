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

        @if ( empty(Auth::user()->id) )    
            @isset($username)
            @foreach ($personals as $personal)
            <div class="nav-left">
                <a href="{{route('indexPersonal', $username)}}">
                <img src="{{asset('img/logo.png')}}">
                </a>
                <div class="nl-title">
                <h2><a href="{{route('indexPersonal', $username)}}">ภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า</a></h2>
                <h4><a href="{{route('indexPersonal', $username)}}">วิทยาลัยเทคโนโลยีอุตสาหกรรม</a></h4>
                </div>
            </div>
            @endforeach
            @else
            <div class="nav-left">
                <a href="{{route('index')}}">
                <img src="{{asset('img/logo.png')}}">
                </a>
                <div class="nl-title">
                <h2><a href="{{route('index')}}">ภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า</a></h2>
                <h4><a href="{{route('index')}}">วิทยาลัยเทคโนโลยีอุตสาหกรรม</a></h4>
                </div>
            </div>
            @endisset

        @else
        <div class="nav-left">
            <a href="{{route('index')}}">
            <img src="{{asset('img/logo.png')}}">
            </a>
            <div class="nl-title">
            <h2><a href="{{route('index')}}">ภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า</a></h2>
            <h4><a href="{{route('index')}}">วิทยาลัยเทคโนโลยีอุตสาหกรรม</a></h4>
            </div>
        </div>
        @endif

        <div class="nav-right">
        
            @if ( empty(Auth::user()->id) )    
                @isset($username)
                @foreach ($personals as $personal)
                <a href="#"><i class="fas fa-user"></i>{{$personal->name_thai}}</a>
                <a href="{{route('index')}}" class="aj">ออกจากระบบ</a>
                @endforeach
                @else
                <a href="{{route('login')}}"><i class="fas fa-user"></i>เข้าสู่ระบบ</a>
                <a onclick="myFunction()" class="aj">บุคลากร</a>
                @endisset
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

    {{-- nav-menu --}}
    <div class="nav-menu">
        <div class="nm-container">
            <ul class="menu">
                @if ( empty(Auth::user()->id) )     
                    @isset($username)
                    @foreach ($personals as $personal)
                    <li ><a href="{{route('indexPersonal', $username)}}"><i class="fas fa-home"></i>หน้าแรก</a></li>
                    @endforeach
                    @else
                    <li ><a href="{{route('index')}}"><i class="fas fa-home"></i>หน้าแรก</a></li>
                    @endisset
                    
                    <li><a href="#"><i class="fas fa-info-circle"></i>เกี่ยวกับภาควิชา</a>
                        <ul class="menu-sub">
                            @isset($username)
                            @foreach ($personals as $personal)
                            <li><a href="{{route('aboutDepartmentPersonal', $username)}}">ประวัติความเป็นมา</a></li>
                            <li><a href="{{route('missionPersonal', $username)}}">พันธกิจ/วิสัยทัศน์/อัตลักษณ์</a></li>
                            <li><a href="{{route('symbolPersonal', $username)}}">สัญลักษณ์</a></li>
                            <li><a href="{{route('structurePersonal', $username)}}">โครงสร้างองค์กร</a></li>
                            
                            @endforeach
                            @else
                            <li><a href="{{route('aboutDepartment')}}">ประวัติความเป็นมา</a></li>
                            <li><a href="{{route('mission')}}">พันธกิจ/วิสัยทัศน์/อัตลักษณ์</a></li>
                            <li><a href="{{route('symbol')}}">สัญลักษณ์</a></li>
                            <li><a href="{{route('structure')}}">โครงสร้างองค์กร</a></li>
                            
                            @endisset
                        </ul>
                    </li>

                    @isset($username)
                    @foreach ($personals as $personal)
                    <li><a href="{{route('activityPersonal', $username)}}"><i class="fas fa-book"></i>กิจกรรมภาควิชา</a></li>
                    <li><a href="{{route('personalPersonal', $username)}}"><i class="fas fa-users"></i>บุคลากร</a></li>
                    
                    @endforeach
                    @else
                    <li><a href="{{route('activity')}}"><i class="fas fa-book"></i>กิจกรรมภาควิชา</a></li>
                    <li><a href="{{route('personal')}}"><i class="fas fa-users"></i>บุคลากร</a></li>
                    
                    @endisset


                    <li><a href="#"><i class="fas fa-address-book"></i>หลักสูตร</a>
                        <ul class="menu-sub">

                            @isset($username)
                            @foreach ($personals as $personal)
                            <li><a href="{{route('industryPersonal', $username)}}">อุตสาหกรรมศาสตรบัณฑิต </a></li>
                            <li><a href="{{route('engineerPersonal', $username)}}">วิศวกรรมศาสตรบัณฑิต</a></li>
                            <li><a href="{{route('engineermasterPersonal', $username)}}">วิศวกรรมศาสตรมหาบัณฑิต</a></li>
        
                            @endforeach
                            @else
                            <li><a href="{{route('industry')}}">อุตสาหกรรมศาสตรบัณฑิต </a></li>
                            <li><a href="{{route('engineer')}}">วิศวกรรมศาสตรบัณฑิต</a></li>
                            <li><a href="{{route('engineer-master')}}">วิศวกรรมศาสตรมหาบัณฑิต</a></li>
        
                            @endisset
                        </ul></li>
                    <li><a href="#"><i class="fas fa-bookmark"></i>ปริญญานิพนธ์</a>
                        <ul class="menu-sub">
                            @isset($username)
                            @foreach ($personals as $personal)
                            <li><a href="{{route('researchNewsPersonal', $username)}}">ข่าวสารปริญญานิพนธ์</a></li>
                            <li><a href="{{route('researchMethodPersonal', $username)}}">ขั้นตอนการจัดทำปริญญานิพนธ์</a></li>
                            <li><a href="{{route('researchFindPersonal', $username)}}">ค้นหาปริญญานิพนธ์</a></li>

                            @endforeach
                            @else
                            <li><a href="{{route('researchNews')}}">ข่าวสารปริญญานิพนธ์</a></li>
                            <li><a href="{{route('researchMethod')}}">ขั้นตอนการจัดทำปริญญานิพนธ์</a></li>
                            <li><a href="{{route('researchFind')}}">ค้นหาปริญญานิพนธ์</a></li>

                            @endisset



                        </ul></li>
                    <li><a href="#"><i class="fas fa-award"></i>สหกิจศึกษา</a>
                        <ul class="menu-sub">
                            @isset($username)
                            @foreach ($personals as $personal)
                            <li><a href="{{route('operationMethodPersonal', $username)}}">ขั้นตอนการดำเนินการ</a></li>
                            <li><a href="{{route('operationFindPersonal', $username)}}">ค้นหาโครงการสหกิจ</a></li>
                            @endforeach
                            @else
                            <li><a href="{{route('operationMethod')}}">ขั้นตอนการดำเนินการ</a></li>
                            <li><a href="{{route('operationFind')}}">ค้นหาโครงการสหกิจ</a></li>
                            @endisset
                        
                        </ul></li>
                    <li><a href="#"><i class="fas fa-briefcase"></i>ระบบครุภัณฑ์</a></li>
                    @isset($username)
                    @foreach ($personals as $personal)
                    <li><a href="{{route('contactPersonal', $username)}}"><i class="fas fa-phone-alt"></i>ติดต่อ</a></li>

                    @endforeach
                    @else
                    <li><a href="{{route('contact')}}"><i class="fas fa-phone-alt"></i>ติดต่อ</a></li>

                    @endisset
                @else 
                    <li><a href="{{route('index')}}"><i class="fas fa-home"></i>หน้าแรก</a></li>
                    <li><a href="#"><i class="fas fa-info-circle"></i>เกี่ยวกับภาควิชา</a>
                        <ul class="menu-sub">
                            <li><a href="{{route('aboutDepartment')}}">ประวัติความเป็นมา</a></li>
                            <li><a href="{{route('mission')}}">พันธกิจ/วิสัยทัศน์/อัตลักษณ์</a></li>
                            <li><a href="{{route('symbol')}}">สัญลักษณ์</a></li>
                            <li><a href="{{route('structure')}}">โครงสร้างองค์กร</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('activity')}}"><i class="fas fa-book"></i>กิจกรรมภาควิชา</a></li>
                        {{-- <ul class="menu-sub">
                            <li><a href="{{route('activityImage')}}">กิจกรรม/รูปภาพ</a></li>
                            <li><a href="{{route('activityVideo')}}">วิดีโอเกี่ยวกับภาควิชา</a></li>
                        </ul></li> --}}
                    <li><a href="{{route('personal')}}"><i class="fas fa-users"></i>บุคลากร</a></li>
                    <li><a href="#"><i class="fas fa-address-book"></i>หลักสูตร</a>
                        <ul class="menu-sub">
                            <li><a href="{{route('industry')}}">อุตสาหกรรมศาสตรบัณฑิต </a></li>
                            <li><a href="{{route('engineer')}}">วิศวกรรมศาสตรบัณฑิต</a></li>
                            <li><a href="{{route('engineer-master')}}">วิศวกรรมศาสตรมหาบัณฑิต</a></li>
                        </ul></li>
                    <li><a href="#"><i class="fas fa-bookmark"></i>ปริญญานิพนธ์</a>
                        <ul class="menu-sub">
                            <li><a href="{{route('researchNews')}}">ข่าวสารปริญญานิพนธ์</a></li>
                            <li><a href="{{route('researchMethod')}}">ขั้นตอนการจัดทำปริญญานิพนธ์</a></li>
                            <li><a href="{{route('researchFind')}}">ค้นหาปริญญานิพนธ์</a></li>
                            <li><a href="{{route('researchManage')}}">จัดการข้อมูลปริญญานิพนธ์</a></li>
                        </ul></li>
                    <li><a href="#"><i class="fas fa-award"></i>สหกิจศึกษา</a>
                        <ul class="menu-sub">
                            <li><a href="{{route('operationMethod')}}">ขั้นตอนการดำเนินการ</a></li>
                            <li><a href="{{route('operationFind')}}">ค้นหาโครงการสหกิจ</a></li>
                            <li><a href="{{route('operationManage')}}">จัดการข้อมูลสหกิจศึกษา</a></li>
                            <li><a href="{{route('operationUpload')}}">อัพโหลดไฟล์สหกิจศึกษา</a></li>
                        </ul></li>
                    <li><a href="#"><i class="fas fa-briefcase"></i>ระบบครุภัณฑ์</a></li>
                    <li><a href="{{route('contact')}}"><i class="fas fa-phone-alt"></i>ติดต่อ</a></li>

             
                @endif
            </ul>
        </div>
    </div>
    








    {{-- Navbar Responsive --}}
    <div class="navbarResponsive">
        <div class="nbr-left">
            <img src="{{asset('img/logo.png')}}" alt="">
            <div class="nbr-title">
                <p>ภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า</p>
                <p>วิทยาลัยเทคโนโลยีอุตสาหกรรม</p>
            </div>
        </div>
        <div class="nbr-right">
            <div class="nav-btn">
                <label for="nav-check">
                  <span></span>
                  <span></span>
                  <span></span>
                </label>
            </div>
        </div>
    </div>


    {{-- menu before click hamberger --}}
    <div class="nbr-link">
   
        @if ( empty(Auth::user()->id) )    
        @isset($username)
        @foreach ($personals as $personal)

        <li>
            <a  class="link-main" ><i class="fas fa-sign-in-alt"></i>{{$personal->name_thai}}</a>
            <a  class="link-main" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fas fa-sign-in-alt"></i>ออกจากระบบ</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            <div id="link-sub-1" class="link-sub">
                
            </div>
        </li>
        @endforeach
        @else
        <li>
            <a id="link-1" class="link-main"><i class="fas fa-sign-in-alt"></i>เข้าสู่ระบบ</a>
            <div id="link-sub-1" class="link-sub">
                <a href="{{ route('login') }}">นักศึกษา</a>
                <a onclick="myFunction()" >บุคลากร</a>
                <a href="{{ route('register') }}">ลงทะเบียน</a>
            </div>
        </li>
        @endisset
    @else 
    <li>
        <a  class="link-main" href="{{route('editProfile')}}"><i class="fas fa-sign-in-alt"></i>{{ Auth::user()->tname }}{{ Auth::user()->fname }} {{ Auth::user()->lname }}</a>
        <a  class="link-main" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fas fa-sign-in-alt"></i>ออกจากระบบ</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        <div id="link-sub-1" class="link-sub">
            
        </div>
    </li>
    @endif



    

        @if ( empty(Auth::user()->id) )       

        @isset($username)
        @foreach ($personals as $personal)
        <li>
            <a id="link-2" class="link-main" href="{{route('indexPersonal', $username)}}"><i class="fas fa-home"></i>หน้าแรก</a>
        </li>
        @endforeach
        @else
        <li>
            <a id="link-2" class="link-main" href="{{route('index')}}"><i class="fas fa-home"></i>หน้าแรก</a>
        </li>
        @endisset


        @isset($username)
        @foreach ($personals as $personal)
        <li>
            <a id="link-3" class="link-main"><i class="fas fa-info-circle"></i>เกี่ยวกับภาควิชา</a>
            <div id="link-sub-3" class="link-sub">
                <a href="{{route('aboutDepartmentPersonal', $username)}}">ประวัติความเป็นมา</a>
                <a href="{{route('missionPersonal', $username)}}">พันธกิจ/วิสัยทัศน์/อัตลักษณ์</a>
                <a href="{{route('symbolPersonal', $username)}}">สัญลักษณ์</a>
                <a href="{{route('structurePersonal', $username)}}">โครงสร้างองค์กร</a>
            </div>
        </li>
        @endforeach
        @else
        <li>
            <a id="link-3" class="link-main"><i class="fas fa-info-circle"></i>เกี่ยวกับภาควิชา</a>
            <div id="link-sub-3" class="link-sub">
                <a href="{{route('aboutDepartment')}}">ประวัติความเป็นมา</a>
                <a href="{{route('mission')}}">พันธกิจ/วิสัยทัศน์/อัตลักษณ์</a>
                <a href="{{route('symbol')}}">สัญลักษณ์</a>
                <a href="{{route('structure')}}">โครงสร้างองค์กร</a>
            </div>
        </li>
        
        @endisset    
    

        @isset($username)
        @foreach ($personals as $personal)
        <li>
            <a id="link-4" class="link-main" href="{{route('activityPersonal', $username)}}"><i class="fas fa-book"></i>กิจกรรมภาควิชา</a>
        </li>

        <li>
            <a id="link-5" class="link-main" href="{{route('personalPersonal', $username)}}"><i class="fas fa-users"></i>บุคลากร</a>
        </li>
        @endforeach
        @else
        <li>
            <a id="link-4" class="link-main" href="{{route('activity')}}"><i class="fas fa-book"></i>กิจกรรมภาควิชา</a>
        </li>

        <li>
            <a id="link-5" class="link-main" href="{{route('personal')}}"><i class="fas fa-users"></i>บุคลากร</a>
        </li>
        @endisset

   
        @isset($username)
        @foreach ($personals as $personal)
        <li>
            <a id="link-6" class="link-main"><i class="fas fa-address-book"></i>หลักสูตร</a>
            <div id="link-sub-6" class="link-sub">
                <a href="{{route('industryPersonal', $username)}}">อุตสาหกรรมศาสตรบัณฑิต </a>
                <a href="{{route('engineerPersonal', $username)}}">วิศวกรรมศาสตรบัณฑิต</a>
                <a href="{{route('engineermasterPersonal', $username)}}">วิศวกรรมศาสตรมหาบัณฑิต</a>
            </div>
        </li>
        <li>
            <a id="link-7" class="link-main"><i class="fas fa-bookmark"></i>ปริญญานิพนธ์</a>
            <div id="link-sub-7" class="link-sub">
                <a href="{{route('researchNewsPersonal', $username)}}">ข่าวสารปริญญานิพนธ์</a>
                <a href="{{route('researchMethodPersonal', $username)}}">ขั้นตอนการจัดทำปริญญานิพนธ์</a>
                <a href="{{route('researchFindPersonal', $username)}}">ค้นหาปริญญานิพนธ์</a>
            </div>
        </li>
        <li>
            <a id="link-8" class="link-main"><i class="fas fa-award"></i>สหกิจศึกษา</a>
            <div id="link-sub-8" class="link-sub">
                <a href="{{route('operationMethodPersonal', $username)}}">ขั้นตอนการดำเนินการ</a>
                <a href="{{route('operationFindPersonal', $username)}}">ค้นหาโครงการสหกิจ</a>
            </div>
        </li>
        <li>
            <a id="link-9" class="link-main"><i class="fas fa-briefcase"></i>ระบบครุภัณฑ์</a>
            <div id="link-sub-9" class="link-sub">
                <a href="#">Post</a>
                <a href="#">Picture</a>
            </div>
        </li>
        <li>
            <a id="link-10" class="link-main" href="{{route('contactPersonal', $username)}}"><i class="fas fa-phone-alt"></i>ติดต่อ</a>
        </li>
        @endforeach
        @else
        <li>
            <a id="link-6" class="link-main"><i class="fas fa-address-book"></i>หลักสูตร</a>
            <div id="link-sub-6" class="link-sub">
                <a href="{{route('industry')}}">อุตสาหกรรมศาสตรบัณฑิต </a>
                <a href="{{route('engineer')}}">วิศวกรรมศาสตรบัณฑิต</a>
                <a href="{{route('engineer-master')}}">วิศวกรรมศาสตรมหาบัณฑิต</a>
            </div>
        </li>
        <li>
            <a id="link-7" class="link-main"><i class="fas fa-bookmark"></i>ปริญญานิพนธ์</a>
            <div id="link-sub-7" class="link-sub">
                <a href="{{route('researchNews')}}">ข่าวสารปริญญานิพนธ์</a>
                <a href="{{route('researchMethod')}}">ขั้นตอนการจัดทำปริญญานิพนธ์</a>
                <a href="{{route('researchFind')}}">ค้นหาปริญญานิพนธ์</a>
            </div>
        </li>
        <li>
            <a id="link-8" class="link-main"><i class="fas fa-award"></i>สหกิจศึกษา</a>
            <div id="link-sub-8" class="link-sub">
                <a href="{{route('operationMethod')}}">ขั้นตอนการดำเนินการ</a>
                <a href="{{route('operationFind')}}">ค้นหาโครงการสหกิจ</a>
            </div>
        </li>
        <li>
            <a id="link-9" class="link-main"><i class="fas fa-briefcase"></i>ระบบครุภัณฑ์</a>
            <div id="link-sub-9" class="link-sub">
                <a href="#">Post</a>
                <a href="#">Picture</a>
            </div>
        </li>
        <li>
            <a id="link-10" class="link-main" href="{{route('contact')}}"><i class="fas fa-phone-alt"></i>ติดต่อ</a>
        </li>
        @endisset

        @else 
        <li>
            <a id="link-2" class="link-main" href="{{route('index')}}"><i class="fas fa-home"></i>หน้าแรก</a>
        </li>

        <li>
            <a id="link-3" class="link-main"><i class="fas fa-info-circle"></i>เกี่ยวกับภาควิชา</a>
            <div id="link-sub-3" class="link-sub">
                <a href="{{route('aboutDepartment')}}">ประวัติความเป็นมา</a>
                <a href="{{route('mission')}}">พันธกิจ/วิสัยทัศน์/อัตลักษณ์</a>
                <a href="{{route('symbol')}}">สัญลักษณ์</a>
                <a href="{{route('structure')}}">โครงสร้างองค์กร</a>
            </div>
        </li>

        <li>
            <a id="link-4" class="link-main" href="{{route('activity')}}"><i class="fas fa-book"></i>กิจกรรมภาควิชา</a>
        </li>

        <li>
            <a id="link-5" class="link-main" href="{{route('personal')}}"><i class="fas fa-users"></i>บุคลากร</a>
        </li>

        <li>
            <a id="link-6" class="link-main"><i class="fas fa-address-book"></i>หลักสูตร</a>
            <div id="link-sub-6" class="link-sub">
                <a href="{{route('industry')}}">อุตสาหกรรมศาสตรบัณฑิต </a>
                <a href="{{route('engineer')}}">วิศวกรรมศาสตรบัณฑิต</a>
                <a href="{{route('engineer-master')}}">วิศวกรรมศาสตรมหาบัณฑิต</a>
            </div>
        </li>

        <li>
            <a id="link-7" class="link-main"><i class="fas fa-bookmark"></i>ปริญญานิพนธ์</a>
            <div id="link-sub-7" class="link-sub">
                <a href="{{route('researchNews')}}">ข่าวสารปริญญานิพนธ์</a>
                <a href="{{route('researchMethod')}}">ขั้นตอนการจัดทำปริญญานิพนธ์</a>
                <a href="{{route('researchFind')}}">ค้นหาปริญญานิพนธ์</a>
                <a href="{{route('researchManage')}}">จัดการข้อมูลปริญญานิพนธ์</a>
            </div>
        </li>

        <li>
            <a id="link-8" class="link-main"><i class="fas fa-award"></i>สหกิจศึกษา</a>
            <div id="link-sub-8" class="link-sub">
                <a href="{{route('operationMethod')}}">ขั้นตอนการดำเนินการ</a>
                <a href="{{route('operationFind')}}">ค้นหาโครงการสหกิจ</a>
                <a href="{{route('operationManage')}}">จัดการข้อมูลสหกิจศึกษา</a>
                <a href="{{route('operationUpload')}}">อัพโหลดไฟล์สหกิจศึกษา</a>
            </div>
        </li>

        <li>
            <a id="link-9" class="link-main"><i class="fas fa-briefcase"></i>ระบบครุภัณฑ์</a>
            <div id="link-sub-9" class="link-sub">
                <a href="#">Post</a>
                <a href="#">Picture</a>
            </div>
        </li>

        <li>
            <a id="link-10" class="link-main" href="{{route('contact')}}"><i class="fas fa-phone-alt"></i>ติดต่อ</a>
        </li>
        @endif
     
    </div>
    <script>
        function myFunction() {
            Swal.fire({
                icon: 'info',
                title: 'อาจารย์/ผู้ดูแลระบบ',
                html: '<form method="POST" action="{{ route("adminlogin") }}" >' +
                        '@csrf' +
                        '<input type="text" name="username" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" placeholder="บัญชีผู้ใช้"><br/>' +
                      '<input type="password" name="password" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;"  placeholder="รหัสผ่าน"><br/><br/>' +
                      '<button  style="height: 50px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >เข้าสู่ระบบ</button>' +
                      '</form>' ,
                showConfirmButton: false,
            })
        }
    </script>
    @yield('content')

















    <footer>
        <div class="footer-container">
          <div class="footer-detail">
            <script src="{{ asset('js/couterVisitPage.js') }}"></script>

            <p><i class="far fa-copyright"></i> Copyright KMUTNB 2020 Kirana Eimamnuay & Nanthicha Boonthanom
            </p>
          </div> <!-- end footer detail -->
    
          <div class="footer-ul">
        @foreach ($bottoms as $bottom)
            <ul>
                <li><h4>ติดต่อ</h4></li>
                <div class="footer-main">
                    <div class="fm-left">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="fm-right">
                        <p>ตึก {{ $bottom->office }} ชั้น {{ $bottom->layer }}</p>
                        <p>ภาควิชา {{ $bottom->department }}</p>
                        <p>{{ $bottom->faculty }}</p>
                    </div>
                </div>
                <div class="footer-main">
                    <div class="fm-left">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="fm-right">
                        <p>โทรศัพท์ : {{ $bottom->tel }}</p>
                    </div>
                </div>
                <div class="footer-main">
                    <div class="fm-left">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="fm-right">
                        <p>อีเมล : {{ $bottom->email }}</p>
                    </div>
                </div>
            </ul>
            @endforeach
        
            <ul>
              <li><h4>เว็บไซต์ที่เกี่ยวข้อง</h4></li>
              <li><a href="https://www.kmutnb.ac.th/">มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</a></li>
              <li><a href="https://cit.kmutnb.ac.th/main/">วิทยาลัยเทคโนโลยีอุตสาหกรรม</a></li>
              <li><a href="http://pr.op.kmutnb.ac.th/">สำนักงานอธิบการบดี</a></li>
              <li><a href="https://icit.kmutnb.ac.th/main/">สำนักคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</a></li>
              <li><a href="https://www.ited.kmutnb.ac.th/">สำนักพัฒนาเทคนิคการศึกษา</a></li>
              <li><a href="http://www.itdikmutnb.com/">สำนักพัฒนาเทคโนโลยีเพื่ออุตสาหกรรม</a></li>
              <li><a href="http://stri.kmutnb.ac.th/site/index.php">สำนักวิจัยวิทยาศาสตร์และเทคโนโลยี</a></li>
            </ul>
          </div>
        </div>
    </footer>
  
</body>

</html>
