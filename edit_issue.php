
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>EDit Issue</title>

	
	<?php include_once("header.php");

	include_once('connection.php');

if($_GET['issue_id']!=''){
	$issue_id=$_GET['issue_id'];
 $query = "Select * from issues where id=$issue_id";
    $result = mysqli_query($connect,$query);
}
	if(isset($_REQUEST['btnsubmit'])){
        $issue = isset($_POST['issue']) ? $_POST['issue'] : '';
               $issue_id=isset($_POST['id']) ? $_POST['id'] : '';

       
        	$sql = "UPDATE issues SET issue='$issue' WHERE id=$issue_id"; 

if(mysqli_query($connect, $sql)){ 
    echo "Record was updated successfully."; 
    header("location: view_issues.php");
} else { 
    echo "ERROR: Could not able to execute $sql. "  ;
                            
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
									<li class="breadcrumb-item"><a href="#">Edit issue</a></li>
									
								</ol>
								
							</div>
							<div class="row">
								

								<div class="col-lg-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0"></h2>
										</div>
										<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="addmob">
										<div class="card-body">
                                           <?php
                                           if(!empty($result)){
                                           while($row=mysqli_fetch_assoc($result))
                                    {
                                           ?>
											<div class="form-group">
												<label class="form-label">Issue</label>
												<input type="hidden" name="id" value="<?Php echo $row['id']?>">
												<input type="text" class="form-control" name="issue" placeholder="Issue" value="<?Php echo $row['issue']?>" required="true">
											</div>

										
										    <?Php
										}
									}
										?>
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
				