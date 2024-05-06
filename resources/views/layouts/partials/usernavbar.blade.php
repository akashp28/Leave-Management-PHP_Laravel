<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.home', ['username' => $user->username]) }}">Hello {{ $user->name
            }}</a>

        <div class="rightdiv">
            <div class="dropdown">
                <a class="btn btn-dark dropdown-toggle border-0 text-white" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Notifications &nbsp<span id="notificationCount" class="badge bg-danger"></span> @include('svg.bell')
                </a>

                <ul class="dropdown-menu" aria-labelledby="notificationDropdown" id="notificationMenu">

                </ul>
            </div>
            <a class="navbar-brand" href="{{ route('password.form', ['userid' => $user->id]) }}">Change Password</a>
            <a class="navbar-brand" href="{{ route('user.leave.list', ['leave' => $user->id]) }}">Leave Portal</a>
            <a class="navbar-brand" href="{{ route('user.logout') }}">Logout</a>
        </div>
    </div>
</nav>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>

<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('f5dd0cf0b4b4ffa0ec69', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('leave-status-channel');
    channel.bind('leave-status', function (data) {
        var leaveId = data.leave.leave_id;
        var leaveStatus = data.leave.status;
        var leaveReason = data.leave.reason;
        var alertmsg = "Your Application Regarding " + leaveReason + " is " + leaveStatus;
        alert(alertmsg);

        var notificationHtml = '<a class="dropdown-item" href="#">Leave Application Regarding <strong>' + leaveReason +
            '</strong> is <strong>' + leaveStatus + '</strong></a>';

        $('#notificationMenu').append(notificationHtml);
        var notificationCount = $('#notificationMenu').children().length;
        $('#notificationCount').text(notificationCount);
    });
</script>