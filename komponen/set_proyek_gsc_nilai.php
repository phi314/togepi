<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/25/16
 * Time: 1:53 AM
 */

include "../config/koneksi.php";
include "library.php";

if(isset($_GET['id_proyek_gsc']))
{
    $id_proyek_gsc = $_GET['id_proyek_gsc'];
    $id_proyek = $_GET['id_proyek'];
    $nilai = $_GET['nilai'];

    mysql_query("UPDATE proyek_gsc SET nilai='$nilai' WHERE id='$id_proyek_gsc'");

    $total = total_nilai_rcaf($id_proyek);

    $json = [
        'nilai'             => $nilai,
        'total_rcaf'        => $total
    ];

    echo json_encode($json);
}