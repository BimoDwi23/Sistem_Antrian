<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambah-antrian"><i class="fas fa-plus-circle"></i> Tambah Data Antrian</a>
            <div class="row mt-5">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $titleA; ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row mt-5">
                <div class="col-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h5>Antrian Selanjutnya</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="tabelA-selanjutnya">
                                <thead>
                                    <tr>
                                        <td>Nomer Antrian</td>
                                        <td>Nomer Pasien</td>
                                        <td>Panggil</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($SekA2 != null) : ?>
                                        <?php foreach ($SekA2 as $val) : ?>
                                            <tr>
                                                <td><?= $val['nomer']; ?></td>
                                                <td><?= $val['pasien_id']; ?></td>
                                                <td><a href="#" class="btn btn-primary tombol-editA" data-id="<?= $val['nomer']; ?>" data-nama="
                                            <?php
                                            foreach ($pasien as $px) {
                                                if ($px['id_pasien'] === $val['pasien_id']) {
                                                    echo $px['nama'];
                                                }
                                            }
                                            ?>
                                            " data-telpn="
                                            <?php
                                            foreach ($pasien as $px) {
                                                if ($px['id_pasien'] === $val['pasien_id']) {
                                                    echo $px['telpn'];
                                                }
                                            }
                                            ?>
                                            "><i class="fas fa-volume-up"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <audio id="audioPlayer" controls autoplay hidden>
                    <source src="" type="audio/mpeg">
                </audio>
                <div class="col-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h5>Antrian Sekarang</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="tabel-sekarangA">
                                <thead>
                                    <tr>
                                        <td>Nomer Antrian</td>
                                        <td>Nomer Pasien</td>
                                        <td>Ulangi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($sekarangA != null) : ?>
                                        <?php foreach ($sekarangA as $value) : ?>
                                            <tr>
                                                <td><?= $value['nomer']; ?></td>
                                                <td><?= $value['pasien_id']; ?></td>
                                                <td><a href="#" class="btn btn-success ulangi-btnA" data-nomer="<?= $value['nomer']; ?>" data-nama="
                                            <?php
                                            foreach ($pasien as $px) {
                                                if ($px['id_pasien'] === $value['pasien_id']) {
                                                    echo $px['nama'];
                                                }
                                            }
                                            ?>
                                            " data-telpn="
                                            <?php
                                            foreach ($pasien as $px) {
                                                if ($px['id_pasien'] === $value['pasien_id']) {
                                                    echo $px['telpn'];
                                                }
                                            }
                                            ?>
                                            "><i class="fas fa-redo"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
    </section>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $titleB; ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row mt-5">
                <div class="col-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h5>Antrian Selanjutnya</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Nomer Antrian</td>
                                        <td>Nomer Pasien</td>
                                        <td>Panggil</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($SekB2 != null) : ?>
                                        <tr>
                                            <td><?= $SekB2['nomer']; ?></td>
                                            <td><?= $SekB2['pasien_id']; ?></td>
                                            <td><a href="#" class="btn btn-primary" id="tombol-editB" data-id="<?= $SekB2['nomer']; ?>" data-nama="
                                            <?php
                                            foreach ($pasien as $px) {
                                                if ($px['id_pasien'] === $SekB2['pasien_id']) {
                                                    echo $px['nama'];
                                                }
                                            }
                                            ?>
                                            " data-telpn="
                                            <?php
                                            foreach ($pasien as $px) {
                                                if ($px['id_pasien'] === $SekB2['pasien_id']) {
                                                    echo $px['telpn'];
                                                }
                                            }
                                            ?>
                                            "><i class="fas fa-volume-up"></i></a></td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <audio id="audioPlayer" controls autoplay hidden>
                    <source src="" type="audio/mpeg">
                </audio>
                <div class="col-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h5>Antrian Sekarang</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Nomer Antrian</td>
                                        <td>Nomer Pasien</td>
                                        <td>Ulangi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($sekarangB != null) : ?>
                                        <tr>
                                            <td><?= $sekarangB['nomer']; ?></td>
                                            <td><?= $sekarangB['pasien_id']; ?></td>
                                            <td><a href="#" class="btn btn-success ulangi-btnB" data-nomer="<?= $sekarangB['nomer']; ?>" data-nama="
                                            <?php
                                            foreach ($pasien as $px) {
                                                if ($px['id_pasien'] === $sekarangB['pasien_id']) {
                                                    echo $px['nama'];
                                                }
                                            }
                                            ?>
                                            " data-telpn="
                                            <?php
                                            foreach ($pasien as $px) {
                                                if ($px['id_pasien'] === $sekarangB['pasien_id']) {
                                                    echo $px['telpn'];
                                                }
                                            }
                                            ?>
                                            "><i class="fas fa-redo"></i></a></td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<!-- Modal Tambah data -->
<div class="modal modal-blur fade" id="tambah-antrian" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah-antrian-label">Tambah Nomer Antrian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="clearfix hidden-md-up"></div>
                <label for="id_pasien">Nomer Rekam Medis</label>
                <select name="id_pasien" id="id_pasien" class="form-control select2" data-placeholder="Nomer Rekam Medis">
                    <?php foreach ($pasien as $px) : ?>
                        <option value=""></option>
                        <option value="<?= $px['id_pasien']; ?>" data-telpn="<?= $px["telpn"] ?>" data-nama="<?= $px['nama']; ?>"><?= $px['id_pasien']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="nama">Nama Pasien</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama Pasien" readonly>
                <input type="hidden" name="telpn" id="id_telp" readonly>
                <label for="jenis">Jenis Obat</label>
                <select name="jenis" id="jenis" class="form-control select2" data-placeholder="Jenis Obat">
                    <option value=""></option>
                    <option value="Racik">Racik</option>
                    <option value="Non Racik">Non Racik</option>
                </select>
                <label for="antrian">Nomer Antrian</label>
                <input id="antrian" name="antrian" type="text" class="form-control" placeholder="Nomer Antrian" readonly>
                <div class="d-flex justify-content-end mt-3">
                    <a href="#" id="save" class="btn btn-light mr-2"><i class="fas fa-save"></i> Simpan</a>
                    <a href="#" id="print" class="btn btn-primary"><i class="fas fa-print"></i> Simpan & Print</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // nomer antrian

    $(function() {
        $('#jenis').change(function() {
            var jenis = $(this).val();
            var A = "<?= $nomerA ?>";
            var B = "<?= $nomerB ?>";
            if (jenis == "Racik") {
                $("#antrian").val(A);
            } else {
                $("#antrian").val(B);
            }
        });
    })
    $(function() {
        $('#id_pasien').change(function() {
            var telpn = $(this).find(':selected').data('telpn');
            var nama = $(this).find(':selected').data('nama');

            $('#id_telp').val(telpn);
            $('#nama').val(nama);
        });
    })

    // Tambah Antrian
    $(document).ready(function() {
        $("#save").click(function() {
            var antrian = $("#antrian").val();
            var telpn = $("#id_telp").val();
            var telp_baru = telpn.replace(/^0/, '62');
            var id_pasien = $("#id_pasien").val();
            $.ajax({
                method: "POST",
                url: "<?= base_url('farmasi/Tambah') ?>",
                data: {
                    antrian: antrian,
                    id_pasien: id_pasien,
                    telp_baru: telp_baru
                },
                cache: false,
                success: function(respond) {
                    swal('Selamat', 'Data Berhasil di Simpan', 'success');
                    window.location = "<?= base_url('farmasi/view') ?>";
                }
            });
        });
    });
    // cetak Nomer Antrian
    $("#print").click(function() {
        var antrian = $("#antrian").val();
        var telpn = $("#id_telp").val();
        var telp_baru = telpn.replace(/^0/, '62');
        var id_pasien = $("#id_pasien").val();
        var printUrl = "<?= base_url('farmasi/Print/') ?>" + antrian;
        var newTab = window.open(printUrl, '_blank');
        $.ajax({
            type: "POST",
            url: "<?= base_url('farmasi/Tambah') ?>",
            data: {
                antrian: antrian,
                id_pasien: id_pasien,
                telp_baru: telp_baru
            },
            cache: false,
            success: function(respond) {
                swal('Selamat', 'Data Berhasil di Simpan', 'success');
                window.location = "<?= base_url('farmasi/view') ?>";
            }
        });

    });
    $(document).ready(function() {
        var isPlayingA = false; // status suara A
        var isPlayingB = false; // status suara B

        // Panggilan Antrian A
        $('.tombol-editA').on('click', function() {
            var nomer = $(this).data('id');
            var nama = $(this).data('nama');
            var telpn = $(this).data('telpn');
            var telp_baru = telpn.replace(/\s/g, '');

            console.log(telp_baru);

            $.ajax({
                url: "<?= base_url('farmasi/editA/') ?>" + nomer,
                method: "POST",
                data: {
                    nomer: nomer,
                    telp_baru: telp_baru
                },
                cache: false,
                success: function(respond) {
                    console.log(respond);
                    if (!isPlayingA) { // Jika tidak sedang diputar
                        isPlayingA = true; // Mengubah status menjadi sedang diputar

                        responsiveVoice.speak("Nomor Antrian " + nomer + " Dengan Nama " + nama + " Menuju Loket Farmasi", "Indonesian Male", {
                            rate: 0.7,
                            onend: function() {
                                isPlayingA = false; // Mengubah status menjadi sudah selesai
                                window.location.reload();
                            }
                        });
                    }

                }
            });

        });

        // Panggilan Antrian B
        $('#tombol-editB').on('click', function(event) {
            event.preventDefault();
            var nomer = $(this).data('id');
            var nama = $(this).data('nama');
            var telpn = $(this).data('telpn');
            var telp_baru = telpn.replace(/\s/g, '');

            $.ajax({
                url: "<?= base_url('farmasi/editB') ?>",
                method: "POST",
                data: {
                    nomer: nomer,
                    telp_baru: telp_baru
                },
                cache: false,
                success: function(respond) {
                    if (!isPlayingB) { // Jika tidak sedang diputar
                        isPlayingB = true; // Mengubah status menjadi sedang diputar

                        responsiveVoice.speak("Nomor Antrian " + nomer + " Dengan Nama " + nama + " Menuju Loket Farmasi", "Indonesian Male", {
                            rate: 0.7,
                            onend: function() {
                                isPlayingB = false; // Mengubah status menjadi sudah selesai
                                window.location.reload();
                            }
                        });
                    }
                }
            });

        });

        // Tombol ulangi Antrian A
        $('.ulangi-btnA').on('click', function() {
            if (!isPlayingA) { // Jika tidak sedang diputar
                var nomerAntrian = $(this).data('nomer');
                var nama = $(this).data('nama');

                isPlayingA = true; // Mengubah status menjadi sedang diputar

                responsiveVoice.speak("Nomor Antrian " + nomerAntrian + " Dengan Nama " + nama + " Menuju Loket Farmasi", "Indonesian Male", {
                    rate: 0.7,
                    onend: function() {
                        isPlayingA = false; // Mengubah status menjadi sudah selesai
                    }
                });
            }
        });

        // Tombol ulangi Antrian B
        $('.ulangi-btnB').on('click', function() {
            if (!isPlayingB) { // Jika tidak sedang diputar
                var nomerAntrian = $(this).data('nomer');
                var nama = $(this).data('nama');

                isPlayingB = true; // Mengubah status menjadi sedang diputar

                responsiveVoice.speak("Nomor Antrian " + nomerAntrian + " Dengan Nama " + nama + " Menuju Loket Farmasi", "Indonesian Male", {
                    rate: 0.7,
                    onend: function() {
                        isPlayingB = false; // Mengubah status menjadi sudah selesai
                    }
                });
            }
        });
    });

    // Data table selanjutnya racik

    $(function() {
        $('#tabelA-selanjutnya').DataTable({
            "paging": true,
            'pageLength': 4,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(function() {
        $('#tabel-sekarangA').DataTable({
            "paging": true,
            'pageLength': 4,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>