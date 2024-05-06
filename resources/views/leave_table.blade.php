<table class="table table-striped table-bordered" id="myTable">
    <thead class="thead-dark">
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Reason</th>
            <th scope="col">Days</th>
            <th scope="col">Status</th>
            <th scope="col">View</th>
            <th scope="col">Action</th>
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
            <td>
                <span class="icon" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                    data-attr="{{route('leave.details.admin', $leave->leave_id)}}" title="View Details">
                    @include('svg.eye')
                </span>
            </td>
            <td>
                <a href="{{ route('leave.approve', $leave->leave_id) }}" class="btn btn-sm btn-success">Approve</a>
                <a href="{{ route('leave.reject', $leave->leave_id) }}" class="btn btn-sm btn-warning">Reject</a>
                <a href="{{ route('leave.delete', $leave->leave_id) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>