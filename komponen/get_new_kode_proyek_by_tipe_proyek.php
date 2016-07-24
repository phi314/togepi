<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/24/16
 * Time: 8:36 PM
 */

include "../config/koneksi.php";

function get_new_kode_proyek($tipe_proyek)
{
    $no_urut = 1;
    $date = date('dmy');


    $q = mysql_query("SELECT kode_proyek FROM proyek WHERE SUBSTRING(kode_proyek,1,1) = '$tipe_proyek' ORDER BY kode_proyek DESC LIMIT 1");
    if(mysql_num_rows($q) == 1)
    {

        while($d = mysql_fetch_object($q))
        {
            $kode_proyek = $d->kode_proyek;
            $no_urut = substr($kode_proyek, 7, 3);
            $no_urut = (int) $no_urut + 1;

        }
    }

    return $tipe_proyek.$date.str_pad($no_urut, 3, '0', STR_PAD_LEFT);
}

if(isset($_GET['tipe']))
{
    $tipe = $_GET['tipe'];

    if(empty($tipe))
    {
        echo "";
    }
    else
    {
        echo get_new_kode_proyek($tipe);
    }
}