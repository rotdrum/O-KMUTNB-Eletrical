@extends('layouts.admin-app')

@section('content')

<div class="vue-container">
    <div class="card-login">
    @foreach ($users as $user)
        
        <form class="register" method="POST" action="{{ route('postResetPassword') }}">
        @csrf
            <p style="text-align: center;">รีเซ็ทรหัสผ่าน</p>
            <input name="id"  value="{{$user->id}}" type="hidden" class="txt-small @error('fname') is-invalid @enderror" name="fname" value="" required autocomplete="fname" placeholder="ชื่อ">
            <br/>
            <h3 >ชื่อ-สกุล : {{$user->tname}}{{$user->fname}} {{$user->lname}}</h3>


          {{-- username --}}
      
            <input name="username" value="{{ $user->username }}"  type="text" class="txt-login @error('fname') is-invalid @enderror" required  placeholder="บัญชีผู้ใช้">
  
            {{-- password --}}
            <input name="password"  type="password" class="txt-login @error('fname') is-invalid @enderror"  required  placeholder="รหัสผ่าน" >
            

            {{-- Button submit --}}
            <div class="btn-row-register">
                <button type="submit" value="บันทึก" class="btn btn-register">บันทึก</button>
                <a href="{{route('manageStudent')}}" class="btn btn-cancel">ยกเลิก</a>
            </div>

            <br/>
            <h3 >** รหัสผ่านเป็นการตั้งชั่วคราว เพื่อให้นักศึกษาตั้งรหัสผ่านใหม่อีกครั้ง</h3>


        </form>

        @endforeach

    </div>
</div>

@endsection
