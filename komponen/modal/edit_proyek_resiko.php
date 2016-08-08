<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/8/16
 * Time: 10:47 AM
 */

include '../../config/koneksi.php';
include '../library.php';


    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $q = mysql_query("SELECT * FROM proyek_resiko WHERE id='$id'") or die(mysql_error());
        $d = mysql_fetch_object($q);
    }

?>

<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Edit Data Resiko</h4>
    </div>
    <div class="modal-body">
        <form method="POST" class="form-horizontal" action="">
            <div class="form-group">
                <label class="col-sm-2">Kode Risiko</label>
                <div class="col-sm-10">
                    <input type="text" name="kode" class="form-control" required="true" value="<?php echo $d->kode; ?>" placeholder="exp : R1" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Jenis Risiko</label>
                <div class="col-sm-10">
                    <select name="jenis" class="form-control">
                        <option <?php echo $d->jenis == 'kebutuhan' ? "selected='selected'" : ""; ?>>kebutuhan</option>
                        <option <?php echo $d->jenis == 'estimasi' ? "selected='selected'" : ""; ?>>estimasi</option>
                        <option <?php echo $d->jenis == 'personal' ? "selected='selected'" : ""; ?>>personal</option>
                        <option <?php echo $d->jenis == 'tools dan teknologi' ? "selected='selected'" : ""; ?>>tools dan teknologi</option>
                        <option <?php echo $d->jenis == 'external' ? "selected='selected'" : ""; ?>>external</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" name="deskripsi" class="form-control" placeholder="" value="<?php echo $d->deskripsi; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Probabilitas</label>
                <div class="col-sm-10">
                    <input type="text" name="probabilitas" class="form-control" placeholder="" value="<?php echo $d->probabilitas; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Dampak</label>
                <div class="col-sm-10">
                    <input type="text" name="dampak" class="form-control" placeholder="" value="<?php echo $d->dampak; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Tindakan</label>
                <div class="col-sm-10">
                    <input type="text" name="tindakan" class="form-control" placeholder="" value="<?php echo $d->tindakan; ?>" />
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="edit-resiko" class="btn btn-success">Simpan Data</button>
        </form>
    </div>
</div>