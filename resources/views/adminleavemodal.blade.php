<div class="modal-content">
    <div class="modal-header">
        <h3><strong>Leave Details</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="mediumBody">

        <p><strong>Name : </strong> {{ $leave->name }}</p>
        <p><strong>Designation : </strong> {{ $leave->designation }}</p>
        <p><strong>Applied Date : </strong> {{ $leave->created_at }}</p>
        <p><strong>Reason : </strong> {{ $leave->reason }}</p>
        <p><strong>Content : </strong> {{ $leave->content }}</p>
        <p><strong>Start Date : </strong> {{ $leave->start_date }}</p>
        <p><strong>End Date : </strong> {{ $leave->end_date }}</p>
        <p><strong>Mobile No. : </strong> {{ $user->mob_no }}</p>
        <p><strong>Email : </strong> {{ $user->email }}</p>
        <p><strong>Status : </strong> {{ $leave->status }}</p>
    </div>
</div>