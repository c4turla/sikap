
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Data</a></li>
        <li class="active"><a href="javascript:;">Edit Kapal</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Edit Kapal</h2>
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
			<?php echo form_open_multipart("data/simpan",'class="form-horizontal form-bordered FormProfile"'); ?>

            <fieldset>
				<legend class="form-legend">
					<span>Data Kapal</span>
				</legend>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Nama Kapal</label>
					<div class="col-sm-4">
						<input type="" class="form-control" id="nama_kapal" placeholder="Nama Kapal" name="nama_kapal" value="<?php echo $nama_kapal ?>">
					</div>
				</div>
                <div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Nama Pemilik</label>
					<div class="col-sm-4">
						<input type="" class="form-control" id="pemilik" placeholder="Nama Pemilik" name="pemilik" value="<?php echo $pemilik ?>">
					</div>
				</div>
                <div class="form-group">
					<label for="phone" class="col-sm-3 control-label">Nomor Izin</label>
					<div class="col-sm-4">
                            <input type="text" class="form-control" id="no_izin" placeholder="Nomor Izin" name="no_izin" value="<?php echo $no_izin ?>">
					</div>
				</div>


                <div class="form-group">
					<label for="email" class="col-sm-3 control-label">Berat Kotor (GT)</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="gt" placeholder="GT" name="gt"  value="<?php echo $gt ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Alat Tangkap</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="alat_tangkap" placeholder="Alat Tangkap" name="alat_tangkap"  value="<?php echo $alat_tangkap ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Tanda Selar</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="tanda_selar" placeholder="Tanda Selar" name="tanda_selar"  value="<?php echo $tanda_selar ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Tipe Kapal</label>
					<div class="col-sm-3">
                            <select class="form-control form-select2" id="tipe_kapal"  name="tipe_kapal" data-placeholder="Tipe Kapal">
							<option value=""></option>
							<option value="Penangkap" <?php if(!empty($tipe_kapal) && $tipe_kapal == "Penangkap") echo 'selected'; ?>>Penangkap</option>
							<option value="Pengangkut/Pengumpul" <?php if(!empty($tipe_kapal) && $tipe_kapal == "Pengangkut/Pengumpul") echo 'selected'; ?>>Pengangkut/Pengumpul</option>
							<option value="Kapal Lampu" <?php if(!empty($tipe_kapal) && $tipe_kapal == "Kapal Lampu") echo 'selected'; ?>>Kapal Lampu</option>
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Tanggal SIPI</label>
					<div class="col-sm-2">
						<div class="input-group date">
						<input type="text" class="form-control" data-rel="datepicker" data-date-format="yyyy-mm-dd" name="tanggal_sipi" data-show-meridian="false" id="tanggal_sipi" placeholder="Tanggal" value="<?php echo $tanggal_sipi ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Tanggal Akhir SIPI</label>
					<div class="col-sm-2">
						<div class="input-group date">
						<input type="text" class="form-control" data-rel="datepicker" data-date-format="yyyy-mm-dd" name="tanggal_akhir_sipi" data-show-meridian="false" id="tanggal_akhir_sipi" placeholder="Tanggal" value="<?php echo $tanggal_akhir_sipi ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
					</div>
				</div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Panjang</label>
          <div class="col-sm-2">
            <div class="input-group date">
            <input type="text" class="form-control" name="panjang" value="<?php echo $panjang; ?>">
          </div>
        </div>
      </div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">No SIUP</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="no_siup" placeholder="Tanda Selar" name="no_siup"  value="<?php echo $no_siup ?>">
					</div>
				</div>
			<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Foto Kapal</label>
					<div class="col-sm-4">
					<img alt="image" class="img-profile"  width="350px" height="300px" id="blah" src="<?php echo base_url(); ?><?php echo 'files/foto_kapal/'.$foto_kapal;?>">
					<br>	<input type="file" name="FilesName" id="imgInp" > Format file images: .jpg
					</div>
				</div>
			</fieldset>


            <fieldset>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button  type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        <a href="<?php echo base_url(); ?>data/kapal" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</a>
					</div>
				</div>

			</fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>

</div> <!-- page content end -->
