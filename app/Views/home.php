<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
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
                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Jumlah Antrian</span>
                            <span class="info-box-number">Racikan:
                                <?php
                                if ($jmlAntrianA == null) {
                                    echo "-";
                                } else {
                                    echo $jmlAntrianA;
                                }
                                ?>
                            </span>
                            <span class="info-box-number">Non Racikan:
                                <?php
                                if ($jmlAntrianB == null) {
                                    echo "-";
                                } else {
                                    echo $jmlAntrianB;
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-user-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Antrian Sekarang</span>
                            <span class="info-box-number">Racikan:
                                <?php
                                if ($sekarangA == null) {
                                    echo "-";
                                } else {
                                    echo $sekarangA['nomer'];
                                }

                                ?>
                            </span>
                            <span class="info-box-number">Non Racikan:
                                <?php
                                if ($sekarangB == null) {
                                    echo "-";
                                } else {
                                    echo $sekarangB['nomer'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-indigo"><i class="fas fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Antrian Selanjutnya</span>
                            <span class="info-box-number">Racikan:
                                <?php
                                if ($selanjutA == null) {
                                    echo "-";
                                } else {
                                    echo $selanjutA['nomer'];
                                }

                                ?></span>
                            <span class="info-box-number">Non Racikan:
                                <?php
                                if ($selanjutB == null) {
                                    echo "-";
                                } else {
                                    echo $selanjutB['nomer'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="info-box">
                        <span class="info-box-icon bg-lime"><i class="fas fa-people-arrows"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Sisa Antrian</span>
                            <span class="info-box-number">Racikan:
                                <?php
                                if ($sisaA == null) {
                                    echo "-";
                                } else {
                                    echo $sisaA;
                                }
                                ?></span>
                            <span class="info-box-number">Non Racikan:
                                <?php
                                if ($sisaB == null) {
                                    echo "-";
                                } else {
                                    echo $sisaB;
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Antrian Farmasi</h3>
                            <p>Interface Pemanggilan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-scroll"></i>
                        </div>
                        <a href="farmasi/view" class="small-box-footer">Tampilkan <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="small-box bg-navy">
                        <div class="inner">
                            <h3>Interface</h3>
                            <p>Pemanggilan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-scroll"></i>
                        </div>
                        <a href="interface" class="small-box-footer">Tampilkan <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
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