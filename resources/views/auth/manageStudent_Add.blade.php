@extends('layouts.admin-app')

@section('content')

<div class="vue-container">
    <div class="card-login">
        <form class="register" method="POST" action="{{ route('register') }}">
            <p style="text-align: center;">เพิ่มข้อมูลส่วนตัวนักศึกษา</p>

            {{-- Username --}}
            <input type="number" class="txt-login" value="" required placeholder="รหัสนักศึกษา" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;">

            {{-- Password --}}
            <input type="password" class="txt-login" value="" required placeholder="รหัสผ่าน">

            <div class="registerForm-row">
                {{-- Title name --}}
                <select class="select-title">
                    <option value="">เลือก</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>

                {{-- First name --}}
                <input id="fname" type="text" class="txt-small @error('fname') is-invalid @enderror" name="fname" value="" required autocomplete="fname" placeholder="ชื่อ">
                {{-- Last name --}}
                <input id="fname" type="text" class="txt-small @error('fname') is-invalid @enderror" name="fname" value="" required autocomplete="fname" placeholder="นามสกุล">
            </div>

            <div class="registerForm-row">
                {{-- Department --}}
                <select class="select-full">
                    <option value="">เลือกห้อง</option>
                    <option value="PnET(PE)-R">PnET(PE)-R</option>
                    <option value="PnET(PE)-2R">PnET(PE)-2R</option>
                    <option value="PnET(C)-R">PnET(C)-R</option>
                    <option value="PNT-R">PNT-R</option>
                    <option value="PNT-T">PNT-T</option>
                </select>
            </div>

            {{-- email --}}
            <input id="fname" type="text" class="txt-login @error('fname') is-invalid @enderror" name="fname" value="" required autocomplete="fname" placeholder="อีเมล">

            {{-- Tel Fix 9 digits --}}
            <input id="fname" type="number" class="txt-login @error('fname') is-invalid @enderror" name="fname" value="" required autocomplete="fname" placeholder="โทรศัพท์" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
            
            {{-- Button submit --}}
            <div class="btn-row-register">
                <input type="submit" value="บันทึก" class="btn btn-register">
                <a href="{{route('manageStudent')}}" class="btn btn-cancel">ยกเลิก</a>
            </div>

        </form>
    </div>
</div>

@endsection
