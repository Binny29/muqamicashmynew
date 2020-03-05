<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>Tracking User's Activity..</title>

	<?php include_once("header.php");

	include_once('connection.php');

	
if(isset($_GET['user'])){
				$user1 = $_GET['user'];

				}
		if(!empty($_GET['track_id'])){

			$user1 = $_GET['user'];
		$track_id=$_GET['track_id'];
		$sql = "DELETE from tracker WHERE id=$track_id";
if(mysqli_query($connect, $sql)){
	header("Location:users.php");
}
	}
	?>

	<div class="page">
		<div class="page-main">
		
			<!-- Sidebar menu-->
			<?php include_once("sidebar.php");?>
			<!-- Sidebar menu-->
			<?php include_once("menu.php");?>
<?php

?>
	

						<!-- Page content -->
						<div class="container-fluid pt-8">
							<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tracking User's Activity..</li>
								</ol>
								
							</div>

							   <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" id="website" size="30" placeholder="yashDev"/><button onclick="window.location = 'tracker.php?user='+$('#website').val();"  class="btn btn-primary">Track User</button>
                </div>
              </div>
            </div>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Earning History
..</h2>
										</div>
										<div class="card-body">
											<?php
											if(isset($_GET['user'])){
				$user1 = $_GET['user'];
				?>
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															

															<th class="wd-15p">No. </th>
<th class="wd-15p">Earned From</th>
<th class="wd-15p">Date</th>
<th class="wd-15p">Credited Points</th>
<th class="wd-15p">Action</th>
															
														</tr>
													</thead>
													<tbody>
														<?php
                                                      
														 $sql = "SELECT id, username, points, type, date
					FROM tracker WHERE username = '$user1'";
                                $result = mysqli_query($connect, $sql);
                                 if (mysqli_num_rows($result) > 0) {
                                 $i=1;
                                while($data = mysqli_fetch_assoc($result)) {
                                ?>
														<tr>
															<td><?php echo $i;?></td>
															<td><?php echo $data['username']." - ".$data['type'];?></td>
							                                <td><?php echo $data['date'];?></td>
															<td>+ <?php echo $data['points']; ?></td>
															
															<td> <a href="<?php echo $_SERVER['PHP_SELF']?>?track_id=<?Php echo $data['id']?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
														</tr>
														
														<?php
														$i++;
													}
												}


													?>
														
													</tbody>
												</table>
											</div>
											<?php
										}else{

        echo 'you have to select a User to Track his Activity !';
			}
										?>
										</div>
									</div>
									
									
								</div>
							</div>
								

										<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Redeem History
..</h2>
										</div>
										<div class="card-body">
											<?php
											if(isset($_GET['user'])){
				$user1 = $_GET['user'];
				?>
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															

															<th class="wd-15p">No. </th>
<th class="wd-15p">Redeemed for</th>
<th class="wd-15p">Date</th>
<th class="wd-15p">Debited Points</th>

															
														</tr>
													</thead>
													<tbody>
														<?php

														 $sql = "SELECT username, points, type, date
					FROM track_red WHERE username = '$user1'";
                                $result = mysqli_query($connect, $sql);
                                 if (mysqli_num_rows($result) > 0) {
                                 $i=1;
                                while($data = mysqli_fetch_assoc($result)) {
                                ?>
														<tr>
															<td><?php echo $i;?></td>
															<td><?php echo $data['username']." - ".$data['type'];?></td>
							                                <td><?php echo $data['date'];?></td>
															<td>+ <?php echo $data['points']; ?></td>
															
															
														</tr>
														
														<?php
														$i++;
													}
												}


													?>
														
													</tbody>
												</table>
											</div>
											<?php
										}else{

        echo 'you have to select a User to Track his Activity !';
			}
										?>
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
			// $('button').click( function() {
			// 	var data = table.$('input, select').serialize();
			// 	alert(
			// 		"The following data would have been submitted to the server: \n\n"+
			// 		data.substr( 0, 120 )+'...'
			// 	);
			// 	return false;
			// });
			$('#example2').DataTable( {
				"scrollY":        "200px",
				"scrollCollapse": true,
				"paging":         false
			});
		} );

	</script>
</body>
</html>