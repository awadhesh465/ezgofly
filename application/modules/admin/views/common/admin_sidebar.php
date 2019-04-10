<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url()?>" style="color: maroon;">Welcome, <?php echo ucwords($this->session->userdata('username'));?>!</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                   <!--  <li style="font-size: 16px"><a href="<?php //echo base_url('admin/profile')?>"><i class="fa fa-user fa-fw"></i> Update Profile</a>
                    </li>
                    <li style="font-size: 16px"><a href="<?php //echo base_url('admin/change_password')?>"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                    </li> -->
                    <li class="divider"></li>
                    <li style="font-size: 16px"><a href="<?php echo base_url('admin/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
   
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav sidebar-menu" id="side-menu" style="margin-top:50px">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li> -->
                        <li>
                            <a href="<?php echo base_url('admin/index')?>"><i class="fa fa-dashboard fa-fw" style="font-size: 21px"></i> Dashboard</a>
                        </li>
                       
                        
                        <li>
                            <a href="<?php  echo base_url('admin/site_detail');?>"><i class="fa fa-user  " style="font-size: 21px"></i> Site Details</a>
                            
                        </li>
                        <li>
                            <a href="<?php  echo base_url('admin/category_list');?>"><i class="fa fa-user  " style="font-size: 21px"></i> Category</a>
                        </li>
                        <li>
                            <a href="<?php  echo base_url('admin/post_list');?>"><i class="fa fa-user  " style="font-size: 21px"></i> Posts</a>
                            
                        </li>


                        <li>
                            <a href="<?php  echo base_url('admin/comment_list');?>"><i class="fa fa-user  " style="font-size: 21px"></i> Comments</a>
                        </li>

                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
    </nav>