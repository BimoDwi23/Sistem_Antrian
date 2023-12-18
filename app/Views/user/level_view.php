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
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="card-body">
                                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
                                <a href="tambah-level" class="btn btn-primary"><i class="fas fa-plus-circle"></i></a>
                                <table class="table table-bordered mt-2">
                                    <thead>
                                        <tr class="bg-info text-center">
                                            <td>No</td>
                                            <td>Level</td>
                                            <td>Action</td>
                                        </tr>
                                    <tbody>
                                        <?php $no = 1;
                                        if ($level) : ?>
                                            <?php foreach ($level as $lv) : ?>
                                                <tr class="text-center">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $lv['level']; ?></td>
                                                    <td>
                                                        <a href="edit-level/<?= $lv['id_level']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                        <form action="delete-level/<?= $lv['id_level']; ?>" method="post" class="d-inline tombol-hapus">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type=" submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="3" style="text-align:center">
                                                    Tidak Ada Data
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
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