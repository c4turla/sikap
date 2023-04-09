<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Data Keberangkatan Kapal</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

<h4 style="align:center;text-align:center"><strong>LAPORAN KEBERANGKATAN KAPAL PERIODE: </strong> <?php echo $tglAwal; ?> - <?php echo $tglAkhir; ?></h4>

  <br/>

  <table width="100%" style="font-size:7px;" border="1">
    <thead style="background-color: lightgray;">
      <tr>
        <th>No</th>
        <th>NAMA KAPAL</th>
        <th>TUJUAN</th>
        <th>TANGGAL</th>
        <th>JAM</th>
        <th>ABK</th>
        <th>DERMAGA</th>
        <th>STATUS</th>
        <th>ES</th>
        <th>AIR</th>
        <th>SOLAR</th>
        <th>OLIE</th>
        <th>BENSIN</th>
        <th>LAINNYA</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($kedatangan->result() as $key => $value) { ?>
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

</body>
</html>
