@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขรูปภาพ</h1>
        </div>

        {{-- Card --}}
        <form class="card-main" method="POST" enctype="multipart/form-data" action="{{ route('postoperationMethodEdit') }}" id="usrform">
        @csrf
            {{-- Upload image --}}
            <div class="avatar-upload">
                <span class="full-hd">[ ไฟล์ ชนิด รูปภาพ เท่านั้น (.png, .jpg, .jpeg) ]</span>
                <div class="avatar-edit">
                    <input required  type='file' name="file_pic" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload">
                        <i class="fas fa-pencil-alt"></i>
                    </label>
                </div>
                <div class="avatar-preview-structure">
                    @foreach ($operation_methods as $operation_method)
                    <div id="imagePreview" style="background-image: url('{{asset('storage/')}}/../../storage/app/public/operation_method/{{ $operation_method->file_name }}');">
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="admin-editAboutDepartment">
                <div class="admin-manageStructure">
                    <button type="submit" class="btn-edit">แก้ไข</button>
                    <a href="{{route('operationMethod_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>

    </div>   
@endsection