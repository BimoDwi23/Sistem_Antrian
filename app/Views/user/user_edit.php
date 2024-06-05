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
                            <form action="<?= $user['id_user']; ?>" method="post" class="form-group">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="id_user">ID User</label>
                                        <input type="text" class="form-control" name="id_user" id="id_user" value="<?= $user['id_user']; ?>" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus value="<?= $user['username']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="level_id">Akses</label>
                                        <select name="level_id" id="level_id" class="form-control select2" onchange="hideFields()" data-placeholder="Akses" style="width: 100%;">
                                            <option value=""></option>
                                            <?php foreach ($level as $lv) : ?>
                                                <option value="<?= $lv['id_level']; ?>" <?= ($user['level_id'] == $lv['id_level']) ? 'selected' : ''; ?>><?= ucfirst($lv['level']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-12" id="loket">
                                        <label for="loket_id">Loket</label>
                                        <select name="loket_id" id="loket_id" class="form-control select2" data-placeholder="Loket" style="width:100%;">
                                            <option value=""></option>
                                            <?php foreach ($level as $lo) : ?>
                                                <option value="<?= $lo['id_level']; ?>" <?= ($user['level_id'] == $lo['id_level']) ? 'selected' : ''; ?>><?= ucfirst($lo['level']); ?></option>
                                            <?php endforeach; ?>
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
<script>
    var selectedValue = $('#level_id').val();
    if (selectedValue != "LV002") {
        $("#loket").hide();
    } else {
        $("#loket").show();
    }
    $(function() {
        $('#level_id').change(function() {
            var jenis = $(this).val();
            if (jenis == "LV002") {
                $("#loket").show();
            } else {
                $("#loket").hide();
            }
        });
    })
</script>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>