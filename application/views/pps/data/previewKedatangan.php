<div style="border:1px solid black;">
  <h4 align="center" style="font-weight:bold;color:red;">LAPORAN KEDATANGAN KAPAL PERIODE : <?php echo $tgl1; ?> - <?php echo $tgl2; ?></h4>
  <div class="table-responsive" style="font-size:5px;">
    <table class="table table-bordered">
        <thead style="background:#eaeaea;">
            <tr>
              <th style="padding:2px;">No</th>
              <th style="padding:2px;">Nama Kapal</th>
              <th style="padding:2px;">Asal</th>
              <th style="padding:2px;">Tanggal</th>
              <th style="padding:2px;">Jam</th>
              <th style="padding:2px;">Status</th>
              <th style="padding:2px;">Dermaga</th>
              <th style="padding:2px;">Mutu</th>
              <th style="padding:2px;">Produk</th>
              <th style="padding:2px;">Harga</th>
              <th style="padding:2px;">Total</th>
              <th style="padding:2px;">Suhu Ikan</th>
              <th style="padding:2px;">Suhu Palka</th>
              <th style="padding:2px;">Ikan Dominan</th>
              <th style="padding:2px;">Total</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($data->result() as $key => $value) { ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value->nama_kapal; ?></td>
                <td><?php echo $value->asal; ?></td>
                <td><?php echo $value->tanggal; ?></td>
                <td><?php echo $value->waktu; ?></td>
                <td><?php echo $value->status; ?></td>
                <td><?php echo $value->dermaga; ?></td>
                <td><?php echo $value->mutu; ?></td>
                <td><?php echo $value->produk; ?></td>
                <td><?php echo $value->harga; ?></td>
                <td><?php echo $value->total; ?></td>
                <td><?php echo $value->suhu_ikan; ?></td>
                <td><?php echo $value->suhu_palka; ?></td>
                <td><?php echo $value->dominan; ?></td>
                <td><?php echo $value->total; ?></td>

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
<?php echo form_open('report/Export', "class='filter-form-data'"); ?>
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
