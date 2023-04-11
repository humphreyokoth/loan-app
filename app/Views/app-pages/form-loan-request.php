<?= $this->extend('admin-base') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Loan Request</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Loan Request</li>
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

                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create New Request</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('form/add-loan-request') ?>" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account</label>
                                        <select class="form-select select2bs4 select2" style="width:100%;" name="user_id" aria-label="Default select example">
                                            <option>-- --</option>
                                            <?php foreach ($accounts as $account) : ?>
                                                <option value="<?= $account->id ?>"><?= $account->phone . ' - ' . (is_null($account->vendor) ? $account->fullname : $account->vendor) . ' (' . $account->user_type . ')' ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Amount</label>
                                        <input type="number" name="amount" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Narrative</label>
                                        <textarea name="narrative" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="<?= base_url('loan-requests') ?>" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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




<?= $this->section('css-files') ?>
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('assets/theme/admin-lte/plugins/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/theme/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
<?= $this->endSection() ?>


<?= $this->section('js-files') ?>
<!-- Select2 -->
<script src="<?= base_url('assets/theme/admin-lte/plugins/select2/js/select2.full.min.js') ?>"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>
<?= $this->endSection() ?>