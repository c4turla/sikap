
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Edit Keberangkatan</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Edit Keberangkatan</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-primary">    	
        <div class="panel-heading">
            <h4 class="panel-title"><strong>Edit Data Keberangkatan</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart("data/editsimpankeberangkatan",'class="form-horizontal form-bordered FormProfile",data-toggle="validator"','data-toggle="validator"'); ?>
		
            
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
					<span>Info Keberangkatan</span>
				</legend>
                <div class="form-group">
					<label for="" class="col-sm-3 control-label">Tujuan</label>
					<div class="col-sm-4">
						<input type="" class="form-control" id="tujuan" placeholder="Tujuan" name="tujuan" value="<?php echo $tujuan ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-3 control-label">Jumlah ABK</label>
					<div class="col-sm-4">
						<input type="" class="form-control" id="abk" placeholder="Jumlah ABK" name="abk" value="<?php echo $abk ?>">
					</div>
				</div>
                <div class="form-group">
					<label for="" class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-2">
					<div class="input-group date">
						<input type="text" class="form-control" id="datepicker" name="tanggal" data-date-format="yyyy-mm-dd" data-rel="datepicker"placeholder="Tanggal" value="<?php echo $tanggal ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>	
					</div>
				</div>
                <div class="form-group">
					<label for="" class="col-sm-3 control-label">Waktu</label>
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
					<label for="province" class="col-sm-3 control-label">Dermaga</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="dermaga"  name="dermaga" data-placeholder="Dermaga">
							<option value=""></option>
							<option value="-" <?php if(!empty($dermaga) && $dermaga == "-") echo 'selected'; ?>>-</option>
							<option value="1" <?php if(!empty($dermaga) && $dermaga == "1") echo 'selected'; ?>>1</option>
							<option value="2" <?php if(!empty($dermaga) && $dermaga == "2") echo 'selected'; ?>>2</option>
							<option value="3" <?php if(!empty($dermaga) && $dermaga == "3") echo 'selected'; ?>>3</option>
                        </select>
					</div>
				</div>
                <div class="form-group">
					<label for="" class="col-sm-3 control-label">Status</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="status" data-placeholder="Status" name="status">
							<option value=""></option>
							<option value="-" <?php if(!empty($status) && $status == "-") echo 'selected'; ?>>-</option>
							<option value="Sesuai Jadwal" <?php if(!empty($status) && $status == "Sesuai Jadwal") echo 'selected'; ?>>Sesuai Jadwal</option>
							<option value="Pembatalan" <?php if(!empty($status) && $status == "Pembatalan") echo 'selected'; ?>>Pembatalan</option>
							<option value="Terlambat" <?php if(!empty($status) && $status == "Terlambat") echo 'selected'; ?>>Terlambat</option>
                        </select>
					</div>
				</div>
				<fieldset>
				<legend class="form-legend">
					<span>Info Muatan / Data Logistik</span>
									</legend>
                                    <div class="form-group">
										<div class="panel-body">
                    						<table class="table table-bordered">
                        						<thead>
                            						<tr>
                                						<th><div align="center">No</div></th>
                                						<th><div align="center">Nama Muatan</div></th>
                                						<th><div align="center">Jumlah</div></th>
                                                        <th><div align="center">Satuan</div></th>
														<th><div align="center">Keterangan</div></th>
														
                        							</tr>
                        						</thead>
                        						<tbody>
                            						<tr>
                                						<td width="2%">1</a></td>
                                						<td width="15%">ES</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="es" value="<?php echo $es ?>">
                    									</div></td>
                                                        <td width="8%"><center>Kg</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">2</a></td>
                                						<td width="15%">AIR</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="air" value="<?php echo $air ?>">
                    									</div></td>
                                                        <td width="8%"><center>Liter</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">3</a></td>
                                						<td width="15%">SOLAR</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="solar" value="<?php echo $solar ?>">
                    									</div></td>
                                                        <td width="8%"><center>Liter</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">4</a></td>
                                						<td width="15%">OLIE</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="olie" value="<?php echo $olie ?>">
                    									</div></td>
                                                        <td width="8%"><center>Liter</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">5</a></td>
                                						<td width="15%">BENSIN</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="bensin" value="<?php echo $bensin ?>">
                    									</div></td>
                                                        <td width="8%"><center>Liter</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">6</a></td>
                                						<td width="15%">LAIN-LAIN</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="lainnya" value="<?php echo $lainnya ?>">
                    									</div></td>
                                                        <td width="8%"></td>
                                                        <td width="20%"><div class="controls">
                        									<input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?php echo $keterangan ?>">
															<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>">
                    									</div></td>
                            						</tr>
                        						</tbody>
                    						</table>
                						</div>
									</div>                                    
				</fieldset>
			</fieldset>

            <fieldset>                
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<a href="javascript:void(0)" class="btn btn-primary vendoradd" ><i class="fa fa-check"></i> Submit</a>
						<a href="javascript:void(0)" style="display:none" class="btn btn-primary" id="button-pop" ></a>
						<button style="display:none" type="submit" class="trigereditprofile"><i class="fa fa-check"></i> </button>
                        <a href="<?php echo base_url(); ?>data/keberangkatan" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</a>
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


