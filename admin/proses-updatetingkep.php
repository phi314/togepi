
<?php
	require "../config/koneksi.php";
	$id_resiko=$_POST['id_resiko'];
	$porbalitas=$_POST['porbalitas'];
	$dampak=$_POST['dampak'];
	//$tingkep=$_POST['tingkep'];
	//$tinkat_kepentingan=$_POST['porbalitas'] * $_POST['dampak'];

	// echo "string";
	foreach ($id_resiko as $key => $value) {
		$update=mysql_query("update resiko set porbalitas='".$porbalitas[$key]."',dampak='".$dampak[$key]."',tinkat_kepentingan='".$porbalitas[$key]*$dampak[$key]."' where id_resiko='".$id_resiko[$key]."'  ") or die(mysql_error());

	}
	echo "<script>alert ('data telah di update ');document.location='beranda.php?page=tingkat-kepentingan.php' </script> ";
?>

