
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Tenaga Kerja</a></li>
    </ol>
</div>

<div class="page-subheading page-subheading-md bg-white">
    <div class="row">
        <div class="col-sm-3 col-xs-10">
        <a href="<?php echo base_url(); ?>data/AddTenaga" class="btn btn-success pull-right" title="Update">
			<i class="fa fa-lg fa-fw fa-plus"></i> Tambah Tenaga Kerja</a>
        </div>
    </div>
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
            <?php echo $dt_retrieve; ?>
		</div>
    </div>
</div>

</div>

