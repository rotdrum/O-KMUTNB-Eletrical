@extends('layouts.app')

@section('content')
@foreach ($operations as $operation)
<div class="vue-container">
    <div class="title-head">
        <h1>รายละเอียดโครงการสหกิจ</h1>
    </div>

    {{-- container content --}}
    <div class="operationFindDetail">
        <div class="operation-map">
            @php
            $str =  $operation->url ;
            echo html_entity_decode($str);
            @endphp
        </div>

        <div class="operation-detail">

            {{-- card privacy --}}
            <div class="operation-card">
                <h2>ข้อมูลส่วนตัว</h2>
                <div class="profile-detail">
                    <p>รหัสนักศึกษา</p>
                    <p>{{ $operation->student_id }}</p>
                </div>

                <div class="profile-detail">
                    <p>ชื่อ-สกุล</p>
                    <p>{{ $operation->student_name }}</p>
                </div>

                <div class="profile-detail">
                    <p>ห้อง</p>
                    <p>{{ $operation->sub }}</p>
                </div>

                <div class="profile-detail">
                    <p>เบอร์โทรศัพท์</p>
                    <p>{{ $operation->tel }}</p>
                </div>

                <div class="profile-detail">
                    <p>อีเมล</p>
                    <p>{{ $operation->email }}</p>
                </div>
            </div>

            {{-- card operation --}}
            <div class="operation-card">
                <h2>ข้อมูลการออกสหกิจ</h2>
                <div class="profile-detail">
                    <p>สถานประกอบการ</p>
                    <p>{{ $operation->address }}</p>
                </div>

                <div class="profile-detail">
                    <p>ระยะเวลา</p>
                    <p>{{ $operation->date_start }} ถึง {{ $operation->date_end }}</p>
                </div>


                @isset($username)
                @foreach ($personals as $personal)
          
                <div class="profile-detail">
                    <p>บุคคลที่จะเรียนถึง</p>
                    <p>{{ $operation->name_to }}</p>
                </div>

                <div class="profile-detail">
                    <p>พี่เลี้ยง</p>
                    <p>{{ $operation->name_subport }}</p>
                </div>

                <div class="profile-detail">
                    <p>เบอร์โทรพี่เลี้ยง</p>
                    <p>{{ $operation->tel_subport }}</p>
                </div>
                @endforeach
                @else
               
                @endisset


            </div>

        </div>
    </div> {{--end container content --}}



    @isset($username)
    @foreach ($personals as $personal)
    <table class="show-update">
        <tr>
            <th>ลำดับ</th>
            <th>ไฟล์สหกิจศึกษา</th>
            <th>วันที่ส่ง</th>
        </tr>

        @php
        $count = 1 ;
    @endphp
    @foreach ($operationuploads as $data)
    <tr>
        <td>{{ $count }}</td>
        <td><a href="{{asset('storage/')}}/../../storage/app/public/operation_upload/{{ $data->name_file }}" target="_blank">{{ $data->name_type }}</a></td>
        <td>{{ $data->created_at }}</td>
    </tr>
    @php
        $count = $count + 1 ;
    @endphp
    @endforeach
    </table>
    @endforeach
    @else
   
    @endisset


    
  


</div> {{--end vue container --}}
@endforeach
  
@endsection