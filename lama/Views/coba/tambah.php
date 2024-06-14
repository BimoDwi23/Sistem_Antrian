<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row mt-2">
                <div class="col">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h5>Antrian Obat Racik</h5>
                        </div>
                        <div class="card-body">
                            <form action="farmasi/cobaTambah" method="post" class="form-group">
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
                                    <button type="submit" class="btn btn-light mr-2"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="#" id="print" class="btn btn-primary"><i class="fas fa-print"></i> Simpan & Print</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
    </section>

    <!-- /.content -->
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
            if (antrian == "") {
                swal('Maaf', 'Jenis Obat Belum Di Pilih', 'warning');
            }
            $.ajax({
                method: "POST",
                url: "<?= base_url('farmasi/cobaTambah') ?>",
                data: {
                    antrian: antrian,
                    id_pasien: id_pasien,
                    telp_baru: telp_baru
                },
                cache: false,
                success: function(respond) {
                    if (respond) {
                        swal('Selamat', 'Data Berhasil di Simpan', 'success');
                        window.location = "<?= base_url('farmasi/view') ?>";
                    } else {
                        swal('Warning', 'Nomer Antrian Sudah Ada', 'warning');
                    }
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
        if (antrian == "") {
            swal('Maaf', 'Jenis Obat Belum Di Pilih', 'warning');
        }
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
        $('.tombol-editB').on('click', function() {
            var nomer = $(this).data('id');
            var nama = $(this).data('nama');
            var telpn = $(this).data('telpn');
            var telp_baru = telpn.replace(/\s/g, '');

            $.ajax({
                url: "<?= base_url('farmasi/editB/') ?>" + nomer,
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
                $.ajax({
                    url: "<?= base_url('farmasi/ulangA/') ?>" + nomerAntrian,
                    method: "POST",
                    data: {
                        nomerAntrian: nomerAntrian,
                    },
                    cache: false,
                    success: function(respond) {
                        isPlayingA = true; // Mengubah status menjadi sedang diputar

                        responsiveVoice.speak("Nomor Antrian " + nomerAntrian + " Dengan Nama " + nama + " Menuju Loket Farmasi", "Indonesian Male", {
                            rate: 0.7,
                            onend: function() {
                                isPlayingA = false; // Mengubah status menjadi sudah selesai
                                window.location.reload();
                            }
                        });
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