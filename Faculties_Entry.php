<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$fa_id=$_POST['facid'];
	$ti_d=$_POST['teachid'];	
	

$sql_ins=mysqli_query($conn,"INSERT INTO fa 
				         	VALUES(
							'$fa_id',
							'$ti_d'
							)");
if($sql_ins==true)
	$msg="1 Row Inserted";
else{
echo "hello";
	$msg="Insert Error:".mysqli_connect_error();}
	
}

if(isset($_POST['btn_upd'])){
	$fa_id=$_POST['facid'];
	$t_id=$_POST['teachid'];	
	
	$sql_update=mysqli_query($conn,"UPDATE fa SET fa_id= '$fa_id',
							t_id='$t_id'
							WHERE
								fa_id='$id'
							");
	if($sql_update==true)
		echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		$msg="Update Failed...!";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php

if($opr=="upd")
{
$sql_upd=mysqli_query($conn,"SELECT * FROM fa WHERE fa_id='$id' ");
if (!$sql_upd) {
    printf("Error: %s\n", mysqli_connect_error($conn));
    exit();
}
	$rs_upd=mysqli_fetch_array($sql_upd);
	
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-hdd"></span> Faculty Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update the faculties detail to record into database.</p>
			</div>


    <form method="post" >
        <div class='faculty_pos' style="margin: auto;width: 250px;">
        
            <input type="text" style="margin: auto;width: 250px;" class="form-control" name="facid" value="<?php echo $rs_upd['fa_id'];?>"/>
            <input type="text" style="margin: auto;width: 250px;" class="form-control" name="teachid" value="<?php echo $rs_upd['t_id'];?>"/>
        <br>
            
        
            <input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Update" />&nbsp;&nbsp;&nbsp;
	    <input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
        </div>
    </form>

<?php	
}
else
{
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-hdd"></span> Faculty Advisor Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add new faculty advisor detail to record into database.</p>
			</div>


<div class="container_form"  style="margin:auto;width:50%; float:none;">
    <form method="post">
        <div class='faculty_pos' style="margin:auto;width:50%;">
            
            <input type="text" style="width: 250px;" class="form-control" name="facid" placeholder='Faculties_id'/><br>
	    <input type="text" style="width: 250px;" class="form-control" name="teachid" placeholder='Teacher_id'/><br>
        
            <input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
	    <input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
        </div>
    </form>
</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>