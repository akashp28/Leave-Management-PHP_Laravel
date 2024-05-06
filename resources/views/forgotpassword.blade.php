@extends('layouts.index')

@section('title', 'Forgot Password')

@section('content')

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Forgot Password</a>
        <div class="rightnav">

            <a class="navbar-brand" href="{{ route('user.login') }}">User Login</a>
        </div>
    </div>

</nav>
@if(session()->has('message'))
<h4> {{session()->get('message')}}
</h4>
@endif
<h6>Forgot Password</h6>
<div class="custom-container2">

    <form action="{{route('do.forgot.password')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-6">
            <label for="email" class="col-sm-5 col-form-label">Email Address :</label>
            <div class="col-sm-7"><input type="text" name="email" id="" class="form-control form-control-sm" required>
            </div>
        </div>



        <button type="submit" class="btn btn-primary" style="margin-top: 10px; ">Get Link</button>

    </form>

</div>

@endsection