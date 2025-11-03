<?php
function formatRupiahSingkat($angka)
{
    if ($angka >= 1000000000) {
        // 1 Miliar ke atas
        $hasil = number_format($angka / 1000000000, 1) . 'M';
    } elseif ($angka >= 1000000) {
        // 1 Juta ke atas
        $hasil = number_format($angka / 1000000, 1) . 'Jt';
    } elseif ($angka >= 1000) {
        // 1 Ribu ke atas
        $hasil = number_format($angka / 1000, 1) . 'Rb';
    } else {
        // Di bawah 1000
        $hasil = number_format($angka, 0);
    }

    // Hilangkan .0 jika desimalnya 0
    $hasil = str_replace('.0', '', $hasil);

    return $hasil;
}
