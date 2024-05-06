@extends('layouts.index')

@section('title', 'User Password Reset')

@section('content')

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">User Password Reset</a>
        <div class="rightnav">

            <a class="navbar-brand" href="{{ route('user.login') }}">User Login Page</a>
        </div>
    </div>

</nav>
@if(session()->has('message'))
<h4> {{session()->get('message')}}
</h4>
@endif
<h6>Enter your new Password</h6>
<div class="custom-container2">


    <form action="{{route('do.reset.password')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{encrypt($user->id)}}">
        <div class="row mb-6">
            <label for="newpassword" class="col-sm-5 col-form-label">New Password</label>
            <div class="col-sm-7"><input type="password" name="password" id="" class="form-control form-control-sm"
                    required></div>
        </div>
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="row mb-6"> <label for="confirmPassword" class="col-sm-5 col-form-label">Confirm Password</label>
            <div class="col-sm-7"><input type="password" name="confirm_password" id=""
                    class="form-control form-control-sm" required></div>
        </div>
        @error('confirm_password')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn btn-primary" style="margin-top: 10px; ">Update Password</button>

    </form>

</div>

@endsection