<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{	$del1 = "delete from gradecard where c_id='$id'";
	$del2 = "delete from register where c_id='$id'";
	$del3 = "delete from teaches where c_id = '$id'";
	$del_sql=mysqli_query($conn,$del1);
	$del_sql=mysqli_query($conn,$del2);
	$del_sql=mysqli_query($conn,$del3);
	$del_sql=mysqli_query($conn,"DELETE FROM course WHERE c_id='$id'");
	if($del_sql)
		$msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	else
		$msg="Could not Delete :".mysqli_connect_error();	
			
}
	echo $msg;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div class="btn_pos">
        <form method="post">
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search Course" />
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" value="Search"/>&nbsp;&nbsp;
            <a href="?tag=subject_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a>
            </div>
        </form>
    </div><br><br>
<br />

<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">Course Id</th>
            <th style="text-align: center;">Course Name</th>
            </tr>
        </thead>
        
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($conn,"SElECT * FROM course WHERE c_id  like '%$key%'");
	else
        $sql_sel=mysqli_query($conn,"SELECT * FROM course");
		
    $i=0;
	$row=mysqli_fetch_array($sql_sel);
    while($row){
    $i++;
    ?>
      <tr>
            <td><?php echo $row['c_id'];?></td>
            <td><?php echo $row['c_name'];?></td>
            <td align="center"><a href="?tag=subject_entry&opr=upd&rs_id=<?php echo $row['c_id'];?>" title="Update">update</a></td>
            <td align="center"><a href="?tag=view_subjects&opr=del&rs_id=<?php echo $row['c_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
        </tr>
    <?php	
	$row=mysqli_fetch_array($sql_sel);
    }
    ?>
</table>
</div><!--end of content_input -->
</body>
</html>