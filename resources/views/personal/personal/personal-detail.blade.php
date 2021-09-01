@extends('layouts.app')

@section('content')
@foreach ($personalss as $personal)
    
    <div class="vue-container">
        <div class="profile-container">
            <div class="profile-left">

                {{-- card --}}
                <div class="profile-card">
                    <div class="profile-image">
                        <img src="{{asset('storage/')}}/../../storage/app/public/personal/pic/{{ $personal->pic_name }}">
                    </div>
                    <h2>{{ $personal->name_thai }}</h2>
                    <h3 style="text-align: center">{{ $personal->position }}</h3>
                </div>

            </div>
            <div class="profile-right">

                {{-- card --}}
                <div class="profile-card">
                    <h2>รายละเอียด</h2>
                    <div class="profile-detail">
                        <p>ชื่อ-สกุล (ไทย)</p>
                        <p>{{ $personal->name_thai }}</p>
                    </div>
                    <div class="profile-detail">
                        <p>ชื่อ-สกุล (อังกฤษ)</p>
                        <p>{{ $personal->name_eng }}</p>
                    </div>
                    <div class="profile-detail">
                        <p>ชื่อย่อ</p>
                        <p>{{ $personal->initial }}</p>
                    </div>
                    <div class="profile-detail">
                        <p>อีเมล</p>
                        <p>{{ $personal->email }}</p>
                    </div>
                    <div class="profile-detail">
                        <p>ติดต่อ</p>
                        <p>{{ $personal->contact }}</p>
                    </div>
                    <div class="profile-detail">
                        <p>โทรศัพท์</p>
                        <p>{{ $personal->tel }}</p>
                    </div>
                </div>

                {{-- card --}}
                <div class="profile-card">
                    <h2>วุฒิทางการศึกษา</h2>
                    <div class="profile-detail">
                        @if ( $personal->bachelor == "")
                    
                        @else
                            <p>ปริญญาตรี</p>
                            <p>{{ $personal->bachelor }}</p>
                        @endif
                    </div>
                    <div class="profile-detail">
                        @if ( $personal->master == "")
                    
                        @else
                            <p>ปริญญาโท</p>
                            <p>{{ $personal->master }}</p>
                        @endif
                    </div>
                    <div class="profile-detail">
                    @if ( $personal->phd == "")
                    
                    @else
                        <p>ปริญญาเอก</p>
                        <p>{{ $personal->phd }}</p>
                    @endif
                    </div>
                </div>

                {{-- card --}}
                <div class="profile-card">
                    <h2>ภาระงานสอน/ความเชี่ยวชาญ</h2>
                    <div class="profile-detail">
                        <p style="text-align: left;">{{ $personal->edu1 }}</p>
                    </div>
                    <div class="profile-detail">
                        <p style="text-align: left;">{{ $personal->edu2 }}</p>
                    </div>
                    <div class="profile-detail">
                        <p style="text-align: left;">{{ $personal->edu3 }}</p>
                    </div>
                    <div class="profile-detail">
                        <p style="text-align: left;">{{ $personal->edu4 }}</p>
                    </div>
                    <div class="profile-detail">
                        <p style="text-align: left;">{{ $personal->edu5 }}</p>
                    </div>
                </div>

                {{-- card --}}
                <div class="profile-card">
                    <h2>ดูรายละเอียดเพิ่มเติม</h2>
                    <button class="btn-personal-detail"  onclick="window.location.href='{{asset('storage/')}}/../../storage/app/public/personal/file/{{ $personal->file_name }}'">ดูรายละเอียด</button>
                </div>
            </div>

        </div>

    </div>

@endforeach
@endsection