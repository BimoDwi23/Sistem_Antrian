<?= $this->extend('layout/header'); ?>
<?= $this->section('header'); ?>
<video autoplay muted loop>
    <source src="<?= base_url(); ?>public/background.mp4" type="video/mp4">
</video>
<nav class="navbar navbar-expand navbar-info navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="navbar-brand" data-widget="pushmenu" href="https://www.instagram.com/bimo_dwi23" role="button">
                <img src="<?= base_url(); ?>public/template/dist/img/logo-rs.png" alt="RSPM Logo" class="img-circle elevation-3" style="opacity: .8; width:100px">
            </a>
        </li>
    </ul>
    <span class="font-weight-light d-inline" style="font-size: 50px;">RS Paru Maguharjo Madiun</span>
</nav>
<div class="row mt-5 d-flex justify-content-center">
    <div class="col-md-4 ml-3">
        <div class="card" style="text-align: center;">
            <div class="card-header bg-info">
                <h4>Nomer Antrian</h4>
            </div>
            <div class="card-body font-weight-bold">
                <h3 id="AntrianA">-</h3>
            </div>
            <div class="card-footer">
                <h4>Obat Racik</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="text-align: center;">
            <div class="card-header bg-info">
                <h4>Nomer Antrian</h4>
            </div>
            <div class="card-body font-weight-bold">
                <h3 id="AntrianB">-</h3>
            </div>
            <div class="card-footer">
                <h4>Obat Non Racik</h4>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>