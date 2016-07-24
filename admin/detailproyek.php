		<!-- start body -->
		<?php
            if(!empty($_GET['id']))
            {
                $alert = "";

                // add stakeholder
                if(isset($_POST['add_stakeholders']))
                {
                    @$id_proyek = $_POST['id_proyek'];
                    @$id_user = $_POST['id_user'];
                    @$tugas = $_POST['tugas'];

                    $q = mysql_query("SELECT id_user FROM proyek_stakeholders WHERE id_proyek='$id_proyek' AND id_user='$id_user'");
                    if($id_user == 0)
                    {
                        $alert = "Silahkan pilih stakeholders";
                    }
                    elseif(mysql_num_rows($q) == 1)
                        $alert = "User Sudah masuk ke stakeholders";
                    else
                    {
                        mysql_query("INSERT INTO proyek_stakeholders(id_proyek, id_user, tugas) VALUES('$id_proyek', '$id_user', '$tugas')");
                        $alert = "Berhasil menambah user ke stakeholders";
                    }
                }

                // update proyek
                if(isset($_POST['update_proyek']))
                {
                    @$id_proyek 		= $_POST['id_proyek'];
                    @$nama_proyek	  	= $_POST['nama_proyek'];
                    @$tujuan            = $_POST['tujuan'];
                    @$asal_muasal       = $_POST['asal_muasal'];
                    @$fase              = $_POST['fase'];
                    @$biaya 			= $_POST['biaya'];
                    //	@$tanggal_mulai	  	= $_POST['tanggal_mulai'];
                    //	@$tanggal_selesai 	= $_POST['tanggal_selesai'];
                    //	@$status	  		= $_POST['status'];

                    mysql_query("UPDATE proyek SET
                    nama_proyek='$nama_proyek',
                    tujuan='$tujuan',
                    asal_muasal='$asal_muasal',
                    fase='$fase',
                    biaya='$biaya'
                    WHERE id='$id_proyek'");

                    $alert = "Berhasil Update data Proyek";
                }

                if(!empty($alert))
                {
                    echo "<div class='alert alert-default'>$alert</div>";
                }

                $id_proyek = $_GET['id'];
                $q = mysql_query("SELECT * FROM proyek JOIN client ON client.id_client=proyek.id_client WHERE id='$id_proyek' LIMIT 1");
                if(mysql_num_rows($q) == 1)
                {
                    $d = mysql_fetch_object($q);
                }
            }
            else
            {
                header("location:beranda.php");
            }

            function tipe_proyek($tipe)
            {
                $string = "";
                switch($tipe)
                {
                    case "W":
                        $string = "Proyek Website";
                        break;
                    case "A":
                        $string = "Proyek Android";
                        break;
                    case "I":
                        $string = "Proyek Ios";
                        break;
                    case "R":
                        $string = "Proyek Robotik";
                        break;

                }

                return $string;
            }
		?>

               <form method="POST" action="" class="form-horizontal">
                   <div class="form-group">
                       <label class="col-sm-2">Tipe Proyek</label>

                       <div class="col-sm-10 form-control-static">
                           <?php echo tipe_proyek(substr($d->kode_proyek, 0, 1)); ?>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-2">Kode Proyek</label>
                       <div class="col-sm-10">
                           <input type="text" name="kode_proyek" class="form-control" required="true" readonly value="<?php echo $d->kode_proyek; ?>"/>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-2">Nama Proyek</label>
                       <div class="col-sm-10">
                           <input type="text" name="nama_proyek" class="form-control" required="true" value="<?php echo $d->nama_proyek; ?>"/>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-2">Nama Client</label>
                       <div class="col-sm-10">
                           <input type="hidden" name="id_client" value="<?php $d->id_client; ?>">
                           <div class="form-control-static"><?php echo $d->nama_client; ?></div>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-2">Tujuan Proyek</label>
                       <div class="col-sm-10">
                           <textarea name="tujuan" class="form-control"><?php echo $d->tujuan; ?></textarea>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-2">Penjelasan asal muasal Proyek</label>
                       <div class="col-sm-10">
                           <textarea name="asal_muasal" class="form-control"><?php echo $d->asal_muasal; ?></textarea>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-2">Fase dalam Proyek</label>
                       <div class="col-sm-10">
                           <textarea name="fase" class="form-control"><?php echo $d->fase; ?></textarea>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-2">Biaya</label>
                       <div class="col-sm-10">
                           <div class="input-group">
                               <span class="input-group-addon">Rp.</span>
                               <input type="text" name="biaya" class="form-control" required="true" value="<?php echo $d->biaya; ?>"/>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-2">Tanggal Mulai</label>
                       <div class="col-sm-10">
                           <input type="date" name="tanggal_mulai" class="form-control" required="true" value="<?php echo $d->tanggal_mulai; ?>"/>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-2">Tanggal Selesai</label>
                       <div class="col-sm-10">
                           <input type="date" name="tanggal_selesai" class="form-control" required="true" value="<?php echo $d->tanggal_selesai; ?>"/>
                       </div>
                   </div>
                   <!--<div class="form-group">
                       <label class="col-sm-2">Status</label>
                       <div class="col-sm-10">
                           <input type="text" name="status" class="form-control" required="true"/>
                       </div>
                   </div>-->
                   <input type="hidden" name="id_proyek" value="<?php echo $id_proyek; ?>">
                   <button type="reset" class="btn btn-warning">Reset</button>
                   <button type="submit" name="update_proyek" class="btn btn-success">Simpan Data</button>
               </form>
		<!-- end body -->

        <h3 id="stakeholder">Stakeholders</h3>
        <hr>
        <form method="post" action="#stakeholder">
            <div class="form-group">
                <label>User</label>
                <select name="id_user" class="form-control">
                    <option value="">--Silahkan pilih Stakeholders--</option>
                    <?php
                        $q_users = mysql_query("SELECT * FROM user");
                        while($d_user = mysql_fetch_object($q_users)):
                    ?>
                    <option value="<?php echo $d_user->id_user; ?>"><?php echo $d_user->nama; ?></option>
                    <?php
                        endwhile;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tugas</label>
                <select name="tugas" class="form-control">
                    <option value="Front End">Front End</option>
                    <option value="Back End">Back End</option>
                    <option value="Project Manager">Project Manager</option>
                    <option value="Web Developer">Web Developer</option>
                    <option value="CEO">CEO</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <input type="hidden" value="<?php echo $id_proyek; ?>" name="id_proyek">
            <button class="btn btn-primary" name="add_stakeholders">Simpan Stakeholder</button>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>NAMA</th>
                <th>TUGAS</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $q_stakeholders = mysql_query("SELECT * FROM proyek_stakeholders JOIN user ON user.id_user=proyek_stakeholders.id_user WHERE proyek_stakeholders.id_proyek='$id_proyek'") or die(mysql_error());
                if(mysql_num_rows($q_stakeholders) != 0)
                {

                    while($d_stakeholder = mysql_fetch_object($q_stakeholders)):
                    ?>
                        <tr>
                            <td><?php echo $d_stakeholder->nama; ?></td>
                            <td><?php echo $d_stakeholder->tugas; ?></td>
                        </tr>
                    <?php
                    endwhile;
                }
            ?>
            </tbody>
        </table>

        <h3 id="stakeholder">Kompleksitas</h3>
        <hr>

        <a href="beranda.php?page=detailproyek_kompleksitas.php&id=<?php echo $id_proyek; ?>" class="btn btn-success btn-block">Kompleksitas</a>
