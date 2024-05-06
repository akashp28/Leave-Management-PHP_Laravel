@extends('layouts.index')

@section('title', 'Home Page')

@section('content')

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Leave Management System</a>
        <div class="rightnav">
            <a class="navbar-brand" href="{{route('user.login')}}">User Login</a>
            <a class="navbar-brand" href="{{route('admin.login')}}">Admin Login</a>

        </div>
    </div>

</nav>
<div class="homediv">
    <h3>W E L C O M E &nbsp &nbsp T O</h3>
    <h1>L E A V E &nbsp &nbsp M A N A G E M E N T &nbsp &nbsp S Y S T E M</h1>
</div>

@endsection