<?php
			
			$Ssql="select p.id, p.kode_proyek, p.id_client,p.nama_proyek,p.biaya,p.tanggal_mulai,p.tanggal_selesai,p.status,
						  c.id_client,c.nama_client
					from proyek p
					join client c
					on p.id_client=c.id_client
					order by p.id";
			$query=mysql_query($Ssql);
			while($data = mysql_fetch_assoc($query)){			
		?>
<div class="modal fade" id="<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Input Data CFP</h4>
			</div>
			<div class="modal-body">
				<form method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2">Kode Proyek</label>
						<div class="col-sm-10">
							<input type="time" value="<?php echo $data['kode_proyek'];?>" name="id_proyek"  class="form-control" readonly/>
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
						<label class="col-sm-2">Nama_kegiatan</label>
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
		        	<button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>
<?php
}
?>