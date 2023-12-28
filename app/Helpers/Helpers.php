<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka)
    {
        // Pastikan $angka adalah numerik sebelum diformat
        if (is_numeric($angka)) {
            $rupiah = "Rp " . number_format($angka, 0, ',', '.');
            return $rupiah;
        } else {
            // Jika $angka bukan numerik, tindakan yang sesuai dapat diambil di sini.
            // Contoh:
            return "Invalid input"; // Atau pesan kesalahan lainnya
        }
    }
}
