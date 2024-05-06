@extends('layouts.index')
@section('title', 'Leave Form')
@section('content')

@include('layouts.partials.usernavbar')

@if(session()->has('message'))
<h4> {{session()->get('message')}}
</h4>
@endif

<div class="custom-container">

    <form action="{{route('submit.leave',['userid' => $user->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-6">
            <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
            <div class="col-sm-10"><input type="date" name="start_date" id="" class="form-control form-control-sm">
            </div>
        </div>
        <div class="row mb-6">
            <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
            <div class="col-sm-10"><input type="date" name="end_date" id="" class="form-control form-control-sm">
            </div>
        </div>

        <div class="row mb-6">
            <label for="reason" class="col-sm-3 col-form-label">Reason</label>
            <div class="col-sm-9"><input type="text" name="reason" id="" class="form-control form-control-sm">
            </div>
        </div>
        <label for="address" class="form-label">Message</label><br><textarea name="content" id=""
            class="form-control form-control-sm" cols="30" rows="5"></textarea>
        <br>
        <button type="submit" class="btn btn-success" style="margin-top: 10px; ">Request Leave</button>
    </form>
</div>

<script src="" async defer></script>

@endsection