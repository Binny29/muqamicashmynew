
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>EDit Panel</title>

	
	<?php include_once("header.php");

	include_once('connection.php');

if($_GET['tid']!=''){
	$tid=$_GET['tid'];
 $query = "SELECT t.*, i.issue FROM `tickets` AS t INNER JOIN `issues` AS i ON i.id = t.issue_selection where t.id=$tid";
    $result = mysqli_query($connect,$query);
}
	if(isset($_REQUEST['ticket_status'])){
        $ticket_status = isset($_POST['ticket_status']) ? $_POST['ticket_status'] : '';
               $tid=isset($_POST['id']) ? $_POST['id'] : '';

       
        	$sql = "UPDATE tickets SET ticket_status='$ticket_status' WHERE id=$tid"; 

if(mysqli_query($connect, $sql)){ 
    echo "Record was updated successfully."; 
    header("location: ticket_panel.php");
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
									<li class="breadcrumb-item"><a href="#">Edit Ticket</a></li>
									
								</ol>
								
							</div>
							<div class="row">
								

								<div class="col-lg-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0"></h2>
										</div>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="addmob">

										<table class="table table-striped w-auto">

  <!--Table head-->
    <thead>
    <tr>
    	<?php
    	while($row=mysqli_fetch_assoc($result))
                                    {
                                    	?>
                                    		<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      <tr><th>User ID</th><td><?php echo $row['user_id']?></td></tr>
      <tr><th>Ticket Number</th><td><?php echo $row['ticket_number']?></td></tr>
      <tr><th>Issue Selection</th><td><?php echo $row['issue']?></td></tr>
      <tr><th>Subject</th><td><?php echo $row['subject']?> </td></tr>
      <tr><th>Message</th><td><?php echo $row['message']?> </td></tr>
      <tr><th>Date</th><td><?php echo $row['created_at']?></td></tr>	
       <tr><th>Ticket Status </th><td><?php echo $row['ticket_status']?></td></tr>
       <?php
       }
       ?>	
	  <tr><th>Change Status</th><td><select name="ticket_status" id="tkt_status" data-id="274" onchange="this.form.submit()">
	      <option value="">-- Select Status ---</option>
	      <option value="open">Open</option>
	      <option value="closed">Closed</option>
	      <option value="pending">Pending</option>
	  </select></td></tr>
    </tr>

  </thead>
  <!--Table head-->



</table>
</form>
										
											</div>
										</div>
									</div>
								</div>
								
							
							
<?php include_once("js.php");?>
				