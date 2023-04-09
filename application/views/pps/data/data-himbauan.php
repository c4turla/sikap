
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Himbauan</a></li>
    </ol>
</div>

<div class="page-subheading page-subheading-md bg-white">
    <div class="row">
        <div class="col-sm-4 col-xs-5">
            <a href="#" class="btn btn-round btn-primary" title="Members"><strong>Pesan Himbauan</strong></a>
        </div>
    </div>
</div>

<div class="container-fluid-md">  
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><strong>HIMBAUAN</strong></h4>

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