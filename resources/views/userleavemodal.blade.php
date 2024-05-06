<div class="modal-content">
    <div class="modal-header">
        <h4>Leave Details</h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div>
    <div class="modal-body" id="mediumBody">

        <p><strong>Applied Date : </strong> {{ $leaveDetails->created_at }}</p>
        <p><strong>Reason : </strong> {{ $leaveDetails->reason }}</p>
        <p><strong>Content : </strong> {{ $leaveDetails->content }}</p>
        <p><strong>Start Date : </strong> {{ $leaveDetails->start_date }}</p>
        <p><strong>End Date : </strong> {{ $leaveDetails->end_date }}</p>
        <p><strong>Status : </strong> {{ $leaveDetails->status }}</p>

    </div>
</div>