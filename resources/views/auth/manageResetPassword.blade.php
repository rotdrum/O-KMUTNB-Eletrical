@extends('layouts.app')

@section('content')

<div class="vue-container">
    <div class="card-login">
        <form class="register" method="POST" action="{{ route('register') }}">
            <p style="text-align: center;">กำหนดรหัสผ่านใหม่</p>

            {{-- Username --}}
            <input type="text" class="txt-login" value="" required placeholder="กำหนดรหัสผ่านใหม่">

            {{-- Button submit --}}
            <div class="btn-row-register">
                <input type="submit" value="บันทึก" class="btn btn-register">
                <a href="{{route('manageStudent')}}" class="btn btn-cancel">ยกเลิก</a>
            </div>

        </form>
    </div>
</div>

@endsection
