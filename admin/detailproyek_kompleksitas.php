		<!-- start body -->
		<?php
            if(!empty($_GET['id']))
            {
                $alert = "";

                $id_proyek = $_GET['id'];

                // add data cfp
                if(isset($_POST['add_data_cfp']))
                {
                    @$komponen_sistem = $_POST['komponen_sistem'];
                    @$nama_kegiatan = $_POST['nama_kegiatan'];
                    @$sederhana = $_POST['sederhana'];
                    @$menengah = $_POST['menengah'];
                    @$komplek = $_POST['komplek'];

                    $q = mysql_query("SELECT komponen_sistem, nama_kegiatan FROM proyek_cfp WHERE id_proyek='$id_proyek' AND komponen_sistem='$komponen_sistem' AND nama_kegiatan='$nama_kegiatan'");
                    if(mysql_num_rows($q) == 1)
                        $alert = "Komponen Sistem: $komponen_sistem dengan Nama Kegiatan: $nama_kegiatan. Sudah ada.";
                    else
                    {
                        $total_cfp = total_cfp($komponen_sistem, $sederhana, $menengah, $komplek);

                        mysql_query("INSERT INTO proyek_cfp(id_proyek, komponen_sistem, nama_kegiatan, sederhana, menengah, komplek, total) VALUES('$id_proyek', '$komponen_sistem', '$nama_kegiatan', '$sederhana', '$menengah', '$komplek', '$total_cfp')");
                        $alert = "Berhasil menambah data CFP";
                    }
                }

                // add template rcaf
                if(isset($_POST['add-template-rcaf']))
                {
                    $q = mysql_query("SELECT * FROM proyek_gsc WHERE id_proyek='$id_proyek'");
                    if(mysql_num_rows($q) == 0)
                    {
                        mysql_query("INSERT INTO proyek_gsc(id_proyek, id_gsc, nilai) SELECT '$id_proyek', id, '0' FROM gsc");
                    }
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
		?>


        <a href="beranda.php?page=detailproyek.php&id=<?php echo $id_proyek; ?>" class="btn btn-default">Kembali ke detail Proyek</a>
        <h1 class="">Kompleksitas</h1>
        <hr>

        <div>
            <ul class="nav nav-tabs">
                <li><a href="#data-cfp" class="nav active" data-toggle="tab">Data CFP</a> </li>
                <li><a href="#data-gsc" class="nav" data-toggle="tab">Data GSC</a> </li>
                <li><a href="#nilai-kompleksitas" class="nav" data-toggle="tab">Nilai Kompleksitas</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="data-cfp">
                    <h2>Data CFP</h2>
                    <hr>

                    <form action="#data-cfp" method="post">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Komponen Sistem</th>
                                <th>Nama Kegiatan</th>
                                <th>Sederhana</th>
                                <th>Menengah</th>
                                <th>Komplek</th>
                                <th>Total Cfp</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            $q_cfp = mysql_query("SELECT * FROM proyek_cfp WHERE id_proyek='$id_proyek' ORDER BY komponen_sistem ASC");
                            while($d_cfp = mysql_fetch_object($q_cfp)):
                                ?>
                                <tr id="cfp-<?php echo $d_cfp->id; ?>">
                                    <td><?php echo $i++; ?>.</td>
                                    <td><?php echo $d_cfp->komponen_sistem; ?></td>
                                    <td><?php echo $d_cfp->nama_kegiatan; ?></td>
                                    <td><?php echo $d_cfp->sederhana; ?></td>
                                    <td><?php echo $d_cfp->menengah; ?></td>
                                    <td><?php echo $d_cfp->komplek; ?></td>
                                    <td><?php echo $d_cfp->total; ?></td>
                                    <td>
                                        <button type="button" data-id="<?php echo $d_cfp->id; ?>" class="delete_proyek_cfp btn btn-link btn-xs">hapus</button>
                                    </td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="6" class="text-right">Total Nilai CFP</th>
                                <th><?php echo $total_nilai_cfp = total_nilai_cfp($id_proyek); ?></th>
                            </tr>
                            </tfoot>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td colspan="1">
                                    <select class="form-control" name="komponen_sistem">
                                        <option>input</option>
                                        <option>output</option>
                                        <option>file logic</option>
                                        <option>interface external</option>
                                        <option>inquery</option>
                                    </select>
                                </td>
                                <td><input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan"></td>
                                <td><input type="text" name="sederhana" class="form-control" placeholder=""></td>
                                <td><input type="text" name="menengah" class="form-control" placeholder=""></td>
                                <td><input type="text" name="komplek" class="form-control" placeholder=""></td>
                                <td colspan="2"><button type="submit" name="add_data_cfp" class="btn btn-primary">Tambah data CFP</button> </td>
                            </tr>
                            </tfoot>
                        </table>
                        <input type="hidden" name="id_proyek" value="<?php echo $id_proyek; ?>">
                    </form>
                </div>

                <div class="tab-pane" id="data-gsc">
                    <h2>General System Characteristic (GSC)</h2>
                    <hr>

                    <form action="#data-gsc" method="post">
                        <button class="btn btn-danger" name="add-template-rcaf" onclick="return confirm('Apakah Anda yakin?')">Template RCAF</button>
                    </form>

                    <i>
                        0 = tidak pengaruh, 1 = insidental, 2 = moderat, 3 = rata-rata, 4 = signifikan 5 = essential.
                    </i>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama GSC</th>
                            <th>Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $q_gsc = mysql_query("SELECT p.*, gsc.nama_gsc FROM proyek_gsc as p JOIN gsc ON gsc.id=p.id_gsc WHERE p.id_proyek='$id_proyek'"); echo mysql_error();
                        while($d_gsc = mysql_fetch_object($q_gsc)):
                            ?>
                            <tr>
                                <td><?php echo $d_gsc->nama_gsc; ?></td>
                                <td><input type="text" data-nilai="<?php echo $d_gsc->nilai; ?>" name="nilai[]" data-id-proyek-gsc="<?php echo $d_gsc->id; ?>" value="<?php echo $d_gsc->nilai; ?>" class="form-control"></td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="6" class="text-right">Total Nilai CFP</th>
                            <th id="total-rcaf"><?php echo $total_nilai_rcaf = total_nilai_rcaf($id_proyek); ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="tab-pane" id="nilai-kompleksitas">
                    <h2>Nilai Kompleksitas</h2>
                    <hr>

                    <b>FP = CFP * (0.65 + 0.01 * RCAF)</b>

                    <br>
                    FP = <?php echo $total_nilai_cfp; ?> * (0.65 + 0.01 * <?php echo $total_nilai_rcaf; ?>)
                    <br>
                    FP = <?php echo $fp = $total_nilai_cfp * (0.65 + 0.01 * $total_nilai_rcaf); ?>

                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="text-center">Estimasi Kompleksitas<br><b><?php echo $fp; ?></b></h1>
                        </div>
                        <div class="col-md-4">
                            <h1 class="text-center">
                                Perkiraan Waktu Selesai<br>
                                <?php
                                $jumlah_developer = count_developer($id_proyek);
                                $static_fp = 6;

                                // perkiraan waktu
                                $pw = round($fp) / ($jumlah_developer * $static_fp);
                                ?>
                                <b><span id="label-pw"><?php echo round($pw); ?></span> Minggu</b>
                            </h1>
                        </div>
                        <div class="col-md-4">
                            <h1 class="text-center">
                                Perkiraan Biaya<br>
                                <div class="input-group">
                                    <input type="text" placeholder="Tarif tenaga kerja" name="tarif_tenaga_kerja" id="tarif_tenaga_kerja" value="<?php echo $d->tarif_tenaga_kerja; ?>" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="button" id="btn_tarif_tenaga_kerja">Simpan</button>
                                    </span>
                                </div>
                                <b id="perkiraan-biaya">Rp. <?php echo format_rupiah($d->tarif_tenaga_kerja * round($pw)) ; ?></b>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            $('input[name="nilai[]"]').keyup(function(){
                var nilai = $(this).val();
                var id_proyek_gsc = $(this).data('id-proyek-gsc');
                var id_proyek = $('input[name=id_proyek]').val();

                if(nilai >= 6)
                {
                    alert('Nilai tidak boleh lebih dari 5.');
                    $(this).val($(this).data('nilai'));
                    return false;
                }

                $.ajax({
                    url: base_url + "komponen/set_proyek_gsc_nilai.php",
                    method: 'GET',
                    data: {
                        id_proyek_gsc: id_proyek_gsc,
                        id_proyek: id_proyek,
                        nilai: nilai
                    },
                    dataType: 'json',
                    success: function(data)
                    {
                        $('#total-rcaf').text(data.total_rcaf);
                    }
                });
            });

            $('.delete_proyek_cfp').click(function(){

                var id = $(this).data('id');

                var c = confirm('Anda yakin akan menghapus data ini?');
                if(c == true)
                {
                    $.ajax({
                        url: base_url + 'komponen/delete_proyek_cfp.php',
                        type: 'get',
                        data: {
                            id_proyek_cfp: id
                        },
                        success: function(){
                            $('#cfp-' + id).hide();
                        }
                    })
                }
            });

            $('#btn_tarif_tenaga_kerja').click(function(){
                var tarif_tenaga_kerja = $('#tarif_tenaga_kerja').val();
                var pw = $('#label-pw').text();

                $.ajax({
                    url: base_url + 'komponen/edit_tarif_tenaga_kerja.php',
                    type: 'post',
                    data: {
                        id_proyek: <?php echo $id_proyek; ?>,
                        tarif_tenaga_kerja: tarif_tenaga_kerja,
                        pw: pw,
                        edit_tarif_tenaga_kerja: true
                    },
                    success: function(data){
                        $('#perkiraan-biaya').text('Rp. ' + data);
                    }
                });
            });
        </script>

