
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Tambah Tenaga Kerja</a></li>
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
			<?php echo form_open_multipart("data/TambahTenaga",'class="form-horizontal form-bordered FormProfile",data-toggle="validator"','data-toggle="validator"'); ?>

            <fieldset>
				<legend class="form-legend">
					
				</legend>
                <div class="form-group">
					<label for="country" class="col-sm-3 control-label">Bulan / Tahun</label>
					<div class="col-sm-2">
						<select class="form-control form-select2" id="bulan" data-placeholder="Bulan" name="bulan">
							<option value="">Pilih Bulan</option>
							<option value="1">Jan</option>
                            <option value="2">Feb</option>
                            <option value="3">Mar</option>
                            <option value="4">Apr</option>
                            <option value="5">Mei</option>
                            <option value="6">Jun</option>
                            <option value="7">Jul</option>
                            <option value="8">Ags</option>
                            <option value="9">Sep</option>
                            <option value="10">Okt</option>
                            <option value="11">Nov</option>
                            <option value="12">Des</option>
                        </select>
                    </div> 
                    <div class="col-sm-2">
                        <div class="input-group date">
                        <input type="text" class="form-control" data-rel="tahun" data-date-format="yyyy" name="tahun" data-show-meridian="false" id="tahun" placeholder="Tahun" ><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
				</div>

                <div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Jumlah</label>
					<div class="col-sm-4">
                        <input type="number" class="form-control" id="nominal" placeholder="Jumlah Tenaga Kerja" name="nominal" required>
                        <input type="hidden" id="nama_kategori" name="nama_kategori" value="TENAGA KERJA">
					</div>
				</div>
                
			</fieldset>
            <fieldset>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">

						<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        <a href="<?php echo base_url(); ?>data/tenaga" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</a>
					</div>
				</div>

			</fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>

</div> <!-- page content end -->
