@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>แก้ไขประวัติความเป็นมา</h1>
        </div>

        @foreach ($storys as $story)
        <form class="card-main" method="POST" action="{{ route('postaboutDepartmentEdit') }}" id="usrform">
        @csrf
            <div class="admin-editAboutDepartment">
                <input type="hidden" name="id" value="{{ $story->id }}" >
                <input type="text" name="year" class="txt-edit" value="{{ $story->year }}" placeholder="แก้ไขปี พ.ศ.">
                <input type="text" name="title" class="txt-edit" value="{{ $story->title }}" placeholder="แก้ไขหัวข้อหลัก">
                <textarea name="comment" form="usrform" placeholder="แก้ไขเนื้อหา">{{ $story->comment }}</textarea>
                <div class="admin-manageAboutDapartmentEdit">
                    <button type="submit" class="btn-edit">แก้ไข</button>
                    <a href="{{route('aboutDepartment_Admin')}}" class="btn-delete">ยกเลิก</a>
                </div>
            </div>
        </form>
        @endforeach
        
    </div>
@endsection