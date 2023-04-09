<div style="border:1px solid black;">
  <h4 align="center" style="font-weight:bold;color:red;">LAPORAN KEBERANGKATAN KAPAL PERIODE : <?php echo $tgl1; ?> - <?php echo $tgl2; ?></h4>
  <div class="table-responsive" style="font-size:5px;">
    <table class="table table-bordered">
        <thead style="background:#eaeaea;">
            <tr>
              <th style="padding:2px;">No</th>
              <th style="padding:2px;">Nama Kapal</th>
              <th style="padding:2px;">Tujuan</th>
              <th style="padding:2px;">Tanggal</th>
              <th style="padding:2px;">Jam</th>
              <th style="padding:2px;">ABK</th>
              <th style="padding:2px;">Dermaga</th>
              <th style="padding:2px;">Status</th>
              <th style="padding:2px;">Es</th>
              <th style="padding:2px;">Air</th>
              <th style="padding:2px;">Solar</th>
              <th style="padding:2px;">Olie</th>
              <th style="padding:2px;">Besin</th>
              <th style="padding:2px;">Lainnya</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($data->result() as $key => $value) { ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value->nama_kapal; ?></td>
                <td><?php echo $value->tujuan; ?></td>
                <td><?php echo $value->tanggal; ?></td>
                <td><?php echo $value->waktu; ?></td>
                <td><?php echo $value->abk; ?></td>
                <td><?php echo $value->dermaga; ?></td>
                <td><?php echo $value->status; ?></td>
                <td><?php echo $value->es; ?></td>
                <td><?php echo $value->air; ?></td>
                <td><?php echo $value->solar; ?></td>
                <td><?php echo $value->olie; ?></td>
                <td><?php echo $value->bensin; ?></td>
                <td><?php echo $value->lainnya; ?></td>
            </tr>
          <?php } ?>

        </tbody>
    </table>
</div>
</div>

<hr>
<h5 align="center">Cetak Laporan</h5>
<div class="col-sm-4">

</div>
<?php echo form_open('report/ExportKeberangkatan', "class='filter-form-data'"); ?>
<input type="hidden" name="tgl1" value="<?php echo $tgl1; ?>">
<input type="hidden" name="tgl2" value="<?php echo $tgl2; ?>">
<div class="col-sm-4" id="btn1" style="margin-left:30px;">
  <button type="submit" name="byPdf" value="1" class="btn btn-default" title="Export PDF">
<i class="fa fa-lg fa-fw fa-file-excel-o"></i> PDF</button>
<button type="submit" name="byExcel" value="2" class="btn btn-success" title="Export Excel">
<i class="fa fa-lg fa-fw fa-file-excel-o"></i> XLX</button>
<button type="submit" name="byDoc" value="3" class="btn btn-primary" title="Export DOC">
<i class="fa fa-lg fa-fw fa-file-excel-o"></i> DOC</button>
    </div>
<div class="col-sm-4" id="btn2">

    </div>
  </form>
