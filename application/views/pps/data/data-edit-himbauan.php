
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Edit Himbauan</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Edit Himbauan</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-primary">    	
        <div class="panel-heading">
            <h4 class="panel-title"><strong>PESAN HIMBAUAN</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart("data/simpanhimbauan",'class="form-horizontal form-bordered FormProfile"'); ?>
            
            <fieldset>
				<legend class="form-legend">
					<span>Pesan Himbauan</span>
				</legend>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Isi Pesan Himbauan</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="isi" name="isi" rows="4"><?php echo $isi; ?></textarea>
						<input type="hidden" id="id" name="id" value="<?php echo $id ?>">
						* Pesan Himbauan ini akan muncul di layar jadwal bagian bawah
					</div>
				</div>               
			</fieldset>
            
            
            <fieldset>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button  type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        <a href="<?php echo base_url(); ?>data/himbauan" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</a>
					</div>
				</div>
                
			</fieldset>            
            <?php echo form_close(); ?> 
        </div>
    </div>
    
</div>

</div> <!-- page content end -->
