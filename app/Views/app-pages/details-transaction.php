<?= $this->extend('admin-base') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Transaction</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('transactions') ?>">Transactions</a></li>
                    <li class="breadcrumb-item active"><?= 'TXN-' . sprintf('%05d', $transaction->id) ?></li>
                    
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
                            <h3 class="card-title">MCash AgriFin Transaction - <?= 'TXN-' . sprintf('%05d', $transaction->id) ?></h3>
                            <div class="btn-group" role="group">
                                <a href="<?= 'javascript:;' ?>" class="btn btn-sm btn-default"><i class="fas fa-print"></i> Print</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>Transaction ID: <?= 'TXN-' . sprintf('%05d', $transaction->id) ?></li>
                            <li>From Account: <a href="<?= base_url('account/' . $transaction->from_user_id) ?>"><?= is_null($transaction->vendor) ? $transaction->from_name : $transaction->vendor . '( ' . $transaction->from_account . ')' ?></a></li>
                            <li>To Account: <a href="<?= base_url('account/' . $transaction->to_user_id) ?>"><?= $transaction->to_name . '( ' . $transaction->to_account . ')' ?></a></li>
                            <li>Commodity: <?= $transaction->commodity ?></li>
                            <li>Variant: <?= $transaction->commodity_variant ?></li>
                            <li>Grade: <?= $transaction->commodity_grade ?></li>
                            <li>Quantity: <?= number_format($transaction->quantity) ?>Kgs</li>
                            <li>Unit Price: UGX <?= number_format($transaction->unit_price) ?></li>
                            <li>Created: <?= date('jS M Y \a\t h:i:s A', strtotime($transaction->created_at)) ?></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        Total: UGX <?= number_format($transaction->unit_price * $transaction->quantity) ?>
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