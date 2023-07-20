<?php    
$servername = "localhost";
$username = "root";
$password = "";
$db = "cms";
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
?>

<?php

	$msg="";
	$opr="";
	$id="";
	$aph="";
	
	if(isset($_GET["opr"])){
	$opr=$_GET["opr"];}
	
if(isset($_GET["rs_id"])){
	$id=$_GET["rs_id"];}
	
//--------------add data-----------------
if(isset($_POST["btn_sub"])){
	$tid = $_POST["teachid"];
	$f_name=$_POST["fnametxt"];
	$m_name=$_POST["mnametxt"];
	$l_name=$_POST["lnametxt"];
	$gender=$_POST["genderrdo"];
	$dob=$_POST["dd"]."-".$_POST["mm"]."-".$_POST["yy"];
	$pob=$_POST["pobtxt"];
	$addr=$_POST["addrtxt"];
	$ph = $_POST["mph"];
	if($_POST["amph"])
	$aph = $_POST["amph"];
	$degree=$_POST["degree"];
	$salary=$_POST["slarytxt"];
	$married=$_POST["marriedrdo"];
	$mail=$_POST["emailtxt"];
	$note=$_POST["attend"];
$present=$_POST["present"];
$tnod=$_POST["tnod"];	

$sql_ins = mysqli_query($conn,"INSERT INTO teacher values(
							'$tid',
							'$f_name','$m_name',
							'$l_name',
							'$gender',
							'$dob',
							'$pob',
							'$addr',
							'$degree',
							'$salary',
							'$married',				
							'$mail',
							'$note','$present','$tnod')");
if(!$aph)
$sqll=mysqli_query($conn,"INSERT INTO teacher_phone VALUES ('$ph','$tid')");
else
{
$sqll=mysqli_query($conn,"INSERT INTO teacher_phone VALUES ('$ph','$tid')");
$sqll=mysqli_query($conn,"INSERT INTO teacher_phone VALUES ('$aph','$tid')");
}
if($sql_ins==true){
	$msg="1 Row Inserted";}	
	
else{
	$msg= "Insert Error:".mysqli_connect_error();
}
}
if(isset($_POST["btn_upd"])){
	$f_name=$_POST["fnametxt"];
	$m_name=$_POST["mnametxt"];
	$l_name=$_POST["lnametxt"];
	$gender=$_POST["genderrdo"];
	$pob=$_POST["pobtxt"];
	$addr=$_POST["addrtxt"];
	$ph=$_POST['mph'];
	$mph=$_POST['amph'];
	$degree=$_POST["degree"];
	$salary=$_POST["slarytxt"];
	$married=$_POST["marriedrdo"];
	$mail=$_POST["emailtxt"];
	$note=$_POST["attend"];
    $present=$_POST["present"];
    $tnod=$_POST["tnod"];	
    $hello = "UPDATE teacher set
                        Fname='$f_name' ,
			            Mname='$m_name' ,
                        Lname='$l_name' ,
                        sex='$gender' ,
                        native_place='$pob' ,
                        Addr='$addr' ,
                        Qualification='$degree' ,
                        Salary='$salary' ,
                        Marital_status='$married' ,
                        Email='$mail',
                        Attendance='$note',Present='$present',Total_days='$tnod'
                    WHERE t_id='$id'";
$sql_update=mysqli_query($conn,$hello);
$sqll=mysqli_query($conn,"select * from teacher_phone where t_id = '$id'");
if (!$sqll) {
    printf("Error: %s\n", mysqli_connect_error($conn));
    exit();}
$hs_upd=mysqli_fetch_array($sqll);
	
$hii=$hs_upd?$hs_upd['t_ph_id']:"";
$hs_upd=mysqli_fetch_array($sqll);
$hi=$hs_upd?$hs_upd['t_ph_id']:"";
	if($hi && $mph)
	{
	$hs_upd=mysqli_fetch_array($sqll);
	$sql_update=mysqli_query($conn,"UPDATE teacher_phone SET 
								t_ph_id='$ph'
							WHERE
								t_id='$id' and t_ph_id='$hii'
							");
	$sql_update=mysqli_query($conn,"UPDATE teacher_phone SET 
								t_ph_id='$mph'
							WHERE
								t_id='$id' and t_ph_id = '$hi'
							");
	}
	else if($hi && !$mph)
	{
$sql_update=mysqli_query($conn,"UPDATE teacher_phone SET 
								t_ph_id='$ph'
							WHERE
								t_id='$id' and t_ph_id='$hii'
							");
		$sql_update=mysqli_query($conn,"DELETE FROM teacher_phone where t_id='$id' and t_ph_id='$hi'");
	}
	else if(!$hi && $mph)
	{
$sql_update=mysqli_query($conn,"UPDATE teacher_phone SET 
								t_ph_id='$ph'
							WHERE
								t_id='$id' and t_ph_id='$hii'
							");
		$sql_update=mysqli_query($conn,"INSERT INTO teacher_phone VALUES ('$mph','$id')");
	}
else
{
$sql_update=mysqli_query($conn,"UPDATE teacher_phone SET 
								t_ph_id='$ph'
							WHERE
								t_id='$id' and t_ph_id='$hii'
							");
}

if($sql_update)
	echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;'>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else{
		 echo "Failed to update";
		$msg="Update Failed...!";
	     }
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Welcome to College Management system</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php
if($opr=="upd")
{
    $sql_upd=mysqli_query($conn,"SELECT * FROM teacher WHERE t_id='$id'");
if (!$sql_upd) {
    printf("Error: %s\n", mysqli_connect_error($conn));
    exit();}
    $rs_upd=mysqli_fetch_array($sql_upd);$idd = $rs_upd['t_id'];
	$sqll=mysqli_query($conn,"select * from teacher_phone where t_id = '$idd'");
if (!$sqll) {
    printf("Error: %s\n", mysqli_connect_error($conn));
    exit();}
$hs_upd=mysqli_fetch_array($sqll);

?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Teachers Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you"ll update your teachers records into database.</p>
			</div>


<div class="container_form">
    <form method="post">
				
<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" value="<?php echo $rs_upd["Fname"];?>" />
<input type="text" name="mnametxt" class="form-control" value="<?php echo $rs_upd["Mname"];?>" />
					<input type="text" name="lnametxt" class="form-control" value="<?php echo $rs_upd["Lname"];?>" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="genderrdo" value="Male"<?php if($rs_upd["sex"]=="MALE") echo "checked";?> /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="genderrdo" value="Female"<?php if($rs_upd["sex"]=="FEMALE") echo "checked";?> /> <span class="p_font">&nbsp;Female</span>
				</div><br>
				
				<div class="teacher_bdayPlace_pos">
					<input type="text" name="pobtxt" class="form-control" value=" <?php echo $rs_upd["native_place"]; ?>" />
				</div><br>
				
				<div class="teacher_address_pos">
					<input type="text" name="addrtxt" class="form-control" value=" <?php echo $rs_upd["Addr"];?>" />
				</div><br>
				<div class="teacher_address_pos">
					<input type="text" name="mph" class="form-control" value='<?php echo $hs_upd["t_ph_id"];?>' />
				</div><br>
				<?php
				$hs_upd=mysqli_fetch_array($sqll); ?>
				<div class="teacher_address_pos">
					<input type="text" name="amph" class="form-control" value='<?php echo $hs_upd?$hs_upd["t_ph_id"]:"";?>' />
				</div><br>
				<div class="teacher_degree_pos">
					<span class="p_font" style="float: left; margin-left: 88px;">Teacher"s qualification: </span>
					<div class="select_style" style="border-left-width: 1px; margin-left: 0px; width: 102px; margin-right: 60px; margin-top: 0px; margin-bottom: 0px;">
    					<select name="degree">
       						<option>Degree</option>
       						<?php
                                $mm=array("Bachelor","Master","P.HD");
                                $i=0;
                                foreach($mm as $mon){
                                    $i++;
										if($mon==$rs_upd["degree"])
											$iselect="selected";
										else
											$iselect="";
											
										echo"<option value='$mon' $iselect> $mon</option>";		
                                }
                            ?>			     					
                        </select>
					</div>
				</div><br>
				
				<div class="teacher_salary_pos">
					<input type="text" name="slarytxt" class="form-control" value="<?php echo $rs_upd["Salary"];?>" />
				</div><br>
				
				<div class="teacher_married_pos">
					<span class="p_font">Married</span>
					<input type="radio" name="marriedrdo" value="Yes"<?php if($rs_upd["Marital_status"]=="YES") echo "checked";?> /> <span class="p_font">&nbsp;Yes</span>
					<input type="radio" name="marriedrdo" value="No"<?php if($rs_upd["Marital_status"]=="NO") echo "checked";?> /> <span class="p_font">&nbsp;No</span>
				</div><br>
				
				
				<div class="teacher_mail_pos">
					<input type="text" name="emailtxt" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}+\.[a-z]{2,}$" class="form-control" value="<?php echo $rs_upd["Email"];?>" />
				</div><br>
				
				<div class="teacher_note_pos">
					<input type="text" name="attend" class="form-control" value="<?php echo $rs_upd["Attendance"];?>" />
				</div><br>
<div class="teacher_note_pos">
					<input type="text" name="present" class="form-control" value="<?php echo $rs_upd["Present"];?>" />
				</div><br>
<div class="teacher_note_pos">
					<input type="text" name="tnod" class="form-control" value="<?php echo $rs_upd["Total_days"];?>" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_upd" class="btn btn-primary btn-large" value="Update" />;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>
			</div>
		</div>
	</div>
<?php	
}
else
{
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Teachers Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you"ll add new teachers detail to record into database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div> <input type="text" name="teachid" class="Student_id" placeholder="Teacher_id" /></div>
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" placeholder="First name" />
					<input type="text" name="mnametxt" class="form-control" placeholder="Middle name" />
					<input type="text" name="lnametxt" class="form-control" placeholder="Last name" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="genderrdo" value="MALE" /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="genderrdo" value="FEMALE" /> <span class="p_font">&nbsp;Female</span>
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">DOB: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="dd">
       						<option>date</option>
       						<?php
                        for($i=1;$i<=31;$i++){
                        ?>
                        <option value="<?php echo $i; ?>">
                        <?php
                        if($i<10)
                            echo"0".$i;
                        else
                            echo"$i";	  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					<div class="select_style">
    					<select name="mm">
       						<option>Month</option>
       						<?php
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
                                echo"<option value='$i'> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
				<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
						</select>
					</div>
					
					
					
		     	</div><br><br>
		     	
				<div class="teacher_bdayPlace_pos">
					<input type="text" name="pobtxt" class="form-control" placeholder="Place of birth" />
				</div><br>
				
				<div class="teacher_address_pos">
					<input type="text" name="addrtxt" class="form-control" placeholder="Address" />
				</div><br>
				<div class="teacher_address_pos">
					<input type="text" name="mph" class="form-control" placeholder="Phone no." />
				</div><br>
				<div class="teacher_address_pos">
					<input type="text" name="amph" class="form-control" placeholder="Alternate Phone no." />
				</div><br>
				<div class="teacher_degree_pos">
					<span class="p_font" style="float: left; margin-left: 88px;">Teacher"s qualification: </span>
					<div class="select_style" style="border-left-width: 1px; margin-left: 0px; width: 102px; margin-right: 60px; margin-top: 0px; margin-bottom: 0px;">
    					<select name="degree">
       						<option>Degree</option>
       						<?php
                                $mm=array("Bachelor","Master","P.HD");
                                $i=0;
                                foreach($mm as $mon){
                                    $i++;
										echo"<option value='$mon'> $mon</option>";
                                    //echo"<option value="$i"> $mon</option>";		
                                }
                            ?> 					     					
                        </select>
					</div>
				</div><br>
				
				<div class="teacher_salary_pos">
					<input type="text" name="slarytxt" class="form-control" placeholder="Salary" />
				</div><br>
				
				<div class="teacher_married_pos">
					<span class="p_font">Married</span>
					<input type="radio" name="marriedrdo" value="YES"/> <span class="p_font">&nbsp;YES</span>
					<input type="radio" name="marriedrdo" value="NO"/> <span class="p_font">&nbsp;NO</span>
				</div><br>
			
				<div class="teacher_mail_pos">
					<input type="text" name="emailtxt" class="form-control" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}+\.[a-z]{2,}$" placeholder="Email address" />
				</div><br>
					<div class="teacher_name_pos">
					<input type="text" name="attend" class="form-control" placeholder="attend%" />
					<input type="text" name="present" class="form-control" placeholder="Present" />
					<input type="text" name="tnod" class="form-control" placeholder="Total no. of days" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                </form>
			</div>
		</div>
	</div>
<?php
}
?>

</body>
</html>