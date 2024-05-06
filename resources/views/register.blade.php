@extends('layouts.adminlayout')
@section('title', 'Registration Page')

@section('content-header')
<h3 style="text-align:center; font-weight: bold;">User Registration</h3>
@endsection


@section('content')
@if(session()->has('message'))
<h4> {{session()->get('message')}}
</h4>
@endif
<div class="custom-container">
    <form action="{{route('save.user')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-6"> <label for="Name" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8"><input type="text" name="name" id="" class="form-control form-control-sm "
                    value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-6">
            <label for="Designation" class="col-sm-4 col-form-label">Designation</label>
            <div class="col-sm-8"><input type="text" name="designation" id="" class="form-control form-control-sm"
                    value="{{ old('designation') }}">
                @error('designation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-6">
            <label for="dob" class="col-sm-4 col-form-label">DOB</label>
            <div class="col-sm-8"><input type="date" name="dob" id="" class="form-control form-control-sm"
                    value="{{ old('dob') }}">
            </div>
        </div>


        <div class="row mb-6">
            <label for="mobile number" class="col-sm-4 col-form-label">Mobile Number</label>
            <div class="col-sm-8"><input type="tel" name="mobno" id="" class="form-control form-control-sm"
                    value="{{ old('mobno') }}">
                @error('mobno')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <br>
        <div class="row mb-6">
            <label for="username" class="col-sm-4 col-form-label">User Name</label>
            <div class="col-sm-8"><input type="text" name="username" id="" class="form-control form-control-sm"
                    value="{{ old('username') }}">
                @error('username')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="row mb-6"> <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8"><input type="email" name="email" id="" class="form-control form-control-sm"
                    value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-6"> <label for="Password" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8"><input type="password" name="password" id="" class="form-control form-control-sm">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-6"> <label for="Image" class="col-sm-4 col-form-label">Profile Pic</label>
            <div class="col-sm-8"><input type="file" name="image" id="" class="form-control form-control-sm">
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-success" style="margin-top: 10px; ">Register</button>
    </form>

</div>

@endsection

@section('scripts')
<!-- Additional scripts for the dashboard -->
@endsection