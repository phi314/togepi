		<!-- start body -->
		<?php
            if(!empty($_GET['id']))
            {
                $alert = "";
                $id_proyek = $_GET['id'];

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

                // add pekerjaan
                if(isset($_POST['add_pekerjaan']))
                {
                    @$nama = $_POST['nama'];
                    @$have_child = $_POST['have_child'];
                    @$parent = $_POST['parent'];
                    @$tanggal_mulai = $_POST['tanggal_mulai'];
                    @$tanggal_selesai = $_POST['tanggal_selesai'];
                    @$bobot_bcws = $_POST['bobot_bcws'];
                    @$bobot_bcwp = $_POST['bobot_bcwp'];
                    @$status = 'belum';

                    $q = mysql_query("SELECT nama FROM proyek_pekerjaan WHERE id_proyek='$id_proyek' AND nama='$nama'");
                    if(mysql_num_rows($q) == 0)
                    {
                        mysql_query("INSERT INTO proyek_pekerjaan(id_proyek, nama, have_child, parent, tanggal_mulai, tanggal_selesai, bobot_bcws, status)
                      VALUES('$id_proyek', '$nama', '$have_child', '$parent', '$tanggal_mulai', '$tanggal_selesai', '$bobot_bcws', '$status')");

                        $alert = "Berhasil Tambah Pekerjaan";
                    }
                    else
                    {
                        $alert = "Pekerjaan: ".$nama.", Sudah diinputkan sebelumnya.";
                    }
                }

                // update pekerjaan
                if(isset($_POST['edit_pekerjaan']))
                {
                    @$id = $_POST['id'];
                    @$nama = $_POST['nama'];
                    @$have_child = $_POST['have_child'];
                    @$parent = $_POST['parent'];
                    @$tanggal_mulai = $_POST['tanggal_mulai'];
                    @$tanggal_selesai = $_POST['tanggal_selesai'];
                    @$bobot_bcws = $_POST['bobot_bcws'];
                    @$status = $_POST['status'];

                    $q = mysql_query("UPDATE proyek_pekerjaan SET
                                        nama='$nama',
                                        have_child='$have_child',
                                        parent='$parent',
                                        tanggal_mulai='$tanggal_mulai',
                                        tanggal_selesai='$tanggal_selesai',
                                        bobot_bcws='$bobot_bcws',
                                        status='$status'
                                        WHERE id='$id'");


                    $alert = "Berhasil Edit Pekerjaan";
                }

                // edit pekerjaan stakeholder
                if(isset($_POST['edit_pekerjaan_stakeholder']))
                {
                    @$id_pekerjaan = $_POST['id_pekerjaan'];
                    @$raci = $_POST['raci'];

                    foreach($raci as $key => $pekerjaan_stakeholder)
                    {
                        mysql_query("UPDATE proyek_pekerjaan_stakeholder SET raci='$pekerjaan_stakeholder' WHERE id='$key'");
                    }

                    $alert = "Berhasil update SDM";
                }

                if(!empty($alert))
                {
                    echo "<div class='alert alert-default'>$alert</div>";
                }

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

        <?php if($_SESSION['status'] != 'DEVELOPER'): ?>
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
                   <button type="submit" name="update_proyek" class="btn btn-success">Simpan Data</button>
               </form>
		<!-- end body -->

        <?php else : ?>
            <h2 class="text-center"><?php echo $d->nama_proyek; ?></h2>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <h3 id="stakeholder">Stakeholders</h3>
                <hr>

                <?php if($_SESSION['status'] == 'MANAGER'): ?>
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
                <?php endif; ?>

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
            </div>
            <div class="col-md-6">
                <h3 id="stakeholder">Kompleksitas</h3>
                <hr>

                <?php
                    $total_nilai_cfp = total_nilai_cfp($id_proyek);
                    $total_nilai_rcaf = total_nilai_rcaf($id_proyek);

                    $fp = $total_nilai_cfp * (0.65 + 0.01 * $total_nilai_rcaf);
                ?>

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-center">Total CFP<br><b><?php echo $total_nilai_cfp; ?></b></h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-center">
                            Total RCAF<br>
                            <b><?php echo $total_nilai_rcaf; ?></b>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-center">Estimasi Kompleksitas<br><b><?php echo $fp; ?></b></h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-center">
                            Perkiraan Waktu Selesai<br>
                            <?php
                            $jumlah_developer = count_developer($id_proyek);
                            $static_fp = 6;

                            // perkiraan waktu
                            $pw = division(round($fp), ($jumlah_developer * $static_fp));
                            ?>
                            <b><?php echo round($pw); ?> Minggu</b>
                        </h4>
                    </div>
                </div>

                <a href="beranda.php?page=detailproyek_kompleksitas.php&id=<?php echo $id_proyek; ?>" class="btn btn-info btn-block">Detail Kompleksitas</a>

            </div>
        </div>

        <!-- Rincian Pekerjaan -->

        <div id="pekerjaan">
            <ul class="nav nav-tabs">
                <li><a href="#list-pekerjaan" class="nav active" data-toggle="tab">Struktur Rincian Kerja</a></li>
                <li><a href="#jadwal-pekerjaan" class="nav active" data-toggle="tab">Jadwal Kerja</a></li>
                <li><a href="#sdm" class="nav active" data-toggle="tab">SDM</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane" id="jadwal-pekerjaan">

                <?php include("../komponen/kalender_pekerjaan.php"); ?>

            </div>

            <div class="tab-pane active" id="list-pekerjaan">
                <h3>Struktur Rincian Kerja</h3>
                <hr>

                <?php if($_SESSION['status'] == 'MANAGER'): ?>
                    <button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#add-pekerjaan">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Data Pekerjaan
                    </button>
                <?php endif; ?>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Durasi</th>
                        <!--                        <th>Minggu</th>-->
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Bobot BCWS</th>
                        <!--                        <th>Bobot BCWP</th>-->
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $q_pekerjaan = mysql_query("SELECT * FROM proyek_pekerjaan WHERE id_proyek='$id_proyek' ORDER BY tanggal_mulai, COALESCE(parent, id), parent IS NOT NULL");
                    while($d_pekerjaan = mysql_fetch_object($q_pekerjaan)):
                        ?>
                        <tr>
                            <td class="<?php echo empty($d_pekerjaan->parent) ? 'info' : ''; ?>"><?php echo $d_pekerjaan->nama; ?></td>
                            <td><?php echo $d_pekerjaan->have_child ? get_parent_durasi($d_pekerjaan->id) : durasi($d_pekerjaan->tanggal_mulai, $d_pekerjaan->tanggal_selesai); ?> Hari</td>
                            <!--                            <td><pre>--><?php //// get_minggu_bcws($d_pekerjaan->id); ?><!--</pre></td>-->
                            <td><?php echo $d_pekerjaan->have_child ? tanggal_format_indonesia(get_parent_tanggal_mulai($d_pekerjaan->id)) : tanggal_format_indonesia($d_pekerjaan->tanggal_mulai); ?></td>
                            <td><?php echo $d_pekerjaan->have_child ? tanggal_format_indonesia(get_parent_tanggal_selesai($d_pekerjaan->id)) : tanggal_format_indonesia($d_pekerjaan->tanggal_selesai); ?></td>
                            <td><?php echo $d_pekerjaan->have_child ? get_parent_bcws($d_pekerjaan->id) : $d_pekerjaan->bobot_bcws ?></td>
                            <!--                            <td>--><?php //echo $d_pekerjaan->have_child ? get_parent_bcwp($d_pekerjaan->id) : $d_pekerjaan->bobot_bcwp ?><!--</td>-->
                            <td><?php echo $d_pekerjaan->have_child ? "" : $d_pekerjaan->status ?></td>
                            <td>
                                <?php if($_SESSION['status'] == 'MANAGER'): ?>
                                    <button class="btn btn-link btn-xs btn-edit-pekerjaan" data-toggle="modal" data-target="#edit-pekerjaan" data-id="<?php echo $d_pekerjaan->id; ?>">Edit</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="8"><sub>*Jika memiliki sub maka data akan di hitung dari nilai subnya.</sub></td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="tab-pane" id="sdm">
                <table class="table">
                    <thead>
                    <tr>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2" r>Durasi</th>
                        <th>Stakeholder</th>
                    </tr>
                    <tr>

                    <?php
                        $array_stakeholder = [];
                        $q_sdm_stakeholder = mysql_query("SELECT proyek_stakeholders.*, user.nama as user_nama FROM proyek_stakeholders JOIN user ON user.id_user=proyek_stakeholders.id_user WHERE id_proyek='$id_proyek'");

                        $i_developer = 1;
                    while($r_sdm_stakeholder = mysql_fetch_object($q_sdm_stakeholder)):

                            switch($r_sdm_stakeholder->tugas)
                            {
                                case 'CEO':
                                    $tugas = 'ceo';
                                    break;
                                case 'Project Manager':
                                    $tugas = 'pm';
                                    break;
                                default:
                                    $tugas = 'd';
                            }

                            if($tugas == 'd')
                            {
                                $tugas = 'd'.$i_developer++;
                            }

                            $array_stakeholder[] = [
                                $r_sdm_stakeholder->id_user,
                                $tugas
                            ];

                            ?>
                        <td><?php echo $r_sdm_stakeholder->user_nama; ?></td>
                    <?php endwhile; ?>
                        <td colspan="2">Aksi</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $q_sdm = mysql_query("SELECT * FROM proyek_pekerjaan WHERE id_proyek='$id_proyek' ORDER BY tanggal_mulai, COALESCE(parent, id), parent IS NOT NULL");
                    while($d_sdm = mysql_fetch_object($q_sdm)):
                        ?>
                        <tr>
                            <td class="<?php echo empty($d_sdm->parent) ? 'info' : ''; ?>"><?php echo $d_sdm->nama; ?></td>
                            <td><?php echo $d_sdm->have_child ? get_parent_durasi($d_sdm->id) : durasi($d_sdm->tanggal_mulai, $d_sdm->tanggal_selesai); ?> Hari</td>
                            <?php
                            $q_pekerjaan_stakeholder = mysql_query("SELECT * FROM proyek_pekerjaan_stakeholder WHERE id_pekerjaan='$d_sdm->id'");

                            /*
                             * if empty stakeholder
                             * insert into pekerjaan stakeholder
                             */
                            if(mysql_num_rows($q_pekerjaan_stakeholder) == 0)
                            {
                                foreach($array_stakeholder as $sdm_stakeholder)
                                {
                                    if($sdm_stakeholder[1] == 'ceo')
                                        $raci = 'i';
                                    elseif($sdm_stakeholder[1] == 'pm')
                                        $raci = 'c';
                                    else
                                        $raci = 'i';

                                    mysql_query("INSERT INTO proyek_pekerjaan_stakeholder(id_pekerjaan, id_stakeholder, raci) VALUES ('$d_sdm->id', '$sdm_stakeholder[0]', '$raci')");
                                }
                            }

                            while($r_pekerjaan_stakeholder = mysql_fetch_object($q_pekerjaan_stakeholder)):
                            ?>
                                <td><?php echo strtoupper($r_pekerjaan_stakeholder->raci); ?></td>
                            <?php endwhile; ?>
                            <td>
                                <?php if($_SESSION['status'] == 'MANAGER'): ?>
                                    <button class="btn btn-link btn-xs btn-edit-pekerjaan-stakeholder" data-toggle="modal" data-target="#edit-pekerjaan-stakeholder" data-id="<?php echo $d_sdm->id; ?>">Edit</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                    </tbody>
                </table>
            </div>

        </div>



        <?php
            // show evm if is not manager
            if($_SESSION['status'] != 'MANAGER')
                include "../komponen/evm.php";
        ?>

        <h1>Data Resiko</h1>
        <?php include "../komponen/management_resiko.php"; ?>



        <!-- Modal Input Rincian Kerja -->
        <div class="modal fade" id="add-pekerjaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
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
                                    <input type="text" name="nama" class="form-control" required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <input type="checkbox" name="have_child" value="1"> Memiliki Sub-pekerjaan?
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
                                            <option value="<?php echo $d_parent_pekerjaan->id; ?>"><?php echo $d_parent_pekerjaan->nama; ?></option>
                                        <?php
                                            endwhile;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Tanggal Mulai</label>
                                <div class="col-sm-7">
                                    <input type="date" name="tanggal_mulai" class="form-control datepicker" required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Tanggal Selesai</label>
                                <div class="col-sm-7">
                                    <input type="date" name="tanggal_selesai" class="form-control datepicker" required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Bobot BCWS</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" name="bobot_bcws" class="form-control" />
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label class="col-sm-2">Bobot BCWP</label>-->
<!--                                <div class="col-sm-3">-->
<!--                                    <div class="input-group">-->
<!--                                        <input type="text" name="bobot_bcwp" class="form-control" />-->
<!--                                        <span class="input-group-addon">%</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <button type="submit" name="add_pekerjaan" class="btn btn-success">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Input Rincian Kerja -->
        <div class="modal fade" id="edit-pekerjaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">

            </div>
        </div>

        <!-- Modal Input Rincian Kerja -->
        <div class="modal fade" id="edit-pekerjaan-stakeholder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">

            </div>
        </div>

        <script type="text/javascript">

            var total_anggaran = <?php echo $d->biaya; ?>;

            $('.btn-edit-pekerjaan').click(function(){
                var id = $(this).data('id');

                $.ajax({
                    url: base_url + 'komponen/modal/edit_proyek_pekerjaan.php',
                    type: 'get',
                    data: {
                        id: id,
                        id_proyek: <?php echo $id_proyek; ?>
                    },
                    success: function(modal){
                        $('#edit-pekerjaan .modal-dialog').html(modal);
                    }
                })
            });

            $('.btn-edit-pekerjaan-stakeholder').click(function(){
                var id = $(this).data('id');

                $.ajax({
                    url: base_url + 'komponen/modal/edit_proyek_pekerjaan_stakeholder.php',
                    type: 'get',
                    data: {
                        id_pekerjaan: id,
                        id_proyek: <?php echo $id_proyek; ?>
                    },
                    success: function(modal){
                        $('#edit-pekerjaan-stakeholder .modal-dialog').html(modal);
                    }
                })
            });

            function hitung_cost(bobot, total_anggaran){
                return (bobot/100) * total_anggaran;
            }

            $('.input-bobot').keyup(function(){
                var id_proyek = $(this).data('idproyek');
                var minggu = $(this).data('minggu');
                var tipe = $(this).data('tipe');
                var periode_start = $(this).data('start');
                var periode_end = $(this).data('end');
                var bobot = $(this).val();

                var cost = hitung_cost(bobot, total_anggaran);

                $('.' + tipe + '-cost-'+minggu).text('Rp. ' + cost);

                $.ajax({
                    url: base_url + 'komponen/add_bobot.php',
                    type: 'post',
                    data: {
                        id_proyek: id_proyek,
                        minggu: minggu,
                        tipe: tipe,
                        periode_start: periode_start,
                        periode_end: periode_end,
                        bobot: bobot,
                        cost: cost
                    },
                    dataType: 'json',
                    success: function(json)
                    {
                        console.log(json);
                    }
                });
            });

            $('.input-cost-acwp').keyup(function(){
                var id_proyek = $(this).data('idproyek');
                var minggu = $(this).data('minggu');
                var tipe = $(this).data('tipe');
                var periode_start = $(this).data('start');
                var periode_end = $(this).data('end');
                var cost = $(this).val();

                $.ajax({
                    url: base_url + 'komponen/add_bobot.php',
                    type: 'post',
                    data: {
                        id_proyek: id_proyek,
                        minggu: minggu,
                        tipe: tipe,
                        periode_start: periode_start,
                        periode_end: periode_end,
                        cost: cost
                    },
                    dataType: 'json',
                    success: function(json)
                    {
                        console.log(json);
                    }
                });
            })
        </script>

