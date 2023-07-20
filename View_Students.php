<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{	$del1 = "DELETE from student_phone where s_id = '$id'";
$del2 = "DELETE from register where s_id ='$id'";
$del3 = "DELETE from gradecard where s_id ='$id'";
$del4 = "DELETE from student where s_id = '$id'";
	$del_sql=mysqli_query($conn,$del1);
$del_sql=mysqli_query($conn,$del2);
$del_sql=mysqli_query($conn,$del3);
$del_sql=mysqli_query($conn,$del4);
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
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search Student.." />
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" name="btnsearch" value="Search"/>&nbsp;&nbsp;
            <a href="?tag=student_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a>
            </div>
        </form>
    </div><br><br>
     
            
<div class="table_margin" style = "width:1950px;">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">Student_ID</th>
            <th style="text-align: center;">Student Name</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">Date of Birth</th>
            <th style="text-align: center;">Email</th>
            <th style="text-align: center;">Address</th>
		<th style="text-align: center;">Mobile no.</th>
		<th style="text-align: center;">Alternate Mobile no.</th>
            <th style="text-align: center;">Attendance</th>
            <th style="text-align: center;">Present</th>
            <th style="text-align: center;">totaldays</th>
		<th style="text-align: center;">fa_id</th>
            <th style="text-align: center;" colspan="2">Operation</th>
        </tr>
        
        <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($conn,"SElECT * FROM student WHERE fname  like '%$key%' or mname like '%$key%' or lname like '%$key%' or s_id like '%$key%'");
	else
		 $sql_sel=mysqli_query($conn,"SELECT * FROM student");
    $i=0;
$row=mysqli_fetch_array($sql_sel);
    while($row){
$idd = $row['s_id'];
$ph = mysqli_query($conn,"select * from student_phone where s_id = '$idd'");
$kkk = mysqli_fetch_array($ph);
    $i++;
    ?>
      <tr>
            <td><?php echo $row['s_id'];?></td>
            <td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
            <td><?php echo $row['sex'];?></td>
            <td><?php echo $row['dob'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['addr'];?></td>

	<td><?php echo $kkk?$kkk['s_ph_id']:"";?></td>
	<?php $kkk=mysqli_fetch_array($ph); ?>
	
		<td><?php echo $kkk?$kkk['s_ph_id']:"";?></td>
	
	    <td><?php echo $row['attendance'];?></td>
	    
<td><?php echo $row['present'];?></td>
            <td><?php echo $row['totaldays'];?></td>
            <td><?php echo $row['fa_id'];?></td>
            <td><a href="?tag=student_entry&opr=upd&rs_id=<?php echo $row['s_id'];?>" title="Update" id='hello'>update</a></td>
            <td><a href="?tag=view_students&opr=del&rs_id=<?php echo $row['s_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
             
        </tr>
    <?php	
$row=mysqli_fetch_array($sql_sel);
    }
	
    ?>
    </table>
</form>
</div>
</body>
</html>


<!--
<td>
        	<a href="?tag=student_entry"><input type="button" title="Add new student" name="butAdd" value="Add New" id="button-search" /></a>
        </td>
        <td>
        	<input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/>
        </td>
        <td style="float:right">
        	<input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Student" />
        </td>
-->