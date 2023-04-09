<!-- Modal -->
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">				
				<h3 class="modal-title" id="myModalLabel">Import Data Kapal</h4>
				
			</div>
        <div>
			<?php echo form_open_multipart("import/upload",'class="form-horizontal"'); ?>
				<div class="modal-body">
					<div class="form-group row">
					<div class="col-md-12">
						<label for="exampleInputFile">Pilih File Excel</label>
							<?= form_upload(array('id' => 'txtFileImport', 'name' => 'fileImport'))?>
							<small id="fileImport" class="form-text text-muted">Import Data Kapal Via Excel, Format File Harus .XLS (Excel 2003-2007).</small>
					</div>		
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
					<button type="submit" value="Upload" name="btnSubmit" class="btn btn-primary"><i class="fa fa-upload"></i> Import Data</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

