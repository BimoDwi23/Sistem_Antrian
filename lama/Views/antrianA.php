<?php if ($sekarangA == null) {
    echo "-";
} else {
    if ($sekarangA['status'] == "dipanggil") {
        echo $sekarangA['nomer'] . "<br>";
        foreach ($pasien as $px) {
            if ($px['id_pasien'] === $sekarangA['pasien_id']) {
                echo "(" . $px['nama'] . ")";
            }
        }
    }
}
$nom = $hitungA + 1;
