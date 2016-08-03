<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 7/25/16
 * Time: 1:56 PM
 */

include '../../config/koneksi.php';

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
        <h4 class="modal-title" id="myModalLabel">Form Input Rincian Kerja</h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="#pekerjaan" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2">Nama Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required="true" value="<?php echo $r->nama; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <input type="checkbox" name="have_child" value="1" <?php echo $r->have_child ? "checked='checked'" : ""; ?>> Memiliki Sub-pekerjaan?
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Group</label>
                <div class="col-sm-10">
                    <select name="parent" class="form-control">
                        <option value="">--Silahkan pilih Group Pekerjaan--</option>
                        <?php
                        $q_parent_pekerjaan = mysql_query("SELECT id, nama FROM proyek_pekerjaan WHERE id_proyek='$id_proyek' AND have_child='1'");
                        while($d_parent_pekerjaan = mysql_fetch_object($q_parent_pekerjaan)):
                            ?>
                            <option value="<?php echo $d_parent_pekerjaan->id; ?>" <?php echo $r->parent == $d_parent_pekerjaan->id ? "selected='selected'" : ""; ?> ><?php echo $d_parent_pekerjaan->nama; ?></option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Tanggal Mulai</label>
                <div class="col-sm-7">
                    <input type="date" name="tanggal_mulai" class="form-control datepicker" required="true" value="<?php echo $r->tanggal_mulai; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Tanggal Selesai</label>
                <div class="col-sm-7">
                    <input type="date" name="tanggal_selesai" class="form-control datepicker" required="true" value="<?php echo $r->tanggal_selesai; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Bobot BCWS</label>
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
            <button type="submit" name="edit_pekerjaan" class="btn btn-success">Simpan Data</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>