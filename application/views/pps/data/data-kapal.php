
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Kapal</a></li>
    </ol>
</div>

<div class="page-subheading page-subheading-md bg-white">
    <div class="row">
        <div class="col-sm-4 col-xs-5">
            <a href="#" class="btn btn-round btn-primary" title="Members"><strong><?php echo $this->db->get("data_kapal")->num_rows(); ?>  Kapal</strong></a>
        </div>
        <div class="col-sm-2 col-sm-push-1 col-xs-6 col-xs-push-1">
            <a href="<?php echo base_url(); ?>data/AddKapal" class="btn btn-success pull-right" title="Update">
			<i class="fa fa-lg fa-fw fa-plus"></i> Add Kapal</a>
        </div>
		<div class="col-sm-2 col-sm-push-1 col-xs-1 col-xs-push-1">
            <a href="#upload" class="btn btn-warning pull-right" data-toggle="modal" data-target="#upload" title="Import Excel">
			<i class="fa fa-lg fa-fw fa-upload"></i> Import Kapal</a>
        </div>
		<div class="col-sm-2 col-sm-push-1 col-xs-1 col-xs-push-1">
            <a href="<?php echo base_url(); ?>data/ExportKapal" class="btn btn-primary pull-right" title="Export Excel">
			<i class="fa fa-lg fa-fw fa-file-excel-o"></i> Export Kapal</a>
        </div>
    </div>
</div>

<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><strong>DATA KAPAL</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">



            <?php echo $dt_retrieve; ?>


		</div>
    </div>
</div>

</div>
<?php $this->load->view('pps/data/upload-kapal');?>
