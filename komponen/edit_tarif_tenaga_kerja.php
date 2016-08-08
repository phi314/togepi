<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/7/16
 * Time: 9:18 PM
 */

include "../config/koneksi.php";

if(isset($_POST['edit_tarif_tenaga_kerja']))
{
    @$id_proyek = $_POST['id_proyek'];
    @$tarif_tenaga_kerja = $_POST['tarif_tenaga_kerja'];
    @$pw = $_POST['pw'];

    $q = mysql_query("UPDATE proyek SET tarif_tenaga_kerja='$tarif_tenaga_kerja' WHERE id='$id_proyek'");

    echo $tarif_tenaga_kerja * $pw;
}


?>