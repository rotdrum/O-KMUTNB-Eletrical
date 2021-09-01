@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขสัญลักษณ์</h1>
        </div>

        
        @foreach ($emblems as $emblem)
            
        {{-- Card --}}
        <form class="card-main" method="POST" action="{{ route('postsymbolEdit') }}"  enctype="multipart/form-data" id="usrform">
        @csrf   
            <input type="hidden" name="id" value="{{ $emblem->id }}">
            {{-- Upload image --}}
            <div class="avatar-upload">
                <span class="symbol">[W-500] x [H-500]</span>

                <div class="avatar-edit-symbol">
                    <input type='file' name="pic" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload">
                        <i class="fas fa-pencil-alt"></i>
                    </label>
                </div>
                <div class="avatar-preview-symbol">
                    <div id="imagePreview" style="background-image: url('{{asset('storage/')}}/../../storage/app/public/emblem/{{ $emblem->pic }}');">
                    </div>
                </div>
            </div>


            <div class="admin-editAboutDepartment">
            <input type="text" name="title" class="txt-edit" value="{{ $emblem->title }}" placeholder="เพิ่มหัวข้อหลัก">
            <textarea name="comment" form="usrform" placeholder="เพิ่มเนื้อหา">{{ $emblem->comment }}</textarea>
                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-edit">แก้ไข</button>
                    <a href="{{route('symbol_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>
        @endforeach

    </div>   
@endsection