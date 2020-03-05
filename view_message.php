
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
  <meta content="Spruko" name="author">

  <!-- Title -->
  <title>View Message</title>

  <?php include_once("header.php");

  include_once('connection.php');
if($_GET['tid']!=''){
  $tid=$_GET['tid'];
 $query = "SELECT t.*, i.issue FROM `tickets` AS t INNER JOIN `issues` AS i ON i.id = t.issue_selection where t.id=$tid";
    $result = mysqli_query($connect,$query);

    $sql_ticket = "SELECT id,message, sender_id,created_at FROM tickets_reply WHERE ticket_id = $tid ORDER BY id DESC";  

        $result_tkt = mysqli_query($connect,$sql_ticket);
}

if (!empty($_POST['message'])) {


   
    $ticketID = $_POST['ticket_id'];

    $senderID= $_POST['sender_id'];

    $message = $_POST['message'];
  $sql = "insert into tickets_reply(ticket_id,sender_id,message) values ('$ticketID','$senderID','$message')";


$ID = $_GET['tid'];
if(mysqli_query($connect, $sql)){

        header("Location: view_message.php?tid=".$ticketID."&status=done");
    die;

}else{
          header("Location: view_message.php?tid=".$ticketID."&status=fail");
      die;
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
<div class="chatbody">
                  <div class="panel panel-primary">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat</h3>
                    </div>
                </div>

      

                <div class="panel-body msg_container_base">
                    <div class="row msg_container base_sent">
                      <?php
      while($row=mysqli_fetch_assoc($result))
      {
        ?>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_sent">
                                <p><?php echo $row['message']?></p>
                                <span class="pull-right ticketno">Ticket No:&nbsp;<?php echo $row['ticket_number']?></span>
                                <time><?php echo $row['created_at']?></time>
                            </div>
                        </div>
                        <?php
                      }
                      ?>
                                              <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                      </div>

                   <?php
                   if(!empty($result_tkt)){
      while($value=mysqli_fetch_assoc($result_tkt))
      {
        ?>
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p><?php echo $value['message']; ?></p>
                                <time datetime=""><?php echo $value['created_at']; ?></time>
                            </div>
                        </div>
                    </div>
                    <?php
                  }
                  }
                  ?>
                    </div>
                                     
                </div>
                <div class="panel-footer">
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <div class="input-group">
                      <input type="hidden" name="ticket_id" value="<?php echo $tid?>">
                      <input type="hidden" name="sender_id" value="<?php echo $_SESSION['login_id']?>">
                        <input id="btn-input" type="text" name="message" class="form-control input-sm chat_input" placeholder="Write your message here..." required="true" />
                        <span class="input-group-btn">
                           <!--  <input type="submit" value="Proceed to Add"> -->
                        <button type="submit" class="btn btn-primary btn-md" id="btn-chat"><i class="fe fa-send" aria-hidden="true"></i>Send</button>
                        </span>
                    </div>
                  </form>
                </div>
                
        </div>
      </div>
    </div>
  </div>
</div>
           <style type="text/css">
              .input-sm{
                padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
              }
.chatperson:hover{
  text-decoration: none;
  border-bottom: 1px solid orange;
}
.namechat {
    display: inline-block;
    vertical-align: middle;
}
.chatperson .chatimg img{
  width: 40px;
  height: 40px;
  background-image: url('http://i.imgur.com/JqEuJ6t.png');
}
.chatperson .pname{
  font-size: 18px;
  padding-left: 5px;
}
.chatperson .lastmsg{
  font-size: 12px;
  padding-left: 5px;
  color: #ccc;
}


.col-md-2, .col-md-10{
    padding:0;
}
.panel{
    margin-bottom: 0px;
}
.chat-window{
    bottom:0;
    position:fixed;
    float:right;
    margin-left:10px;
}
.chat-window > div > .panel{
    border-radius: 5px 5px 0 0;
}
.icon_minim{
    padding:2px 10px;
}
.msg_container_base{
  background: #e5e5e5;
  margin: 0;
  padding: 0 10px 10px;
  max-height:300px;
  overflow-x:hidden;
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
}
.msg_receive{
    padding-left:0;
    margin-left:0;
}
.msg_sent{
    padding-bottom:20px !important;
    margin-right:0;
}
.messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width:100%;
}
.messages > p {
    font-size: 13px;
    margin: 0 0 0.2rem 0;
  }
.messages > time {
    font-size: 11px;
    color: #ccc;
}
.msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
}
img {
    display: block;
    width: 100%;
}
.avatar {
    position: relative;
}
.base_receive > .avatar:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border: 5px solid #FFF;
    border-left-color: rgba(0, 0, 0, 0);
    border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
  justify-content: flex-end;
  align-items: flex-end;
}
.base_sent > .avatar:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 0;
    border: 5px solid white;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
}

.msg_sent > time{
    float: right;
}



.msg_container_base::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}
.msg_container_base::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}
.msg_container_base::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
.btn-group.dropup{
    position:fixed;
    left:0px;
    bottom:0;
}
  .ticketno {
    margin-top: -23px;
}
.avatar img {
    border-radius: 50%;
    max-width: 45px;
}
                  </style>
<?php include_once("js.php");?>