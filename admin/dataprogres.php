		<!-- start body -->
		<?php

            $d = FALSE;
            $search = '';

            if(!empty($_GET['kode_proyek']))
            {
                $alert = "";
                $search = $_GET['kode_proyek'];

                if(!empty($alert))
                {
                    echo "<div class='alert alert-default'>$alert</div>";
                }

                $q = mysql_query("SELECT * FROM proyek JOIN client ON client.id_client=proyek.id_client WHERE kode_proyek LIKE '$search' LIMIT 1") or die(mysql_error());;
                if(mysql_num_rows($q) == 1)
                {
                    $d = mysql_fetch_object($q);
                    $id_proyek = $d->id;
                }
            }
		?>

        <div>
            <h1>Progres</h1>

            <div class="table-responsive" id="table-proyek">
                <table class="table datatable-simple">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Proyek</th>
                        <th>Nama Proyek</th>
                        <th>Nama Client</th>
                        <th>Biaya (Rp.)</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $Ssql="select p.*, c.id_client, c.nama_client
							from proyek p
							join client c
							on p.id_client=c.id_client
							order by p.created_at desc";
                    $query=mysql_query($Ssql) or die(mysql_error());
                    $no = 1;
                    echo mysql_error();
                    while ($data = mysql_fetch_assoc($query))
                    {
                        ?>
                        <tr>
                            <td><?php echo $no;?>.</td>
                            <td><?php echo $data['kode_proyek']; ?></td>
                            <td><?php echo $data['nama_proyek']; ?></td>
                            <td><?php echo $data['nama_client']; ?></td>
                            <td><?php echo format_rupiah($data['biaya']); ?></td>
                            <td><?php echo tanggal_format_indonesia($data['tanggal_mulai']); ?></td>
                            <td><?php echo tanggal_format_indonesia($data['tanggal_selesai']); ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td>
                                <a href="beranda.php?page=dataprogres.php&kode_proyek=<?php echo $data['kode_proyek']; ?>">Detail</a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>


        <?php if($d != FALSE): ?>


        <h3 class=""><?php echo $d->nama_proyek; ?></h3>


        <?php include "../komponen/evm.php"; ?>

        <?php endif; ?>

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

