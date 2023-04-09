
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
                        <img alt="image" class="img-circle img-profile" src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/images/avatars/8.jpg">
                    </div>
                    <div class="col-sm-4 profile-details">
                        <h3>Mintz Tea Coffee</h3>
                        <h4 class="thin">Sales Manager</h4>
                        <p>
                            <a href="mailto:sales@bahanaapp.com" class="text-gray text-no-decoration">
                                <i class="fa fa-fw fa-envelope"></i>
                                sales@bahanaapp.com
                            </a>
                        </p>
                        <p>
                            <a href="javascript:;" class="text-gray text-no-decoration">
                                <i class="fa fa-fw fa-phone"></i>
                                +62-888-111222333
                            </a>
                        </p>
                    </div>
                    <div class="col-sm-5">
                        <h3>
                        	<a href="pages-user.php" class="btn btn-success" title="Update"><i class="fa fa-lg fa-fw fa-user"></i> Update Profile</a>
                        	<a href="#" class="btn btn-danger" title="Delete" id="button-pop"><i class="fa fa-lg fa-fw fa-ban"></i> Delete User</a>
                            <!-- Element to pop up -->
						<div id="pop-up">
							<a class="b-close btn btn-round btn-primary"><i class="fa fa-times"></i></a>
							Are you sure?
							<div class="btn-pop">
								<a href="#" class="btn btn-primary"><i class="fa fa-check"></i> OK</a>
							</div>
						</div>
                        </h3>
                        <h4 class="thin">&nbsp;</h4>
                        <dl class="margin-sm-bottom">
                            <dt>Group Profile</dt>
                            <dd>Reservation</dd>
                        </dl>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        <dl>
                            <dt>Username</dt>
                            <dd>mintz</dd>
                        </dl>
                        <dl class="margin-sm-bottom">
                            <dt>Password</dt>
                            <dd>abcd1234</dd>
                        </dl>
                    </div>
                    <div class="col-sm-4">
                        <dl>
                            <dt>PIN Blackberry</dt>
                            <dd>777666</dd>
                        </dl>
                        <dl class="margin-sm-bottom">
                            <dt>Yahoo Messenger</dt>
                            <dd>mintz.tea@yahoo.com</dd>
                        </dl>
                    </div>
                    <div class="col-sm-5">
                        <dl>
                            <dt>Address</dt>
                            <dd>Jl. Kedaung Raya No.101 RT.001/RW.002 Kedaung Ciputat 15415</dd>
                        </dl>
                        <dl class="margin-sm-bottom">
                            <dt>City, Province, Country</dt>
                            <dd>Tangerang Selatan, Banten, Indonesia</dd>
                        </dl>
                    </div>
                </div>
            </div>

    </div>
</div>

</div> <!-- page content end -->