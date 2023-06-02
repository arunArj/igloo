
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
                    <h3><?php echo $totalPoints; ?></h3>
    
                    <p>Total Overall Points </p>
                  </div>
                  <a href="#" class="small-box-footer" style="visibility: hidden;">.</a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-3">
                <!-- small box -->
                <div class="small-box" style="background-color: #19A7CE!important;color: #F6F1F1!important; border: 1px solid #19A7CE;">
                  <div class="inner">
                    <h3><?php echo ($claimedPoints)?$claimedPoints:0; ?></h3>
    
                    <p>Total Redeemed Points</p>
                  </div>
                             <a href="#" class="small-box-footer" style="visibility: hidden;">.</a>
                </div>
              </div>
            <div class="col-lg-3 col-xs-3">
                <!-- small box -->
                <div class="small-box" style="background-color: #19A7CE!important;color: #F6F1F1!important; border: 1px solid #19A7CE;">
                  <div class="inner">
                    <h3><?php echo $totalPoints-$claimedPoints; ?></h3>
    
                    <p>Remaining Points</p>
                  </div>
                             <a href="#" class="small-box-footer" style="visibility: hidden;">.</a>
                </div>
              </div>
              
              <!-- ./col -->
        </div>
            
    <div class ="row mt-4">
        <div class="col-lg-12">
           <div class="card text-center table-wrap">
              <div class="card-header">
                <h2>Unique Codes Used</h2>
              </div>
              <div class="card-body">
                <h5 class="card-title">list of all the unique codes registered by this user</h5>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Code </th>
                              <th scope="col">Point</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                      <?php   foreach($userCodes as $key => $data)
                      { ?>
                            <tr>
                              <th scope="row"><?php  echo ++$key;?></th>
                              <td><?php  echo $data->code;?></td>
                              <td><?php  echo $data->point;?></td>
                              <td><?php  echo ($data->status)?'claimed':'not scratched yet';?></td>
                            </tr>
                    <?php } ?>
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
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    }); 
    $(document).ready(function () {
    $('#users').DataTable({
        dom: 'Bfrtip',
        buttons: [
           'csv', 'excel'
        ],
     columnDefs: [
      
        { className: 'dt-center', targets: '_all' },
    ],    
    });
});
  </script>
