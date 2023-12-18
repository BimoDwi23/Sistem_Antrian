<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RS Paru Maguharjo Madiun</title>
    <!-- jQuery -->
    <script src="<?= base_url(); ?>public/template/plugins/jquery/jquery.min.js"></script>
    <!-- jquery css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Boostrap Toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/dist/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>


<!-- jQuery -->
<script src="<?= base_url(); ?>public/template/plugins/jquery/jquery.min.js"></script>
<!-- Boostrap Toggle -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>public/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url(); ?>public/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/sweetalert/sweetalert.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>public/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>public/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>public/template/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>public/template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>public/template/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>public/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>public/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>public/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>public/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>public/template/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>public/template/dist/js/adminlte.js"></script>
<style>
    video {
        position: fixed;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        transform: translate(-50%, -50%);
        z-index: -1;
        /* Meletakkan video di belakang konten lain */
    }
</style>
</body>
<?= $this->renderSection('header'); ?>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>
<script>
    $('.pilihobat').click(function() {
        var kode = $(this).attr('data-kodeobat');
        var nama = $(this).attr('data-namaobat');
        var harga = $(this).attr('data-harga');

        $('#id_obat').val(kode);
        $('#nama').val(nama);
        $('#harga').val(harga);
        $('#exampleModal').modal('hide');
    });
</script>
<script>
    $(function() {
        $('#pasien').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(function() {
        $('#tabel-antrian').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(function() {
        $('#penjualan').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(function() {
        $('#obat').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    $(document).ready(function() {
        // set interval waktu realtime
        setInterval(function() {
            // tabel temp
            $("#tabel-temp").load("<?= base_url("penjualan/tabel-Temp") ?>");
        }, 1000); //1000 = 1 detik
    });
    $(document).ready(function() {
        // set interval waktu realtime
        setInterval(function() {
            // tabel temp
            $("#AntrianA").load("<?= base_url("antrianA") ?>");
            $("#AntrianB").load("<?= base_url("antrianB") ?>");
        }, 5000); //1000 = 1 detik
    });
</script>
<script>
    // $(document).ready(function() {
    //     function playNotificationSound() {
    //         var audio = document.getElementById("notification-sound");
    //         audio.play();
    //     }
    //     // Fungsi untuk memperbarui data secara periodik menggunakan AJAX
    //     function fetchDataAndUpdate() {
    //         $.ajax({
    //             url: '<?php echo base_url('pemanggilan/realtimeB'); ?>',
    //             type: 'GET',
    //             dataType: 'json',
    //             success: function(data) {
    //                 if (data == null) {
    //                     $('#real-time-data').text("-");
    //                 } else {
    //                     $('#real-time-data').text(data);
    //                     playNotificationSound();
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error(error);
    //             }
    //         });
    //     }

    // Panggil fungsi fetchDataAndUpdate() setiap beberapa detik
    // setInterval(fetchDataAndUpdate, 5000);
</script>


</html>