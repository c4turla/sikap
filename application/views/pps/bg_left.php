<!-- aSide Menu START -->

        <div class="page-wrapper">
            <aside class="sidebar sidebar-default">
                <div class="sidebar-profile">
                    <img class="img-circle profile-image" src="<?php echo base_url().'files/'.$session['FilesName'].''; ?>">

                    <div class="profile-body">
                        <h4><?php echo $session['NamaLengkap'];?></h4>

                        <div class="sidebar-user-links">
                            <a class="btn btn-link btn-xs" href="<?php echo base_url(); ?>user/profile" data-placement="bottom" data-toggle="tooltip" data-original-title="Profile"><i class="fa fa-user"></i></a>
                            <a class="btn btn-link btn-xs" href="<?php echo base_url(); ?>setting"  data-placement="bottom" data-toggle="tooltip" data-original-title="Settings"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-link btn-xs" href="<?php echo base_url(); ?>dashboard/logout" data-placement="bottom" data-toggle="tooltip" data-original-title="Logout"><i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
                </div>


                <nav>
                    <h5 class="sidebar-header">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li <?php if($this->uri->segment(1)=='dashboard'){ echo' class="active"' ;}?> >
                            <a href="<?php echo base_url(); ?>dashboard" title="Dashboards">
                                <i class="fa fa-lg fa-fw fa-home"></i> Dashboards 
                            </a>
                        </li>
                       <?php foreach ($arraymenu as $value) {  ?>
                         <li class="nav-dropdown <?php if($this->uri->segment(1)==$value['modul_action']){ echo'active';}?>" >
                             <a href="#" title="Users">
                                <i class="fa fa-lg fa-fw <?php echo $value['icon'];?>"></i> <?php echo $value['nama_menu'];?>
                             </a>
                               <ul class="nav-sub">
                                       <?php foreach ($value['childnya'] as $key2 => $value2) { ?>
                                        <li>
                                            <a href="<?php echo base_url().$value2['modul_action']; ?>" title="Profile">
                                                <i class="fa fa-fw fa-caret-right"></i> <?php echo $value2['nama_menu'];?>
                                            </a>
                                        </li>
                                        <?php }  ?>
                                    </ul>
                             </li>

                        <?php }  ?>
                   </ul>

                    <h5 class="sidebar-header">Summary</h5>
                    <ul class="sidebar-summary">
                        <li>
                            <div class="mini-chart mini-chart-block">
                                <div class="chart-details">
                                    <div class="chart-name">Total Kapal</div>
                                    <div class="chart-value"><?php echo $totalKapal;?></div>
                                </div>
                                <div id="mini-chart-sidebar-1" class="chart pull-right"></div>
                            </div>
                        </li>
                        <li>
                            <div class="mini-chart mini-chart-block">
                                <div class="chart-details">
                                    <div class="chart-name">Total Kedatangan</div>
                                    <div class="chart-value"><?php echo $Kedatangan;?></div>
                                </div>
                                <div id="mini-chart-sidebar-2" class="chart pull-right"></div>
                            </div>
                        </li>
                        <li>
                            <div class="mini-chart mini-chart-block">
                                <div class="chart-details">
                                    <div class="chart-name">Total Keberangkatan</div>
                                    <div class="chart-value"><?php echo $totalKeberangkatan;?></div>
                                </div>
                                <div id="mini-chart-sidebar-3" class="chart pull-right"></div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </aside>
            
            <!-- aSide Menu END -->
