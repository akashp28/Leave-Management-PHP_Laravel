Pusher.logToConsole = true;

var pusher = new Pusher('f5dd0cf0b4b4ffa0ec69', {
    cluster: 'ap2'
});

var channel = pusher.subscribe('leave-status-channel');
channel.bind('leave-status', function (data) {
    var leaveId = data.leave.leave_id;
    var leaveStatus = data.leave.status;
    var leaveReason = data.leave.reason;
    var alertmsg = "Your Application Regarding " + leaveReason + "  is  " + leaveStatus;
    alert(alertmsg);

    var notificationHtml = '<a class="dropdown-item" href="#">Leave Application Regarding <strong>' + leaveReason + '</strong> is <strong>' + leaveStatus + '</strong></a>';

    $('#notificationMenu').append(notificationHtml);
    var notificationCount = $('#notificationMenu').children().length;
    $('#notificationCount').text(notificationCount);
});
