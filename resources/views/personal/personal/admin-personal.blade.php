@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>บุคลากร</h1>
            <a href="{{route('personal_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มบุคลากร</a>
        </div>

        @foreach ($personals as $personal)
        {{-- card-personal --}}
        <div class="card-personal">
            <div class="personal-img">
                <img src="{{asset('storage/')}}/../../storage/app/public/personal/pic/{{ $personal->pic_name }}">
            </div>
            <div class="personal-info">
                <h1>{{ $personal->name_thai }}</h1>
                <h3>{{ $personal->position }}</h3>
                <div class="admin-managePersonal">
                    <a href="{{route('personal_Edit', ['id'=>$personal->id])}}" class="btn-edit">แก้ไข</a>
                    <a href="{{route('postpersonalDelete', ['id'=>$personal->id])}}" class="btn-delete">ลบ</a>
                </div>
            </div>
        </div>          
        @endforeach

    </div>
@endsection