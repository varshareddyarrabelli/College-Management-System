<?php
$id="";
$opr="";
$aph = "";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	$s_id=$_POST["sid"];
	$f_name=$_POST["fnametxt"];
	$m_name=$_POST["mnametxt"];$l_name=$_POST["lnametxt"];
	$gender=$_POST["gender"];
	$dob=$_POST["dd"]."-".$_POST["mm"]."-".$_POST["yy"];
	$mail=$_POST["mail"];
	$addr=$_POST["addrtxt"];
	$ph = $_POST["mph"];
	if($_POST["amph"])
	$aph = $_POST["amph"];
	$attend=$_POST["attendance"];
	$present=$_POST["present"];
	$tnod=$_POST["tnod"];	
	$fa_id=$_POST["faid"];

$sql_ins=mysqli_query($conn,"INSERT INTO student 
						VALUES(
							'$s_id',
							'$f_name','$m_name',
							'$l_name' ,
							'$gender',
							'$dob',
							'$mail',
							'$addr',
							'$attend','$present',
							'$tnod',
							'$fa_id'
							)");
if(!$aph)
$sqll=mysqli_query($conn,"INSERT INTO student_phone VALUES ('$ph','$s_id')");
else
{
$sqll=mysqli_query($conn,"INSERT INTO student_phone VALUES ('$ph','$s_id')");
$sqll=mysqli_query($conn,"INSERT INTO student_phone VALUES ('$aph','$s_id')");
}
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_connect_error();
	
}
//------------------update data----------
if(isset($_POST['btn_upd'])){
	$f_name=$_POST['fnametxt'];
	$m_name=$_POST['mnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$dob=$_POST['dd']."-".$_POST['mm']."-".$_POST['yy'];
	$mail=$_POST['mail'];
	$addr=$_POST['addrtxt'];
	$ph=$_POST['mph'];
	$mph=$_POST['amph'];
	$attendance=$_POST['attend'];
	$present=$_POST['present'];
	$totaldays=$_POST['tnod'];	
	
	$sql_update=mysqli_query($conn,"UPDATE student SET 
								fname='$f_name',mname='$m_name',
								lname='$l_name' ,
								sex='$gender',
								dob='$dob',
								email='$mail',
								addr='$addr',
								attendance='$attendance',
								present='$present',
								totaldays='$totaldays'
							WHERE
								s_id='$id'
							");

$sqll=mysqli_query($conn,"select * from student_phone where s_id = '$id'");
if (!$sqll) {
    printf("Error: %s\n", mysqli_connect_error($conn));
    exit();}
$hs_upd=mysqli_fetch_array($sqll);

$hii=$hs_upd?$hs_upd['s_ph_id']:"";
$hs_upd=mysqli_fetch_array($sqll);
$hi=$hs_upd?$hs_upd['s_ph_id']:"";
	if($hi && $mph)
	{
	$sql_update=mysqli_query($conn,"UPDATE student_phone SET 
								s_ph_id='$ph'
							WHERE
								s_id='$id' and s_ph_id = '$hii'
							");
	$sql_update=mysqli_query($conn,"UPDATE student_phone SET 
								s_ph_id='$mph'
							WHERE
								s_id='$id' and s_ph_id = '$hi'
							");
	}
	else if($hi && !$mph)
	{
$sql_update=mysqli_query($conn,"UPDATE student_phone SET 
								s_ph_id='$ph'
							WHERE
								s_id='$id' and s_ph_id = '$hii'
							");
		$sql_update=mysqli_query($conn,"DELETE FROM student_phone where s_id='$id' and s_ph_id='$hi'");
	}
	else if(!$hi && $mph)
	{
$sql_update=mysqli_query($conn,"UPDATE student_phone SET 
								s_ph_id='$ph'
							WHERE
								s_id='$id' and s_ph_id = '$hii'
							");
		$sql_update=mysqli_query($conn,"INSERT INTO student_phone VALUES ('$mph','$id')");
	}
else
{
$sql_update=mysqli_query($conn,"UPDATE student_phone SET 
								s_ph_id='$ph'
							WHERE
								s_id='$id' and s_ph_id = '$hii'
							");
}
	if($sql_update=='true')
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
	$sql_upd=mysqli_query($conn,"SELECT * FROM student WHERE s_id='$id'");
	if (!$sql_upd) {
    printf("Error: %s\n", mysqli_connect_error($conn));
    exit();}
$rs_upd=mysqli_fetch_array($sql_upd);
$idd = $rs_upd['s_id'];
$sqll=mysqli_query($conn,"select * from student_phone where s_id = '$idd'");
if (!$sqll) {
    printf("Error: %s\n", mysqli_connect_error($conn));
    exit();}
$hs_upd=mysqli_fetch_array($sqll);
	list($d,$m,$y)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Student Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update student's detail to record into database.</p>
			</div>

 
<div class="container_form">
    <form method="post">
				
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" value="<?php echo $rs_upd["fname"];?>" />
					<input type="text" name="mnametxt" class="form-control" value="<?php echo $rs_upd["mname"];?>" />
					
					<input type="text" name="lnametxt" class="form-control" value="<?php echo $rs_upd["lname"];?>" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="gender" value="MALE" <?php if($rs_upd["sex"]=="MALE") echo "checked";?> /> <span class="p_font">&nbsp;MALE</span>
					<input type="radio" name="gender" value="FEMALE" <?php if($rs_upd["sex"]=="FEMALE") echo "checked";?> /> <span class="p_font">&nbsp;FEMALE</span>
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">DOB: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="dd">
       						<option>date</option>
       						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d){
								$sel=$sel="selected='selected'";}
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel?> >
                        <?php
                        if($i<10)
                            echo"0"."$i" ;
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
							$sel="";
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
									if($i==$m){
										$sel=$sel="selected='selected'";}
									else
										$sel="";
                                echo"<option value='$i' $sel> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							$sel="";
							for($i=1985;$i<=2015;$i++){	
								if($i==$y){
									$sel="selected='selected'";}
								else
								$sel="";
							echo"<option value='$i' $sel>$i </option>";
							}
							
						?>
						</select>
					</div>
					
					
		     	</div><br><br>
		     	
				<div class="teacher_bdayPlace_pos">
					<input type="text" name="mail" class="form-control" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}+\.[a-z]{2,}$" value="<?php echo $rs_upd["email"];?> " />
				</div><br>
				
				<div class="teacher_address_pos">
					<input type="text" name="addrtxt" class="form-control" value='<?php echo $rs_upd["addr"];?>' />
				</div><br>
				<div class="teacher_address_pos">
					<input type="text" name="mph" class="form-control" value='<?php echo $hs_upd["s_ph_id"];?>' />
				</div><br>
				<?php
				$hs_upd=mysqli_fetch_array($sqll); ?>
				<div class="teacher_address_pos">
					<input type="text" name="amph" class="form-control" value='<?php echo $hs_upd?$hs_upd["s_ph_id"]:"";?>' />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="attend" class="form-control" value='<?php echo $rs_upd["attendance"];?>' />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="present" class="form-control" value="<?php echo $rs_upd["present"];?> " />
				</div><br>
				
				<div class="teacher_note_pos">
					<input type="text" name="tnod" class="form-control" value='<?php echo $rs_upd["totaldays"];?>' />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Update" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>
			</div>
		</div>
	</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
<!-- for form Register-->
	
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Student Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add new student's detail to record into database.</p>
			</div>

<div class="container_form">
    <form method="post">
<div class="teacher_bdayPlace_pos">
					<input type="text" name="sid" class="form-control" placeholder="Student ID" />
				</div><br>
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" placeholder="First name" />
					<input type="text" name="mnametxt" class="form-control" placeholder="Middle name" />
					<input type="text" name="lnametxt" class="form-control" placeholder="Last name" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="gender" value="MALE" /> <span class="p_font">&nbsp;MALE</span>
					<input type="radio" name="gender" value="FEMALE" /> <span class="p_font">&nbsp;FEMALE</span>
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
					<input type="text" name="mail" class="form-control" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}+\.[a-z]{2,}$" placeholder="Email" />
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
				
				<div class="teacher_mobile_pos">
					<input type="text" name="attendance" class="form-control" placeholder="attendance" />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="present" class="form-control" placeholder="Present" />
				</div><br>
				
				<div class="teacher_note_pos">
					<input type="text" name="tnod" class="form-control" placeholder="Total no of days" />
				</div><br>
<div class="teacher_note_pos">
					<input type="text" name="faid" class="form-control" placeholder="FA_ID" />
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