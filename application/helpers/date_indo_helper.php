<?php
if (!function_exists('date_indo')) {
    function tgl_indo($tgl)
    {
        $ubah       = gmdate($tgl, time() + 60 * 60 * 24);
        $pecah      = explode('-', $ubah);
        $tanggal    = $pecah[2];
        $bulan      = bulan($pecah[1]);
        $tahun      = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}
if (!function_exists('bulan')) {
    function bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ags";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}
