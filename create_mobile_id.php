
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>Create Mobile Id</title>

	
	<?php include_once("header.php");

	include_once('connection.php');

	if(isset($_REQUEST['btnsubmit'])){
        $mob_key = isset($_POST['mob_key']) ? $_POST['mob_key'] : '';
        $mob_value = isset($_POST['mob_value']) ? $_POST['mob_value'] : '';
        $mid=isset($_POST['id']) ? $_POST['id'] : '';

     
        	$sql = "INSERT INTO mobile_data_api (mob_key, mob_value) VALUES ('$mob_key', '$mob_value')";
if(mysqli_query($connect, $sql)){
    echo "Records inserted successfully.";
     header("location: view_mobile_ids.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    
}

        }



	


	?>

<div class="page">
		<div class="page-main">
			<!-- Sidebar menu-->
	<!-- Sidebar menu-->
			<?php include_once("sidebar.php");?>
			<!-- Sidebar menu-->
			<?php include_once("menu.php");?>

		
						<!-- Page content -->
						<div class="container-fluid pt-8">
							<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Add Mobile Id</a></li>
									
								</ol>
								
							</div>
							<div class="row">
								

								<div class="col-lg-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Input Forms</h2>
										</div>
										<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="addmob">
										<div class="card-body">
                                           <?php
                                          
                                    
                                           ?>
											<div class="form-group">
												<label class="form-label">Mobile Key</label>
												
												<input type="text" class="form-control" name="mob_key" placeholder="Key"  required="true">
											</div>

											<div class="form-group">
												<label class="form-label">Mobile value</label>
												<input type="text" class="form-control" name="mob_value" placeholder="Value" required="true">
											</div>
										   
											<div class="form-group mb-0">
												
														<button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
														
													</div>
												</div>
											</form>
											</div>
										</div>
									</div>
								</div>
								
							
							
<?php include_once("js.php");?>
				