    <!-- start body -->
    <?php

    $d = FALSE;
    $search = '';

    if(!empty($_GET['search']))
    {
        $alert = "";
        $search = $_GET['search'];

        if(!empty($alert))
        {
            echo "<div class='alert alert-default'>$alert</div>";
        }

        $q = mysql_query("SELECT * FROM proyek JOIN client ON client.id_client=proyek.id_client WHERE kode_proyek LIKE '$search' LIMIT 1");
        if(mysql_num_rows($q) == 1)
        {
            $d = mysql_fetch_object($q);
            $id_proyek = $d->id;
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

            $q = mysql_query("SELECT nama FROM proyek_pekerjaan WHERE id_proyek='$id_proyek' AND nama='$nama'");
            if(mysql_num_rows($q) == 0)
            {
                mysql_query("INSERT INTO proyek_pekerjaan(id_proyek, nama, have_child, parent, tanggal_mulai, tanggal_selesai)
                      VALUES('$id_proyek', '$nama', '$have_child', '$parent', '$tanggal_mulai', '$tanggal_selesai')");

                $alert = "Berhasil Tambah Pekerjaan";
            }
            else
            {
                $alert = "Pekerjaan: ".$nama.", Sudah diinputkan sebelumnya.";
            }
        }

        if(isset($_POST['edit_pekerjaan']))
        {
            @$id = $_POST['id'];
            @$nama = $_POST['nama'];
            @$have_child = $_POST['have_child'];
            @$parent = $_POST['parent'];
            @$tanggal_mulai = $_POST['tanggal_mulai'];
            @$tanggal_selesai = $_POST['tanggal_selesai'];
            @$bobot_bcws = $_POST['bobot_bcws'];
            @$bobot_bcwp = $_POST['bobot_bcwp'];

            $q = mysql_query("UPDATE proyek_pekerjaan SET
                                        nama='$nama',
                                        have_child='$have_child',
                                        parent='$parent',
                                        tanggal_mulai='$tanggal_mulai',
                                        tanggal_selesai='$tanggal_selesai',
                                        bobot_bcws='$bobot_bcws',
                                        bobot_bcwp='$bobot_bcwp'
                                        WHERE id='$id'");


            $alert = "Berhasil Edit Pekerjaan";
        }

        if(isset($_POST['edit_bcwp']))
        {
            @$id = $_POST['id'];
            @$bobot_bcwp = $_POST['bobot_bcwp'];
            @$status = $_POST['status'];

            $q = mysql_query("UPDATE proyek_pekerjaan SET
                                        bobot_bcwp='$bobot_bcwp',
                                        status='$status'
                                        WHERE id='$id'");


            $alert = "Berhasil Edit Pekerjaan";
        }
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


    if(!empty($alert))
    {
        echo "<div class='alert alert-default'>$alert</div>";
    }

    ?>

    <h1>Data Jadwal</h1>

    <form action="" method="get">
        <div class="input-group">
            <input type="text" placeholder="Masukan Kode Proyek" class="form-control" name="search" value="<?php echo $search; ?>">
            <div class="input-group-btn">
                <button class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
            </div>
        </div>
        <input type="hidden" name="page" value="datajadwal.php">
    </form>

    <?php if($d != FALSE): ?>

        <h2 class="text-center"><?php echo $d->nama_proyek; ?></h2>

        <!-- Rincian Pekerjaan -->

        <a href="datakalenderpekerjaan.php?id=<?php echo $id_proyek; ?>" class="btn btn-success">Kalender Pekerjaan</a>


        <div>
            <ul class="nav nav-tabs">
                <li><a href="#list-pekerjaan" class="nav active" data-toggle="tab">Struktur Rincian Kerja</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane row active" id="list-pekerjaan">
                <div class="col-md-12">
                    <h3>Struktur Rincian Kerja</h3>
                    <hr>

                    <?php if($_SESSION['status'] == 'MANAGER'): ?>
                        <button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#pekerjaan">
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
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Input Rincian Kerja -->
        <div class="modal fade" id="pekerjaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Form Input Rincian Kerja</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="#rincian-pekerjaan" class="form-horizontal">
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
                            <!--                            <div class="form-group">-->
                            <!--                                <label class="col-sm-2">Bobot BCWS</label>-->
                            <!--                                <div class="col-sm-3">-->
                            <!--                                    <div class="input-group">-->
                            <!--                                        <input type="text" name="bobot_bcws" class="form-control" />-->
                            <!--                                        <span class="input-group-addon">%</span>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
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

    <?php endif; ?>

    <script type="text/javascript">
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

        $('.btn-hapus-pekerjaan').click(function(){
            var c = confirm("Hapus Pekerjaan ?");

            if(c == true)
            {

            }
            else
                return false;
        })
    </script>