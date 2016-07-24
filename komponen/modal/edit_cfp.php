<script type="text/javascript">
function editcfp(id_kompleksitas, komponen_sistem, nama_kegiatan, sederhana, menengah, komplek,id_proyek)
{
	var id_kompleksitasstr 	= id_kompleksitas;
	var id_proyekstr 	    = id_proyek;
	var komponen_sistemstr	= komponen_sistem;
	var nama_kegiatanstr 	= nama_kegiatan;
	var sederhanastr 		= sederhana;
	var menengahstr 		= menengah;
	var komplekstr 			= komplek;

	document.feditcfp.id_kompleksitas.value 	= id_kompleksitasstr;
	document.feditcfp.id_proyek.value 	        = id_proyekstr;
	document.feditcfp.komponen_sistem.value 	= komponen_sistemstr;
	document.feditcfp.nama_kegiatan.value 		= nama_kegiatanstr;
	document.feditcfp.sederhana.value 			= sederhanastr;
	document.feditcfp.menengah.value 			= menengahstr;
	document.feditcfp.komplek.value 			= komplekstr;
}
	<?php
		$id_kompleksitas = $_GET['id_kompleksitas'];
		$Ssql="SELECT * FROM kompleksitas where id_kompleksitas='$id_kompleksitas' ";
		$rs=mysql_fetch_assoc($Ssql);
	?>
</script>
<div class="modal fade" id="editcfp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Edit Data CFP</h4>
			</div>
			<div class="modal-body">
				<form method="POST" name="feditcfp" class="form-horizontal">
					<input type="text" name="id_kompleksitas" value="<?php echo $rs['id_kompleksitas'];?>" />

					<div class="form-group">
						<label class="col-sm-2">Kode Proyek</label>
						<div class="col-sm-10">
							<input type="text" name="id_proyek" class="form-control" readonly="" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2">Komponen Sistem</label>
						<div class="col-sm-10">
							<!--<input type="text" name="komponen_sistem" class="form-control" required="true"/>-->
							<select name="komponen_sistem" class="form-control">
								<option selected="" disabled="">Pilih Komponen</option>
								<option>INPUT</option>
								<option>OUTPUT</option>
								<option>FILE LOGIC</option>
								<option>INTERFACE EXTERNAL</option>
								<option>INQUERY</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nama Kegiatan</label>
						<div class="col-sm-10">
							<input type="time" name="nama_kegiatan" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Sederhana</label>
						<div class="col-sm-10">
							<input type="time" name="sederhana" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Menengah</label>
						<div class="col-sm-10">
							<input type="time" name="menengah" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Komplek</label>
						<div class="col-sm-10">
							<input type="time" name="komplek" class="form-control" />
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-cfp" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>