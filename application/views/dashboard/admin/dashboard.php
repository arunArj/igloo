
<style>
    .table-wrap{
        background-color: #F6F1F1;
    }
     .table-wrap th {
         text-align:center;
     }
     .main-sidebar{
         background-color:#146C94;
     }
     .skin-blue .sidebar-menu>li.active>a{
         background-color:#3C84AB;
     }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <section class="content-header">
        <h4>
          Iqloo Quanta
        </h4>
        
      </section>
      <div class="row">
          <div class="col-lg-3 col-xs-3">
            <!-- small box -->
            <div class="small-box" style="background-color: #19A7CE!important;color: #F6F1F1!important; border: 1px solid #19A7CE;">
                
              <div class="inner">
                <h3><?php echo $total_code; ?></h3>

                <p>Total Code</p>
              </div>
              <a href="#" class="small-box-footer" style="visibility: hidden;">.</a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-3">
            <!-- small box -->
            <div class="small-box" style="background-color: #19A7CE!important;color: #F6F1F1!important; border: 1px solid #19A7CE;">
              <div class="inner">
                <h3><?php echo $total_code_used; ?></h3>

                <p>Total Codes Used</p>
              </div>
                         <a href="#" class="small-box-footer" style="visibility: hidden;">.</a>
            </div>
          </div>
          
          <!-- ./col -->
        </div>
    
    <div class ="row mt-4">
        <div class="col-lg-6">
           <div class="card text-center table-wrap">
              <div class="card-header">
                <h2>Most points</h2>
              </div>
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">email</th>
                              <th scope="col">Points</th>
                            </tr>
                          </thead>
                          <tbody>
                      <?php   foreach($most_points as $key => $data)
                      { ?>
                            <tr>
                              <th scope="row"><?php  echo ++$key;?></th>
                              <td><?php  echo $data['name'];?></td>
                              <td><?php  echo $data['email'];?></td>
                              <td><?php  echo $data['total_points'];?></td>
                            </tr>
                    <?php } ?>
                          </tbody>
                        </table>
              </div>

            </div>
        </div>
        <div class="col-lg-6">
           <div class="card text-center table-wrap">
              <div class="card-header">
                <h2>Lucky Winners</h2>
              </div>
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">First</th>
                              <th scope="col">Last</th>
                              <th scope="col">Handle</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                          </tbody>
                        </table>
              </div>

            </div>
        </div>
    </div>

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    }); 
  </script>
