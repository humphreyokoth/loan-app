<?= $this->extend('admin-base') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Accounts</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Accounts</li>
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
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-wrap justify-content-between">
                            <h3 class="card-title">MCash AgriFin Accounts</h3>
                            <div class="btn-group" role="group">
                                <a href="<?= base_url('account/add?type=off_taker') ?>" class="btn btn-sm btn-default"><i class="fas fa-plus"></i> Create Off Taker Account</a>
                                <a href="<?= base_url('find/farmer-group') ?>" class="btn btn-sm btn-default"><i class="fas fa-search"></i> Account Finder</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="data_table_wrapper" class="table-responsive">
                            <table id="data-table-export" class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Account</th>
                                        <th>Name</th>
                                        <th>Account Type</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($accounts as $account) : ?>
                                        <tr>
                                            <td><a href="<?= base_url('account/' . $account->id) ?>"><?= $account->account ?></a></td>
                                            <td><?= is_null($account->vendor) ? $account->fullname : $account->vendor ?></td>
                                            <td><?= $account->user_type ?></td>
                                            <td><?= $account->created_at ?></td>
                                            <td><a href="<?= base_url('account/' . $account->id) ?>">View</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->

</div><!-- /.container-fluid -->
<!-- </div> -->
<!-- /.content -->

<?= $this->endSection() ?>

<?= $this->section('js-files') ?>
<script>
    $(function() {
        $("#data-table").DataTable();

        $("#data-table-export").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "print"]
        }).buttons().container().appendTo('#data_table_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection() ?>