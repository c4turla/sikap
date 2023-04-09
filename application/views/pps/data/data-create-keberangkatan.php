<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Add Keberangkatan</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Tambah Keberangkatan</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-primary">    	
        <div class="panel-heading">
            <h4 class="panel-title"><strong>DATA KEBERANGKATAN</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart("data/simpan_keberangkatan",'class="form-horizontal form-bordered FormProfile",data-toggle="validator"','data-toggle="validator"'); ?>
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
					<label for="" class="col-sm-3 control-label">Nama Kapal</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" data-placeholder="Nama Kapal" name="id_kapal" id="id_kapal">
							<?php foreach ($data as $val){ ?>
							<?php echo "<option value='".$val->id."'>".$val->nama_kapal."</option>"; ?>
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
						<input type="" class="form-control" id="tujuan" placeholder="Tujuan" name="tujuan">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-3 control-label">Jumlah ABK</label>
					<div class="col-sm-4">
						<input type="" class="form-control" id="abk" placeholder="Jumlah ABK" name="abk">
					</div>
				</div>
                <div class="form-group">
					<label for="" class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-2">
					<div class="input-group date">
						<input type="text" class="form-control" id="datepicker" name="tanggal" data-date-format="yyyy-mm-dd" data-rel="datepicker" value="<?php echo date("Y-m-d"); ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>	
					</div>
				</div>
                <div class="form-group">
					<label for="" class="col-sm-3 control-label">Waktu</label>
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
                        </select>
					</div>
				</div>
                <div class="form-group">
					<label for="" class="col-sm-3 control-label">Status</label>
					<div class="col-sm-4">
						<select class="form-control form-select2" id="status_kapal" data-placeholder="Status" name="status">
							<option value=""></option>
							<option value="Sesuai Jadwal">Sesuai Jadwal</option>
                            <option value="Pembatalan">Pembatalan</option>
							<option value="Terlambat">Terlambat</option>
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
                        									<input type="text" class="form-control" name="es">
                    									</div></td>
                                                        <td width="8%"><center>Kg</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">2</a></td>
                                						<td width="15%">AIR</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="air">
                    									</div></td>
                                                        <td width="8%"><center>Liter</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">3</a></td>
                                						<td width="15%">SOLAR</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="solar">
                    									</div></td>
                                                        <td width="8%"><center>Liter</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">4</a></td>
                                						<td width="15%">OLIE</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="olie">
                    									</div></td>
                                                        <td width="8%"><center>Liter</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">5</a></td>
                                						<td width="15%">BENSIN</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="bensin">
                    									</div></td>
                                                        <td width="8%"><center>Liter</center></td>
                                                        <td width="20%"></td>
                            						</tr>
													<tr>
                                						<td width="2%">6</a></td>
                                						<td width="15%">LAIN-LAIN</td>
                                                        <td width="15%"><div class="controls">
                        									<input type="text" class="form-control" name="lainnya">
                    									</div></td>
                                                        <td width="8%"></td>
                                                        <td width="20%"><div class="controls">
                        									<input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                    									</div></td>
                            						</tr>
                        						</tbody>
                    						</table>
                						</div>
									</div>                                    
				</fieldset>
				<input type="hidden" class="form-control" data-rel="datepicker" name="datecreate" id="datecreate" value="<?php echo $datecreate ?>" readonly >
                <input type="hidden" class="form-control" data-rel="timepicker" name="timecreate" data-show-meridian="false" value="<?php echo $timecreate ?>" data-show-seconds="true" id="timecreate" readonly>
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
            </form>
			
        </div>
    </div>
    
</div>

</div> <!-- page content end -->
