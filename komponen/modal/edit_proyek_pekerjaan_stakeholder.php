<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/25/16
 * Time: 1:56 PM
 */

include '../../config/koneksi.php';

if(isset($_GET['id_pekerjaan']))
{
    $id_pekerjaan = $_GET['id_pekerjaan'];
    $id_proyek = $_GET['id_proyek'];

    $q_pekerjaan = mysql_query("SELECT * FROM proyek_pekerjaan WHERE id='$id_pekerjaan'");
    $d_pekerjaan = mysql_fetch_object($q_pekerjaan);

//    $q = mysql_query("SELECT proyek_pekerjaan_stakeholder.*, user.nama as user_nama, proyek_stakeholders.tugas FROM proyek_pekerjaan_stakeholder JOIN proyek_stakeholders ON proyek_stakeholders.id_user=proyek_pekerjaan_stakeholder.id_stakeholder JOIN user ON proyek_stakeholders.id_user=user.id_user WHERE proyek_pekerjaan_stakeholder.id_pekerjaan='$id_pekerjaan' AND proyek_stakeholders.id_proyek='$id_proyek'") or die(mysql_error());
    $q_stakeholder = mysql_query("SELECT proyek_stakeholders.*, user.nama as user_nama FROM proyek_stakeholders
    JOIN user ON proyek_stakeholders.id_user=user.id_user
    WHERE proyek_stakeholders.id_proyek='$id_proyek'") or die(mysql_error());
}

?>

<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Input Rincian Kerja</h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="#pekerjaan" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-4">Nama Pekerjaan</label>
                <div class="col-sm-8">
                    <div class="form-control-static"><?php echo $d_pekerjaan->nama; ?></div>
                </div>
            </div>
            <?php
                while($d_stakeholder = mysql_fetch_object($q_stakeholder)):
                    $query_pekerjaan_stakeholder = "SELECT * FROM proyek_pekerjaan_stakeholder WHERE id_pekerjaan='$id_pekerjaan' AND id_user='$d_stakeholder->id_user' LIMIT 1";
                    $q_pekerjaan_stakeholder = mysql_query($query_pekerjaan_stakeholder) or die(mysql_error());

                    if(mysql_num_rows($q_pekerjaan_stakeholder) == 0)
                    {
                        mysql_query("INSERT INTO proyek_pekerjaan_stakeholder(id_pekerjaan, id_user) VALUES('$id_pekerjaan', '$d_stakeholder->id_user')");
                        $id_proyek_pekerjaan_stakeholder = mysql_insert_id();
                    }

                    $d_pekerjaan_stakeholder = mysql_fetch_object($q_pekerjaan_stakeholder);
            ?>
            <div class="form-group">
                <label class="col-sm-8"><?php echo $d_stakeholder->user_nama; ?> - <?php echo $d_stakeholder->tugas; ?></label>
                <div class="col-sm-4">
                    <select name="raci[<?php echo $d_pekerjaan_stakeholder->id; ?>]" class="form-control">
                        <option value="r" <?php echo $d_pekerjaan_stakeholder->raci == 'r' ? 'selected="selected"' : ''; ?>>(R)esponsible</option>
                        <option value="a" <?php echo $d_pekerjaan_stakeholder->raci == 'a' ? 'selected="selected"' : ''; ?>>(A)ccountable</option>
                        <option value="c" <?php echo $d_pekerjaan_stakeholder->raci == 'c' ? 'selected="selected"' : ''; ?>>(C)onsulted</option>
                        <option value="i" <?php echo $d_pekerjaan_stakeholder->raci == 'i' ? 'selected="selected"' : ''; ?>>(I)nformed</option>
                    </select>
                </div>
            </div>
            <?php endwhile; ?>
            <input type="hidden" name="id_pekerjaan" value="<?php echo $id_pekerjaan; ?>">
            <button type="submit" name="edit_pekerjaan_stakeholder" class="btn btn-success">Simpan Data</button>
        </form>
    </div>
</div>
