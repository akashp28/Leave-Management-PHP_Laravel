@extends('layouts.index')

@section('title', 'Admin Login')

@section('content')

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Login Page</a>
        <div class="rightnav">

            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        </div>
</nav>


</nav>
@if(session()->has('message'))
<h4> {{session()->get('message')}}
</h4>
@endif
<h6>Admin Login</h6>
<div class="custom-container2">

    <form action="{{route('do.admin.login')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="row mb-6">
            <label for="username" class="col-sm-5 col-form-label">User Name</label>
            <div class="col-sm-7"><input type="text" name="username" id="" value="admin"
                    class="form-control form-control-sm" required></div>
        </div>

        <div class="row mb-6"> <label for="Password" class="col-sm-5 col-form-label">Password</label>
            <div class="col-sm-7"><input type="password" name="password" id="" value="admin"
                    class="form-control form-control-sm" required></div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px; ">Login</button>

    </form>

</div>

@endsection