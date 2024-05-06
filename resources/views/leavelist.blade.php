@extends('layouts.adminlayout')
@section('title', 'Leave List')

@section('content')

@section('content-header')
<h3 style="text-align:center; font-weight: bold;">Leave Requests</h3>
<div class="row" style="width: 100%;">
    <div class="col-md-5 offset-md-3">
        <form id="leaveSearchForm">
            <div class="d-flex align-items-end">
                <div class="form-group mr-3">
                    <label for="start_date" class="mr-2">Start Date:</label>
                    <input type="date" class="form-control form-control-sm" id="start_date" name="start_date">
                </div>
                <div class="form-group mr-3">
                    <label for="end_date" class="mr-2">End Date:</label>
                    <input type="date" class="form-control form-control-sm" id="end_date" name="end_date">
                </div>
                <div class="form-group mr-3">
                    <button type="submit" class="btn btn-info btn-sm">Search</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection


@if(session()->has('message'))
<h4>{{session()->get('message')}}</h4>
@endif

<div id="leaveListContainer" class="container2">
    <table class="table table-striped table-bordered" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">Reason</th>
                <th scope="col">No. of Days</th>
                <th scope="col">Status</th>
                <th scope="col" class="exclude">View</th>
                <th scope="col" class="exclude" style="text-align:center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leavelist as $leave)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $leave->name }}</td>
                <td>{{ $leave->reason }}</td>
                <td>{{ $leave->no_of_days }}</td>
                <td>{{ $leave->status }}</td>
                <td style="text-align:center;">
                    <span class="icon" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                        data-attr="{{route('leave.details.admin', $leave->leave_id)}}" title="View Details">
                        @include('svg.eye')
                    </span>
                </td>
                <td>
                    <a href="{{ route('leave.approve', $leave->leave_id) }}" class="btn btn-sm btn-success">Approve</a>
                    <a href="{{ route('leave.reject', $leave->leave_id) }}" class="btn btn-sm btn-warning">Reject</a>
                    <a href="{{ route('leave.delete', $leave->leave_id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </tdstyle=>
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
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody">

            </div>
        </div>
    </div>
</div>

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


    $(document).ready(function () {
        $('#leaveSearchForm').submit(function (e) {
            e.preventDefault();

            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();

            $.ajax({
                type: 'GET',
                url: "{{ route('search.leave') }}",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (response) {
                    $('body').html(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>


<script>
    let table = $('#myTable').DataTable({
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'excel',
                text: 'Excel',
                className: 'custom-btn',
                exportOptions: {
                    columns: ':visible:not(.exclude)'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'custom-btn',
                exportOptions: {
                    columns: ':visible:not(.exclude)'
                }
            }
        ],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

</script>

@endsection