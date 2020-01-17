<?php
require_once "conn.php";
$success ='';
if (isset($_POST['signup'])) { 
		//echo "I am in"; die();
		
		$msg= mysqli_real_escape_string($conn,$_POST['message']);
		$mess = "0";
		$sql = "INSERT INTO message_content (message_con, message_id) VALUES('$msg','$mess')";
		//echo  $sql; die();
if(mysqli_query($conn,$sql))
{
	$success="Message sent successfully...";
	// Print auto-generated id
	//echo "New record has id: " . mysqli_insert_id($conn);
	//$last = mysqli_insert_id($conn);	
	$data_sql = "SELECT * FROM message_content order by message_id desc limit 1,1";
$results = mysqli_query($conn, $data_sql);

if (mysqli_num_rows($results) > 0) {
    // output data of each row
while($rows = mysqli_fetch_assoc($results)) { 
 $last = $rows["message_id"]; 
 $update_sql = "update message_content set is_new = '1' where message_id='".$last."'";
	//echo  $update_sql; die();
	$retval = mysqli_query($conn,$update_sql);
}}
	
	
}
else
{
		echo mysqli_error($conn);
}
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Send Message App</title>
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
	<header role="banner" >
		<a href="#"><h1 id="header-logo">dfsfsfsf</h1></a>
		<h1>What is Lorem Ipsum?</h1>
	</header>
	<nav role="navigation">
		  <ul class="main">
			<li><a href="#"><div class="roundcorners "> </div></a><span class="numbers">&times;1</span></li>
			<li><a href="#"><div class="roundcorners "> </div></a><span class="numbers">&times;2</span></li>
			<li><a href="#"><div class="roundcorners "> </div></a><span class="numbers">&times;3</span></li>
			<li><a href="#"><div class="roundcorners "> </div></a><span class="numbers">&times;4</span></li>
		  </ul>
	</nav>
	
	<div class="container">
		<div class="fixed">
		<?php 
		$sql = "SELECT * FROM message_content order by message_id desc";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		?>
		<span class="content">		
		<?php
        echo $row["message_con"];
		if ($row["is_new"] == 0) {?>
		<span class="active"> </span>
	<?php } ?>
		</span>
		<?php
    }
} 
		?>
		
			
				
	</div>
	
    <div class="flex-item"><h1> <strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</strong></h1> <br />
	Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
	
	<div class="flex-roundcorners "> </div><span class="flex-content"> <em> ddddd</em></span>
	<?php if($success!='')?> <div id="messageOutput"><?php { echo $success;?></div> <?php } ?>
	 <!--<div class="send-message">   
	  <form method="post" action="#" >
		<div class="form-container">
  <input type="text" class="text_input" />
  <button value="Save" class="btn">CLICK</button>
</div>
	  </form>	 
	 </div> -->
	 
	    <div id="messagebar">
            <form class="form-wrapper" method="post" action="#">
                <div class="input-wrapper">				
                    <input type="text" placeholder="Message" required name="message"/>
                </div>
                <button type="submit" name="signup" >Submit</button>
				
            </form>
        </div>
	</div>
</div>
   
</body>
</html>
