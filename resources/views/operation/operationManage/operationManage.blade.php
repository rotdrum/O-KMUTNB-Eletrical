@extends('layouts.app')

@section('content')
@if ( $operations == "[]" )
<form class="vue-container" method="POST" enctype="multipart/form-data" action="{{ route('postoperationManageAdd') }}" id="usrform" >
    @csrf
        <div class="title-head">
            <h1>รายละเอียดโครงการสหกิจ</h1>
        </div>

        <div class="operationFindDetail">
            <div class="operation-map">
                <div class="update-card">
                    <!--เอาไว้-->
                    <input type="hidden" required name="url" class="txt-map" placeholder="URL Google map">
                    
                    <!--
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
                -->
                </div>
            </div>

            <div class="operation-detail">

                {{-- card privacy --}}
                <div class="operation-card">
                    <h2>ข้อมูลส่วนตัว</h2>
                    <div class="profile-detail">
                        <p>รหัสนักศึกษา</p>
                        <input required type="hidden" name="user_id" class="txt-info" value="{{ Auth::user()->id }}" >
                        <input required type="text" name="student_id" class="txt-info" value="{{ Auth::user()->username }}" placeholder="กรอกรหัสนักศึกษา">
                    </div>

                    <div class="profile-detail">
                        <p>ชื่อ-สกุล</p>
                        <input required type="text" name="student_name" class="txt-info" value="{{ Auth::user()->tname }}{{ Auth::user()->fname }} {{ Auth::user()->lname }}"  placeholder="กรอกชื่อ-นามสกุล">
                    </div>

                    <div class="profile-detail">
                        <p>ห้อง</p>
                        <select required name="sub" class="sel-room">
                            <option value="{{ Auth::user()->sub }}">{{ Auth::user()->sub }}</option>
                            <option value="PnET(PE)-R">PnET(PE)-R</option>
                            <option value="PnET(PE)-2R">PnET(PE)-2R</option>
                            <option value="PnET(C)-R">PnET(C)-R</option>
                            <option value="PNT-R">PNT-R</option>
                            <option value="PNT-T">PNT-T</option>
                        </select>
                    </div>

                    <div class="profile-detail">
                        <p>เบอร์โทรศัพท์</p>
                        <input required type="text" name="tel" class="txt-info"  value="{{ Auth::user()->tel }}" placeholder="กรอกโทรศัพท์">
                    </div>

                    <div class="profile-detail">
                        <p>อีเมล</p>
                        <input required type="text" name="email" class="txt-info" value="{{ Auth::user()->email }}" placeholder="example@email.com">
                    </div>
                </div>

                {{-- card operation --}}
                <div class="operation-card">
                    <h2>ข้อมูลการออกสหกิจ</h2>
                    <div class="profile-detail">
                        <p>สถานประกอบการ</p>
                        <input required type="text" name="address" class="txt-info" placeholder="กรอกชื่อสถานประกอบการ">
                    </div>

                    <div class="profile-detail">
                        <p>ประเภท</p>
                        <select required name="type_address" class="sel-room">
                            <option value="">--- ประเภทสถานประกอบการ ---</option>
                            <option value="บริษัท">บริษัท</option>
                            <option value="บริษัทห้างร้าน">บริษัทห้างร้าน</option>
                            <option value="องค์กรภาครัฐ">องค์กรภาครัฐ</option>
                            <option value="โรงงาน">โรงงาน</option>
                        </select>
                    </div>

                    <p id="date-hide">ระยะเวลาตั้งแต่</p>
                    <div class="profile-detail" id="profile-detail-date">
                        <p class="fixed">ระยะเวลาตั้งแต่</p>
                        <input required name="day_start" type="number" maxlength="2" class="txt-date" placeholder="วันที่">
                        <select required name="month_start" class="sel-month">
                            <option value="">---เดือน---</option>
                            <option value="ม.ค">มกราคม</option>
                            <option value="ก.พ">กุมภาพันธ์</option>
                            <option value="มี.ค">มีนาคม</option>
                            <option value="เม.ย">เมษายน</option>
                            <option value="พ.ค">พฤษภาคม</option>
                            <option value="มิ.ย">มิถุนายน</option>
                            <option value="ก.ค">กรกฎาคม</option>
                            <option value="ส.ค">สิงหาคม</option>
                            <option value="ก.ย">กันยายน</option>
                            <option value="ต.ค">ตุลาคม</option>
                            <option value="พ.ย">พฤษจิกายน</option>
                            <option value="ธ.ค">ธันวาคม</option>
                        </select>
                        <input required name="year_start" maxlength="4" type="number"  class="txt-date" placeholder="25XX">
                    </div>

                    <p id="date-hide">จนถึง</p>
                    <div class="profile-detail" id="profile-detail-date">
                        <p class="fixed">จนถึง</p>
                        <input required type="number" maxlength="2"  name="day_end" class="txt-date" placeholder="วันที่">
                        <select required name="month_end" class="sel-month">
                            <option value="">---เดือน---</option>
                            <option value="ม.ค">มกราคม</option>
                            <option value="ก.พ">กุมภาพันธ์</option>
                            <option value="มี.ค">มีนาคม</option>
                            <option value="เม.ย">เมษายน</option>
                            <option value="พ.ค">พฤษภาคม</option>
                            <option value="มิ.ย">มิถุนายน</option>
                            <option value="ก.ค">กรกฎาคม</option>
                            <option value="ส.ค">สิงหาคม</option>
                            <option value="ก.ย">กันยายน</option>
                            <option value="ต.ค">ตุลาคม</option>
                            <option value="พ.ย">พฤษจิกายน</option>
                            <option value="ธ.ค">ธันวาคม</option>
                        </select>
                        <input required type="number"  maxlength="4" name="year_end" class="txt-date" placeholder="25XX">
                    </div>

                    <div class="profile-detail">
                        <p>บุคคลที่จะเรียนถึง</p>
                        <input required type="text" name="name_to" class="txt-info" placeholder="กรอกชื่อผู้ที่จะเรียนถึง">
                    </div>

                    <div class="profile-detail">
                        <p>พี่เลี้ยง</p>
                        <input required type="text" name="name_subport" class="txt-info" placeholder="กรอกชื่อพี่เลี้ยง">
                    </div>

                    <div class="profile-detail">
                        <p>เบอร์โทรพี่เลี้ยง</p>
                        <input required type="text" name="tel_subport" class="txt-info" placeholder="กรอกเบอร์โทรพี่เลี้ยง">
                    </div>
                </div>

                <div class="btn-commit">
                    <button  class="btn-save">บันทึก</button>
                    <a href="#" class="btn-cancle">ยกเลิก</a>
                </div>

            </div>
        </div>
</form>
@else 
@foreach ($operations as $operation)   
<form class="vue-container" method="POST" enctype="multipart/form-data" action="{{ route('postoperationManageEdit') }}" id="usrform" >
    @csrf
        <div class="title-head">
            <h1>รายละเอียดโครงการสหกิจ</h1>
        </div>

        <div class="operationFindDetail">
            <div class="operation-map">
                <div class="update-card">
                    <input type="hidden" required value="{{ $operation->id }}" name="id"  class="txt-map" placeholder="URL Google map">
                    <input type="hidden" required value="{{ $operation->url }}" name="url"  class="txt-map" placeholder="URL Google map">
                   <!--
                    <h2>แผนที่สหกิจศึกษา</h2>
                
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
                -->
                </div>
            </div>

            <div class="operation-detail">

                {{-- card privacy --}}
                <div class="operation-card">
                    <h2>ข้อมูลส่วนตัว</h2>
                    <div class="profile-detail">
                        <p>รหัสนักศึกษา</p>
                        <input required type="hidden" name="user_id" class="txt-info" value="{{ Auth::user()->id }}" >
                        <input required type="text" name="student_id" class="txt-info" value="{{ Auth::user()->username }}" placeholder="กรอกรหัสนักศึกษา">
                    </div>

                    <div class="profile-detail">
                        <p>ชื่อ-สกุล</p>
                        <input required type="text" name="student_name" class="txt-info" value="{{ Auth::user()->tname }}{{ Auth::user()->fname }} {{ Auth::user()->lname }}"  placeholder="กรอกชื่อ-นามสกุล">
                    </div>

                    <div class="profile-detail">
                        <p>ห้อง</p>
                        <select required name="sub" class="sel-room">
                            <option value="{{ Auth::user()->sub }}">{{ Auth::user()->sub }}</option>
                            <option value="PnET(PE)-R">PnET(PE)-R</option>
                            <option value="PnET(PE)-2R">PnET(PE)-2R</option>
                            <option value="PnET(C)-R">PnET(C)-R</option>
                            <option value="PNT-R">PNT-R</option>
                            <option value="PNT-T">PNT-T</option>
                        </select>
                    </div>

                    <div class="profile-detail">
                        <p>เบอร์โทรศัพท์</p>
                        <input required type="text" name="tel" class="txt-info"  value="{{ Auth::user()->tel }}" placeholder="กรอกโทรศัพท์">
                    </div>

                    <div class="profile-detail">
                        <p>อีเมล</p>
                        <input required type="text" name="email" class="txt-info" value="{{ Auth::user()->email }}" placeholder="example@email.com">
                    </div>
                </div>

                {{-- card operation --}}
                <div class="operation-card">
                    <h2>ข้อมูลการออกสหกิจ</h2>
                    <div class="profile-detail">
                        <p>สถานประกอบการ</p>
                        <input required type="text" name="address" value="{{ $operation->address }}" class="txt-info" placeholder="กรอกชื่อสถานประกอบการ">
                    </div>

                    <div class="profile-detail">
                        <p>ประเภท</p>
                        <select required name="type_address" class="sel-room">
                            <option value="{{ $operation->type_address }}">{{ $operation->type_address }}</option>
                            <option value="บริษัท">บริษัท</option>
                            <option value="บริษัทห้างร้าน">บริษัทห้างร้าน</option>
                            <option value="องค์กรภาครัฐ">องค์กรภาครัฐ</option>
                            <option value="โรงงาน">โรงงาน</option>
                        </select>
                    </div>

                 
                    <div class="profile-detail">
                        <p>ระยะเวลาตั้งแต่</p>
                        <input required type="text" value="{{ $operation->date_start }}" name="date_start" class="txt-info">
                    </div>

                    <div class="profile-detail">
                        <p>จนถึง</p>
                        <input required type="text"  value="{{ $operation->date_end }}" name="date_end" class="txt-info" >
                    </div>

                    <div class="profile-detail">
                        <p>บุคคลที่จะเรียนถึง</p>
                        <input required type="text"  value="{{ $operation->name_to }}" name="name_to" class="txt-info" placeholder="กรอกชื่อผู้ที่จะเรียนถึง">
                    </div>

                    <div class="profile-detail">
                        <p>พี่เลี้ยง</p>
                        <input required type="text"  value="{{ $operation->name_subport }}" name="name_subport" class="txt-info" placeholder="กรอกชื่อพี่เลี้ยง">
                    </div>

                    <div class="profile-detail">
                        <p>เบอร์โทรพี่เลี้ยง</p>
                        <input required type="text"  value="{{ $operation->tel_subport }}" name="tel_subport" class="txt-info" placeholder="กรอกเบอร์โทรพี่เลี้ยง">
                    </div>
                </div>

                <div class="btn-commit">
                    <button  class="btn btn-save">บันทึก</button>
                </div>

            </div>
        </div>

    </form>

    
@endforeach
@endif
   
@endsection