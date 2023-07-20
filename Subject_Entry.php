<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$c_id=$_POST['cid'];
	$c_name=$_POST['cname'];	
	
	

$sql_ins=mysqli_query($conn,"INSERT INTO course 
						VALUES(
							
							'$c_id' ,
							'$c_name')");
	
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_connect_error();
	
}

if(isset($_POST['btn_upd'])){
	$c_id=$_POST['cid'];
	$c_name=$_POST['cname'];
	
	
	
	$sql_update=mysqli_query($conn,"UPDATE course SET
							
							c_id='$c_id' ,c_name='$c_name'
					 
						WHERE c_id='$id'

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
	$sql_upd=mysqli_query($conn,"SELECT * FROM course WHERE c_id='$id'");
if (!$sql_upd) {
    printf("Error: %s\n", mysqli_connect_error($conn));
    exit();
}
	$rs_upd=mysqli_fetch_array($sql_upd);
	
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Course's Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your subject's records into database.</p>
			</div>
                  <form method="post" >    
     
            
                            <div class="teacher_note_pos" style="margin:auto;width:250px;">
	 <input type="text" class="form-control" style="margin: auto;width: 250px;" name="cid"  id="textbox" value="<?php echo $rs_upd['c_id'];?>" />
                                <input type="text" class="form-control" style="margin: auto;width: 250px;" name="cname"  id="textbox" value="<?php echo $rs_upd['c_name'];?>" />
                            </div><br>
            
                            <div>
                                <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
                                <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                                
                            </div>
                  </form>            
    	</div>
    </form>
</div>
<?php
}
else
{
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Course Entry Form</h1></div>
  			<div class="panel-body">
                        <form method="post">    
			<div class="container">
				<p style="text-align:center;">Here, you'll add new Course detail to record into database.</p>
			</div>

      <div class="teacher_note_pos" style="margin:auto; width:350px;">
                	<input type="text" class="form-control" name="cid"  id="textbox" placeholder="Course_id"/>
                </div><br>
         
                <div class="teacher_note_pos" style="margin:auto; width:350px;">
                	<input type="text" class="form-control" name="cname"  id="textbox" placeholder="Course name"/>
                </div><br>
		
                
            
                <div>
                	<input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                        <input type="reset" class="btn btn-primary btn-large" style="margin-left: 9px;" value="Cancel" id="button-in"/>
                </div>
           </form>
    	</div>
    </form>
</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>