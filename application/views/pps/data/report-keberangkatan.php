

<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Report</a></li>
        <li class="active"><a href="javascript:;">Keberangkatan</a></li>
    </ol>
</div>

<div class="page-subheading page-subheading-md bg-white">
  <?php echo form_open('report/ExportKeberangkatan2', "class='filter-form-data'"); ?>
    <div class="row">
      <div class="col-sm-2 col-xs-5 col-sm-push-2" style="padding:10px;" id="filterdate2">
        Tanggal Mulai:
      </div>
      <div class="col-sm-2 col-xs-6  col-sm-push-1">
        <input type="text" class="form-control" id="filterawal" name="tglawal">
      </div>
      <div class="col-sm-2 col-xs-5 col-sm-push-1" style="padding:10px;" id="filterdate2">
        Tanggal Selesai:
      </div>
      <div class="col-sm-2 col-xs-6">
        <input type="text" class="form-control" id="filterakhir" name="tglakhir">
      </div>
      <div class="col-sm-2 col-xs-5">
        <button type="button" name="preview" class="btn btn-primary search-filter2">Preview</button>
      </div>
        <!-- <div class="col-sm-1 col-sm-push-1 col-xs-1 col-xs-push-1" id="btn1">
          <button type="submit" name="byPdf" value="1" class="btn btn-default pull-right" title="Export PDF">
    <i class="fa fa-lg fa-fw fa-file-excel-o"></i> PDF</button>
            </div>
        <div class="col-sm-1 col-sm-push-1 col-xs-1 col-xs-push-1" id="btn2">
                <button type="submit" name="byExcel" value="2" class="btn btn-success pull-right" title="Export Excel">
          <i class="fa fa-lg fa-fw fa-file-excel-o"></i> XLX</button>
            </div>
        <div class="col-sm-1 col-sm-push-1 col-xs-1 col-xs-push-1" id="btn3">
                <button type="submit" name="byDoc" value="3" class="btn btn-primary pull-right" title="Export Excel">
          <i class="fa fa-lg fa-fw fa-file-excel-o"></i> DOC</button>
            </div> -->
    </div>
    </form>
</div>

<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><strong>PREVIEW REPORT DATA KEBERANGKATAN</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body ajax">

		</div>
    </div>
</div>

</div>
