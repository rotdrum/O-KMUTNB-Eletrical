@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขรูปภาพ</h1>
        </div>

        @foreach ($structures as $structure)
              {{-- Card --}}
        <form class="card-main" method="POST" action="{{ route('poststructureEdit') }}"  enctype="multipart/form-data" id="usrform">
        @csrf
            {{-- Upload image --}}
            <div class="avatar-upload">
                <span class="full-hd">[W-900] x [H-1145]</span>
                <div class="avatar-edit">
                    <input type='file' name="pic" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload">
                        <i class="fas fa-pencil-alt"></i>
                    </label>
                </div>
                <div class="avatar-preview-structure">
                    <div id="imagePreview" style="background-image: url('{{asset('storage/')}}/../../storage/app/public/structure/{{ $structure->pic }}');">
                    </div>
                </div>
            </div>

            <div class="admin-editAboutDepartment">
                <div class="admin-manageStructure">
                    <button type="submit" class="btn-edit">แก้ไข</button>
                    <a href="{{route('structure_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>

        @endforeach
      
    </div>   
@endsection