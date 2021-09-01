@extends('layouts.app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>โครงสร้างองค์กร</h1>
        </div>
        @foreach ($structures as $structure)
        <img class="img-structure" src="{{asset('storage/')}}/../../storage/app/public/structure/{{ $structure->pic }}">
            
        @endforeach
    </div>
@endsection