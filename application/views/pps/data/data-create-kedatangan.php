
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Add Kedatangan</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Tambah Kedatangan</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><strong>DATA KEDATANGAN</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart("data/simpan_kedatangan",'class="form-horizontal form-bordered FormProfile",data-toggle="validator"','data-toggle="validator"'); ?>


            <fieldset>
				<legend class="form-legend">
					<span>Data Kapal</span>
				</legend>
				<div class="form-group">
				    <div class="alert alert-danger alert-dismissible col-sm-12">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Perhatian</h4>
                            Jika Nama Kapal Tidak Ada, Silahkan Masuk ke Menu Data - Data Kapal Untuk menginput data kapal baru.
                    </div>
					<label for="groupName" class="col-sm-3 control-label">Nama Kapal</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" data-placeholder="Nama Kapal" name="id_kapal" id="id_kapal">
						<option value="">Pilih Kapal</option>
							<?php foreach ($data as $val){ ?>
							<?php echo "<option value='".$val->id."'>".$val->nama_kapal."</option>"; ?>
							<?php } ?>
                        </select>
					</div>
				</div>
			</fieldset>

            <fieldset>
				<legend class="form-legend">
					<span>Info Kedatangan</span>
				</legend>
				<div class="form-group">
					<label for="Address" class="col-sm-3 control-label">Nomor Antrian</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="no_antrian" placeholder="Nomor Antrian" name="no_antrian" required>
					</div>
				</div>
                <div class="form-group">
					<label for="Address" class="col-sm-3 control-label">Asal</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="asal" placeholder="Asal" name="asal" required>
					</div>
				</div>
                 <div class="form-group">
					<label for="city" class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-2">
					<div class="input-group date">
						<input type="text" class="form-control" data-rel="datepicker" data-date-format="yyyy-mm-dd" name="tanggal" data-show-meridian="false" id="tanggal" value="<?php echo date("Y-m-d"); ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div></div>
				</div>
                <div class="form-group">
					<label for="city" class="col-sm-3 control-label">Waktu/Jam</label>
					<div class="col-sm-2">
					<div class="input-group">
						<input type="text" class="form-control" data-rel="timepicker" name="waktu" data-show-meridian="false" data-show-seconds="false" id="waktu" >
						<div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
					</div>
					</div>
				</div>
                <div class="form-group">
					<label for="province" class="col-sm-3 control-label">Dermaga</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="dermaga" data-placeholder="Dermaga" name="dermaga">
							<option value=""></option>
							<option value="-">-</option>
							<option value="1">1</option>
                            <option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
                        </select>
					</div>
				</div>

                <fieldset>
				<legend class="form-legend">
					<span>Ikan Hasil Tangkapan</span>
									</legend>
                                    <div class="form-group">
										<div class="panel-body">
                    						<table class="table table-bordered">
                        						<thead>
                            						<tr>
                                						<th><div align="center">No</div></th>
                                						<th><div align="center">Jenis Ikan</div></th>
                                						<th><div align="center">Berat(Kg)</div></th>
                        							</tr>
                        						</thead>
                        						<tbody>
                            						<tr>
                                						<td width="2%">1</a></td>
                                                        <td width="15%"><div class="controls">
														<select class="form-control form-select2" data-placeholder="Nama Ikan" name="ikan1" id="ikan1">
														<option value="">Pilih Jenis Ikan</option>
															<?php foreach ($data2 as $ikan1){ ?>
															<?php echo "<option value='".$ikan1->nama_ikan."'>".$ikan1->nama_ikan."</option>"; ?>
															<?php } ?>
														</select>
                    									</div></td>
														<td width="15%"><div class="controls">
                        									<div class="input-group">
															<input type="text" class="form-control" name="berat1">
															<span class="input-group-addon">Kg</span>
														</div>
                    									</div></td>
                            						</tr>
													<tr>
                                						<td width="2%">2</a></td>
                                                        <td width="15%"><div class="controls">
                        									<select class="form-control form-select2" data-placeholder="Nama Ikan" name="ikan2" id="ikan2">
															<option value="">Pilih Jenis Ikan</option>
															<?php foreach ($data2 as $ikan2){ ?>
															<?php echo "<option value='".$ikan2->nama_ikan."'>".$ikan2->nama_ikan."</option>"; ?>
															<?php } ?>
														</select>
                    									</div></td>
														<td width="15%"><div class="controls">
                        									<div class="input-group">
															<input type="text" class="form-control" name="berat2">
															<span class="input-group-addon">Kg</span>
														</div>
                    									</div></td>
                            						</tr>
													<tr>
                                						<td width="2%">3</a></td>
                                                        <td width="15%"><div class="controls">
                        									<select class="form-control form-select2" data-placeholder="Nama Ikan" name="ikan3" id="ikan3">
															<option value="">Pilih Jenis Ikan</option>
															<?php foreach ($data2 as $ikan3){ ?>
															<?php echo "<option value='".$ikan3->nama_ikan."'>".$ikan3->nama_ikan."</option>"; ?>
															<?php } ?>
														</select>
                    									</div></td>
														<td width="15%">
														<div class="controls">
														<div class="input-group">
															<input type="text" class="form-control" name="berat3">
															<span class="input-group-addon">Kg</span>
														</div>
                    									</div>
														</td>
                            						</tr>


                <tr>
                      						<td width="2%">4</a></td>
                                              <td width="15%"><div class="controls">
              									<select class="form-control form-select2" data-placeholder="Nama Ikan" name="ikan4" id="ikan4">
										<option value="">Pilih Jenis Ikan</option>
										<?php foreach ($data2 as $ikan4){ ?>
										<?php echo "<option value='".$ikan4->nama_ikan."'>".$ikan4->nama_ikan."</option>"; ?>
										<?php } ?>
									</select>
          									</div></td>
									<td width="15%">
									<div class="controls">
									<div class="input-group">
										<input type="text" class="form-control" name="berat4">
										<span class="input-group-addon">Kg</span>
									</div>
          									</div>
									</td>
                  						</tr>


                <tr>
                      						<td width="2%">5</a></td>
                                              <td width="15%"><div class="controls">
              									<select class="form-control form-select2" data-placeholder="Nama Ikan" name="ikan5" id="ikan5">
										<option value="">Pilih Jenis Ikan</option>
										<?php foreach ($data2 as $ikan5){ ?>
										<?php echo "<option value='".$ikan5->nama_ikan."'>".$ikan5->nama_ikan."</option>"; ?>
										<?php } ?>
									</select>
          									</div></td>
									<td width="15%">
									<div class="controls">
									<div class="input-group">
										<input type="text" class="form-control" name="berat5">
										<span class="input-group-addon">Kg</span>
									</div>
          									</div>
									</td>
                  						</tr>


                <tr>
                      						<td width="2%">6</a></td>
                                              <td width="15%"><div class="controls">
              									<select class="form-control form-select2" data-placeholder="Nama Ikan" name="ikan6" id="ikan6">
										<option value="">Pilih Jenis Ikan</option>
										<?php foreach ($data2 as $ikan6){ ?>
										<?php echo "<option value='".$ikan6->nama_ikan."'>".$ikan6->nama_ikan."</option>"; ?>
										<?php } ?>
									</select>
          									</div></td>
									<td width="15%">
									<div class="controls">
									<div class="input-group">
										<input type="text" class="form-control" name="berat6">
										<span class="input-group-addon">Kg</span>
									</div>
          									</div>
									</td>
                  						</tr>
                        						</tbody>
                    						</table>
                						</div>
									</div>
				</fieldset>
				 <div class="form-group">
					<label for="Address" class="col-sm-3 control-label">Suhu Ikan</label>
					<div class="col-sm-2">
					<div class="input-group">
						<input type="text" class="form-control" id="suhu_ikan" placeholder="Suhu Ikan" name="suhu_ikan">
						<span class="input-group-addon">&deg;C</span>
					</div> </div>
				</div>
				 <div class="form-group">
					<label for="Address" class="col-sm-3 control-label">Suhu Palka</label>
					<div class="col-sm-2">
					<div class="input-group">
                            <input type="text" class="form-control" id="suhu_palka" placeholder="Suhu Palka" name="suhu_palka">
                            <span class="input-group-addon">&deg;C</span>
                        </div>
					</div>
				</div>
				<div class="form-group">
					<label for="Address" class="col-sm-3 control-label">Harga Rata2</label>
					<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">Rp</span>
						<input type="text" class="form-control" id="harga" placeholder="Harga Rata-rata" name="harga">
					</div>
					</div>
				</div>
				<div class="form-group">
					<label for="country" class="col-sm-3 control-label">Mutu</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="mutu" data-placeholder="Mutu" name="mutu">
							<option value=""></option>
							<option value="-">-</option>
							<option value="I">I</option>
                            <option value="II">II</option>
							<option value="III">III</option>
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label for="country" class="col-sm-3 control-label">Produk</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="produk" data-placeholder="Produk" name="produk">
							<option value=""></option>
							<option value="-">-</option>
							<option value="SEGAR">SEGAR</option>
                            <option value="BEKU">BEKU</option>
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label for="country" class="col-sm-3 control-label">Status</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="status_datang" data-placeholder="Status" name="status">
							<option value=""></option>
							<option value="TAMBAT">TAMBAT</option>
                            <option value="LABUH">LABUH</option>
							<option value="BONGKAR">BONGKAR</option>
							<option value="PERBAIKAN">PERBAIKAN</option>
                        </select>
					</div>
				</div>
				<input type="hidden" class="form-control" data-rel="datepicker" name="datecreate" id="datecreate" value="<?php echo $datecreate ?>" readonly >
                <input type="hidden" class="form-control" data-rel="timepicker" name="timecreate" data-show-meridian="false" value="<?php echo $timecreate ?>" data-show-seconds="true" id="timecreate" readonly>
			</fieldset>

            <fieldset>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        <a href="<?php echo base_url(); ?>data/kedatangan" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</a>
                        <!-- Element to pop up -->
					</div>
				</div>

			</fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>

</div> <!-- page content end -->
