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

        <h1>Progres</h1>

        <form action="" method="get">
            <div class="input-group">
                <input type="text" placeholder="Masukan Kode Proyek" class="form-control" name="search" value="<?php echo $search; ?>">
                <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
                </div>
            </div>
            <input type="hidden" name="page" value="dataprogres.php">
        </form>

        <?php if($d != FALSE): ?>

        <h2 class="text-center"><?php echo $d->nama_proyek; ?></h2>

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

