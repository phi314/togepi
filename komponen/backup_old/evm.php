<div>
<ul class="nav nav-tabs">
    <li><a href="#table-bcws" class="nav active" data-toggle="tab">BCWS</a> </li>
    <li><a href="#table-bcwp" class="nav" data-toggle="tab">BCWP</a> </li>
    <li><a href="#table-acwp" class="nav" data-toggle="tab">ACWP</a></li>
    <li><a href="#table-sv" class="nav" data-toggle="tab">SV</a></li>
    <li><a href="#table-cv" class="nav" data-toggle="tab">CV</a></li>
    <li><a href="#table-spi" class="nav" data-toggle="tab">SPI</a></li>
    <li><a href="#table-cpi" class="nav" data-toggle="tab">CPI</a></li>
    <li><a href="#table-etc" class="nav" data-toggle="tab">ETC</a></li>
    <li><a href="#table-eac" class="nav" data-toggle="tab">EAC</a></li>
    <li><a href="#table-ets" class="nav" data-toggle="tab">ETS</a></li>
    <li><a href="#table-eas" class="nav" data-toggle="tab">EAS</a></li>
    <li><a href="#table-kesimpulan" class="nav" data-toggle="tab">Kesimpulan</a></li>
</ul>


<div class="tab-content">
<div class="tab-pane active" id="table-bcws">
    <!-- Tabel BCWS -->
    <h2>Analisis Budgeted Cost for Work Scheduled (BCWS)</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Minggu Ke-</th>
                    <th>Bulan</th>
                    <th>Periode</th>
                    <th>Bobot</th>
                    <th>Cost</th>
                    <th>Kumulatif</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $q_interval_proyek_pekerjaan =  mysql_query("SELECT min(tanggal_mulai) as mulai, max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE id_proyek='$d->id'") or die(mysql_error());
                $d_interval_proyek_pekerjaan = mysql_fetch_object($q_interval_proyek_pekerjaan);
                $tanggal_mulai_proyek = new DateTime($d_interval_proyek_pekerjaan->mulai);
                $tanggal_selesai_proyek = new DateTime($d_interval_proyek_pekerjaan->selesai);

                $interval = new DateInterval('P1W7D');
                $daterange = new DatePeriod($tanggal_mulai_proyek, $interval, $tanggal_selesai_proyek);

                $minggu_ke = 1;
                $kumulatif = 0;
                $last_bcws = 0;
                foreach($daterange as $key => $date)
                {
                    if($key < 5)
                    {
                        $bulan = $date->format('m');
                        $start =  $date->format('d');
                        $start_default = $date->format('Y-m-d');
                        $date->add(new DateInterval('P6D'));
                        $end = $date->format('d');
                        $end_default = $date->format('Y-m-d');

                        $bobot_and_cost = get_bobot_and_cost($minggu_ke, 'bcws', $id_proyek);
                        $kumulatif = $kumulatif + $bobot_and_cost[1];
                        ?>
                        <tr>
                            <td><?php echo $minggu_ke; ?></td>
                            <td><?php echo getBulan($bulan); ?></td>
                            <td><?php echo $start ?> - <?php  echo $end ?></td>
                            <td>
                                <div class="input-group col-md-3">
                                    <input type="text" name="bobot_bcws[]" class="form-control input-bobot col-md-2" data-tipe="bcws" data-idproyek="<?php echo $d->id; ?>" data-minggu="<?php echo $minggu_ke; ?>" data-start="<?php echo $start_default; ?>" data-end="<?php echo $end_default; ?>" value="<?php echo $bobot_and_cost[0]; ?>">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </td>
                            <td><span class="bcws-cost-<?php echo $minggu_ke; ?>">Rp. <?php echo format_rupiah($bobot_and_cost[1]); ?></span> </td>
                            <td><span class="bcws-kumulatif-<?php echo $minggu_ke; ?>">Rp. <?php echo format_rupiah($kumulatif); ?></span> </td>
                        </tr>
                        <?php
                        $last_bcws = $bobot_and_cost[1];
                    }
                    $minggu_ke++;
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-bcwp">
    <!-- Tabel BCWP -->
    <h2>Analisis Budgeted Cost of Work Performed (BCWP)</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Minggu Ke-</th>
                    <th>Bulan</th>
                    <th>Periode</th>
                    <th>Bobot</th>
                    <th>Cost</th>
                    <th>Kumulatif</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $q_interval_proyek_pekerjaan =  mysql_query("SELECT min(tanggal_mulai) as mulai, max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE id_proyek='$d->id'") or die(mysql_error());
                $d_interval_proyek_pekerjaan = mysql_fetch_object($q_interval_proyek_pekerjaan);
                $tanggal_mulai_proyek = new DateTime($d_interval_proyek_pekerjaan->mulai);
                $tanggal_selesai_proyek = new DateTime($d_interval_proyek_pekerjaan->selesai);

                $interval = new DateInterval('P1W7D');
                $daterange = new DatePeriod($tanggal_mulai_proyek, $interval, $tanggal_selesai_proyek);

                $minggu_ke = 1;
                $kumulatif = 0;
                $last_bcwp = 0;
                foreach($daterange as $key => $date)
                {
                    if($key < 5)
                    {
                        $bulan = $date->format('m');
                        $start =  $date->format('d');
                        $start_default = $date->format('Y-m-d');
                        $date->add(new DateInterval('P6D'));
                        $end = $date->format('d');
                        $end_default = $date->format('Y-m-d');

                        $bobot_and_cost = get_bobot_and_cost($minggu_ke, 'bcwp', $id_proyek);

                        $kumulatif = $kumulatif + $bobot_and_cost[1];
                        ?>
                        <tr>
                            <td><?php echo $minggu_ke; ?></td>
                            <td><?php echo getBulan($bulan); ?></td>
                            <td><?php echo $start ?> - <?php  echo $end ?></td>
                            <td>
                                <div class="input-group col-md-3">
                                    <input type="text" name="bobot_bcwp[]" class="form-control input-bobot col-md-2" data-tipe="bcwp" data-idproyek="<?php echo $d->id; ?>" data-minggu="<?php echo $minggu_ke; ?>" data-start="<?php echo $start_default; ?>" data-end="<?php echo $end_default; ?>" value="<?php echo $bobot_and_cost[0]; ?>">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </td>
                            <td><span class="bcwp-cost-<?php echo $minggu_ke; ?>">Rp. <?php echo format_rupiah($bobot_and_cost[1]); ?></span> </td>
                            <td><span class="bcwp-kumulatif-<?php echo $minggu_ke; ?>">Rp. <?php echo format_rupiah($kumulatif); ?></span> </td>
                        </tr>
                        <?php
                        $last_bcwp = $kumulatif;
                    }
                    $minggu_ke++;
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-acwp">
    <!-- Tabel ACWP -->
    <h2>Analisis Actual Cost of Work Performed (ACWP)</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Minggu Ke-</th>
                    <th>Bulan</th>
                    <th>Periode</th>
                    <th>Cost</th>
                    <th>Kumulatif</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $q_interval_proyek_pekerjaan =  mysql_query("SELECT min(tanggal_mulai) as mulai, max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE id_proyek='$d->id'") or die(mysql_error());
                $d_interval_proyek_pekerjaan = mysql_fetch_object($q_interval_proyek_pekerjaan);
                $tanggal_mulai_proyek = new DateTime($d_interval_proyek_pekerjaan->mulai);
                $tanggal_selesai_proyek = new DateTime($d_interval_proyek_pekerjaan->selesai);

                $interval = new DateInterval('P1W7D');
                $daterange = new DatePeriod($tanggal_mulai_proyek, $interval, $tanggal_selesai_proyek);

                $minggu_ke = 1;
                $kumulatif = 0;

                $last_awcp = 0;
                foreach($daterange as $key => $date)
                {
                    if($key < 5)
                    {
                        $bulan = $date->format('m');
                        $start =  $date->format('d');
                        $start_default = $date->format('Y-m-d');
                        $date->add(new DateInterval('P6D'));
                        $end = $date->format('d');
                        $end_default = $date->format('Y-m-d');

                        $bobot_and_cost = get_bobot_and_cost($minggu_ke, 'acwp', $id_proyek);
                        $kumulatif = $kumulatif + $bobot_and_cost[1];

                        ?>
                        <tr>
                            <td><?php echo $minggu_ke; ?></td>
                            <td><?php echo getBulan($bulan); ?></td>
                            <td><?php echo $start ?> - <?php  echo $end ?></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp. </span>
                                    <input type="text" name="cost_acwp[]" class="form-control input-cost-acwp col-md-2" data-tipe="acwp" data-idproyek="<?php echo $d->id; ?>" data-minggu="<?php echo $minggu_ke; ?>" data-start="<?php echo $start_default; ?>" data-end="<?php echo $end_default; ?>" value="<?php echo $bobot_and_cost[1]; ?>">
                                </div>
                            </td>
                            <td><span class="acwp-kumulatif-<?php echo $minggu_ke; ?>">Rp. <?php echo format_rupiah($kumulatif); ?></span> </td>
                        </tr>
                        <?php
                        $last_awcp = $kumulatif;
                    }
                    $minggu_ke++;
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-sv">
    <!-- Tabel SV -->
    <h2>Scheduling Variance (SV)</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Minggu Ke-</th>
                    <th>Bulan</th>
                    <th>Periode</th>
                    <th>BCWS</th>
                    <th>BCWP</th>
                    <th>SV</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $q_interval_proyek_pekerjaan =  mysql_query("SELECT min(tanggal_mulai) as mulai, max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE id_proyek='$d->id'") or die(mysql_error());
                $d_interval_proyek_pekerjaan = mysql_fetch_object($q_interval_proyek_pekerjaan);
                $tanggal_mulai_proyek = new DateTime($d_interval_proyek_pekerjaan->mulai);
                $tanggal_selesai_proyek = new DateTime($d_interval_proyek_pekerjaan->selesai);

                $interval = new DateInterval('P1W7D');
                $daterange = new DatePeriod($tanggal_mulai_proyek, $interval, $tanggal_selesai_proyek);

                $minggu_ke = 1;
                $kumulatif_bcws = 0;
                $kumulatif_bcwp = 0;
                foreach($daterange as $key => $date)
                {
                    if($key < 5)
                    {
                        $bulan = $date->format('m');
                        $start =  $date->format('d');
                        $start_default = $date->format('Y-m-d');
                        $date->add(new DateInterval('P6D'));
                        $end = $date->format('d');
                        $end_default = $date->format('Y-m-d');

                        $bobot_and_cost_bcws = get_bobot_and_cost($minggu_ke, 'bcws', $id_proyek);
                        $bobot_and_cost_bcwp = get_bobot_and_cost($minggu_ke, 'bcwp', $id_proyek);


                        $kumulatif_bcws = $kumulatif_bcws + $bobot_and_cost_bcws[1];
                        $kumulatif_bcwp = $kumulatif_bcwp + $bobot_and_cost_bcwp[1];
                        ?>
                        <tr>
                            <td><?php echo $minggu_ke; ?></td>
                            <td><?php echo getBulan($bulan); ?></td>
                            <td><?php echo $start ?> - <?php  echo $end ?></td>
                            <td><?php echo format_rupiah($kumulatif_bcws); ?></td>
                            <td><?php echo format_rupiah($kumulatif_bcwp); ?></td>
                            <td><?php $sv = $kumulatif_bcwp - $kumulatif_bcws; echo format_rupiah($sv); ?></td>
                        </tr>
                    <?php
                    }
                    $minggu_ke++;
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-cv">
    <!-- Tabel CV -->
    <h2>Cost Variance (CV)</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Minggu Ke-</th>
                    <th>Bulan</th>
                    <th>Periode</th>
                    <th>BCWS</th>
                    <th>BCWP</th>
                    <th>CV</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $q_interval_proyek_pekerjaan =  mysql_query("SELECT min(tanggal_mulai) as mulai, max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE id_proyek='$d->id'") or die(mysql_error());
                $d_interval_proyek_pekerjaan = mysql_fetch_object($q_interval_proyek_pekerjaan);
                $tanggal_mulai_proyek = new DateTime($d_interval_proyek_pekerjaan->mulai);
                $tanggal_selesai_proyek = new DateTime($d_interval_proyek_pekerjaan->selesai);

                $interval = new DateInterval('P1W7D');
                $daterange = new DatePeriod($tanggal_mulai_proyek, $interval, $tanggal_selesai_proyek);

                $minggu_ke = 1;
                $kumulatif_bcwp = 0;
                $kumulatif_acwp = 0;
                foreach($daterange as $key => $date)
                {
                    if($key < 5)
                    {
                        $bulan = $date->format('m');
                        $start =  $date->format('d');
                        $start_default = $date->format('Y-m-d');
                        $date->add(new DateInterval('P6D'));
                        $end = $date->format('d');
                        $end_default = $date->format('Y-m-d');

                        $bobot_and_cost_bcwp = get_bobot_and_cost($minggu_ke, 'bcwp', $id_proyek);
                        $bobot_and_cost_acwp = get_bobot_and_cost($minggu_ke, 'acwp', $id_proyek);


                        $kumulatif_bcwp = $kumulatif_bcwp + $bobot_and_cost_bcwp[1];
                        $kumulatif_acwp = $kumulatif_acwp + $bobot_and_cost_acwp[1];
                        ?>
                        <tr>
                            <td><?php echo $minggu_ke; ?></td>
                            <td><?php echo getBulan($bulan); ?></td>
                            <td><?php echo $start ?> - <?php  echo $end ?></td>
                            <td><?php echo format_rupiah($kumulatif_bcwp); ?></td>
                            <td><?php echo format_rupiah($kumulatif_acwp); ?></td>
                            <td><?php $cv = $kumulatif_bcwp - $kumulatif_acwp; echo format_rupiah($cv); ?></td>
                        </tr>
                    <?php
                    }
                    $minggu_ke++;
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-spi">
    <!-- Tabel SPI -->
    <h2>Schedule Performance Index</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Minggu Ke-</th>
                    <th>Bulan</th>
                    <th>Periode</th>
                    <th>BCWS</th>
                    <th>BCWP</th>
                    <th>SPI</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $q_interval_proyek_pekerjaan =  mysql_query("SELECT min(tanggal_mulai) as mulai, max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE id_proyek='$d->id'") or die(mysql_error());
                $d_interval_proyek_pekerjaan = mysql_fetch_object($q_interval_proyek_pekerjaan);
                $tanggal_mulai_proyek = new DateTime($d_interval_proyek_pekerjaan->mulai);
                $tanggal_selesai_proyek = new DateTime($d_interval_proyek_pekerjaan->selesai);

                $interval = new DateInterval('P1W7D');
                $daterange = new DatePeriod($tanggal_mulai_proyek, $interval, $tanggal_selesai_proyek);

                $minggu_ke = 1;
                $kumulatif_bcws = 0;
                $kumulatif_bcwp = 0;

                $last_spi = 0;
                foreach($daterange as $key => $date)
                {
                    if($key < 5)
                    {
                        $bulan = $date->format('m');
                        $start =  $date->format('d');
                        $start_default = $date->format('Y-m-d');
                        $date->add(new DateInterval('P6D'));
                        $end = $date->format('d');
                        $end_default = $date->format('Y-m-d');

                        $bobot_and_cost_bcws = get_bobot_and_cost($minggu_ke, 'bcws', $id_proyek);
                        $bobot_and_cost_bcwp = get_bobot_and_cost($minggu_ke, 'bcwp', $id_proyek);


                        $kumulatif_bcws = $kumulatif_bcws + $bobot_and_cost_bcws[1];
                        $kumulatif_bcwp = $kumulatif_bcwp + $bobot_and_cost_bcwp[1];

                        ?>
                        <tr>
                            <td><?php echo $minggu_ke; ?></td>
                            <td><?php echo getBulan($bulan); ?></td>
                            <td><?php echo $start ?> - <?php  echo $end ?></td>
                            <td><?php echo format_rupiah($kumulatif_bcws); ?></td>
                            <td><?php echo format_rupiah($kumulatif_bcwp); ?></td>
                            <td><?php $spi = $kumulatif_bcwp / $kumulatif_bcws; echo round($spi, 2); ?></td>
                        </tr>
                        <?php
                        $last_spi = $spi;
                    }
                    $minggu_ke++;
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-cpi">
    <!-- Tabel CPI -->
    <h2>Cost Performance Index</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Minggu Ke-</th>
                    <th>Bulan</th>
                    <th>Periode</th>
                    <th>BCWP</th>
                    <th>ACWP</th>
                    <th>CPI</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $array_cpi = [];
                $q_interval_proyek_pekerjaan =  mysql_query("SELECT min(tanggal_mulai) as mulai, max(tanggal_selesai) as selesai FROM proyek_pekerjaan WHERE id_proyek='$d->id'") or die(mysql_error());
                $d_interval_proyek_pekerjaan = mysql_fetch_object($q_interval_proyek_pekerjaan);
                $tanggal_mulai_proyek = new DateTime($d_interval_proyek_pekerjaan->mulai);
                $tanggal_selesai_proyek = new DateTime($d_interval_proyek_pekerjaan->selesai);

                $interval = new DateInterval('P1W7D');
                $daterange = new DatePeriod($tanggal_mulai_proyek, $interval, $tanggal_selesai_proyek);

                $minggu_ke = 1;
                $kumulatif_bcwp = 0;
                $kumulatif_acwp = 0;

                $last_cpi = 0;
                foreach($daterange as $key => $date)
                {
                    if($key < 5)
                    {
                        $bulan = $date->format('m');
                        $start =  $date->format('d');
                        $start_default = $date->format('Y-m-d');
                        $date->add(new DateInterval('P6D'));
                        $end = $date->format('d');
                        $end_default = $date->format('Y-m-d');

                        $bobot_and_cost_bcwp = get_bobot_and_cost($minggu_ke, 'bcwp', $id_proyek);
                        $bobot_and_cost_acwp = get_bobot_and_cost($minggu_ke, 'acwp', $id_proyek);


                        $kumulatif_bcwp = $kumulatif_bcwp + $bobot_and_cost_bcwp[1];
                        $kumulatif_acwp = $kumulatif_acwp + $bobot_and_cost_acwp[1];
                        ?>
                        <tr>
                            <td><?php echo $minggu_ke; ?></td>
                            <td><?php echo getBulan($bulan); ?></td>
                            <td><?php echo $start ?> - <?php  echo $end ?></td>
                            <td><?php echo format_rupiah($kumulatif_bcwp); ?></td>
                            <td><?php echo format_rupiah($kumulatif_acwp); ?></td>
                            <td><?php $cpi = $kumulatif_bcwp / $kumulatif_acwp; echo round($cpi, 2); ?></td>
                        </tr>
                        <?php
                        $array_cpi[] = $cpi;
                        $last_cpi = $cpi;
                    }
                    $minggu_ke++;
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-etc">
    <!-- Tabel ETC -->
    <h2>Estimate to Completion (ETC)</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Total Anggaran</th>
                    <th>BCWP</th>
                    <th>CPI</th>
                    <th>ETC</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo format_rupiah($d->biaya); ?></td>
                    <td><?php echo format_rupiah($last_bcwp); ?></td>
                    <td><?php echo round($last_cpi, 1) ?></td>
                    <td><?php $etc = ($d->biaya - $last_bcwp)/round($last_cpi, 1); echo format_rupiah($etc); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-eac">
    <!-- Tabel EAC -->
    <h2>Estimate at Completion</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Total Anggaran</th>
                    <th>BCWP</th>
                    <th>CPI</th>
                    <th>AWCP</th>
                    <th>EAC</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo format_rupiah($d->biaya); ?></td>
                    <td><?php echo format_rupiah($last_bcwp); ?></td>
                    <td><?php echo round($last_cpi, 1) ?></td>
                    <td><?php echo format_rupiah($last_awcp); ?></td>
                    <td><?php $eac = ($d->biaya - $last_bcwp)/round($last_cpi, 1) + $last_awcp; echo format_rupiah($eac); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-ets">
    <!-- Tabel ETS -->
    <h2>Estimate temporary Schedule (ETS)</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Total Waktu</th>
                    <th>Waktu Pengerjaan</th>
                    <th>SPI</th>
                    <th>ETS</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $total_waktu_diperlukan = durasi($d->tanggal_mulai, $d->tanggal_selesai, 'minggu') + 1; ?> Minggu</td>
                    <td>5 Minggu</td>
                    <td><?php echo round($last_spi, 1) ?></td>
                    <td><?php $ets = ($total_waktu_diperlukan - 5)/round($last_spi, 1); echo round($ets); ?> Minggu</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-eas">
    <!-- Tabel EAS -->
    <h2>Estimate all Schedule (EAS)</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Waktu Pengerjaan</th>
                    <th>ETS</th>
                    <th>EAS</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>5 Minggu</td>
                    <td><?php echo round($ets); ?></td>
                    <td><?php $eas = 5 + round($ets); echo $eas; ?> Minggu</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane" id="table-kesimpulan">
    <!-- Tabel Kesimpulan -->
    <h2>Kesimpulan</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Biaya yang diperlukan</th>
                    <th>Waktu yang diperlukan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <?php echo $d->biaya.' - '.$eac.' = Rp. '.format_rupiah($d->biaya-$eac); ?>
                    </td>
                    <td><?php echo $total_waktu_diperlukan.' - '.$eas.' = '.$total_waktu_diperlukan-$eas.' minggu'; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>