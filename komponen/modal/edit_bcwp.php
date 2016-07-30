<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/25/16
 * Time: 1:56 PM
 */

include '../../config/koneksi.php';
include '../library.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $id_proyek = $_GET['id_proyek'];
    $q = mysql_query("SELECT * FROM proyek_pekerjaan WHERE id='$id'");
    $r = mysql_fetch_object($q);
}

?>

<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $r->nama.' ('.tanggal_format_indonesia($r->tanggal_mulai).')'; ?></h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="#jadwal-pekerjaan" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2">Bobot BCWP</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" name="bobot_bcws" class="form-control" value="<?php echo $r->bobot_bcws; ?>"/>
                        <span class="input-group-addon">%</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Status</label>
                <div class="col-sm-3">
                    <select name="status" class="form-control">
                        <option <?php echo $r->status == 'belum' ? 'selected="selected"' : ''; ?>>belum</option>
                        <option <?php echo $r->status == 'sedang' ? 'selected="selected"' : ''; ?>>sedang</option>
                        <option <?php echo $r->status == 'sudah' ? 'selected="selected"' : ''; ?>>sudah</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="edit_bcwp" class="btn btn-success">Simpan Data</button>
        </form>
    </div>
</div>