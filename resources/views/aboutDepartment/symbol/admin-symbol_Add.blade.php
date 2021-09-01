@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>เพิ่มสัญลักษณ์</h1>
        </div>

    
        {{-- Card --}}
        <form class="card-main" id="usrform" method="POST" action="{{route("postsymbolAdd")}}"  enctype="multipart/form-data" >
            @csrf

            {{-- Upload image --}}
            <div class="avatar-upload">
                <span class="symbol">[W-500] x [H-500]</span>

                <div class="avatar-edit-symbol">
                    <input type='file' name="pic" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload" >
                        <i class="fas fa-pencil-alt"></i>
                    </label>
                </div>
                <div class="avatar-preview-symbol">
                    <div id="imagePreview" style="background-image: url('{{asset('img/kmutnb.png')}}');">
                    </div>
                </div>
            </div>


            <div class="admin-editAboutDepartment">
                <input type="text" name="title" class="txt-edit" placeholder="เพิ่มหัวข้อหลัก">
                <textarea name="comment" form="usrform" placeholder="เพิ่มเนื้อหา"></textarea>
                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-edit">เพิ่ม</button>
                    <a href="{{route('symbol_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>

    </div>   
@endsection