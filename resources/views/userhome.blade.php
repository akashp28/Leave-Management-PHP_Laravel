@extends('layouts.index')

@section('title', 'User Home')

@section('content')

@include('layouts.partials.usernavbar')

<div class="custom-container2">
    <div class="card" style="">
        <img src="{{ asset('storage/images/'.$user->image) }}" class="card-img-top" alt="..."
            style="width: auto; height: 200px;">

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Name :</strong> {{ $user->name}}</li>
            <li class="list-group-item"><strong>Designation :</strong> {{ $user->designation}}</li>
            <li class="list-group-item"><strong>Email : </strong>{{ $user->email}}</li>
        </ul>

    </div>
</div>
<!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->


@endsection