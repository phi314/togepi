<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/30/16
 * Time: 7:29 AM
 */

if(isset($_GET['id']))
{
    $id_proyek = $_GET['id'];
    $q = mysql_query("SELECT * FROM proyek WHERE id='$id_proyek' LIMIT 1");
    $d = mysql_fetch_object($q);

    $q_interval_proyek_pekerjaan =  mysql_query("SELECT min(tanggal_mulai) as mulai, max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE id_proyek='$d->id'") or die(mysql_error());
    $d_interval_proyek_pekerjaan = mysql_fetch_object($q_interval_proyek_pekerjaan);
    $tanggal_mulai_proyek = new DateTime($d_interval_proyek_pekerjaan->mulai);
    $tanggal_selesai_proyek = new DateTime($d_interval_proyek_pekerjaan->selesai);

    $interval = new DateInterval('P1W7D');
    $daterange = new DatePeriod($tanggal_mulai_proyek, $interval, $tanggal_selesai_proyek);

    $array_bulan = [];

    foreach($daterange as $key => $date)
    {
        $array_bulan[$date->format('m')] = [
            'tahun' => $date->format('Y')
        ];
    }

    @$bulan = $_GET['bulan'];
    @$tahun = $_GET['tahun'];
    @$bulan_days = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

    if(isset($_POST['edit_bcwp']))
    {
        $id_pekerjaan = $_POST['id'];
        $bobot_bcwp = $_POST['bobot_bcwp'];
        $status = $_POST['status'];


        var_dump($_POST);
        $q = mysql_query("UPDATE proyek_pekerjaan
        SET
        bobot_bcwp = '$bobot_bcwp',
        status = '$status'
        WHERE id='$id_pekerjaan'");
    }
}

?>

<style type="text/css">

    .input-bcwp-developer:hover {
        background-color: lightgray !important;
    }

</style>

<h1>Jadwal Pekerjaan <?php echo getBulan($bulan).' '.$tahun; ?></h1>
<?php

foreach($array_bulan as $key_bulan => $bln)
{
    ?>
    <a class="btn btn-info" href="datakalenderpekerjaan.php?id=<?php echo $id_proyek; ?>&bulan=<?php echo $key_bulan; ?>&tahun=<?php echo $bln['tahun']; ?>"><?php echo getBulan($key_bulan); ?></a>
<?php
}

?>
<br>
<br>
<br>

    <?php
    if(!(isset($_GET['bulan'])) && !(isset($_GET['tahun']))):
    ?>

        <p class="alert alert-danger">
            Silahkan pilih bulan
        </p>
    <?php
    endif;
    ?>


<div class="table-responsive" id="jadwal-pekerjaan">
    <table class="table table-bordered table-responsive small">
        <thead>
        <tr>
            <th rowspan="2">Pekerjaan</th>

        </tr>
        <tr>
            <?php
                for($i = 1; $i <= $bulan_days; $i++):
                    ?>
                    <td><?php echo $i; ?></td>

                <?php
                endfor;
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
            $q = mysql_query("SELECT * FROM proyek_pekerjaan WHERE id_proyek='$d->id' AND have_child='0' ORDER BY tanggal_mulai, COALESCE(parent, id), parent IS NOT NULL");
            while($d_proyek_date = mysql_fetch_object($q)):
        ?>
            <tr>
                <td nowrap ><?php echo $d_proyek_date->nama; ?></td>
                <?php
                    for($i = 1; $i <= $bulan_days; $i++):
                        $calendar_date = $tahun.'-'.$bulan.'-'.$i;

                        $tanggal_mulai_date = strtotime($d_proyek_date->tanggal_mulai);
                        $tanggal_selesai_date = strtotime($d_proyek_date->tanggal_selesai);
                        $calendar_datetime = strtotime($calendar_date);

                        $progres = ($calendar_datetime >= $tanggal_mulai_date) && ($calendar_datetime <= $tanggal_selesai_date) ? $d_proyek_date->id : "";

                        ?>
                        <td class="text
                            <?php
                                if($progres != "")
                                {
                                    switch ($d_proyek_date->status)
                                    {
                                        case 'sudah':
                                            echo "success";
                                            break;
                                        case 'sedang':
                                            echo "warning";
                                            break;
                                        default:
                                            echo "danger";
                                    }

                                    echo " ";

                                    if($_SESSION['status'] == 'DEVELOPER')
                                    {
                                        echo "input-bcwp-developer pekerjaan-".$d_proyek_date->id;
                                    }
                                }

                                $stakeholders = [];
                                $stakeholder_query = mysql_query("SELECT proyek_pekerjaan_stakeholder.*, user.nama as user_nama, proyek_pekerjaan.tanggal_mulai FROM proyek_pekerjaan_stakeholder JOIN proyek_pekerjaan ON proyek_pekerjaan.tanggal_mulai='$d_proyek_date->tanggal_mulai' JOIN user ON user.id_user=proyek_pekerjaan_stakeholder.id_user WHERE proyek_pekerjaan_stakeholder.id_pekerjaan='$d_proyek_date->id'");
                                while($d_stakeholder = mysql_fetch_object($stakeholder_query))
                                {
                                    if($d_stakeholder->raci == 'r')
                                    {
                                        $stakeholders[] = $d_stakeholder->user_nama;
                                    }
                                }

                                $stakeholders = array_unique($stakeholders);
                            ?>


                        " data-id="<?php echo $progres != "" ? $d_proyek_date->id : ""; ?>" title="<?php echo "(".tanggal_format_indonesia($calendar_date).') '.$d_proyek_date->nama.' &#13 Stakeholders: &#13'.implode("&#13", $stakeholders); ?>" id="pekerjaan-<?php echo $progres; ?>" style="">

                        </td>

                    <?php
                    endfor;
                ?>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Modal Input BCPW -->
<div class="modal fade" id="edit-bcwp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

    </div>
</div>

<script type="text/javascript">
    $('.input-bcwp-developer').click(function(){

        $('#edit-bcwp').modal('show');
        var id = $(this).data('id');

        $.ajax({
            url: base_url + 'komponen/modal/edit_bcwp.php',
            type: 'get',
            data: {
                id: id,
                id_proyek: <?php echo $d->id; ?>
            },
            success: function(modal){
                $('#edit-bcwp .modal-dialog').html(modal);
            }
        });
    });

</script>
