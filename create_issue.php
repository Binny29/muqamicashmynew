
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>Create Issue</title>

	
	<?php include_once("header.php");

	include_once('connection.php');

	if(isset($_REQUEST['btnsubmit'])){
        $issue = isset($_POST['issue']) ? $_POST['issue'] : '';
        

     
        	$sql = "INSERT INTO issues (issue) VALUES ('$issue')";
if(mysqli_query($connect, $sql)){
    echo "Records inserted successfully.";
     header("location: view_issues.php");
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
									<li class="breadcrumb-item"><a href="#">Add Issue</a></li>
									
								</ol>
								
							</div>
							<div class="row">
								

								<div class="col-lg-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Issue</h2>
										</div>
										<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="addmob">
										<div class="card-body">
                                           <?php
                                          
                                    
                                           ?>
											<div class="form-group">
												<label class="form-label">Issue</label>
												
												<input type="text" class="form-control" name="issue" placeholder="Issue"  required="true">
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
				