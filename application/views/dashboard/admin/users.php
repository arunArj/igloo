
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
        <?php 
          $error = $this->session->flashdata('error');
        if($error){
          echo '<div class="alert alert-danger" role="alert">
              '.$error.'
            </div>';
        }
    ?>
    <div class ="row mt-4">
        <div class="col-lg-12">
           <div class="card text-center table-wrap">
              <div class="card-header">
                <h2>Users</h2>
              </div>
              <div class="card-body">
                <h5 class="card-title">All registered users</h5>
                <form action="<?php echo base_url()?>admin/dashboard/getUsers">
                    <select  name="country">
                        <option value="">select Country</option>
                        <option value="UAE">UAE</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Egypt">Egypt</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                    </select>
                    <input type="submit" value="submit">
                </form>
                        <table id="users" class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Country</th>
                              <th scope="col">Mobile</th>
                              <th scope="col">National ID</th>
                            </tr>
                          </thead>
                          <tbody>
                      <?php   foreach($users as $key => $data)
                      { ?>
                            <tr>
                              <th scope="row"><?php  echo ++$key;?></th>
                              <td><a href="<?php echo base_url().'admin/dashboard/userCodes?user='.$data["id"]?>"><?php  echo $data['name'];?></a></td>
                              <td><?php  echo $data['email'];?></td>
                              <td><?php  echo $data['country'];?></td>
                              <td><?php  echo $data['mobile'];?></td>
                               <td><?php  echo $data['national_id'];?></td>
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
