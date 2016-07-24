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