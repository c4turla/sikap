
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Pages</a></li>
        <li class="active"><a href="javascript:;">User</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Add/Edit User</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-primary">
    	
        <div class="panel-heading">
            <h4 class="panel-title"><strong>USER INFORMATION</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart("user/simpan",'class="form-horizontal form-bordered FormProfile"'); ?>
			<fieldset>
				<legend class="form-legend">
					<span>User Profile</span>
				</legend>
				<div class="form-group">
					<label for="photoProfile" class="col-sm-3 control-label">Photo Profile</label>
					<div class="col-sm-5">
						<img alt="image" class="img-profile"  width="150px" height="150px" id="blah" src="<?php echo base_url(); ?><?php echo 'files/'.$FilesName;?>">
					<br>	<input type="file" name="FilesName" id="imgInp" > Format file images: .jpg
					</div>
				</div>
                <div class="form-group">
					<label for="name" class="col-sm-3 control-label">Name</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="name"  name="NamaLengkap" value="<?php echo $NamaLengkap; ?>" placeholder="Name">
					</div>
				</div>
                <div class="form-group">
					<label for="position" class="col-sm-3 control-label">Position</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="position" name="Position" value="<?php echo $Position; ?>" placeholder="Position">
					</div>
				</div>
                <div class="form-group">
					<label for="groupProfile" class="col-sm-3 control-label">Group Profile</label>
					<div class="col-sm-5">
						<select class="form-control form-select2" data-placeholder="Group Profiles..." name="Role">
							<option value="">Please Select</option>
							<?php echo $listgroup; ?>
						</select>
					</div>
				</div>
			</fieldset>
            
			<fieldset>
				<legend class="form-legend">
					<span>Email, Username & Password</span>
				</legend>
                <div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-5">
						<input type="email" class="form-control" id="email" name="Email" value="<?php echo $Email; ?>" placeholder="Email">
					</div>
				</div>
                <div class="form-group">
					<label for="username" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="username" name="Username"  value="<?php echo $Username; ?>" placeholder="Username">
					</div>
				</div>
                <div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="password" name="Password" value="<?php echo $Password; ?>" placeholder="Password">
					</div>
				</div>
			</fieldset>
                
			<fieldset>
				<legend class="form-legend">
					<span>User Address</span>
				</legend>
                <div class="form-group">
					<label for="Address" class="col-sm-3 control-label">Address</label>
					<div class="col-sm-5">
						<textarea class="form-control autogrow" rows="4"  name="Address"  placeholder="Address"><?php echo $Address; ?></textarea>
					</div>
				</div>
                
                <div class="form-group">
					<label for="city" class="col-sm-3 control-label">City</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="city" name="City" value="<?php echo $City; ?>" placeholder="City">
					</div>
				</div>
                <div class="form-group">
					<label for="province" class="col-sm-3 control-label">Province</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="province"  name="Province" value="<?php echo $Province; ?>" placeholder="Province">
					</div>
				</div>
                <div class="form-group">
					<label for="country" class="col-sm-3 control-label">Country</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="country" name="Country" value="<?php echo $Country; ?>" placeholder="Country">
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend class="form-legend">
					<span>Others Information</span>
				</legend>
                <div class="form-group">
					<label for="phone" class="col-sm-3 control-label">Phone/WA</label>
					<div class="col-sm-5">
						<div class="input-group">
                        	<span class="input-group-addon">+62</span>
                            <input type="text" class="form-control" id="phone" name="Phone" value="<?php echo $Phone; ?>"  placeholder="Phone">
						</div>
					</div>
				</div>
			</fieldset>
            <br />
            <fieldset>			
            	<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<a href="#" class="btn btn-primary" id="button-pop"><i class="fa fa-check"></i> Save</a>
						<button style="display:none" type="submit" class="trigereditprofile"><i class="fa fa-check"></i> </button>
                        <a href="<?php echo base_url(); ?>user/profile" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</a>
                        <!-- Element to pop up -->
						<div id="pop-up">
							<a class="b-close btn btn-round btn-primary"><i class="fa fa-times"></i></a>
							Are you sure?
							<div class="btn-pop">
								<a href="#" class="btn btn-primary editprofile"><i class="fa fa-check"></i> OK</a>
							</div>
						</div>
					</div>
				</div>
            </fieldset>
            <?php echo form_close(); ?> 
        </div>
    </div>
</div> <!-- User Information End -->

</div> <!-- page content end -->
