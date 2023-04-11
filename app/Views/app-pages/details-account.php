<?= $this->extend('admin-base') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Account</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Account</li>

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

            <!-- Header storage -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-wrap justify-content-between">                           
                                <h3 class="card-title"> <?= $account->user->user_type ?></h3>                           
                            <!-- <div class="btn-group" role="group"> -->
                            <!-- <=?php if ($account->user_type_id != 1) : ?> -->
                            <!-- <a href="<=?= base_url('add-storage'); ?>" class="btn btn-sm btn-default"><i class="fas fa-plus"></i> Create Storage</a> -->
                            <!-- <a href="<=?= base_url('find/farmer-group') ?>" class="btn btn-sm btn-default"><i class="fas fa-search"></i> Account Finder</a> -->
                            <!-- <=?php endif ?> -->
                            <!-- </div> -->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                              <a href="<?= base_url("accounts")?>"><h2 class="lead"><b><?= (is_null($account->user->vendor) ? '' : $account->user->vendor . ' - ') . $account->user->fullname ?></b></h2></a> 
                                <!-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> -->
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small py-2"><span class="fa-li"><i class="fas fa-md fa-building"></i></span> Address: <?= $account->user->address ?></li>
                                    <li class="small py-2"><span class="fa-li"><i class="fas fa-md fa-phone"></i></span> Phone #: +<?= $account->user->phone ?></li>
                                </ul>
                            </div>

                            <?php if ($account->user->user_type_id == 2) : ?>                               
                            <div class="col-lg-3 ">
                                <form action="<?= base_url('details-storage?id=') ?>" method="get">
                                    <div class="form-group ">
                                        <!-- <label for="exampleInputEmail1" class="col-sm-4 control-label">View Storage</label> -->                                        
                                        <select    id="validationDefault04" class=" form-control form-select select2bs4 select2 " style="width:100%;" name="id" aria-label="Default select example" required>                                    
                                                <option selected disabled value="">  Select Storage --</option>
                                                <?php foreach ($account->vendor_storages as $storage) : ?>
                                                    <option value="<?= $storage->id ?>">
                                                        <?= $storage->name?></option>
                                                <?php endforeach; ?>
                                            </select>


                                    </div>
                                    <div class="form-group col-sm-12 ">
                                        <?php if (isset($vendor_storage)) { ?>
                                            <button class="btn btn-primary" type="submit">Show storage</button>
                                        <?php } else { ?>
                                            <!-- <button class="btn btn-primary" name="after_submit" type="submit" value="create_storage">Create storage</button> -->
                                            <button class="btn btn-primary" name="after_submit" type="submit" value="show_storage">Show storage</button>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>

                            <?php endif ?>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Header storage end -->



        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->


    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Wallet Transactions (Bal. UGX <?= number_format($account->wallet_balance) ?>)</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="data_table_wrapper_2" class="table-responsive">
                        <table id="data-table-export-2" class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Ref</th>
                                    <th>Transaction</th>
                                    <th>Amount</th>
                                    <th>Narrative</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($account->wallet_txns as $txn) : ?>
                                    <tr>
                                        <?php if ($txn->wallet_txn_type == 4 || $txn->wallet_txn_type == 5) { ?>
                                            <td><a href="<?= base_url('transaction/' . $txn->transaction_ref) ?>"><?= 'TXN-' . sprintf('%05d', $txn->transaction_ref) ?></a></td>
                                        <?php } elseif ($txn->wallet_txn_type == 2) { ?>
                                            <td><?= 'RID-' . sprintf('%05d', $txn->transaction_ref) ?></td>
                                        <?php } else { ?>
                                            <td><?= sprintf('%05d', $txn->transaction_ref) ?></td>
                                        <?php } ?>
                                        <td><?= $txn->transaction_type ?></td>
                                        <td style="color: <?= $txn->amount > 0 ? 'green' : 'red' ?>;"><?= number_format($txn->amount) ?></td>
                                        <td><?= $txn->narrative ?></td>
                                        <td><?= $txn->created_at ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap justify-content-between">
                        <h3 class="card-title">Loan Requests</h3>
                        <!-- <div class="btn-group" role="group">
                                <a href="<?= base_url('find/farmer-group') ?>" class="btn btn-sm btn-default"><i class="fas fa-search"></i> Account Finder</a>
                            </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <div id="data_table_wrapper_1" class="table-responsive">
                        <table id="data-table-export-1" class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th># ID</th>
                                    <th>Amount (UGX)</th>
                                    <th>Narrative</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($account->loan_requests as $request) : ?>
                                    <tr>
                                        <td><?= 'RID-' . sprintf('%05d', $request->id) ?></td>
                                        <td><?= number_format($request->amount) ?></td>
                                        <td><?= $request->narrative ?></td>
                                        <td><?= $request->created_at ?></td>
                                        <td>
                                            <?php if ($request->request_status == 'Pending') { ?>
                                                <span class="badge bg-warning"><?= $request->request_status ?></span>
                                            <?php } elseif ($request->request_status == 'Approved') { ?>
                                                <span class="badge bg-success"><?= $request->request_status ?></span>
                                            <?php } elseif ($request->request_status == 'Rejected') { ?>
                                                <span class="badge bg-danger"><?= $request->request_status ?></span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col-md-6 -->

</div>
<!-- /.row -->


</div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<?= $this->endSection() ?>

<?= $this->section('js-files') ?>
<script>
    $(function() {
        $("#data-table-export-1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "print"]
        }).buttons().container().appendTo('#data_table_wrapper_1 .col-md-6:eq(0)');

        $("#data-table-export-2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "print"]
        }).buttons().container().appendTo('#data_table_wrapper_2 .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection() ?>