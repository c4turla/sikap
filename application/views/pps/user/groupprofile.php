
<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Dashboard</a></li>
        <li><a href="javascript:;">Pages</a></li>
        <li class="active"><a href="javascript:;">Group Profiles</a></li>
    </ol>
</div>
<div class="page-heading page-heading-md">
    <h2>Group Profiles</h2>
</div>

<div class="container-fluid-md">
	<div class="panel panel-primary">    	
        <div class="panel-heading">
            <h4 class="panel-title"><strong>CREATE GROUP PROFILE</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
        <?php echo form_open_multipart("user/AddGroupProfile",'class="form-horizontal form-bordered FormGroupProfile"'); ?> 
			
			<fieldset>
				<legend class="form-legend">
					<span>Group Name</span>
				</legend>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Group Name</label>
					<div class="col-sm-4">
						<input type="" name="GroupName" class="form-control" id="GroupName" >
					</div>
				</div>
				<div class="form-group">
					<label for="groupName" class="col-sm-3 control-label">Role User</label>
					<div class="checkbox col-sm-2"   >
				  	<input type="radio" name="roleuser" value="admin" class="roleuser"> Admin<br>
  					<input type="radio" name="roleuser" value="user"  class="roleuser"> User
  					</div>
  				</div>
			</fieldset>
            


            <fieldset class="groupdetail" style="display:none">
				<legend class="form-legend">
					<span>Group Profile</span>
				</legend>
                
                <div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<span class="btn btn-default checkallrole">Select All</span>
                        <span type="submit" class="btn btn-default deselectall">Deselect All</span>
					</div>
				</div>
                 <?php foreach ($menu as $value) {  ?>
                 <div class="form-group">                
                    <label class="control-label col-sm-3"><?php echo $value['nama_menu'];?></label>
                    <div class="controls col-sm-6">
                        
                         <?php foreach ($value['childnya'] as $key2 => $value2) { ?>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="check_list[]"  value="<?php echo $value2['menu_id'];?>">
                                <?php echo $value2['nama_menu'];?>
                            </label>
                        </div>
                          <?php }  ?>
                    </div>
                </div>
                 <?php }  ?>
				
           </fieldset>    

			 <fieldset >  
			           <div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">

								<a href="#" class="btn btn-primary" id="button-pop"><i class="fa fa-check"></i> Submit</a>
		                        <!-- Element to pop up -->
								<div id="pop-up">
									<a class="b-close btn btn-round btn-primary"><i class="fa fa-times"></i></a>
									Are you sure?
									<div class="btn-pop">
										<button type="submit" class="btn btn-primary ok-btn-add-group"><i class="fa fa-check"></i> OK</button>
									</div>
								</div>
							</div>
						</div>
                
			</fieldset>          
            <?php echo form_close(); ?>     
        </div>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><strong>LIST GROUP PROFILE</strong></h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
                        <th width="22%">Group Names</th>
                        <th width="60%">Group Profiles</th>
                        <th width="18%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php foreach ($listmenu as $item) {  ?>

                    <tr class="">
                        <td><?php echo $item->GroupNames ?></td>
                        <td><?php echo $item->GroupProfile ?></td>
                        <td class="center">
                            <div class="btn-group" data-toggle="tooltip" data-placement="top" title="Actions">
								<a class="btn-sm btn-danger dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-eye"></i> <span class="caret"></span><span class="sr-only"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#" id="button-pop-a1"><i class="fa fa-edit"></i> Edit</a></li>
									<li><a href="#" id="button-pop-a1"><i class="fa fa-ban"></i> Delete</a></li>
								</ul>
                                <!-- Element to pop up - Edit-->
								<div id="pop-up-a1">
									<a class="b-close-a1 btn btn-round btn-primary"><i class="fa fa-times"></i></a>
									<div class="form-group">
									
										<div class="well bg-danger well-sm updateMsg">
											<h5 align="left" class="updateMsgnya">Verify Security Pass</h5>
										</div>										
										<div class="controls">
											<input type="password" placeholder="Password" class="form-control" id="pass-security">
                                            <p><code>Need Security Password to Continue.<br />- Please contact your Manager.</code></p>
										</div>										
									</div>
									<div class="btn-pop">
										<span class="btn btn-primary SecPass"><i class="fa fa-check"></i> OK</span>
									</div>
								</div>
                            
							</div><!-- /btn-group -->
						</td>
                    </tr>
                   <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Group Names</th>
                        <th>Group Profile</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
    
</div>

</div> <!-- page content end -->

