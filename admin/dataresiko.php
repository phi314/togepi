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
?>

<h1>Data Resiko</h1>

<form action="" method="get">
    <div class="input-group">
        <input type="text" placeholder="Masukan Kode Proyek" class="form-control" name="search" value="<?php echo $search; ?>">
        <div class="input-group-btn">
            <button class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
        </div>
    </div>
    <input type="hidden" name="page" value="dataresiko.php">
</form>

<?php if($d != FALSE): ?>

    <h2 class="text-center"><?php echo $d->nama_proyek; ?></h2>

    <?php include "../komponen/management_resiko.php"; ?>

<?php endif; ?>

