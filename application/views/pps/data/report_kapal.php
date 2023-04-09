
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Report</a></li>
        <li class="active"><a href="javascript:;">Kapal</a></li>
    </ol>
</div>

<div class="page-subheading page-subheading-md bg-white">
    <div class="row">
        <div class="col-sm-4 col-xs-5">

        </div>
        <div class="col-sm-4 col-sm-push-1 col-xs-6 col-xs-push-1">

        </div>
  		<div class="col-sm-1 col-sm-push-1 col-xs-1 col-xs-push-1">
        <a href="<?php echo base_url(); ?>data/ExportKapal" class="btn btn-primary pull-right" title="Export Excel">
  <i class="fa fa-lg fa-fw fa-file-excel-o"></i> Excel</a>
          </div>
  		<div class="col-sm-1 col-sm-push-1 col-xs-1 col-xs-push-1">
              <a href="<?php echo base_url(); ?>data/ExportKapal" class="btn btn-primary pull-right" title="Export Excel">
  			<i class="fa fa-lg fa-fw fa-file-excel-o"></i> XLX</a>
          </div>
      <div class="col-sm-1 col-sm-push-1 col-xs-1 col-xs-push-1">
              <a href="<?php echo base_url(); ?>data/ExportKapal" class="btn btn-primary pull-right" title="Export Excel">
        <i class="fa fa-lg fa-fw fa-file-excel-o"></i> DOC</a>
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
