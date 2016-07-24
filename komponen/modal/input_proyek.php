<div class="modal fade" id="proyek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Input Data Proyek</h4>
			</div>
			<div class="modal-body">
				<form method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2">Tipe Proyek</label>
                        <div class="col-sm-10">
                            <select name="tipe_proyek" class="form-control" id="tipe_proyek">
                                <option value="">--Silahkan Pilih tipe Proyek--</option>
                                <option value="W">Proyek Website</option>
                                <option value="A">Proyek Android</option>
                                <option value="I">Proyek Ios</option>
                                <option value="R">Proyek Robotik</option>
                            </select>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-sm-2">Kode Proyek</label>
						<div class="col-sm-10">
							<input type="text" name="kode_proyek" class="form-control" required="true" readonly/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nama Proyek</label>
						<div class="col-sm-10">
							<input type="text" name="nama_proyek" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nama Client</label>
						<div class="col-sm-10">
							<!--<input type="text" name="nama_proyek" class="form-control" required="true"/>-->
							<select name="id_client" class="form-control">
								<option selected="" disabled="">Pilih Client</option>
								<?php
									require "../config/koneksi.php";
									$select=mysql_query("select id_client, nama_client from client");
									while ($data=mysql_fetch_array($select)) {
								?>
									<option value="<?php echo $data['id_client'];?>" ><?php echo $data['nama_client'];?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Biaya</label>
						<div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">Rp.</span>
                                <input type="text" name="biaya" class="form-control" required="true"/>
                            </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Tanggal Mulai</label>
						<div class="col-sm-10">
							<input type="date" name="tanggal_mulai" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Tanggal Selesai</label>
						<div class="col-sm-10">
							<input type="date" name="tanggal_selesai" class="form-control" required="true"/>
						</div>
					</div>
					<!--<div class="form-group">
						<label class="col-sm-2">Status</label>
						<div class="col-sm-10">
							<input type="text" name="status" class="form-control" required="true"/>
						</div>
					</div>-->
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $('input[name=tanggal_mulai').datepicker({
        format: "yyyy-mm-dd"
    });

    $('input[name=tanggal_selesai').datepicker({
        format: "yyyy-mm-dd"
    });

    $('#tipe_proyek').change(function() {
        var tipe = $(this).val();
        $.ajax({
            url: base_url + "komponen/get_new_kode_proyek_by_tipe_proyek.php",
            type: 'GET',
            data: {
                tipe: tipe
            },
            success: function(data)
            {
                $('input[name=kode_proyek]').val(data);
            }
        });
    });
</script>