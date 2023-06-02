<div class="content-right">
    <div class="container-fluid">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

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
                    <select  name="item">
                        <option value="">select Prize</option>
                        <option value="iphone">Iphone</option>
                        <option value="playstation">Playstation</option>
                        <option value="airpod">Airpod</option>
                    </select>
                    <input type="submit" value="submit">
                </form>
                        <table id="users" class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">User</th>
                              <th scope="col">Email</th>
                              <th scope="col">Mobile</th>
                              <th scope="col">Prize</th>
                              <th scope="col">status</th>
                            </tr>
                          </thead>
                          <tbody>
                      <?php   foreach($winners as $key => $data)
                      { if($data['prize']==1){$image ="iphone-single.png";$spend =  5000;}else if($data['prize']==2){ $image = "playstation-single.png";$spend = 2000; }else{$image = 'airpod-single.png';$spend =  1000;}
                      ?>
                            <tr>
                              <th scope="row"><?php  echo ++$key;?></th>
                              <td><a href="<?php echo base_url().'admin/dashboard/userCodes?user='.$data["id"]?>"><?php  echo $data['name'];?></a></td>
                              <td><?php  echo $data['email'];?></td>
                              <td><?php  echo $data['mobile'];?></td>
                              <td><img src="<?php  echo base_url().'assets/frontend/dashboard/images/'.$image;?>"></td>
                               <td><?php if($data['status']=='1'){ echo 'approved';}elseif($data['status']=='0'){echo 'pending';}else{echo 'rejected';}?></td>
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
    </div>
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
