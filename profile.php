
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>User Profile</title>

	
	<?php include_once("header.php");

	include_once('connection.php');

if($_GET['id']!=''){
	$id=$_GET['id'];
 $query = "Select * from users where id=$id";
    $result = mysqli_query($connect,$query);

    $accountId = isset($_GET['id']) ? $_GET['id'] : 0;
        //$accessToken = isset($_GET['access_token']) ? $_GET['access_token'] : 0;
        $act = isset($_GET['act']) ? $_GET['act'] : '';

               switch ($act) {

               

                case "block": {
        	$sql = "UPDATE users SET state=2 WHERE id=$accountId"; 
                      if(mysqli_query($connect, $sql)){ 
                   

                    header("Location: profile.php?id=".$id);
                    break;

                }
                    
                }

                case "unblock": {
              $sql = "UPDATE users SET state=0 WHERE id=$accountId"; 
              if(mysqli_query($connect, $sql)){ 
                   // $account->setState(ACCOUNT_STATE_ENABLED);

                    header("Location: profile.php?id=".$id);
                    break;
                }
                    
                }

                default: {

                    //header("Location: profile.php?id=".$id);
                    //exit;
                }
            }
}
	


	


	?>
	<style>

.support_wrap .error {
    margin-top: 10px;
    margin-bottom: 20px;
}

.support_wrap .ticket_title_label {
    margin-bottom: 21px;
    line-height: 160%;
}

.support_wrap input[type="text"], .support_wrap input[type="email"], .support_wrap select {
    width: 352px;
    height: 20px;
    padding: 4px 7px 4px 7px;
    height: 20px;
    background: #FFFFFF;
}

.support_wrap label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #3b5998;
}

.support_wrap .ticket_title, .support_wrap .ticket_email {
    margin-bottom: 15px;
}

.support_wrap .ticket_detailed {
    padding-top: 0px;
}

.ticket_detailed textarea {
    width: 360px;
    height: 94px;
    margin: 0 0 10px;
    vertical-align: top;
    resize: none;
}
.big_btn {
    padding-top: 8px;
    padding-bottom: 8px;
}
.primary_btn {
    padding: 6px 16px 7px 16px;
    margin: 0;
    font-size: 11px;
    display: inline-block;
    zoom: 1;
    cursor: pointer;
    white-space: nowrap;
    outline: none;
    font-family: tahoma, arial, verdana, sans-serif, Lucida Sans;
    vertical-align: top;
    overflow: visible;
    line-height: 13px;
    text-decoration: none;
    text-align: center;
    background: none;
    background-color: #426198;
    color: #FFF;
    border: 0;
    -webkit-border-radius: 2px;
    -khtml-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    border-radius: 2px;
    -webkit-transition: background-color 100ms ease-in-out;
    -khtml-transition: background-color 100ms ease-in-out;
    -moz-transition: background-color 100ms ease-in-out;
    -ms-transition: background-color 100ms ease-in-out;
    -o-transition: background-color 100ms ease-in-out;
    transition: background-color 100ms ease-in-out;
}
	</style>

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
									<li class="breadcrumb-item"><a href="#">User Profile</a></li>
									
								</ol>
								
							</div>
							<div class="row">
								

								<div class="col-lg-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0"></h2>
										</div>
										<form class="support_wrap" method="post" id="addmob">
										<div class="card-body">
                                           <?php
                                           if(!empty($result)){
                                           while($accountInfo=mysqli_fetch_assoc($result))
                                    {
                                           ?>
											
                                                    <div class="ticket_email">
                                    <label class="noselect">Account Username:</label>
                                    <span><?php echo $accountInfo['login']; ?></span>
                                </div>

                                <div class="ticket_email">
                                    <label class="noselect">Account Fullname:</label>
                                    <span><?php echo $accountInfo['fullname']; ?></span>
                                </div>

                                <div class="ticket_email">
                                    <label class="noselect">Account email:</label>
                                    <span><?php echo $accountInfo['email']; ?></span>
                                </div>

                                <div class="ticket_email">
                                    <label class="noselect">SignUp Ip address:</label>
                                    <span><?php echo $accountInfo['ip_addr']; ?></span>
                                </div>


                                <div class="ticket_email">
                                    <label class="noselect">SignUp Date:</label>
                                    <span><?php echo date("Y-m-d H:i:s", $accountInfo['regtime']); ?></span>
                                </div>

                                <div class="ticket_title">
                                    <label for="state" class="noselect">Account state:</label>
                                    <div style="margin: 0 0 10px;">
                                        <?php

                                            if ($accountInfo['state'] == 0) {

                                                echo "<span>Account is active</span>";

                                            } else {

                                                echo "<span>Account is blocked</span>";
                                            }
                                        ?>

                                    </div>
                                </div>

                                <div class="ticket_controls">
                                    <?php

                                       if ($accountInfo['state'] == 0) {

                                            ?>
                                                <a class="primary_btn big_btn" href="profile.php?id=<?php echo $accountInfo['id']; ?>&act=block">Block account</a>
                                            <?php

                                        } else {

                                            ?>
                                                <a class="primary_btn big_btn" href="profile.php?id=<?php echo $accountInfo['id']; ?>&act=unblock">Unblock account</a>
                                            <?php
                                        }
                                    ?>

                                   <!--  <a class="primary_btn big_btn" href="/admin/profile.php/?id=<?php //echo $accountInfo['id']; ?>&access_token=<?php //echo admin::getAccessToken(); ?>&act=close">Close all authorizations</a> -->
                                </div>
										
										    <?Php
										}
									}
										?>
											
												</div>
											</form>
<div class="card-header">
											<h2 class="mb-0">Authorizations</h2>
										</div>
<div class="card-body">
											<table class="table table-responsive table-striped">
                                            <tbody><tr>
                                                <th class="text-left">Id</th>
                                                <th>Access token</th>
                                                <th>Client Id</th>
                                                <th>Create At</th>
                                                <th>Close At</th>
                                                <th>User agent</th>
                                                <th>Ip address</th>
                                            </tr>
                                            <?php

                                                         $sql = "SELECT * from access_data where accountId=$id;";
                                $result = mysqli_query($connect, $sql);
                                 if (mysqli_num_rows($result) > 0) {
                                 $i=1;
                                while($val= mysqli_fetch_assoc($result)) {
                                ?>

                                    
        <tr>
            <td class="text-left"><?php echo $val['accountId'] ?></td>
            <td><?php echo $val['accessToken'] ?></td>
            <td><?php echo $val['clientId'] ?></td>
            <td><?php echo date("Y-m-d H:i:s", $val['createAt']); ?></td>
            <td><?php if ($val['removeAt'] == 0) {echo "-";} else {echo date("Y-m-d H:i:s", $val['removeAt']);} ?></td>
            <td><?php echo $val['u_agent'] ?></td>
            <td><?php echo $val['ip_addr'] ?></td>
        </tr>
       <?php
   }
}
?>
        
                                        </tbody></table>
                                    </div>
											</div>
										</div>
									</div>
								</div>
								
							
							
<?php include_once("js.php");?>
				