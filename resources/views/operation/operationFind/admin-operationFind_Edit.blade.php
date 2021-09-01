@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขข้อมูลโครงการสหกิจ</h1>
        </div>
        @foreach ($operations as $operation)
            
        <form class="operationFindDetail" method="POST" enctype="multipart/form-data" action="{{ route('postAdminoperationManageEdit') }}" id="usrform">
        @csrf
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
                        <input type="text" value="{{ $operation->student_id }}" name="student_id"  class="txt-info" placeholder="กรอกรหัสนักศึกษา">
                    </div>

                    <div class="profile-detail">
                        <p>ชื่อ-สกุล</p>
                        <input type="text" value="{{ $operation->student_name }}"  name="student_name"  class="txt-info" placeholder="กรอกชื่อ-นามสกุล">
                    </div>

                    <div class="profile-detail">
                        <p>ห้อง</p>
                        <select   name="sub" class="sel-room">
                            <option value="{{ $operation->sub  }}">{{ $operation->sub }}</option>
                            <option value="PnET(PE)-R">PnET(PE)-R</option>
                            <option value="PnET(PE)-2R">PnET(PE)-2R</option>
                            <option value="PnET(C)-R">PnET(C)-R</option>
                            <option value="PNT-R">PNT-R</option>
                            <option value="PNT-T">PNT-T</option>
                        </select>
                    </div>

                    <div class="profile-detail">
                        <p>เบอร์โทรศัพท์</p>
                    <input type="text" value="{{ $operation->tel }}"  name="tel"  class="txt-info" placeholder="กรอกโทรศัพท์">
                    </div>

                    <div class="profile-detail">
                        <p>อีเมล</p>
                        <input type="text" value="{{ $operation->email }}"  name="email" class="txt-info" placeholder="example@email.com">
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
                <button  class="btn-save">บันทึก</button>
                <a href="{{ route('operationFind_Admin') }}" class="btn-cancle">ยกเลิก</a>
            </div>

            </div>
        </form> {{-- end container --}}

        @endforeach


        <table class="show-update" style="margin-top: 50px;">
    
            <tr>
                <th>ลำดับ</th>
                <th>ไฟล์สหกิจศึกษา</th>
                <th>วันที่ส่ง</th>
                <th>จัดการ</th>
            </tr>

            @php
                $count = 1 ;
            @endphp
            @foreach ($operationuploads as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td><a href="{{asset('storage/')}}/../../storage/app/public/operation_upload/{{ $data->name_file }}" target="_blank">{{ $data->name_type }}</a></td>
                <td>{{ $data->created_at }}</td>
                <td><button  onclick="window.location.href='{{ route('operationUploadDelete', ['id' => $data->id ]) }}'" class="btn-delete">ลบ</button></td>
            </tr>
            @php
                $count = $count + 1 ;
            @endphp
            @endforeach
          

          
        </table>

       

    </div>

    <script src="{{asset('js/uploadFile.js')}}"></script>

@endsection