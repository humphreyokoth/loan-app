<?= $this->extend('admin-base') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Transactions</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transactions</li>
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
                            <h3 class="card-title">MCash AgriFin Transactions</h3>
                            <!-- <div class="btn-group" role="group">
                                <a href="<?= base_url('find/farmer-group') ?>" class="btn btn-sm btn-default"><i class="fas fa-search"></i> Account Finder</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="data_table_wrapper" class="table-responsive">
                            <table id="data-table-export" class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Txn ID</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>From Account</th>
                                        <th>To Account</th>
                                        <th>Commodity</th>
                                        <th>Variant</th>
                                        <th>Grade</th>
                                        <th>Amount(UGX)</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transactions as $txn) : ?>
                                        <tr>
                                            <td><a href="<?= base_url('transaction/' . $txn->id) ?>"><?= 'TXN-' . sprintf('%05d', $txn->id) ?></a></td>
                                            <td><?= date('d-m-Y', strtotime($txn->created_at)) ?></td>
                                            <td><?= date('h:i:s A', strtotime($txn->created_at)) ?></td>
                                            <td><a href="<?= base_url('account/' . $txn->from_user_id) ?>"><?= is_null($txn->vendor) ? $txn->from_name : $txn->vendor . '( ' . $txn->from_account . ')' ?></a></td>
                                            <td><a href="<?= base_url('account/' . $txn->to_user_id) ?>"><?= $txn->to_name . '( ' . $txn->to_account . ')' ?></a></td>
                                            <td><?= $txn->commodity ?></td>
                                            <td><?= $txn->commodity_variant ?></td>
                                            <td><?= $txn->commodity_grade ?></td>
                                            <td><?= number_format($txn->quantity * $txn->unit_price) ?></td>
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
</div>
<!-- /.content -->

<?= $this->endSection() ?>

<?= $this->section('js-files') ?>
<script>
    // setTimeout(()=>{
    //     alert('Your session has timed out. Please login again');
    // },3600);
    
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