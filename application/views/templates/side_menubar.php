<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('admin/dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>     
        <!--Bahrain Menu-->
        <li class="treeview" id="mainWinnerNav">
            <a href="#">
            <i class="fa fa-flag"></i>
            <span>Records</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
         
                <li id="countryListNave"><a href="<?php echo base_url('admin/dashboard/getUsers') ?>"><i class="fa fa-file"></i>User List</a></li>
            
                <li id="winnerListNave"><a href="<?php echo base_url('admin/dashboard/winnersList') ?>"><i class="fa fa-trophy"></i>Winners List</a></li>
            </ul>
        </li>
        <!--Bahrain Menu End-->

        <li><a href="<?php echo base_url('admin/auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>