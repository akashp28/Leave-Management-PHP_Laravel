@extends('layouts.adminlayout')

@section('title', 'User List')

@section('content-header')
<h3 style="text-align:center; font-weight: bold;">Users List</h3>

@endsection
@section('content')

@if(session()->has('message'))
<h4> {{session()->get('message')}}
</h4>
@endif
<div class="container2">
    <table class="table table-striped table-bordered " id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">Designation</th>
                <th scope="col">D O B</th>
                <th scope="col">Username</th>

                <th scope="col">Email</th>
                <th scope="col">Mobile No.</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col" class="exclude">Profile Pic</th>
                <th scope="col" class="exclude">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->designation}}</td>
                <td>{{$user->dob}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->mob_no}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->status}}</td>
                <td style="text-align: center;"><img src="{{asset('storage/images/'.$user->image)}}" alt=""
                        style="width: 50px; height: 50px; border-radius: 50%;"></td>
                <td>
                    @if ($user->status === 'active')
                    <a href="{{ route('change.user.status', $user->id) }}" class="btn btn-warning btn-sm">Disable</a>
                    @else
                    <a href="{{ route('change.user.status', $user->id) }}" class="btn btn-success btn-sm">Enable</a>
                    @endif
                    <a href="{{ route('delete.user', $user->id) }}" class="btn btn-danger btn-sm">Remove</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

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