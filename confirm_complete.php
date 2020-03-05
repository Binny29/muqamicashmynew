<?php
$response = array();
$add_result = false;
$delete_result = false;
//database connection
include_once("connection.php");


if(isset($_GET['id'])){
	$ID = $_GET['id'];
} else {
	$response["status"] = 0;
    $response["message"] = "Missing ID. Must provide request id.";
    echo json_encode($response);
    exit;
}


// adding data 
//echo $sql_query1 = "INSERT INTO Completed SELECT * FROM Requests WHERE rid =$ID";

	
	
	// Execute query
	//if(mysqli_query($connect, $sql_query1)){
		
    	// store result 
    	$sql_query2 = "UPDATE Completed SET status = '2', status_req = 'Completed' WHERE rid =$ID";
    
    	if(mysqli_query($connect, $sql_query2)) {
    	    $add_result = true; 
    	}
    	
    	$track_query = "UPDATE track_red SET status = 'Completed' WHERE id =$ID";
    	
    	mysqli_query($connect, $track_query);
	//}


// // delete data 
// $sql_querydele= "DELETE FROM Requests WHERE rid =$ID";
	
	
// 	// Execute query
// 	if(mysqli_query($connect, $sql_querydele)) {
// 	    // store result 
// 	    $delete_result = true;  
// 	};
	


// if delete data success back to reservation page
if($add_result){

    $response["status"] = 2;
    $response["message"] = "Successfully updated status and marked as complete.";
}else{
	$response["status"] = 1;
    $response["message"] = "Error occured while marking as complete.";
}
	
echo json_encode($response);
	
$connect->close();
?>