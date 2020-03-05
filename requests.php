<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
  <meta content="Spruko" name="author">

  <!-- Title -->
  <title>All Video</title>

  <?php include_once("header.php");?>
  <?php include_once("connection.php");?>

  <div class="page">
    <div class="page-main">
    
      <!-- Sidebar menu-->
      <?php include_once("sidebar.php");?>
      <!-- Sidebar menu-->
      <?php include_once("menu.php");?>

  

            <!-- Page content -->
            <div class="container-fluid pt-8">
              <div class="page-header mt-0 shadow p-3">
                <ol class="breadcrumb mb-sm-0">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                </ol>
                <div class="btn-group mb-0">
                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="fas fa-plus mr-2"></i>Add new Page</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-eye mr-2"></i>View the page Details</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-edit mr-2"></i>Edit Page</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Settings</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-header">
                      <h2 class="mb-0">Data Table</h2>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                          <thead>
                            <tr>
                                <th>No. </th>
                                <th>User Name</th>
                                <th>Requested to email/mobile </th>
                                <th>Gift Name</th>
                                <th>Amount</th>
                                <th>Points Used</th>
                                <th>Device Name</th>
                                <th>Model No.</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php 
                            // create array variable to store data from database
                            $data = array();
                          $sql_query = "SELECT rid, request_from, dev_name, dev_man, gift_name, req_amount, points_used, date, username FROM Requests ORDER BY rid ASC";
                            $re = mysqli_query($connect,$sql_query);
                            ?>
                              <?php 
                              $i=1;
                              while ($rt = mysqli_fetch_assoc($re)) {//echo "<pre>";print_r($re);  
                              ?>
                              <tr>
                                <td><?php echo $i;?></td>
                              <td><?php echo $rt['username'];?></td>
              <td><?php echo $rt['request_from'];?></td>
              <td><?php echo $rt['gift_name'];?></td>
            <td><?php echo $rt['req_amount']; ?></td>
              <td><?php echo $rt['points_used'];?></td>
              <td><?php echo $rt['dev_man'];?></td>
          <td><?php echo $rt['dev_name'];?></td> 
      <td><?php echo $rt['date'];?></td>
      <td>
      <a href="tracker.php?user=<?php echo $rt['username']; ?>" class="btn btn-primary btn-sm btn-xs"><i class="fa fa-bar-chart-o"></i> Track Activity </a>
<a href="confirm_complete.php?id=<?php echo $rt['rid'];?>" class="btn btn-info btn-sm btn-xs"><i class="fa fa-check-square-o"></i> Mark as Complete</a>
<a href="<?php echo $_SERVER['PHP_SELF']?>?vid=<?Php echo $rt['id']?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm btn-xs">Delete</a>
</td>
      </tr>
                              <?php $i++;} ?>
                            
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
              </div>
                
            </div>
            <!-- Footer -->
            <?php include_once("footer.php");?>
            <!-- Footer -->
          </div>
        </div>
      </div>
      <!-- app-content-->
    </div>
  </div>

<?php include_once("js.php");?>

  <script>
    $(function(e) {
      $('#example').DataTable();

      var table = $('#example1').DataTable();
      $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
          "The following data would have been submitted to the server: \n\n"+
          data.substr( 0, 120 )+'...'
        );
        return false;
      });
      $('#example2').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false,
        buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
      });
    } );

  </script>
</body>
</html>