<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        .square {
            width: 226.774510545px;
            height: 302.36601406px;
            background-color: white;
            border: 2px solid black;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .tulisan {
            margin-top: -100px;
            /* Jarak antara gambar dan teks */
            font-size: 14px;
            position: absolute;
        }

        p {
            margin-top: -50px;
            /* Jarak antara gambar dan teks */
            font-size: 10px;
            text-align: center;
        }

        img {
            width: 100px;
            /* Ukuran gambar */
            height: 100px;
            /* Ukuran gambar */
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            /* jika ingin gambar bulat */
            border-radius: 50%;
            /* Membuat gambar menjadi lingkaran */
        }

        .nomer-Antrian {
            font-size: 50px;
            margin-top: 50px;
            position: absolute;
        }

        h5 {
            font-size: 20px;
            margin-top: 200px;
            position: absolute;
        }

        h6 {
            font-size: 25px;
            font-family: 'Brush Script MT', Cursive;
            margin-top: 270px;
            position: absolute;
        }
    </style>
</head>

<body>
    <div class="square print-only">
        <img src="<?= base_url(); ?>public/template/dist/img/logo-rs.png" alt="Logo-Rumah_Sakit">
        <div class="tulisan">
            <h4>RS Paru Maguharjo Madiun</h4>
        </div>
        <p>Jl. Yos Sudarso No.108-112, Madiun Lor, Kec. Manguharjo, Kota Madiun, Jawa Timur</p>
        <div class="nomer-Antrian">
            <h1><?= $antrian; ?></h1>
        </div>
        <h5><?= date('d F Y'); ?></h5>
        <h6>Semoga Lekas Sembuh</h6>

    </div>
</body>
<script>
    // Pengecekan sebelum mencetak, pastikan ukuran layar cocok dengan kertas thermal
    var width = window.innerWidth;
    var height = window.innerHeight;

    // Sesuaikan dengan ukuran kertas thermal yang Anda gunakan
    var thermalWidth = 200; // Ganti dengan lebar kertas thermal yang sesuai
    var thermalHeight = 300; // Ganti dengan tinggi kertas thermal yang sesuai

    // Cek apakah ukuran layar sesuai dengan ukuran kertas thermal
    if (width >= thermalWidth && height >= thermalHeight) {
        window.print();
    } else {
        alert("Ukuran layar tidak sesuai dengan ukuran kertas thermal yang diinginkan.");
    }
</script>

</html>