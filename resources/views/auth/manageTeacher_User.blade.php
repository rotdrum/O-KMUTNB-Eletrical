@extends('layouts.admin-app')

@section('content')

<div class="vue-container">
    <div class="card-login">
    @foreach ($personals as $personal)
        
        <form class="register" method="POST" action="postSetTeacherUser">
        @csrf
            <p style="text-align: center;">ตั้งค่าบัญชีผู้ใช้</p>
            <input name="id"  value="{{$personal->id}}" type="hidden" class="txt-small @error('fname') is-invalid @enderror" name="fname" value="" required autocomplete="fname" placeholder="ชื่อ">
            <br/>
            <h3 >ชื่อ-สกุล : {{$personal->name_thai}}</h3>


          {{-- username --}}
            @if ( $personal->username == "" )
            <input name="username"  type="text" class="txt-login @error('fname') is-invalid @enderror" required  placeholder="บัญชีผู้ใช้">
            @else
            <input name="username" value="{{ $personal->username }}"  type="text" class="txt-login @error('fname') is-invalid @enderror" required  placeholder="บัญชีผู้ใช้">
            @endif
  
            {{-- password --}}
            <input name="password"  type="password" class="txt-login @error('fname') is-invalid @enderror"  required  placeholder="รหัสผ่าน" >
            

            {{-- Button submit --}}
            <div class="btn-row-register">
                <button type="submit" value="บันทึก" class="btn btn-register">บันทึก</button>
                <a href="{{route('manageTeacher')}}" class="btn btn-cancel">ยกเลิก</a>
            </div>

        </form>

        @endforeach

    </div>
</div>

@endsection
