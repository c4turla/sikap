
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Jenis Ikan</a></li>
    </ol>
</div>

<div class="page-subheading page-subheading-md bg-white">
    <div class="row">
        <div class="col-sm-4 col-xs-5">
            <a href="#" class="btn btn-round btn-primary" title="Members"><strong><?php echo $this->db->get("data_ikan")->num_rows(); ?>  Jenis Ikan</strong></a>
        </div>
        <div class="col-sm-2 col-sm-push-1 col-xs-6 col-xs-push-1">
            <a href="<?php echo base_url(); ?>data/AddIkan" class="btn btn-success pull-right" title="Update">
			<i class="fa fa-lg fa-fw fa-plus"></i> Tambah Jenis Ikan</a>
        </div>
    </div>
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



            <?php echo $dt_retrieve; ?>


		</div>
    </div>
</div>

</div>

