<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Data Kedatangan Kapal</title>

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

<h4 style="align:center;text-align:center"><strong>LAPORAN KEDATANGAN KAPAL PERIODE: </strong> <?php echo $tglAwal; ?> - <?php echo $tglAkhir; ?></h4>

  <br/>

  <table width="100%" style="font-size:7px;">
    <thead style="background-color: lightgray;">
      <tr>
        <th>No</th>
        <th>NAMA KAPAL</th>
        <th>ASAL</th>
        <th>TANGGAL</th>
        <th>JAM</th>
        <th>STATUS</th>
        <th>DERMAGA</th>
        <th>MUTU</th>
        <th>PRODUK</th>
        <th>HARGA</th>
        <th>TOTAL</th>
        <th>SUHU IKAN</th>
        <th>SUHU PALKA</th>
        <th>IKAN 1</th>
        <th>BERAT 1</th>
        <th>IKAN 2</th>
        <th>BERAT 2</th>
        <th>IKAN 3</th>
        <th>BERAT 3</th>
        <th>IKAN 4</th>
        <th>BERAT 4</th>
        <th>IKAN 5</th>
        <th>BERAT 5</th>
        <th>IKAN 6</th>
        <th>BERAT 6</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($kedatangan->result() as $key => $value) { ?>
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
        <td><?php echo $value->ikan1; ?></td>
        <td><?php echo $value->berat1; ?></td>
        <td><?php echo $value->ikan2; ?></td>
        <td><?php echo $value->berat2; ?></td>
        <td><?php echo $value->ikan3; ?></td>
        <td><?php echo $value->berat3; ?></td>
        <td><?php echo $value->ikan4; ?></td>
        <td><?php echo $value->berat4; ?></td>
        <td><?php echo $value->ikan5; ?></td>
        <td><?php echo $value->berat5; ?></td>
        <td><?php echo $value->ikan6; ?></td>
        <td><?php echo $value->berat6; ?></td>
      </tr>
            <?php } ?>
    </tbody>

  </table>

</body>
</html>
