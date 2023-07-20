<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id'])){
	$id1=$_GET['rs_id'];
}
if(isset($_GET['dd_id'])){
	$id2=$_GET['dd_id'];
}
	
	if($opr=="del")
{
	$del_sql=mysqli_query($conn,"DELETE FROM gradecard WHERE s_id='$id1' and c_id='$id2'");
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
<title>Untitled Document</title>
</head>

<body>
<div class="btn_pos">
        <form method="post">
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search grade.." />
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" value="Search"/>&nbsp;&nbsp;
            <a href="?tag=score_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a>
            </div>
        </form>
    </div><br><br>
    
<br />
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">Grade</th>
            <th style="text-align: center;">Credits</th>
            <th style="text-align: center;">Student ID</th>
            <th style="text-align: center;">Course ID</th>
        </tr>
        </thead>
        <?php
		
		$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($conn,"SElECT * FROM gradecard WHERE s_id  like '%$key%' or c_id like '%$key%'");
	else
        $sql_sel=mysqli_query($conn,"SELECT * FROM gradecard");
		
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    ?>
      <tr>
            <td><?php echo $row['grade'];?></td>
            <td><?php echo $row['credits'];?></td>
            <td><?php echo $row['s_id'];?></td>
            <td><?php echo $row['c_id'];?></td>
            <td align="center"><a href="?tag=score_entry&opr=upd&rs_id=<?php echo $row['s_id'];?>&dd_id=<?php echo $row['c_id'];?>">update</a></td>
            <td align="center"><a href="?tag=view_scores&opr=del&rs_id=<?php echo $row['s_id'];?>&dd_id=<?php echo $row['c_id'];?>"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
        </tr>
        
    <?php
		
    }
    ?>
    </table>
</div>
</body>
</html>