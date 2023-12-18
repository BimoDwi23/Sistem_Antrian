<?php if ($sekarangB == null) {
    echo "-";
} else {
    if ($sekarangB['status'] == "dipanggil") {
        echo $sekarangB['nomer'] . "<br>";
        foreach ($pasien as $px) {
            if ($px['id_pasien'] === $sekarangB['pasien_id']) {
                echo "(" . $px['nama'] . ")";
            }
        }
    }
}
$nom = $hitungB + 1;
