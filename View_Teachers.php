<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{	$del1 = "DELETE from teacher_phone where t_id = '$id'";
	$del2 = "DELETE from teaches where t_id = '$id'";
	$del3 = "UPDATE student set fa_id = NULL where fa_id in (select fa_id from fa where t_id='$id')";
	$del4 = "DELETE from fa where t_id = '$id'";
	$del5 = "Delete from teacher where t_id = '$id'";
	$del_sql=mysqli_query($conn,$del1);
	$del_sql=mysqli_query($conn,$del2);
	$del_sql=mysqli_query($conn,$del3);
	$del_sql=mysqli_query($conn,$del4);
	$del_sql=mysqli_query($conn,$del5);
	if($del_sql)
		$msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	else{
		$msg="Could not Delete :".mysqli_connect_error();	}
			
}
	echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>

    <div class="btn_pos">
        <form method="post">
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search Teacher.." />
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" value="Search"/>&nbsp;&nbsp;
            <a href="?tag=teachers_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a>
            </div>
        </form>
    </div><br><br>
    
<br />
<div class="table_margin" style = "width:1700px;">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">Teacher_id</th>
            <th style="text-align: center;" width="50%";
height="50%";>Teacher Name</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">DOB</th>
            <th style="text-align: center;">Native Place</th>
            <th style="text-align: center;">Address</th>
		<th style="text-align: center;">Mobile no.</th>
		<th style="text-align: center;">Alternate Mobile no.</th>
            <th style="text-align: center;">Qualification</th>
            <th style="text-align: center;">Salary</th>
            <th style="text-align: center;">Marital status</th>
            <th style="text-align: center;">E-mail</th>
            <th style="text-align: center;">Attendance%</th>
            <th style="text-align: center;">Present</th>
<th style="text-align: center;">Total days</th>
        </tr>
        </thead>
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($conn,"SElECT * FROM teacher WHERE Fname like '%$key%' or Mname like '%$key%' or Lname like '%$key%' or t_id  like '%$key%'");
	else
        $sql_sel=mysqli_query($conn,"SELECT * FROM teacher");
		
    $i=0;
$row=mysqli_fetch_array($sql_sel);
    while($row){
$idd = $row['t_id'];
$ph = mysqli_query($conn,"select * from teacher_phone where t_id = '$idd'");
$kkk = mysqli_fetch_array($ph);
    $i++;
    ?>
      <tr>
            <td><?php echo $row['t_id'];?></td>
            <td><?php echo $row['Fname']." ".$row['Mname']." ".$row['Lname'];?></td>
            <td><?php echo $row['sex'];?></td>
            <td><?php echo $row['DOB'];?></td>
            <td><?php echo $row['native_place'];?></td>
            <td><?php echo $row['Addr'];?></td>
		<td><?php echo $kkk?$kkk['t_ph_id']:"";?></td>
	<?php $kkk=mysqli_fetch_array($ph); ?>
	
		<td><?php echo $kkk?$kkk['t_ph_id']:"";?></td>
            <td><?php echo $row['Qualification'];?></td>
            <td><?php echo $row['Salary'];?></td>
            <td><?php echo $row['Marital_status'];?></td>
            <td><?php echo $row['Email'];?></td>
            <td><?php echo $row['Attendance'];?></td>
<td><?php echo $row['Present'];?></td>
<td><?php echo $row['Total_days'];?></td>
            <td><a href="?tag=teachers_entry&opr=upd&rs_id=<?php echo $row['t_id'];?>" title="Update">update</a></td>
            <td><a href="?tag=view_teachers&opr=del&rs_id=<?php echo $row['t_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
        </tr>
    <?php
$row=mysqli_fetch_array($sql_sel);	
    }
    ?>
    </table>
</div>
</body>
</html>

<!--
<td><a href="?tag=teachers_entry"><input type="button" title="Add new Teachers" name="butAdd" value="Add New" id="button-search" /></a></td>
        <td><input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Teacher" /></td>

-->