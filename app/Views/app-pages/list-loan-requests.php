<?= $this->extend('admin-base') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Loan Requests</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Loan Requests</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-wrap justify-content-between">
                            <h3 class="card-title">All Loan Requests</h3>
                            <div class="btn-group" role="group">
                                <a href="<?= base_url('loan-request/add') ?>" class="btn btn-sm btn-default"><i class="fas fa-plus"></i> New Request</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="data_table_wrapper" class="table-responsive">
                            <table id="data-table-export" class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Ref</th>
                                    <th>Account</th>
                                    <th>Account Type</th>
                                    <th>Amount (UGX)</th>
                                    <th>Narrative</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($requests as $request) : ?>
                                    <tr>
                                        <td><?= 'RID-' . sprintf('%05d', $request->id) ?></td>
                                        <td><a href="<?= base_url('account/' . $request->user_id) ?>"><?= is_null($request->vendor) ? $request->fullname : $request->vendor .' ('. $request->phone . ')' ?></a></td>
                                        <td><?= $request->user_type ?></td>
                                        <td><?= number_format($request->amount) ?></td>
                                        <td><?= $request->narrative ?></td>
                                        <td><?= $request->created_at ?></td>
                                        <td>
                                            <?php if($request->request_status == 'Pending') { ?>
                                                <span class="badge bg-warning"><?= $request->request_status ?></span>
                                            <?php } elseif($request->request_status == 'Approved') { ?>
                                                <span class="badge bg-success"><?= $request->request_status ?></span>
                                            <?php } elseif($request->request_status == 'Rejected') { ?>
                                                <span class="badge bg-danger"><?= $request->request_status ?></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($request->request_status_id == 1) { ?>
                                                <a class="modal-link" href="<?= base_url('modal/approve-loan-request/'.$request->id) ?>">Action</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection() ?>


<?= $this->section('css-files') ?>
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('assets/theme/admin-lte/plugins/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/theme/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
<?= $this->endSection() ?>


<?= $this->section('js-files') ?>
<!-- Select2 -->
<script src="<?= base_url('assets/theme/admin-lte/plugins/select2/js/select2.full.min.js') ?>"></script>
<script>
$(document).ready(function(){
    $("#data-table").DataTable();

    $("#data-table-export").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "print"]
    }).buttons().container().appendTo('#data_table_wrapper .col-md-6:eq(0)');


    $(document).on('click', '.modal-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        $.get(url)
        .done(function(data) {
            $('#ajaxModal').modal('show');
            $('#ajaxModal .modal-content').html(data);
        })
        .fail(function(err) {});
    });
});
</script>
<?= $this->endSection() ?>


