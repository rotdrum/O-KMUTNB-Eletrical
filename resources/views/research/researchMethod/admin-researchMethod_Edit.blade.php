@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขรูปภาพ</h1>
        </div>

        {{-- Card --}}
        <form class="card-main" id="usrform" method="POST" action="{{ route('postresearchMethodEdit') }}"  enctype="multipart/form-data">
        @csrf
            {{-- Upload image --}}
            <div class="avatar-upload">
                <span class="full-hd">[ไม่ฟิกขนาด]</span>
                <div class="avatar-edit">
                    <input name="pic" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload">
                        <i class="fas fa-pencil-alt"></i>
                    </label>
                </div>
                <div class="avatar-preview-structure">
                    @foreach ($researchpics as $researchpic)
                    <div id="imagePreview" style="background-image: url('{{asset('storage/')}}/../../storage/app/public/researchpic/{{ $researchpic->pic }}');">
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="admin-editAboutDepartment">
                <div class="admin-manageStructure">
                    <button type="submit" class="btn-edit">แก้ไข</button>
                    <a href="{{route('researchMethod_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>

    </div>   
@endsection