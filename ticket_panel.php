<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>All Requests</title>

	<?php include_once("header.php");

	include_once('connection.php');

	if(!empty($_GET['req_id'])){
		$req_id=$_GET['req_id'];
		$sql = "DELETE from tickets WHERE id=$req_id";
if(mysqli_query($connect, $sql)){
	header("Location:ticket_panel.php");
}
	}
	?>

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
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Requests</li>
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
											<h2 class="mb-0">All Requests</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">No.</th>
															<th class="wd-15p">User Id</th>
															<th class="wd-15p">Ticket Number</th>
															<th class="wd-15p">Issue Selection</th>
															<th class="wd-15p">Subject</th>
															<th class="wd-15p">Message</th>
															<th class="wd-15p">Ticket Status</th>
															<th class="wd-15p">Action</th>
															
														</tr>
													</thead>
													<tbody>
														<?php

														 $sql = "SELECT t.*, i.issue FROM `tickets` AS t INNER JOIN `issues` AS i ON i.id = t.issue_selection;";
                                $result = mysqli_query($connect, $sql);
                                 if (mysqli_num_rows($result) > 0) {
                                 $i=1;
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>
														<tr>
															<td><?php echo $i;?></td>
															<td><?php echo $row['user_id']?></td>
															<td><?php echo $row['ticket_number']?></td>
															<td><?php echo $row['issue']?></td>
															<td><?php echo $row['subject']?></td>
															<td><?php echo $row['message']?></td>
															<td><?php echo $row['ticket_status']?></td>
															<td style="display: inline-grid;"><a href="edit_panel.php?tid=<?php echo $row['id']?>">Edit Ticket</a>  <a href="<?php echo $_SERVER['PHP_SELF']?>?req_id=<?Php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>  <a href="view_message.php?tid=<?php echo $row['id']?>">View Message</a></td>
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