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
                            <form action="add-user" method="post" class="form-group">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="id_user">ID User</label>
                                        <input type="text" class="form-control" name="id_user" id="id_user" value="<?= $autonum; ?>" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus>
                                    </div>
                                    <div class="col-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="level_id">Akses</label>
                                        <select name="level_id" id="level_id" class="form-control select2" onchange="hideFields()" data-placeholder="Akses" style="width:100%;">
                                            <option value=""></option>
                                            <?php foreach ($level as $lv) : ?>
                                                <option value="<?= $lv['id_level']; ?>"><?= ucfirst($lv['level']); ?></option>
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
<!-- /.content-wrapper -->
<script>
    $('#loket').hide();

    function hideFields() {
        var selectElement = document.getElementById("level_id");

        if (selectElement.value === "LV002") {
            $('#loket').show();
        } else {
            $('#loket').hide();

        }
    }
</script>
<?= $this->endSection(); ?>