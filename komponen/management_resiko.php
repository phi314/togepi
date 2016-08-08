<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/8/16
 * Time: 9:53 AM
 */

    /*
     * Add Resiko
     */
    if(isset($_POST['add-resiko']))
    {
        @$kode = $_POST['kode'];
        @$jenis = $_POST['jenis'];
        @$deskripsi = $_POST['deskripsi'];
        @$probabilitas = $_POST['probabilitas'];
        @$dampak = $_POST['dampak'];

        $q_check_duplication = mysql_query("SELECT * FROM proyek_resiko WHERE kode='$kode' AND jenis='$jenis'");

        if(mysql_num_rows($q_check_duplication) == 0)
        {
            mysql_query("INSERT INTO proyek_resiko(kode, jenis, deskripsi, id_proyek, probabilitas, dampak) VALUES('$kode', '$jenis', '$deskripsi', '$id_proyek', '$probabilitas', '$dampak')");
        }
    }

    /*
     * Edit Resiko
     */
    if(isset($_POST['edit-resiko']))
    {
        @$id = $_POST['id'];
        @$kode = $_POST['kode'];
        @$jenis = $_POST['jenis'];
        @$deskripsi = $_POST['deskripsi'];
        @$probabilitas = $_POST['probabilitas'];
        @$dampak = $_POST['dampak'];
        @$tindakan = $_POST['tindakan'];

        mysql_query("UPDATE proyek_resiko SET
                      kode = '$kode',
                      jenis = '$jenis',
                      deskripsi = '$deskripsi',
                      id_proyek = '$id_proyek',
                      probabilitas = '$probabilitas',
                      dampak = '$dampak',
                      tindakan = '$tindakan'
                      WHERE id='$id'") or die(mysql_error());
    }


    function skala_resiko($skala)
    {
        $tingkat = FALSE;
        if($skala >= 0 && $skala <= 0.30)
            $tingkat = 'rendah';
        elseif($skala >= 0.31 && $skala <= 0.7)
            $tingkat = 'sedang';
        elseif($skala >= 0.7 && $skala <= 1)
            $tingkat = 'tinggi';

        return $tingkat;
    }
?>

<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#form-add-proyek-resiko">
    <span class="glyphicon glyphicon-plus"></span> Tambah Data Resiko
</button>

<table class="table">
    <thead>
    <tr>
        <th>Kode Resiko</th>
        <th>Jenis Resiko</th>
        <th>Deskripsi</th>
        <th>Probabilitas</th>
        <th>Dampak</th>
        <th>Tingkat Kepentingan</th>
        <th>Tingkat Resiko</th>
        <th>Tindakan Pengendalian Resiko</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $q = mysql_query("SELECT * FROM proyek_resiko WHERE id_proyek='$id_proyek' ORDER BY jenis ASC");
        while($r = mysql_fetch_object($q)):
            $tingkat_kepentingan = $r->probabilitas*$r->dampak;
    ?>
        <tr>
            <td><?php echo $r->kode; ?></td>
            <td><?php echo $r->jenis; ?></td>
            <td><?php echo $r->deskripsi; ?></td>
            <td><?php echo $r->probabilitas; ?></td>
            <td><?php echo $r->dampak; ?></td>
            <td><?php echo $tingkat_kepentingan; ?></td>
            <td><?php echo "Resiko ".skala_resiko($tingkat_kepentingan); ?></td>
            <td><?php echo $r->tindakan; ?></td>
            <td><button class="btn btn-link btn-xs btn-edit-proyek-resiko" data-toggle="modal" data-target="#form-edit-proyek-resiko" data-id="<?php echo $r->id; ?>">edit</button></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<!-- Modal Add Resiko -->
<div id="form-add-proyek-resiko" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Input Data Resiko</h4>
            </div>
            <div class="modal-body">
                <form method="POST" class="form-horizontal" action="">
                    <div class="form-group">
                        <label class="col-sm-2">Kode Risiko</label>
                        <div class="col-sm-10">
                            <input type="text" name="kode" class="form-control" required="true" placeholder="exp : R1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Jenis Risiko</label>
                        <div class="col-sm-10">
                            <select name="jenis" class="form-control">
                                <option>kebutuhan</option>
                                <option>estimasi</option>
                                <option>personal</option>
                                <option>tools dan teknologi</option>
                                <option>external</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" name="deskripsi" class="form-control" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Probabilitas</label>
                        <div class="col-sm-10">
                            <input type="text" name="probabilitas" class="form-control" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Dampak</label>
                        <div class="col-sm-10">
                            <input type="text" name="dampak" class="form-control" placeholder="" />
                        </div>
                    </div>
                    <button type="submit" name="add-resiko" class="btn btn-success">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Resiko -->
<div id="form-edit-proyek-resiko" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

    </div>
</div>

<script type="text/javascript">
    $('.btn-edit-proyek-resiko').click(function(){
        var id = $(this).data('id');

        $.ajax({
            url: base_url + 'komponen/modal/edit_proyek_resiko.php',
            type: 'get',
            data: {
                id: id
            },
            success: function(modal){
                $('#form-edit-proyek-resiko .modal-dialog').html(modal);
            }
        })
    });
</script>