<!DOCTYPE html>
<html>

<head>
    <title>Daily Leave List Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h3>Daily Leave List Report</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Designation</th>
                <th>Reason</th>
                <th>Content</th>
                <th>Applied Date</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>No. of Days</th>
                <th>Status</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($leaveList as $leave)
            <tr>
                <td>{{ $leave->name }}</td>
                <td>{{ $leave->designation }}</td>
                <td>{{ $leave->reason }}</td>
                <td>{{ $leave->content }}</td>
                <td>{{ $leave->created_at }}</td>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->no_of_days }}</td>
                <td>{{ $leave->status }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>