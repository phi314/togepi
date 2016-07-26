<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/25/16
 * Time: 12:00 AM
 */


    function total_nilai_cfp($id_proyek)
    {
        $total = 0;

        $q = mysql_query("SELECT * FROM proyek_cfp WHERE id_proyek='$id_proyek'");
        while($d = mysql_fetch_object($q))
        {
            $total = $total + $d->total;
        }

        return $total;

    }

    function total_nilai_rcaf($id_proyek)
    {
        $total = 0;

        $q = mysql_query("SELECT * FROM proyek_gsc WHERE id_proyek='$id_proyek'");
        while($d = mysql_fetch_object($q))
        {
            $total = $total + $d->nilai;
        }

        return $total;

    }

    function total_cfp($komponen_sistem, $sederhana, $menengah, $komplek)
    {
        $total = 0;
        switch($komponen_sistem)
        {
            case "input":
                $xsederhana = 3;
                $xmenengah = 4;
                $xkomplek = 6;
                break;
            case "output":
                $xsederhana = 3;
                $xmenengah = 5;
                $xkomplek = 7;
                break;
            case "file logic":
                $xsederhana = 28;
                $xmenengah = 10;
                $xkomplek = 15;
                break;
            default:
                $xsederhana = 28;
                $xmenengah = 10;
                $xkomplek = 15;
                break;
        }
        $total = $total + ($sederhana*$xsederhana);
        $total = $total + ($menengah*$xmenengah);
        $total = $total + ($komplek*$xkomplek);

        return $total;
    }

    function count_developer($id_proyek)
    {
        $q = mysql_query("SELECT count(*) as jumlah_developer FROM proyek_stakeholders JOIN user ON proyek_stakeholders.id_user=user.id_user WHERE id_proyek='$id_proyek' AND user.status='developer'");
        $d = mysql_fetch_object($q);
        $jumlah = $d->jumlah_developer;

        return $jumlah;
    }

    function format_rupiah($rupiah)
    {
        return number_format($rupiah, 0, ',', '.');
    }

    function tanggal_format_indonesia($tgl, $waktu = FALSE, $bln_only = FALSE){
        $tanggal  =  substr($tgl,8,2);
        $bulan  =  getBulan(substr($tgl,5,2));
        $tahun  =  substr($tgl,0,4);
        $jam = substr($tgl, 11,2);
        $menit = substr($tgl, 14,2);
        $separator = empty($jam) ? '' : ':';
        $r_wkt = $waktu == FALSE ? '' : $jam.$separator.$menit;

        $tanggal_formatted = $tanggal.' '.$bulan.' '.$tahun.' '.$r_wkt;

        if($bln_only)
        {
            $tanggal_formatted = $bulan.' '.$tahun;
            }

            return $tanggal_formatted;
    }

    /**
     * @param $bln
     * @return string
     */
    function  getBulan($bln){
        switch  ($bln){
            case  1:
                $bln = "Januari";
                break;
            case  2:
                $bln = "Februari";
                break;
            case  3:
                $bln = "Maret";
                break;
            case  4:
                $bln = "April";
                break;
            case  5:
                $bln = "Mei";
                break;
            case  6:
                $bln = "Juni";
                break;
            case  7:
                $bln = "Juli";
                break;
            case  8:
                $bln = "Agustus";
                break;
            case  9:
                $bln = "September";
                break;
            case  10:
                $bln = "Oktober";
                break;
            case  11:
                $bln = "November";
                break;
            case  12:
                $bln = "Desember";
                break;
        }

        return $bln;
    }

    /**
     * @param $hari
     * @return string
     */
    function getHari($hari)
    {
        switch  ($hari){
            case  '7':
                $hari = "Minggu";
                break;
            case  '1':
                $hari = "Senin";
                break;
            case  '2':
                $hari = "Selasa";
                break;
            case  '3':
                $hari = "Rabu";
                break;
            case  '4':
                $hari = "Kami";
                break;
            case  '5':
                $hari = "Jumat";
                break;
            case  '6':
                $hari = "Sabtu";
                break;
        }

        return $hari;
    }

    function durasi($from, $to, $tipe = 'hari')
    {
        $from = new DateTime($from);
        $to = new DateTime($to);
        $diff = $to->diff($from);

        return $diff->days + 1;
    }

    function get_minggu_bcws($id_proyek_pekerjaan)
    {
        $q = mysql_query("SELECT * FROM proyek_pekerjaan WHERE id='$id_proyek_pekerjaan'");
        $d = mysql_fetch_object($q);

        $q_proyek = mysql_query("SELECT min(tanggal_mulai) as mulai, max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE id_proyek='$d->id_proyek'") or die(mysql_error());
        $d_proyek = mysql_fetch_object($q_proyek);
        $tanggal_mulai_pekerjaan = new DateTime($d->tanggal_mulai);
        $tanggal_mulai_proyek = new DateTime($d_proyek->mulai);
        $tanggal_selesai_proyek = new DateTime($d_proyek->selesai);

        $diff = $tanggal_mulai_pekerjaan->diff($tanggal_selesai_proyek);

        $interval = new DateInterval('P7D');
        $daterange = new DatePeriod($tanggal_mulai_proyek, $interval, $tanggal_selesai_proyek);


        foreach($daterange as $date)
        {
            var_dump($date->format('d-m'));
        };


    }

    function get_parent_bcws($id_proyek_pekerjaan)
    {
        $bcws = 0;
        $q = mysql_query("SELECT * FROM proyek_pekerjaan WHERE parent='$id_proyek_pekerjaan'");
        while($d = mysql_fetch_object($q))
        {
            $bcws = $bcws + $d->bobot_bcws;
        }

        return $bcws;
    }

    function get_parent_bcwp($id_proyek_pekerjaan)
    {
        $bcwp = 0;
        $q = mysql_query("SELECT * FROM proyek_pekerjaan WHERE parent='$id_proyek_pekerjaan'");
        while($d = mysql_fetch_object($q))
        {
            $bcwp = $bcwp + $d->bobot_bcws;
        }

        return $bcwp;
    }

    function get_parent_durasi($id_proyek_pekerjaan)
    {
        $durasi = 0;
        $durasi_total = 0;
        $q = mysql_query("SELECT tanggal_mulai, tanggal_selesai FROM proyek_pekerjaan WHERE parent='$id_proyek_pekerjaan'") or die(mysql_error());
        while($d = mysql_fetch_object($q))
        {
            $durasi = durasi($d->tanggal_mulai, $d->tanggal_selesai);
            $durasi_total = $durasi_total + $durasi;
        }

        return $durasi_total;
    }

    function get_parent_tanggal_mulai($id_proyek_pekerjaan)
    {
        $mulai = FALSE;
        $q = mysql_query("SELECT min(tanggal_mulai) as mulai FROM proyek_pekerjaan WHERE parent='$id_proyek_pekerjaan'") or die(mysql_error());
        if($d = mysql_fetch_object($q))
        {
            $mulai = $d->mulai;
        }

        return $mulai;
    }

    function get_parent_tanggal_selesai($id_proyek_pekerjaan)
    {
        $selesai = FALSE;
        $q = mysql_query("SELECT max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE parent='$id_proyek_pekerjaan'") or die(mysql_error());
        if($d = mysql_fetch_object($q))
        {
            $selesai = $d->selesai;
        }

        return $selesai;
    }

    function get_bobot_and_cost($minggu, $tipe, $id_proyek)
    {
        $bobot = 0;
        $cost = 0;

        $q = mysql_query("SELECT * FROM proyek_evm WHERE minggu='$minggu' AND tipe='$tipe' AND id_proyek='$id_proyek' LIMIT 1");
        if(mysql_num_rows($q) == 1)
        {
            $d = mysql_fetch_object($q);
            $bobot = $d->bobot;
            $cost = $d->cost;
        }

        return [$bobot, $cost];
    }