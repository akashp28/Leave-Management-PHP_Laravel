@extends('layouts.index')

@section('title', 'Change Password')

@section('content')

@include('layouts.partials.usernavbar')

@if(session()->has('message'))
<h4>{{ session('message') }}</h4>
@endif

@if(session()->has('error'))
<h4>{{ session('error') }}</h4>
@endif

<div class="passwordform">

    <form method="post" action="{{ route('change.password',['userid'=>$user->id]) }}" enctype="multipart/form-data">
        @csrf

        <div class="row mb-6">
            <label for="current_password" class="col-sm-4 col-form-label">Current Password:</label>
            <div class="col-sm-8"><input type="password" name="current_password" id=""
                    class="form-control form-control-sm">
                @error('current_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-6">
            <label for="new_password" class="col-sm-4 col-form-label">New Password:</label>
            <div class="col-sm-8"><input type="password" name="new_password" id="" class="form-control form-control-sm">
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-6">
            <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password:</label>
            <div class="col-sm-8"><input type="password" name="confirm_password" id=""
                    class="form-control form-control-sm">
                @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <button type="submit">Change Password</button>
    </form>
</div>
@endsection