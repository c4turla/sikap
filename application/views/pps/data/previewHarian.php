<div style="border:1px solid black;">
  <h6 align="center" style="font-weight:bold;color:red;">Monitoring Harian Pendaratan Ikan di Pelabuhan Perikanan Samudera Kendari 
  <br> Dari Tanggal : <?php echo $tgl1; ?> - <?php echo $tgl2; ?></h6>
  <div class="table-responsive" style="font-size:5px;">
    <table class="table table-bordered">
        <thead style="background:#eaeaea;">
            <tr>
              <th style="padding:2px;">No</th>
              <th style="padding:2px;">Tanggal</th>
              <th style="padding:2px;">Nama Kapal</th>
              <th style="padding:2px;">Tanda Selar</th>              
              <th style="padding:2px;">Nama Pemilik</th>
              <th style="padding:2px;">GT</th>
              <th style="padding:2px;">Alat Tangkap</th>
              <th style="padding:2px;">LOKASI PNKPAN.</th>
              <th style="padding:2px;">SIPI</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($data->result() as $key => $value) { ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value->tanggal; ?></td>
                <td><?php echo $value->nama_kapal; ?></td>
                <td><?php echo $value->tanda_selar; ?></td>
                <td><?php echo $value->pemilik; ?></td>
                <td><?php echo $value->gt; ?></td>
                <td><?php echo $value->alat_tangkap; ?></td>
                <td><?php echo $value->asal; ?></td>
                <td><?php echo $value->no_siup; ?></td>
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
<?php echo form_open('report/ExportHarian2', "class='filter-form-data'"); ?>
<input type="hidden" name="tgl1" value="<?php echo $tgl1; ?>">
<input type="hidden" name="tgl2" value="<?php echo $tgl2; ?>">
<div class="col-sm-4" id="btn1" style="margin-left:90px;">

<button type="submit" name="byExcel" value="2" class="btn btn-success" title="Export Excel">
<i class="fa fa-lg fa-fw fa-file-excel-o"></i>Export Excel</button>

    </div>
<div class="col-sm-4" id="btn2">

    </div>
  </form>
