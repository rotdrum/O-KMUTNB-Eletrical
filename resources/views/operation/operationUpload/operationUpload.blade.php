@extends('layouts.app')

@section('content')
    <form class="vue-container" method="POST" action="{{ route('postoperationUpload') }}"  enctype="multipart/form-data">
    @csrf
        <div class="title-head">
            <h1>อัพโหลดไฟล์สหกิจ</h1>
        </div>

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

        <div class="upload-file">
            <div class="admin-text3">
                <label for="file-upload-1">เลือกไฟล์
                   <input required name="file_pic" type="file" accept=".pdf" id="file-upload-1" class="file-upload">
                </label>
                <p id="filename-1" class="filename">อัพโหลดได้เฉพาะไฟล์ pdf</p>
             </div>

            <select required name="name_type" class="sel-type">
                <option value="">--- เลือก ---</option>
                <option value="แบบแจ้งโครงการสหกิจศึกษา">แบบแจ้งโครงการสหกิจศึกษา</option>
                <option value="แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา">แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา</option>
                <option value="แบบแจ้งรายละเอียดที่พักระหว่างการปฏิบัติงานสหกิจศึกษา">แบบแจ้งรายละเอียดที่พักระหว่างการปฏิบัติงานสหกิจศึกษา</option>
                <option value="รายงานประจำวัน">รายงานประจำวัน</option>
                <option value="รายงานประจำสัปดาห์">รายงานประจำสัปดาห์</option>
                <option value="เล่มรายงานสรุปการปฏิบัติ">เล่มรายงานสรุปการปฏิบัติ</option>
                <option value="เล่มรายงานโครงการสหกิจ">เล่มรายงานโครงการสหกิจ</option>
            </select>
            <button class="btn-upload">อัพโหลดไฟล์</button>

        </div>

    </form>

    <script src="{{asset('js/uploadFile.js')}}"></script>
    
@endsection