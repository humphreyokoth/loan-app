<div class="modal-header">
    <h5 class="modal-title">Approve Loan Request</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="approve-request" action="<?= base_url('form/approve-loan-request') ?>" method="post">
        <input type="hidden" name="id" value="<?= $user_loan_request_id ?>">

        <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <select class="form-select select2bs4 select2" style="width:100%;" name="request_status" aria-label="Default select example">
                <option>-- --</option>
                <option value="approve">Approve</option>
                <option value="reject">Reject</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Comment</label>
            <textarea name="comment" class="form-control" id="" cols="20" rows="10"></textarea>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="sumit" class="btn btn-primary" form="approve-request">Submit</button>
</div>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>