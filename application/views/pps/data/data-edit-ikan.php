
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Edit Jenis Ikan</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Edit Jenis Ikan</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><strong>DATA JENIS IKAN</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart("data/simpanikan",'class="form-horizontal form-bordered FormProfile"'); ?>

            <fieldset>
				<legend class="form-legend">
					<span>Data Jenis Ikan</span>
				</legend>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Nama Jenis Ikan</label>
					<div class="col-sm-4">
						<input type="" class="form-control" id="nama_ikan" placeholder="Nama Jenis Ikan" name="nama_ikan" value="<?php echo $nama_ikan ?>">
					</div>
				</div>

                <input type="hidden" name="id_ikan" value="<?php echo $id_ikan; ?>">
			</fieldset>


            <fieldset>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button  type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        <a href="<?php echo base_url(); ?>data/ikan" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</a>
					</div>
				</div>

			</fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>

</div> <!-- page content end -->
