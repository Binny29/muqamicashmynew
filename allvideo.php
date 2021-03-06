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
<?php include_once("connection.php");
if(!empty($_GET['vid'])){
		$vid=$_GET['vid'];
		$sql = "DELETE from videos_list WHERE id=$vid";
if(mysqli_query($connect, $sql)){
	header("Location:allvideo.php");
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
									<li class="breadcrumb-item"><a href="#">Videos</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Videos </li>
								</ol>
								<div class="btn-group mb-0">
									<a class="btn btn-primary btn-sm" href="addvideo.php"> Add Video</a>
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">All Videos</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
                                                          <th class="wd-15p">No. </th>
                                                          <th class="wd-15p">Title</th>
                                                          <th class="wd-15p">Sub title</th>
                                                          <th class="wd-20p">Points to Reward</th>
                                                          <th class="wd-15p">URL of Video</th>
                                                          <th class="wd-10p">Duration of Video </th>
                                                          <th class="wd-25p">Action</th>
															
														</tr>
													</thead>
													<tbody>
														
														<?php 
														// create array variable to store data from database
														$data = array();
														$sql_query = "SELECT id, title, sub, points, url, time FROM videos_list ORDER BY id DESC";
														$re = mysqli_query($connect,$sql_query);
														?>
															<?php 
															$i=1;
															while ($rt = mysqli_fetch_assoc($re)) {//echo "<pre>";print_r($re);  
															?>
															<tr>
															<td><?php echo $i;?></td>
															<td><?php echo $rt['title'];?></td>
															<td><?php echo $rt['sub'];?></td>
															<td><?php echo $rt['points']; ?></td>
															<td><?php echo $rt['url'];?></td>
															<td><?php echo $rt['time'];?></td>
															<td> <a href="<?php echo $_SERVER['PHP_SELF']?>?vid=<?Php echo $rt['id']?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
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