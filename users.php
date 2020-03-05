<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>All Users</title>

	<?php include_once("header.php");

	include_once('connection.php');

	if(!empty($_GET['uid'])){
		$uid=$_GET['uid'];
		$sql = "DELETE from users WHERE id=$uid";
if(mysqli_query($connect, $sql)){
	header("Location:users.php");
}
	}
	?>

	<div class="page">
		<div class="page-main">
		<style type="text/css">
			.btn-group-xs>.btn, .btn-xs {
    padding: 1px 5px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
		</style>
			<!-- Sidebar menu-->
			<?php include_once("sidebar.php");?>
			<!-- Sidebar menu-->
			<?php include_once("menu.php");?>

	

						<!-- Page content -->
						<div class="container-fluid pt-8">
							<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Users</li>
								</ol>
							<!-- 	<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="create_issue.php"><i class="fas fa-plus mr-2"></i>Add Request</a>
										
									</div>
								</div> -->
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">All Users</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">No.</th>
															<th class="wd-15p">Account State</th>
															<th class="wd-15p">User name</th>
															<th class="wd-15p">Full Name</th>
															<th class="wd-15p">Email</th>
															<th class="wd-15p">Sign Up date</th>
															<th class="wd-15p">IP Address</th>
															<th class="wd-15p">Action</th>
															
														</tr>
													</thead>
													<tbody>
														<?php

														 $sql = "SELECT * from users;";
                                $result = mysqli_query($connect, $sql);
                                 if (mysqli_num_rows($result) > 0) {
                                 $i=1;
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>
														<tr>
															<td><?php echo $i;?></td>
															<td><?php if ($row['state'] == 0) {echo "Enabled";} else {echo "Blocked";} ?></td>
															<td><?php echo $row['login']?></td>
															<td><?php echo $row['fullname']?></td>
															<td><?php echo $row['email']?></td>
															<td><?php echo date("Y-m-d H:i:s", $row['regtime']); ?></td>
															<td><?php echo $row['ip_addr']?></td>
															<td style="display: inline-grid;"><a href="profile.php?id=<?Php echo $row['id'] ?>"class="btn   btn-xs"> View </a> <a href="tracker.php?user=<?php echo $row['login']; ?>" class="btn btn-xs"><i class="side-menu__icon fe fe-bar-chart-2"></i> Track Activity </a> <a href="<?php echo $_SERVER['PHP_SELF']?>?uid=<?Php echo $row['id']?>"  onclick="return confirm('Are you sure you want to delete?')" class="btn btn-xs" ><i class="side-menu__icon fe fe-trash"></i> Remove Account</a></td>
														</tr>
														
														<?php
														$i++;
													}
												}


													?>
														
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