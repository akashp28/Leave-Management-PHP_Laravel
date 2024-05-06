@extends('layouts.index')

@section('title', 'User Login')

@section('content')

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">User Login Page</a>
        <div class="rightnav">

            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        </div>
    </div>

</nav>
@if(session()->has('message'))
<h4> {{session()->get('message')}}
</h4>
@endif
<h6>User Login</h6>
<div class="custom-container2">

    <form action="{{route('do.user.login')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-6">
            <label for="username" class="col-sm-5 col-form-label">User Name</label>
            <div class="col-sm-7"><input type="text" name="username" id="" value="exam"
                    class="form-control form-control-sm" required></div>
        </div>

        <div class="row mb-6"> <label for="Password" class="col-sm-5 col-form-label">Password</label>
            <div class="col-sm-7"><input type="password" name="password" id="" value="exam"
                    class="form-control form-control-sm" required></div>
        </div>

        <a href="{{route('forgot.password')}}">Forgot Password</a><br>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px; ">Login</button>

    </form>

</div>

@endsection