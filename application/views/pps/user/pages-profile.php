
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Pages</a></li>
        <li class="active"><a href="javascript:;">Profile</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Profile Member</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-default">
    
            <div class="panel panel-default panel-profile-details">
                <div class="panel-body">
                    <div class="col-sm-3 text-center">
                        <img alt="image" class="img-circle img-profile"  width="150px" height="150px" src="<?php echo base_url(); ?><?php echo 'files/'.$FilesName;?>">
                    </div>
                    <div class="col-sm-4 profile-details">
                        <h3><?php echo $NamaLengkap;?></h3>
                        <h4 class="thin"><?php echo $Position;?></h4>
                        <p>
                            <a href="mailto:sales@bahanaapp.com" class="text-gray text-no-decoration">
                                <i class="fa fa-fw fa-envelope"></i>
                                <?php echo $Email;?>
                            </a>
                        </p>
                        <p>
                            <a href="javascript:;" class="text-gray text-no-decoration">
                                <i class="fa fa-fw fa-phone"></i>
                                 <?php echo $Phone;?> 
                            </a>
                        </p>
                    </div>
                    <div class="col-sm-5">
                        <h3>

                        <?php if($IdRole!=$id)
                        { ?>
                        <a href="<?php echo base_url(); ?>user/EditProfileMember/<?php echo $id;?>" class="btn btn-success" title="Update"><i class="fa fa-lg fa-fw fa-user"></i> Update Profile</a>
                        <?php }else{?>
                        <a href="<?php echo base_url(); ?>user/EditProfile" class="btn btn-success" title="Update"><i class="fa fa-lg fa-fw fa-user"></i> Update Profile</a>
                        <?php }?>
                        <a href="<?php echo base_url(); ?>user/hapus/<?php echo $id;?>" class="btn btn-danger" title="Delete" id="button-pop"><i class="fa fa-lg fa-fw fa-ban"></i> Delete User</a>

		<!-- Element to pop up -->
						<div id="pop-up">
							<a class="b-close btn btn-round btn-primary"><i class="fa fa-times"></i></a>
							Are you sure?
							<div class="btn-pop">
								<a href="<?php echo base_url(); ?>user/hapus/<?php echo $id;?>" class="btn btn-primary"><i class="fa fa-check"></i> OK</a>
							</div>
						</div>
                        </h3>
                        <h4 class="thin">&nbsp;</h4>
                        <dl class="margin-sm-bottom">
                            <dt>Group Profile</dt>
                            <dd><?php echo $Role;?></dd>
                        </dl>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        <dl>
                            <dt>Username</dt>
                            <dd><?php echo $Username;?></dd>
                        </dl>
                        <dl class="margin-sm-bottom">
                            <dt>Password</dt>
                            <dd>*****</dd>
                        </dl>
                    </div>

                    <div class="col-sm-5">
                        <dl>
                            <dt>Address</dt>
                            <dd><?php echo $Address; ?></dd>
                        </dl>
                        <dl class="margin-sm-bottom">
                            <dt>City, Province, Country</dt>
                            <dd><?php echo $City; ?> - <?php echo $Province; ?> , <?php echo $Country; ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

    </div>
</div>

</div> <!-- page content end -->