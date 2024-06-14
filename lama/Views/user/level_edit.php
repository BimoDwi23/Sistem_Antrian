<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card card-outline card-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="<?= $level['id_level']; ?>" method="post" class="form-group">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="id_level">ID Level</label>
                                        <input type="text" class="form-control" name="id_level" id="id_level" value="<?= $level['id_level']; ?>" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="level">Level</label>
                                        <select name="level" id="level" class="form-control select2" data-placeholder="Akses" style="width: 100%;">
                                            <option value=""></option>
                                            <option value="admin" <?= ($level['level'] == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                            <option value="operator" <?= ($level['level'] == 'operator' ? 'selected' : ''); ?>>Operator</option>
                                            <option value="super admin" <?= ($level['level'] == 'super admin' ? 'selected' : ''); ?>>Super Admin</option>
                                        </select>
                                    </div>
                                    <div class="col mt-2 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-info ">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>