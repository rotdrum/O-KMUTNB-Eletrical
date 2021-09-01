@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>จัดการข้อมูลนักศึกษา</h1>
            <!--
            <a href="{{route('manageStudentAdd')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มข้อมูลนักศึกษา</a>
            -->
        </div>

        <form class="article-container" method="POST" action="{{route('manageStudentSearch')}}">
      @csrf
            <div class="article-tools">
                <div class="article-search">
                    <input name="search" class="search" type="search" placeholder="ค้นหารหัสนักศึกษา หรือ อีเมล">
                    <i class="fas fa-search"></i>
                    <button>ค้นหา</button>
                </div>
            </div>
            <div class="s-tr">
                <div class="s-th">ลำดับ</div>
                <div class="s-th">ห้อง</div>
                <div class="s-th">รหัสนักศึกษา</div>
                <div class="s-th">ชื่อ-สกุล</div>
                <div class="s-th">เบอร์โทรศัพท์</div>
                <div class="s-th">อีเมล</div>
                <div class="s-th">จัดการ</div>
            </div>

            @php
                $count = 1;
            @endphp
            @foreach ($users as $user)
                
            <div class="s-tr">
                <div class="s-td">
                    <p class="mobile">ลำดับ</p>
                    <p class="level">{{$count}}</p>
                </div>
                <div class="s-td">
                    <p class="mobile">ห้อง</p>
                    {{ $user->sub }}
                </div>
                <div class="s-td">
                    <p class="mobile">รหัสนักศึกษา</p>
                    {{ $user->username }}
                </div>
                <div class="s-td">
                    <p class="mobile">ชื่อ-สกุล</p>
                    {{ $user->tname }}{{ $user->fname }} {{ $user->lname }}
                </div>
                <div class="s-td">
                    <p class="mobile">เบอร์โทรศัพท์</p>
                    {{ $user->tel }}
                </div>
                <div class="s-td">
                    <p class="mobile">อีเมล</p>
                    {{ $user->email }}
                </div>
                <div class="s-td">
                    <a href="{{route('manageStudentEdit', ['id' => $user->id ])}}" class="btn-s-edit">แก้ไข</a>
                    <a href="{{route('manageStudentDelete', ['id' => $user->id ])}}" class="btn-s-delete">ลบ</a>
                    @if( $user->status == 1)
                        <a href="{{route('changestatus', [ 'id' => $user->id ])}}" class="btn-s-reset">รีเซ็ทรหัสผ่าน</a>
                    @else
                        <a class="btn-s-reset active-reset-pass" disabled>รีเซ็ทรหัสผ่าน</a>
                    @endif
                </div>
            </div>

            @php
                $count++ ;
            @endphp
            @endforeach
            <!--
            <div class="s-tr">
                <span>หมายเหตุ : รหัสในการรีเซ็ตรหัสผ่านใหม่คือ Kmutnb_1234</span>
            </div>
        -->
        </form>

    </div>
@endsection