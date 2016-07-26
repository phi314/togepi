<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/25/16
 * Time: 8:15 AM
 */

include "../config/koneksi.php";
include "library.php";

if(isset($_GET['id_proyek_cfp']))
{
    $id = $_GET['id_proyek_cfp'];

    $q = mysql_query("DELETE FROM proyek_cfp WHERE id='$id'");
    if($q)
    {
        echo "1";
    }
    else
    {
        echo "0";
    }

}