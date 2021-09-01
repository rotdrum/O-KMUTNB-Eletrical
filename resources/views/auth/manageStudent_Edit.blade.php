@extends('layouts.admin-app')

@section('content')

<div class="vue-container">
    <div class="card-login">
        @foreach ($users as $user)
            
        <form class="register" method="POST" action="{{ route('postmanageStudentEdit') }}">
        @csrf
            <p style="text-align: center;">แก้ไขข้อมูลส่วนตัวนักศึกษา</p>
            <input name="id"  value="{{ $user->id }}" type="hidden" class="txt-small @error('fname') is-invalid @enderror" name="fname" value="" required autocomplete="fname" placeholder="ชื่อ">


            <div class="registerForm-row">
                {{-- Title name --}}
                <select name="tname" class="select-title">
                    
                    <option value="{{ $user->tname }}">{{ $user->tname }}</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>

                {{-- First name --}}
                <input name="fname"  value="{{ $user->fname }}" type="text" class="txt-small @error('fname') is-invalid @enderror" name="fname" value="" required autocomplete="fname" placeholder="ชื่อ">
                {{-- Last name --}}
                <input name="lname" value="{{ $user->lname }}" type="text" class="txt-small @error('fname') is-invalid @enderror" name="fname" value="" required autocomplete="fname" placeholder="นามสกุล">
            </div>

            <div class="registerForm-row">
                {{-- Department --}}
                <select name="sub" class="select-full">
                    <option value="{{ $user->sub }}">{{ $user->sub }}</option>
                    <option value="PnET(PE)-R">PnET(PE)-R</option>
                    <option value="PnET(PE)-2R">PnET(PE)-2R</option>
                    <option value="PnET(C)-R">PnET(C)-R</option>
                    <option value="PNT-R">PNT-R</option>
                    <option value="PNT-T">PNT-T</option>
                </select>
            </div>

            {{-- email --}}
            <input name="email"  value="{{ $user->email }}" type="text" class="txt-login @error('fname') is-invalid @enderror" required  placeholder="อีเมล">

            {{-- Tel Fix 9 digits --}}
            <input name="tel" value="{{ $user->tel }}" type="number" class="txt-login @error('fname') is-invalid @enderror"  required  placeholder="โทรศัพท์" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
            

            {{-- Button submit --}}
            <div class="btn-row-register">
                <button type="submit" value="บันทึก" class="btn btn-register">บันทึก</button>
                <a href="{{route('manageStudent')}}" class="btn btn-cancel">ยกเลิก</a>
            </div>

        </form>

        @endforeach

    </div>
</div>

@endsection
