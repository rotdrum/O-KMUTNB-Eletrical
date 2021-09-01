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

    <!-- JQery CDN -->
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
            <a href="{{route('indexAdmin')}}">
            <img src="{{asset('img/logo.png')}}" alt="" />
            </a>
            <div class="nl-title">
            <h2><a href="{{route('indexAdmin')}}">ภาควิชาเทคโนโลยีวิศวกรรมไฟฟ้า</a></h2>
            <h4><a href="{{route('indexAdmin')}}">วิทยาลัยเทคโนโลยีอุตสาหกรรม</a></h4>
            </div>
        </div>
        <div class="nav-right">
            <ul>
                <li><a href="#"><i class="fas fa-user"></i>ผู้ดูแลระบบ</a></li>
                <li id="menu-setting">
                    <a href="#"><i class="fas fa-cog"></i>ตั้งค่า</a>
                    <div class="card-setting-admin">
                        <a class="card-setting-items" href="{{route('manageStudent')}}">
                            <i class="fas fa-user-graduate"></i>จัดการข้อมูลนักศึกษา
                        </a>
                        <a class="card-setting-items" href="{{route('manageTeacher')}}">
                            <i class="far fa-list-alt"></i>จัดการข้อมูลบุคลากร
                        </a>
                    </div>
                </li>
                <li><a href="{{route('index')}}" class="aj">ออกจากระบบ</a></li>
            </ul>
            <!--
            <a href="#"><i class="fas fa-user"></i>ผู้ดูแลระบบ</a>
            <a href="{{route('index')}}" class="aj">ออกจากระบบ</a>
            -->
        </div>
        </div>
    </div>

    {{-- nav-menu --}}
    <div class="nav-menu">
        <div class="nm-container">
            <ul class="menu">
                <li><a href="{{route('indexAdmin')}}"><i class="fas fa-home"></i>หน้าแรก</a>
                <li><a href="#"><i class="fas fa-info-circle"></i>เกี่ยวกับภาควิชา</a>
                    <ul class="menu-sub">
                        <li><a href="{{route('aboutDepartment_Admin')}}">ประวัติความเป็นมา</a></li>
                        <li><a href="{{route('mission_Admin')}}">พันธกิจ/วิสัยทัศน์/อัตลักษณ์</a></li>
                        <li><a href="{{route('symbol_Admin')}}">สัญลักษณ์</a></li>
                        <li><a href="{{route('structure_Admin')}}">โครงสร้างองค์กร</a></li>
                    </ul>
                </li>
                <li><a href="{{route('activity_Admin')}}"><i class="fas fa-book"></i>กิจกรรมภาควิชา</a></li>
                <li><a href="{{route('personal_Admin')}}"><i class="fas fa-users"></i>บุคลากร</a></li>
                <li><a href="#"><i class="fas fa-address-book"></i>หลักสูตร</a>
                    <ul class="menu-sub">
                        <li><a href="{{route('industry_Admin')}}">อุตสาหกรรมศาสตรบัณฑิต </a></li>
                        <li><a href="{{route('engineer_Admin')}}">วิศวกรรมศาสตรบัณฑิต</a></li>
                        <li><a href="{{route('engineer-master_Admin')}}">วิศวกรรมศาสตรมหาบัณฑิต</a></li>
                    </ul></li>
                <li><a href="#"><i class="fas fa-bookmark"></i>ปริญญานิพนธ์</a>
                    <ul class="menu-sub">
                        <li><a href="{{route('researchNews_Admin')}}">ข่าวสารปริญญานิพนธ์</a></li>
                        <li><a href="{{route('researchMethod_Admin')}}">ขั้นตอนการจัดทำปริญญานิพนธ์</a></li>
                        <li><a href="{{route('researchFind_Admin')}}">ค้นหาปริญญานิพนธ์</a></li>
                        <li><a href="{{route('researchApprove_Admin')}}">รอการอนุมัติปริญญานิพนธ์</a></li>
                    </ul></li>
                <li><a href="#"><i class="fas fa-award"></i>สหกิจศึกษา</a>
                    <ul class="menu-sub">
                        <li><a href="{{route('operationMethod_Admin')}}">ขั้นตอนการดำเนินการ</a></li>
                        <li><a href="{{route('operationFind_Admin')}}">ค้นหาโครงการสหกิจ</a></li>
                    </ul></li>
                <li><a href="#"><i class="fas fa-briefcase"></i>ระบบครุภัณฑ์</a></li>
                <li><a href="{{route('contact_Admin')}}"><i class="fas fa-phone-alt"></i>ติดต่อ</a></li>
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
        <li>
            <a id="link-1" class="link-main"><i class="fas fa-sign-in-alt"></i>เข้าสู่ระบบ</a>
            <div id="link-sub-1" class="link-sub">
                <a href="{{ route('login') }}">นักศึกษา</a>
                <a href="{{ route('indexAdmin') }} ">บุคลากร</a>
                <a href="{{ route('register') }}">ลงทะเบียน</a>
            </div>
        </li>

        <li>
            <a id="link-2" class="link-main" href="{{route('index')}}"><i class="fas fa-home"></i>หน้าแรก</a>
        </li>

        <li>
            <a id="link-3" class="link-main"><i class="fas fa-info-circle"></i>เกี่ยวกับภาควิชา</a>
            <div id="link-sub-3" class="link-sub">
                <a href="{{route('aboutDepartment_Admin')}}">ประวัติความเป็นมา</a>
                <a href="{{route('mission_Admin')}}">พันธกิจ/วิสัยทัศน์/อัตลักษณ์</a>
                <a href="{{route('symbol_Admin')}}">สัญลักษณ์</a>
                <a href="{{route('structure_Admin')}}">โครงสร้างองค์กร</a>
            </div>
        </li>

        <li>
            <a id="link-4" class="link-main" href="{{route('activity_Admin')}}"><i class="fas fa-book"></i>กิจกรรมภาควิชา</a>
        </li>

        <li>
            <a id="link-5" class="link-main" href="{{route('personal_Admin')}}"><i class="fas fa-users"></i>บุคลากร</a>
        </li>

        <li>
            <a id="link-6" class="link-main"><i class="fas fa-address-book"></i>หลักสูตร</a>
            <div id="link-sub-6" class="link-sub">
                <a href="{{route('industry_Admin')}}">อุตสาหกรรมศาสตรบัณฑิต </a>
                <a href="{{route('engineer_Admin')}}">วิศวกรรมศาสตรบัณฑิต</a>
                <a href="{{route('engineer-master_Admin')}}">วิศวกรรมศาสตรมหาบัณฑิต</a>
            </div>
        </li>

        <li>
            <a id="link-7" class="link-main"><i class="fas fa-bookmark"></i>ปริญญานิพนธ์</a>
            <div id="link-sub-7" class="link-sub">
                <a href="{{route('researchNews_Admin')}}">ข่าวสารปริญญานิพนธ์</a>
                <a href="{{route('researchMethod_Admin')}}">ขั้นตอนการจัดทำปริญญานิพนธ์</a>
                <a href="{{route('researchFind_Admin')}}">ค้นหาปริญญานิพนธ์</a>
                <a href="{{route('researchApprove_Admin')}}">รอการอนุมัติปริญญานิพนธ์</a>
            </div>
        </li>

        <li>
            <a id="link-8" class="link-main"><i class="fas fa-award"></i>สหกิจศึกษา</a>
            <div id="link-sub-8" class="link-sub">
                <a href="{{route('operationMethod_Admin')}}">ขั้นตอนการดำเนินการ</a>
                <a href="{{route('operationFind_Admin')}}">ค้นหาโครงการสหกิจ</a>
            </div>
        </li>

        <li>
            <a id="link-9" class="link-main"><i class="fas fa-briefcase"></i>ระบบครุภัณฑ์</a>
        </li>

        <li>
            <a id="link-10" class="link-main" href="{{route('contact_Admin')}}"><i class="fas fa-phone-alt"></i>ติดต่อ</a>
        </li>
    </div>

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
                    <div class="admin-manageFooter">
                        <a onclick="tel1()" class="btn-footer">แก้ไข</a>
                        <a onclick="tel2()" class="btn-footer">แก้ไข</a>
                        <a onclick="tel3()" class="btn-footer">แก้ไข</a>
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
                    <div class="admin-manageFooter">
                        <a onclick="tel4()" class="btn-footer">แก้ไข</a>
                    </div>
                    <div class="fm-right">
                        <p>โทรศัพท์ : {{ $bottom->tel }}</p>
                    </div>
                </div>
                <div class="footer-main">
                    <div class="fm-left">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="admin-manageFooter">
                        <a onclick="tel5()" class="btn-footer">แก้ไข</a>
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
      <script>
        function tel1() {
            Swal.fire({
                icon: 'info',
                title: 'แก้ไขข้อมูลติดต่อ',
                html: '<form method="POST" action="{{route("bottompost")}}" >' +
                        '@csrf' +
                        '<input type="hidden" name="row" value="1">' +
                        'ตึก <input required type="text" name="office" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                      'ชั้น <input required type="text" name="layer" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;"  ><br/><br/>' +
                      '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                      '</form>' ,
                showConfirmButton: false,
            })
        }
        function tel2() {
            Swal.fire({
                icon: 'info',
                title: 'แก้ไขข้อมูลติดต่อ',
                html: '<form method="POST" action="{{route("bottompost")}}" >' +
                        '@csrf' +
                        '<input type="hidden" name="row" value="2">' +
                        'ภาควิชา <input required type="text" name="department" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                      '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                      '</form>' ,
                showConfirmButton: false,
            })
        }
        function tel3() {
            Swal.fire({
                icon: 'info',
                title: 'แก้ไขข้อมูลติดต่อ',
                html: '<form method="POST" action="{{route("bottompost")}}" >' +
                        '@csrf' +
                        '<input type="hidden" name="row" value="3">' +
                        'คณะ <input required type="text" name="faculty" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                      '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                      '</form>' ,
                showConfirmButton: false,
            })
        }
        function tel4() {
            Swal.fire({
                icon: 'info',
                title: 'แก้ไขข้อมูลติดต่อ',
                html: '<form method="POST" action="{{route("bottompost")}}" >' +
                        '@csrf' +
                        '<input type="hidden" name="row" value="4">' +
                        'โทรศัพท์ <input required type="text" name="tel" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                      '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                      '</form>' ,
                showConfirmButton: false,
            })
        }
        function tel5() {
            Swal.fire({
                icon: 'info',
                title: 'แก้ไขข้อมูลติดต่อ',
                html: '<form method="POST" action="{{route("bottompost")}}" >' +
                        '@csrf' +
                        '<input type="hidden" name="row" value="5">' +
                        'อีเมล <input required type="text" name="email" style="padding: 5px 15px;border-radius: 10px;border: 1px solid #adadad;font-size: 1rem;outline: none;margin:5px 0;" ><br/>' +
                      '<button  style="height: 30px;width: 200px;border: none;border-radius: 10px;font-size: 1rem;background: #1abc9c;color: #fff;cursor: pointer;transition: .3s ease;" >บันทึก</button>' +
                      '</form>' ,
                showConfirmButton: false,
            })
        }
    </script>

</body>

</html>
