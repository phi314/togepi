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

    $q_pekerjaan = mysql_query("SELECT * FROM proyek_pekerjaan WHERE id='$id_pekerjaan'");
    $r_pekerjaan = mysql_fetch_object($q_pekerjaan);

    $q = mysql_query("SELECT proyek_pekerjaan_stakeholder.*, user.nama as user_nama, proyek_stakeholders.tugas FROM proyek_pekerjaan_stakeholder JOIN proyek_stakeholders ON proyek_stakeholders.id_user=proyek_pekerjaan_stakeholder.id_stakeholder JOIN user ON proyek_stakeholders.id_user=user.id_user WHERE id_pekerjaan='$id_pekerjaan'");
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
                    <div class="form-control-static"><?php echo $r_pekerjaan->nama; ?></div>
                </div>
            </div>
            <?php while($r = mysql_fetch_object($q)): ?>
            <div class="form-group">
                <label class="col-sm-8"><?php echo $r->user_nama; ?> - <?php echo $r->tugas; ?></label>
                <div class="col-sm-4">
                    <select name="raci[<?php echo $r->id; ?>]" class="form-control">
                        <option value="r" <?php echo $r->raci == 'r' ? 'selected="selected"' : ''; ?>>(R)esponsible</option>
                        <option value="a" <?php echo $r->raci == 'a' ? 'selected="selected"' : ''; ?>>(A)ccountable</option>
                        <option value="c" <?php echo $r->raci == 'c' ? 'selected="selected"' : ''; ?>>(C)onsulted</option>
                        <option value="i" <?php echo $r->raci == 'i' ? 'selected="selected"' : ''; ?>>(I)nformed</option>
                    </select>
                </div>
            </div>
            <?php endwhile; ?>
            <input type="hidden" name="id_pekerjaan" value="<?php echo $id_pekerjaan; ?>">
            <button type="submit" name="edit_pekerjaan_stakeholder" class="btn btn-success">Simpan Data</button>
        </form>
    </div>
</div>
