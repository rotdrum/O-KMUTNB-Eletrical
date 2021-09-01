@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>จัดการข้อมูลบุคลากร</h1>
            <!--
            <a href="#" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มข้อมูลบุคลากร</a>
            -->
        </div>

        <form class="article-container" method="POST" action="{{ route('manageTeacherSearch') }}">
        @csrf
            <div class="article-tools">
                <div class="article-search">
                    <input name="search" class="search" type="search" placeholder="ค้นหารหัสบัญชีผู้ใช้ หรือ อีเมล">
                    <i class="fas fa-search"></i>
                    <button>ค้นหา</button>
                </div>
            </div>
            <div class="t-tr">
                <div class="t-th">ลำดับ</div>
                <div class="t-th">ชื่อ-สกุล</div>
                <div class="t-th">เบอร์โทรศัพท์</div>
                <div class="t-th">อีเมล</div>
                <div class="t-th">จัดการ</div>
            </div>

            @php
                $count = 1;
            @endphp
            @foreach ($users as $user)
                
            <div class="t-tr">
                <div class="t-td">
                    <p class="mobile">ลำดับ</p>
                    <p class="level">{{$count}}</p>
                </div>
                <div class="t-td">
                    <p class="mobile">ชื่อ-สกุล</p>
                    {{ $user->name_thai }}
                </div>
                <div class="t-td">
                    <p class="mobile">เบอร์โทรศัพท์</p>
                    {{ $user->tel }}
                </div>
                <div class="t-td">
                    <p class="mobile">อีเมล</p>
                    {{ $user->email }}
                </div>
                <div class="t-td">
                    @if( $user->username == "" )
                        <a href="{{route('manageTeacherUser', ['id' => $user->id ])}}" class="btn-s-edit">ตั้งค่าบัญชีผู้ใช้</a>
                    @else
                        <a href="{{route('manageTeacherUser', ['id' => $user->id ])}}" class="btn-s-delete">เปลี่ยนรหัสผ่าน</a>
                    @endif
                </div>
            </div>

            @php
                $count++ ;
            @endphp
            @endforeach
            <div class="t-tr">
                <span></span>
            </div>
        </form>


    </div>
@endsection