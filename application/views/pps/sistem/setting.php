
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Pages</a></li>
        <li class="active"><a href="javascript:;">Settings</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Settings</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-primary">
    	
        <div class="panel-heading">
            <h4 class="panel-title"><strong>COMPANY INFORMATION</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
		
		
		
        <div class="panel-body">
		<?php echo form_open("setting/simpan",'class="form-horizontal form-bordered FormProfile"'); ?>
			
			<fieldset>
				<legend class="form-legend">
					<span>Company Information</span>
				</legend>
				<div class="form-group">
					<label for="companyName" class="col-sm-3 control-label">Company Name</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="CompanyName" value="<?php echo $CompanyName; ?>" id="companyName" placeholder="Company Name" required>
					</div>
				</div>
				<div class="form-group">
					<label for="companyAddress" class="col-sm-3 control-label">Company Address</label>
					<div class="col-sm-5">
						<textarea class="form-control autogrow" rows="4" name="CompanyAddress"  value="" placeholder="Company Address" required><?php echo $CompanyAddress; ?></textarea>
					</div>
				</div>
			</fieldset>
                
			<fieldset>
				<legend class="form-legend">
					<span>Phone & Fax</span>
				</legend>
                <div class="form-group">
					<label for="companyPhone01" class="col-sm-3 control-label">Company Phone - 01 </label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="companyPhone01" name="companyPhone"  value="<?php echo $CompanyPhone; ?>" placeholder="Company Phone - 01" required>
					</div>
				</div>
                <div class="form-group">
					<label for="companyPhone02" class="col-sm-3 control-label">Company Phone - 02</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="companyPhone02" name="companyPhone02" value="<?php echo $companyPhone02; ?>" placeholder="Company Phone - 02" required>
					</div>
				</div>
                <div class="form-group">
					<label for="companyFax" class="col-sm-3 control-label">Company Fax</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="companyFax" name="companyFax" value="<?php echo $companyFax; ?>" placeholder="Company Fax" required>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend class="form-legend">
					<span>Email & Website</span>
				</legend>
                <div class="form-group">
					<label for="companyEmail01" class="col-sm-3 control-label">Company Email - 01</label>
					<div class="col-sm-5">
						<input type="email" class="form-control" id="companyEmail01" name="companyEmail" value="<?php echo $companyEmail; ?>" placeholder="Company Email - 01" required>
					</div>
				</div>
                <div class="form-group">
					<label for="companyEmail02" class="col-sm-3 control-label">Company Email - 02</label>
					<div class="col-sm-5">
						<input type="email" class="form-control" id="companyEmail02" name="companyEmail02" value="<?php echo $companyEmail02; ?>" placeholder="Company Email - 02" required>
					</div>
				</div>
                <div class="form-group">
					<label for="companyWebsite" class="col-sm-3 control-label">Company Website</label>
					<div class="col-sm-5">
						<input type="url" class="form-control" id="companyWebsite" name="companyWebsite"  value="<?php echo $CompanyWebsite; ?>" placeholder="Company Website" required>
					</div>
				</div>
			</fieldset>
            <br />
            <fieldset>			
            	<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						
						<a href="javascript:void(0)" class="btn btn-primary" id="button-pop"><i class="fa fa-check"></i> Save</a>
						<button style="display:none" type="submit" class="trigerclick"><i class="fa fa-check"></i> </button>
                        <!-- Element to pop up -->
						<div id="pop-up">
							<a class="b-close btn btn-round btn-primary"><i class="fa fa-times"></i></a>
							Are you sure?
							<div class="btn-pop">
								<a href="#" class="btn btn-primary settingcompany1"><i class="fa fa-check"></i> OK</a>
								
							</div>
						</div>
					</div>
				</div>
            </fieldset>
          <?php echo form_close(); ?> 
        </div>
		
		
    </div>
</div> <!-- Company Information End -->

<div class="container-fluid-md">
	<div class="panel panel-primary">
    	
        <div class="panel-heading">
            <h4 class="panel-title"><strong>PAYMENT ACCOUNTS</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
		<?php echo form_open("setting/simpan",'class="form-horizontal form-bordered FormProfile2"'); ?>
			<fieldset>
				<legend class="form-legend">
					<span>Bank Account - 01</span>
				</legend>
				<div class="form-group">
					<label for="bankName01" class="col-sm-3 control-label">Bank Name</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="bankName01" name="bankName01" value="<?php echo $bankName01; ?>" placeholder="Bank Name - 01" required>
					</div>
				</div>
                <div class="form-group">
					<label for="accountNo01" class="col-sm-3 control-label">Account Number</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="accountNo01"  name="accountNo01" value="<?php echo $accountNo01; ?>"  placeholder="Account Number - 01" required>
					</div>
				</div>
                <div class="form-group">
					<label for="accountName01" class="col-sm-3 control-label">Account Name</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="accountName01" name="accountName01" value="<?php echo $accountName01; ?>" placeholder="Account Name - 01" required>
					</div>
				</div>
			</fieldset>
            
            <fieldset>
				<legend class="form-legend">
					<span>Bank Account - 02</span>
				</legend>
				<div class="form-group">
					<label for="bankName02" class="col-sm-3 control-label">Bank Name</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="bankName02" name="bankName02" value="<?php echo $bankName02; ?>" placeholder="Bank Name - 02" required>
					</div>
				</div>
                <div class="form-group">
					<label for="accountNo02" class="col-sm-3 control-label">Account Number</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="accountNo02" name="accountNo02" value="<?php echo $accountNo02; ?>" placeholder="Account Number - 02" required>
					</div>
				</div>
                <div class="form-group">
					<label for="accountName02" class="col-sm-3 control-label">Account Name</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="accountName02" name="accountName02" value="<?php echo $accountName02; ?>" placeholder="Account Name - 02" required>
					</div>
				</div>
			</fieldset>
            
            <fieldset>
				<legend class="form-legend">
					<span>Bank Account - 03</span>
				</legend>
				<div class="form-group">
					<label for="bankName03" class="col-sm-3 control-label">Bank Name</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="bankName03" name="bankName03" value="<?php echo $bankName03; ?>" placeholder="Bank Name - 03" required>
					</div>
				</div>
                <div class="form-group">
					<label for="accountNo03" class="col-sm-3 control-label">Account Number</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="accountNo03" name="accountNo03" value="<?php echo $accountNo03; ?>" placeholder="Account Number - 03" required>
					</div>
				</div>
                <div class="form-group">
					<label for="accountName03" class="col-sm-3 control-label">Account Name</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="accountName03" name="accountName03" value="<?php echo $accountName03; ?>" placeholder="Account Name - 03" required>
					</div>
				</div>
			</fieldset>
            
			<fieldset>
				<legend class="form-legend">
					<span>NPWP</span>
				</legend>
                <div class="form-group">
					<label for="npwpName" class="col-sm-3 control-label">NPWP Name</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="npwpName" name="npwpName" value="<?php echo $npwpName; ?>" placeholder="NPWP Name" required>
					</div>
				</div>
                <div class="form-group">
					<label for="npwpNo" class="col-sm-3 control-label">NPWP Number</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="npwpNo" name="npwpNo" value="<?php echo $npwpNo; ?>" placeholder="NPWP Number" required>
					</div>
				</div>
			</fieldset>                
            <br />
            <fieldset>			
            	<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<a href="#" class="btn btn-primary" id="button-pop2"><i class="fa fa-check"></i> Save</a>
						<button style="display:none" type="submit" class="trigerclick2"><i class="fa fa-check"></i> </button>
                        <!-- Element to pop up -->
						<div id="pop-up2">
							<a class="b-close2 btn btn-round btn-primary"><i class="fa fa-times"></i></a>
							Are you sure?
							<div class="btn-pop">
								<a href="#" class="btn btn-primary settingcompany2"><i class="fa fa-check"></i> OK</a>
							</div>
						</div>
					</div>
				</div>
            </fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>
</div> <!-- Payment Account End -->

<div class="container-fluid-md">
	<div class="panel panel-primary">
    	
        <div class="panel-heading">
            <h4 class="panel-title"><strong>SECURITY PASSWORD</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<?php echo form_open("setting/simpan",'class="form-horizontal form-bordered FormProfile2"'); ?>
                <br />
                <div class="form-group has-error">
                    <label class="control-label col-sm-3">Security Password</label>

                    <div class="controls col-sm-5">
                        <input class="form-control" type="password" name="SecurityPassword" value="<?php echo $SecurityPassword; ?>">
                        <span class="help-block">Security Password for Confirmation Actions.</span>
                    </div>
                </div>                
            	<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<a href="#" class="btn btn-primary" id="button-pop3"><i class="fa fa-check"></i> Save</a>
						<button style="display:none" type="submit" class="trigerclick2"><i class="fa fa-check"></i> </button>
                        <!-- Element to pop up -->
						<div id="pop-up3">
							<a class="b-close3 btn btn-round btn-primary"><i class="fa fa-times"></i></a>
							Are you sure?
							<div class="btn-pop">
								<a href="#" class="btn btn-primary settingcompany3"><i class="fa fa-check"></i> OK</a>
							</div>
						</div>
					</div>
				</div>
             <?php echo form_close(); ?>
        </div>
    </div>
</div> <!-- Payment Account End -->

</div> <!-- page content end -->

