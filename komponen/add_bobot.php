<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/27/16
 * Time: 2:49 AM
 */

include "../config/koneksi.php";


if(isset($_POST['id_proyek']))
{
    @$id_proyek = $_POST['id_proyek'];
    @$minggu = $_POST['minggu'];
    @$tipe = $_POST['tipe'];
    @$bobot = $_POST['bobot'];
    @$cost = $_POST['cost'];
    @$periode_start = $_POST['periode_start'];
    @$periode_end = $_POST['periode_end'];

    $id = '';

    $q = mysql_query("SELECT * FROM proyek_evm WHERE id_proyek='$id_proyek' AND minggu='$minggu' AND tipe='$tipe'") or die(mysql_error());
    if(mysql_num_rows($q) == 0)
    {
        $q_insert = mysql_query("INSERT INTO proyek_evm(id_proyek, tipe, bobot, minggu, cost, periode_start, periode_end)
                                    VALUES('$id_proyek', '$tipe', '$bobot', '$minggu', '$cost', '$periode_start', '$periode_end')") or die(mysql_error());
        $id = mysql_insert_id();
        $status = 'Insert';
    }
    else
    {
        $d = mysql_fetch_object($q);
        $q_update = mysql_query("UPDATE proyek_evm
                                    SET bobot='$bobot', cost='$cost'
                                    WHERE id='$d->id'") or die(mysql_error());
        $status = 'Update';
    }

    $q_select = mysql_query("SELECT * FROM proyek_evm WHERE id='$id' LIMIT 1") or die(mysql_error());
    $r_select = mysql_fetch_object($q_select);

    $json = [
        'status'            => $status,
        'id'                => $id,
        'id_proyek'         => $id_proyek,
        'tipe'              => $tipe,
        'bobot'             => $bobot,
        'cost'              => $cost,
        'periode_start'     => $periode_start,
        'periode_end'       => $periode_end
    ];

    echo json_encode($json);
}