<?php
$id1="";
$id2="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id1=$_GET['rs_id'];
if(isset($_GET['dd_id']))
	$id2=$_GET['dd_id'];
				
if(isset($_POST['btn_sub'])){
	
	$grade=$_POST['gradetxt'];
	
	$credits=$_POST['credits'];
$s_id=$_POST['sid'];$c_id = $_POST['cid'];

$sql_ins=mysqli_query($conn,"INSERT INTO gradecard 
						VALUES(
'$grade' ,
							
							'$credits',
							'$s_id','$c_id'
							
							)
					");
$sql_ins=mysqli_query($conn,"INSERT INTO register VALUES('$s_id','$c_id')");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_connect_error();
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
$grade =$_POST['gradetxt'];$credits=$_POST['credits'];
	
	
	$s_id=$_POST['sid'];
	$c_id=$_POST['cid'];
	

	
	$sql_update=mysqli_query($conn,"UPDATE gradecard SET
							grade='$grade' ,
                                                        credits='$credits' ,
									
							s_id='$s_id',c_id='$c_id' 
						WHERE s_id='$id1' and c_id='$id2'

					");
	$sql_update=mysqli_query($conn,"UPDATE register SET
							
									
							s_id='$s_id',c_id='$c_id' 
						WHERE s_id='$id1' and c_id='$id2'

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
	$sql_upd=mysqli_query($conn,"SELECT * FROM gradecard WHERE s_id='$id1' and c_id='$id2'");
if (!$sql_upd) {
    printf("Error: %s\n", mysqli_connect_error($conn));
    exit();
}
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-star-empty"></span> Grade's Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your grade's records into database.</p>
			</div>
                  <form method="post">    
                 
         
                    
                    <div class="teacher_note_pos" style="margin:auto;width:350px;">
                	<input type="text" name="gradetxt" class="form-control" id="textbox" value="<?php echo $rs_upd['grade'];?> "/>
                    </div><br>
                    
                    <div class="teacher_note_pos" style="margin:auto;width:350px;">
                	<input type="text" name="credits" class="form-control" id="textbox" value="<?php echo $rs_upd['credits'];?>" />
                    </div><br>
 <div class="teacher_note_pos" style="margin:auto;width:350px;">
                	<input type="text" name="sid" class="form-control" id="textbox" value="<?php echo $rs_upd['s_id'];?> "/>
                    </div><br>
                    
                    <div class="teacher_note_pos" style="margin:auto;width:350px;">
                	<input type="text" name="cid" class="form-control" id="textbox" value="<?php echo $rs_upd['c_id'];?>" />
                    </div><br>
                    
                   
                    <div>
                	<input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in" title="Update"  />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                    </div>
                    </div>
   </div>
</div><!-- end of style_informatios -->
<?php	
}
else
{
?>
	
    <div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-star-empty"></span> Grade's Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll entry your grade's records into database.</p>
			</div>
                  <form method="post">    
           	

                <div class="teacher_note_pos" style="margin:auto;width:350px;">
                	<input class="form-control" type="text" name="gradetxt" id="textbox" placeholder='Grade' />
                </div><br>
            	 <div class="teacher_note_pos" style="margin:auto;width:350px;">
                	<input class="form-control" type="text" name="credits" id="textbox" placeholder='Credits' />
                </div><br>
                <div class="teacher_note_pos" style="margin:auto;width:350px;">
                	<input type="text" class="form-control" name="sid"  id="textbox" placeholder='Student ID'/>
                </div><br>
 
            
                <div class="teacher_note_pos" style="margin:auto;width:350px;">
                	<input type="text" class="form-control" name="cid"  id="textbox" placeholder='Course ID'/>
                </div><br>

<div>
                    <input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                    <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                	
                </div>

          
                </form>
                </div>
    </div>
<?php
}
?>
</body>
</html>