<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/27/16
 * Time: 2:49 AM
 */


if(isset($_POST['id_proyek']))
{
    @$id_proyek = $_POST['id_proyek'];
    @$minggu = $_POST['minggu'];
    @$tipe = $_POST['tipe'];
    @$bobot = $_POST['bobot'];
    @$cost = $_POST['cost'];
    @$periode_start = $_POST['periode_start'];
    @$periode_end = $_POST['periode_end'];

    $q = mysql_query("SELECT * FROM proyek_evm WHERE id_proyek='$id_proyek' AND minggu='$minggu' AND tipe='tipe'");
    if(mysql_num_rows($q) == 0)
    {
        $q_insert = mysql_query("INSERT INTO proyek_evm(id_proyek, tipe, bobot, cost, periode_start, periode_end)
                                    VALUES('$id_proyek', '$tipe', '$bobot', '$cost', '$periode_start', '$periode_end')");
    }
}