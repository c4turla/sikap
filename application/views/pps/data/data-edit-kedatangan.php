
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Edit Kedatangan</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Edit Kedatangan</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><strong>Edit Data Kedatangan</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart("data/editsimpan",'class="form-horizontal form-bordered FormProfile",data-toggle="validator"','data-toggle="validator"'); ?>


            <fieldset>
				<legend class="form-legend">
					<span>Data Kapal</span>
				</legend>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Nama Kapal</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" name="id_kapal">
							<?php foreach ($data as $val){ ?>
							<?php if ( $val->id === $id_kapal ) : ?>
							<?php echo "<option value='".$val->id."' selected>".$val->nama_kapal."</option>"; ?>
							<?php else : ?>
							<?php echo "<option value='".$val->id."'>".$val->nama_kapal."</option>"; ?>
							<?php endif; ?>
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
					<label for="groupName" class="col-sm-3 control-label">Asal</label>
					<div class="col-sm-4">
						<input type="" class="form-control" id="asal" placeholder="Asal" name="asal" value="<?php echo $asal ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="city" class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-2">
						<div class="input-group date">
						<input type="text" class="form-control" data-rel="datepicker" data-date-format="yyyy-mm-dd" name="tanggal" data-show-meridian="false" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>

					</div>
				</div>
                <div class="form-group">
					<label for="phone" class="col-sm-3 control-label">Waktu</label>
					<div class="col-sm-2">
					<div class="input-group">
						<input type="text" class="form-control" data-rel="timepicker" name="waktu" data-show-meridian="false" data-show-seconds="false" id="waktu" value="<?php echo $waktu ?>">
						<div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
					</div>
					</div>
				</div>
                <div class="form-group">
					<label for="fax" class="col-sm-3 control-label">Dermaga</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="dermaga"  name="dermaga" data-placeholder="Dermaga">
							<option value=""></option>
							<option value="-" <?php if(!empty($dermaga) && $dermaga == "-") echo 'selected'; ?>>-</option>
							<option value="1" <?php if(!empty($dermaga) && $dermaga == "1") echo 'selected'; ?>>1</option>
							<option value="2" <?php if(!empty($dermaga) && $dermaga == "2") echo 'selected'; ?>>2</option>
							<option value="3" <?php if(!empty($dermaga) && $dermaga == "3") echo 'selected'; ?>>3</option>
							<option value="4" <?php if(!empty($dermaga) && $dermaga == "4") echo 'selected'; ?>>4</option>
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Nomor Antrian</label>
					<div class="col-sm-2">
						<input type="" class="form-control" id="no_antrian" placeholder="Nomor Antrian" name="no_antrian" value="<?php echo $no_antrian ?>">
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
                                                        	<select class="form-control form-select2" name="ikan1">
                                                            <option value="">Pilih Jenis Ikan</option>
                                <?php foreach ($data2 as $val){ ?>
																<?php if ( $val->nama_ikan === $ikan1 ) : ?>
																<?php echo "<option value='".$val->nama_ikan."' selected>".$val->nama_ikan."</option>"; ?>
																<?php else : ?>
																<?php echo "<option value='".$val->nama_ikan."'>".$val->nama_ikan."</option>"; ?>
																<?php endif; ?>
																<?php } ?>
									                        </select>
                    									</div></td>

                    									<td width="15%"><div class="controls">
                        									<div class="input-group">
															<input type="text" class="form-control" name="berat1" value="<?php echo $berat1 ?>">
															<span class="input-group-addon">Kg</span>
														</div>
                    									</div></td>
                            						</tr>
													<tr>
                                						<td width="2%">2</a></td>
                                                        <td width="15%"><div class="controls">
                        									<select class="form-control form-select2" name="ikan2">
                                            <option value="">Pilih Jenis Ikan</option>
																<?php foreach ($data2 as $val){ ?>
																<?php if ( $val->nama_ikan === $ikan2 ) : ?>
																<?php echo "<option value='".$val->nama_ikan."' selected>".$val->nama_ikan."</option>"; ?>
																<?php else : ?>
																<?php echo "<option value='".$val->nama_ikan."'>".$val->nama_ikan."</option>"; ?>
																<?php endif; ?>
																<?php } ?>
									                        </select>
                    									</div></td>
                    									<td width="15%"><div class="controls">
                        									<div class="input-group">
															<input type="text" class="form-control" name="berat2" value="<?php echo $berat2 ?>">
															<span class="input-group-addon">Kg</span>
														</div>
                    									</div></td>
                            						</tr>
													<tr>
                                						<td width="2%">3</a></td>
                                                        <td width="15%"><div class="controls">
                        									<select class="form-control form-select2" name="ikan3">
                                            <option value="">Pilih Jenis Ikan</option>
                                            <?php foreach ($data2 as $val){ ?>
            																<?php if ( $val->nama_ikan === $ikan3 ) : ?>
            																<?php echo "<option value='".$val->nama_ikan."' selected>".$val->nama_ikan."</option>"; ?>
            																<?php else : ?>
            																<?php echo "<option value='".$val->nama_ikan."'>".$val->nama_ikan."</option>"; ?>
            																<?php endif; ?>
            																<?php } ?>
									                        </select>
                    									</div></td>
														<td width="15%"><div class="controls">
                        									<div class="input-group">
															<input type="text" class="form-control" name="berat3" value="<?php echo $berat3 ?>">
															<span class="input-group-addon">Kg</span>
														</div>
                    									</div></td>
                            						</tr>

                                        <tr>
                                              						<td width="2%">4</a></td>
                                                                      <td width="15%"><div class="controls">
                                      									<select class="form-control form-select2" name="ikan4">
                                                          <option value="">Pilih Jenis Ikan</option>
                                                          <?php foreach ($data2 as $val){ ?>
                          																<?php if ( $val->nama_ikan === $ikan4 ) : ?>
                          																<?php echo "<option value='".$val->nama_ikan."' selected>".$val->nama_ikan."</option>"; ?>
                          																<?php else : ?>
                          																<?php echo "<option value='".$val->nama_ikan."'>".$val->nama_ikan."</option>"; ?>
                          																<?php endif; ?>
                          																<?php } ?>
              									                        </select>
                                  									</div></td>
              														<td width="15%"><div class="controls">
                                      									<div class="input-group">
              															<input type="text" class="form-control" name="berat4" value="<?php echo $berat4 ?>">
              															<span class="input-group-addon">Kg</span>
              														</div>
                                  									</div></td>
                                          						</tr>

                            <tr>
                                              <td width="2%">5</a></td>
                                                          <td width="15%"><div class="controls">
                                            <select class="form-control form-select2" name="ikan5">
                                              <option value="">Pilih Jenis Ikan</option>
                                              <?php foreach ($data2 as $val){ ?>
                                              <?php if ( $val->nama_ikan === $ikan5 ) : ?>
                                              <?php echo "<option value='".$val->nama_ikan."' selected>".$val->nama_ikan."</option>"; ?>
                                              <?php else : ?>
                                              <?php echo "<option value='".$val->nama_ikan."'>".$val->nama_ikan."</option>"; ?>
                                              <?php endif; ?>
                                              <?php } ?>
                                            </select>
                                        </div></td>
                              <td width="15%"><div class="controls">
                                            <div class="input-group">
                                <input type="text" class="form-control" name="berat5" value="<?php echo $berat5 ?>">
                                <span class="input-group-addon">Kg</span>
                              </div>
                                        </div></td>
                                          </tr>

                                          <tr>
                                                            <td width="2%">6</a></td>
                                                                        <td width="15%"><div class="controls">
                                                          <select class="form-control form-select2" name="ikan6">
                                                            <option value="">Pilih Jenis Ikan</option>
                                                            <?php foreach ($data2 as $val){ ?>
                                                            <?php if ( $val->nama_ikan === $ikan6 ) : ?>
                                                            <?php echo "<option value='".$val->nama_ikan."' selected>".$val->nama_ikan."</option>"; ?>
                                                            <?php else : ?>
                                                            <?php echo "<option value='".$val->nama_ikan."'>".$val->nama_ikan."</option>"; ?>
                                                            <?php endif; ?>
                                                            <?php } ?>
                                                          </select>
                                                      </div></td>
                                            <td width="15%"><div class="controls">
                                                          <div class="input-group">
                                              <input type="text" class="form-control" name="berat6" value="<?php echo $berat6 ?>">
                                              <span class="input-group-addon">Kg</span>
                                            </div>
                                                      </div></td>
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
						<input type="text" class="form-control" id="suhu_ikan" placeholder="Suhu Ikan" name="suhu_ikan" value="<?php echo $suhu_ikan ?>">
						<span class="input-group-addon">&deg;C</span>
					</div> </div>
					</div>
				 <div class="form-group">
					<label for="Address" class="col-sm-3 control-label">Suhu Palka</label>
					<div class="col-sm-2">
					<div class="input-group">
						<input type="text" class="form-control" id="suhu_palka" placeholder="Suhu Palka" name="suhu_palka" value="<?php echo $suhu_palka ?>">
						<span class="input-group-addon">&deg;C</span>
                        </div>
					</div>
				</div>
				<div class="form-group">
					<label for="Address" class="col-sm-3 control-label">Harga Rata2</label>
					<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">Rp</span>
						<input type="text" class="form-control" id="harga" placeholder="Harga Rata-rata" name="harga" value="<?php echo $harga ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="mobile" class="col-sm-3 control-label">Mutu</label>
					<div class="col-sm-4">
                            <select class="form-control form-select2" id="mutu"  name="mutu" data-placeholder="Mutu">
							<option value=""></option>
							<option value="-" <?php if(!empty($mutu) && $mutu == "-") echo 'selected'; ?>>-</option>
							<option value="I" <?php if(!empty($mutu) && $mutu == "I") echo 'selected'; ?>>I</option>
							<option value="II" <?php if(!empty($mutu) && $mutu == "II") echo 'selected'; ?>>II</option>
							<option value="III" <?php if(!empty($mutu) && $mutu == "III") echo 'selected'; ?>>III</option>
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Produk</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="produk"  name="produk" data-placeholder="Produk">
							<option value=""></option>
							<option value="-" <?php if(!empty($produk) && $produk == "-") echo 'selected'; ?>>-</option>
							<option value="SEGAR" <?php if(!empty($produk) && $produk == "SEGAR") echo 'selected'; ?>>SEGAR</option>
							<option value="BEKU" <?php if(!empty($produk) && $produk == "BEKU") echo 'selected'; ?>>BEKU</option>
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Status</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="status_kapal"  name="status" data-placeholder="Status">
							<option value=""></option>
							<option value="TAMBAT" <?php if(!empty($status) && $status == "TAMBAT") echo 'selected'; ?>>TAMBAT</option>
							<option value="LABUH" <?php if(!empty($status) && $status == "LABUH") echo 'selected'; ?>>LABUH</option>
							<option value="BONGKAR" <?php if(!empty($status) && $status == "BONGKAR") echo 'selected'; ?>>BONGKAR</option>
							<option value="PERBAIKAN" <?php if(!empty($status) && $status == "PERBAIKAN") echo 'selected'; ?>>PERBAIKAN</option>
                        </select>
					</div>
				</div>
						<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>">
			</fieldset>

            <fieldset>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<a href="javascript:void(0)" class="btn btn-primary vendoradd" ><i class="fa fa-check"></i> Submit</a>
						<a href="javascript:void(0)" style="display:none" class="btn btn-primary" id="button-pop" ></a>
						<button style="display:none" type="submit" class="trigereditprofile"><i class="fa fa-check"></i> </button>
                        <a href="<?php echo base_url(); ?>data/kedatangan" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</a>
                        <!-- Element to pop up -->
						<div id="pop-up">
							<a class="b-close btn btn-round btn-primary "><i class="fa fa-times"></i></a>
							Are you sure?
							<div class="btn-pop">
								<a href="#" class="btn btn-primary editprofile"><i class="fa fa-check"></i> OK</a>
							</div>
						</div>
					</div>
				</div>

			</fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>

</div> <!-- page content end -->
