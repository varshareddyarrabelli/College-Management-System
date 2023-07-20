<?php
	session_start();
	
	require("conection/connect.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysqli_query($conn,"SELECT * FROM users WHERE username='".$_POST['unametxt']."' AND pass='".$_POST['pwdtxt']."'");				
		$cout;
if(!$sql || mysqli_num_rows($sql) == 0){
    $cout = mysqli_num_rows($sql);
}
			if($cout==0){
				$row=mysqli_fetch_array($sql);
					if($row['type']=="admin")
						header("location: everyone.php");
					else
						$msg="Invalid login aunthentication, try again!.....";	
						
					
			}
			
			else
					$msg="Invalid login authentication, try again!";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/logg.css" />
<title>NATIONAL INSTITUTE OF TECHNOLOGY CALICUT</title>
</head>

<body>
	
<div style="color:white;font-size:50px; text-align:center;">COLLEGE MANAGEMENT SYSTEM</div>	
	<div class="container">

    	<div class="container2">
    		<div class="h1_pos">
				<p style="font-size:50px;color:white" >
			
					Admins Only
</p>
    		</div>
    		<form method="post">
                    <input type="text" class="form-control" name="unametxt" placeholder="Username" title="Enter username here"  /><br>
                    <input type="password" class="form-control" name="pwdtxt" placeholder="Password" title="Enter username here" /><br>
    		<input type="submit" href="#" class="btn btn-default" name="btn_log" value="Sign in" style="float: right;"/>
    		
    		</form>
    	</div>
    </div>
	
        <h2 style="color: white; text-align: center;">
            <?php echo $msg; ?>
        </h2>  
</body>
</html>