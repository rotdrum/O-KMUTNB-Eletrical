@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ข้อมูลเพิ่มเติม</h1>
        </div>

       @foreach ($researchs as $research)
            
        <form class="researchManage-card">

            <h2>เกี่ยวกับปริญญานิพนธ์</h2>

            <div class="rf-50">
                <div class="form-group">
                    <h4>รหัสปริญญานิพนธ์</h4>
                    <p>{{ $research->research_id }}</p>
                </div>
                <div class="form-group">
                    <h4>ประเภทไฟล์</h4>
                    <p>{{ $research->file_type }}</p>
                </div>
            </div>

            <div class="rf-50">
                <div class="form-group">
                    <h4>ลักษณะปริญญานิพนธ์</h4>
                    <p>{{ $research->format }}</p>
                </div>
                <div class="form-group">
                    <h4>ประเภทปริญญานิพนธ์</h4>
                    <p>{{ $research->research_type }}</p>
                </div>
            </div>

            <div class="rf-50">
                <div class="form-group">
                    <h4>ชื่อปริญญานิพนธ์ (ภาษาไทย)</h4>
                    <p>{{ $research->thai_name }}</p>
                </div>
                <div class="form-group">
                    <h4>ชื่อปริญญานิพนธ์ (ภาษาอังกฤษ)</h4>
                    <p>{{ $research->eng_name }}</p>
                </div>
            </div>

            <div class="rf-50">
                <div class="form-group">
                    <h4>ปีการศึกษา</h4>
                    <p>{{ $research->year }}</p>
                </div>
                <div class="form-group">
                    <h4>ภาคเรียน</h4>
                    <p>{{ $research->term }}</p>
                </div>
            </div>

            <div class="rf-50">
                <div class="form-group">
                    <h4>ห้องเรียน</h4>
                    <p>{{ $research->class }}</p>
                </div>
            </div>

            {{-- --------------- --}}
            <br><br>
            <h2>อาจารย์ที่ปรึกษา</h2>

            <div class="rf-50">
                <div class="form-group">
                    <h4>ที่ปรึกษาหลัก</h4>
                    <p>{{ $teacher1 }}</p>
                </div>
                <div class="form-group">
                    <h4>ที่ปรึกษาร่วม</h4>
                    <p>{{ $teacher2 }}</p>
                </div>
            </div>

            <!--
            <div class="rf-50">
                <div class="form-group">
                    <h4>ที่ปรึกษาร่วม</h4>
                    <p>ผู้ช่วยศาสตราจารย์ ดร. จรัญ แสนราช</p>
                </div>
            </div>
        -->

            {{-- --------------- --}}
            <br><br>
            <h2>คณะผู้จัดทำ</h2>
            
            <div class="rf-50">
                <div class="form-group">
                    <h4>ผู้จัดทำที่ 1</h4>
                    <p>{{ $research->student_one }}</p>
                </div>
                <div class="form-group">
                    <h4>ผู้จัดทำที่ 2</h4>
                    <p>{{ $research->student_two }}</p>
                </div>
                <div class="form-group">
                    <h4>ผู้จัดทำที่ 3</h4>
                    <p>{{ $research->student_three }}</p>
                </div>
            </div>

            <!--
            <div class="rf-50">
                <div class="form-group">
                    <h4>ผู้จัดทำที่ 3</h4>
                    <p>ผู้ช่วยศาสตราจารย์ ดร. จรัญ แสนราช</p>
                </div>
            </div>
        -->

     
            <div class="manage-btn-approve">
                <!--
                <div class="rf-50">
                    <div class="form-group">
                        <a href="{{asset('storage/')}}/../../storage/app/public/research/{{ $research->file_name }}"  class="btn-file">ดูไฟล์</a>
                    </div>
                    <div class="form-group">
                        <a href="{{route('postresearchApprove', ['$id' => $research->id])}}" style="background-color: #27ae60; " class="btn-file">อนุมัติ</a>
                    </div>
                    <div class="form-group">
                        <a href="{{route('researchFindDelete', ['id' => $research->id ] )}}" style="background-color: #e74c3c" class="btn-file">ไม่อนุมัติ</a>
                    </div>
                </div>
            -->

                        <a href="{{asset('storage/')}}/../../storage/app/public/research/{{ $research->file_name }}"  class="btn btn-file">ดูไฟล์</a>
                        <a href="{{route('postresearchApprove', ['$id' => $research->id])}}"  class="btn btn-approve">อนุมัติ</a>
                        <a href="{{route('researchFindDelete', ['id' => $research->id ] )}}"  class="btn btn-cancle">ไม่อนุมัติ</a>
                    </div>
                </div>
               
            </div>
        </form>

        @endforeach

    </div>
@endsection