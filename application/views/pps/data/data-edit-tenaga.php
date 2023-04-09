
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Edit Tenaga Kerja</a></li>
    </ol>
</div>


<div class="container-fluid-md">
	<div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><strong>DATA TENAGA KERJA</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart("data/simpantenaga",'class="form-horizontal form-bordered FormProfile"'); ?>

            <fieldset>
            <legend class="form-legend">
					
                    </legend>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Bulan / Tahun</label>
					<div class="col-sm-2">
                    <select class="form-control form-select2" id="bulan"  name="bulan" data-placeholder="Bulan">
							<option value=""></option>
							<option value="1" <?php if(!empty($bulan) && $bulan == "1") echo 'selected'; ?>>Jan</option>
							<option value="2" <?php if(!empty($bulan) && $bulan == "2") echo 'selected'; ?>>Feb</option>
                            <option value="3" <?php if(!empty($bulan) && $bulan == "3") echo 'selected'; ?>>Mar</option>
                            <option value="4" <?php if(!empty($bulan) && $bulan == "4") echo 'selected'; ?>>Apr</option>
                            <option value="5" <?php if(!empty($bulan) && $bulan == "5") echo 'selected'; ?>>Mei</option>
                            <option value="6" <?php if(!empty($bulan) && $bulan == "6") echo 'selected'; ?>>Jun</option>
                            <option value="7" <?php if(!empty($bulan) && $bulan == "7") echo 'selected'; ?>>Jul</option>
                            <option value="8" <?php if(!empty($bulan) && $bulan == "8") echo 'selected'; ?>>Ags</option>
                            <option value="9" <?php if(!empty($bulan) && $bulan == "9") echo 'selected'; ?>>Sep</option>
                            <option value="10" <?php if(!empty($bulan) && $bulan == "10") echo 'selected'; ?>>Okt</option>
                            <option value="11" <?php if(!empty($bulan) && $bulan == "11") echo 'selected'; ?>>Nov</option>
                            <option value="12" <?php if(!empty($bulan) && $bulan == "12") echo 'selected'; ?>>Des</option>

                        </select>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group date">
                        <input type="text" class="form-control" data-rel="tahun" data-date-format="yyyy" name="tahun" data-show-meridian="false" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
					<label for="email" class="col-sm-3 control-label">Jumlah</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" id="nominal" placeholder="Jumlah Tenaga Kerja" name="nominal"  value="<?php echo $nominal ?>">
					</div>
				</div>

                <input type="hidden" name="id" value="<?php echo $id; ?>">
			</fieldset>


            <fieldset>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button  type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        <a href="<?php echo base_url(); ?>data/tenaga" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</a>
					</div>
				</div>

			</fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>

</div> <!-- page content end -->
