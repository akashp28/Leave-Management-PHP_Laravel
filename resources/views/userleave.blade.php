@extends('layouts.index')
@section('title', 'Leave Portal')
@section('content')

@include('layouts.partials.usernavbar')

@if(session()->has('message'))
<h4>{{session()->get('message')}}</h4>
@endif

<div class="container2">
    <div class="add float-right"><a href="{{ route('leaveForm',['userid' => $user->id]) }}">
            <button type="button" id="btn1" class="btn btn-primary btn-sm">New Request</button>
        </a></div>
    <table class="table table-striped table-bordered" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Applied Date</th>
                <th scope="col">Reason</th>
                <th scope="col">Status</th>
                <th scope="col" style="text-align:center;">View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leavelist as $leave)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $leave->created_at }}</td>
                <td>{{ $leave->reason }}</td>
                <td>{{ $leave->status }}</td>
                <td style="text-align:center;">
                    <span class="icon" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                        data-attr="{{ route('leave.details', ['leaveId' => $leave->leave_id]) }}" title="View Details">
                        @include('svg.eye')
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody">

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>


    $(document).on('click', '#mediumButton', function (event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function () {
                $('#loader').show();
            },
            success: function (result) {
                $('#mediumModal .modal-dialog .modal-content').html(result);
                $('#mediumModal').modal("show");
            },
            complete: function () {
                $('#loader').hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        });
    });
    $(document).on('click', '#mediumModal .btn-close', function () {
        $('#mediumModal').modal('hide');
    });


</script>

<script>
    let table = new DataTable('#myTable');

</script>


@endsection