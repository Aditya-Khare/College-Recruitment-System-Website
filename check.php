<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>
		<?php
			
			$job_id= $_GET['job_id'];
			$s_mail= $_GET['s_mail'];
			
			$servername="127.0.0.1";
			$username="root";
			$password="";
			$dbname="project";
							
			$conn = new mysqli($servername,$username,$password,$dbname);
			if (!$conn) {
				die('Could not connect: ' . mysqli_error($conn));
			}

			$sql1="SELECT * FROM students WHERE email = '".$s_mail."'";
			$result1 = $conn->query($sql1);
			$row1 = $result1->fetch_assoc();

			$sql2="SELECT * FROM vacancy WHERE job_id = '".$job_id."'";
			$result2 = $conn->query($sql2);
			$row2 = $result2->fetch_assoc();
			
			//Pending!
			//echo $row1['degree']." ".$row2['degree_e']." ".$row1['cpi']." ".$row2['cpi_e'] ." ". $row1['year']." ".$row2['year_e'] ." ". $row1['12p']." ".$row2['12p_e'] ." ". $row1['10p']." ".$row2['10p_e'] ;
			
			if($row1['degree']==$row2['degree_e'])
				echo "<BR>Degree &emsp;&emsp;&emsp;&emsp;Required: ".$row2['degree_e']."&emsp;&emsp;&emsp;&emsp;&emsp;CRITERIA STATUS :&ensp; <img src=\"Images/tick.png\" height=\"20\" width=\"20\" >&ensp;   Fulfilled<BR>";
			else
				echo "<BR>Degree &emsp;&emsp;&emsp;&emsp;Required: ".$row2['degree_e']."&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; CRITERIA STATUS :&ensp; <img src=\"Images/cross.png\" height=\"20\" width=\"20\" >&ensp;   Not Fulfilled  <BR>";
			
			if($row1['cpi']>=$row2['cpi_e'])
				echo "<BR>CGPA &emsp;&emsp;&emsp;&emsp;&ensp;Required: > ".$row2['cpi_e']."&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;CRITERIA STATUS :&ensp; <img src=\"Images/tick.png\" height=\"20\" width=\"20\" >&ensp;   Fulfilled  <BR>";
			else
				echo "<BR>CGPA &emsp;&emsp;&emsp;&emsp;&ensp;Required : > ".$row2['cpi_e']."&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;CRITERIA STATUS :&ensp; <img src=\"Images/cross.png\" height=\"20\" width=\"20\" >&ensp;   Not Fulfilled  <BR>";
			
			if($row1['year']>=$row2['year_e'])
				echo "<BR>Passing Year &ensp;&ensp;Required : > ".$row2['year_e']."&emsp;&emsp;&emsp;&emsp;&emsp;CRITERIA STATUS :&ensp; <img src=\"Images/tick.png\" height=\"20\" width=\"20\" >&ensp;   Fulfilled  <BR>";
			else
				echo "<BR>Passing Year &ensp;&ensp;Required : > ".$row2['year_e']."&emsp;&emsp;&emsp;&emsp;&emsp;CRITERIA STATUS :&ensp; <img src=\"Images/cross.png\" height=\"20\" width=\"20\" >&ensp;   Not Fulfilled  <BR>";
			
			if($row1['twp']>=$row2['12p_e'])
				echo "<BR>12th % &emsp;&emsp;&emsp;&emsp;Required : > ".$row2['12p_e']."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;CRITERIA STATUS :&ensp;<img src=\"Images/tick.png\" height=\"20\" width=\"20\" >&ensp;   Fulfilled  <BR>";
			else
				echo "<BR>12th % &emsp;&emsp;&emsp;&emsp;Required : > ".$row2['12p_e']."&emsp;&emsp;&emsp;&emsp;&emsp;CRITERIA STATUS :&ensp;<img src=\"Images/cross.png\" height=\"20\" width=\"20\" >&ensp;   Not Fulfilled  <BR>";
			
			if($row1['tenp']>=$row2['10p_e'])
				echo "<BR>10th % &emsp;&emsp;&emsp;&emsp;Required : > ".$row2['10p_e']."&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;CRITERIA STATUS :&ensp;<img src=\"Images/tick.png\" height=\"20\" width=\"20\" >&ensp;   Fulfilled  <BR>";
			else
				echo "<BR>10th % &emsp;&emsp;&emsp;&emsp;Required : > ".$row2['10p_e']."&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;CRITERIA STATUS :&ensp;<img src=\"Images/cross.png\" height=\"20\" width=\"20\" >&ensp;   Not Fulfilled  <BR>";
			
			
			if($row1['degree']==$row2['degree_e'] && $row1['cpi']>=$row2['cpi_e'] && $row1['year']>=$row2['year_e'] && $row1['twp']>=$row2['12p_e'] && $row1['tenp']>=$row2['10p_e']  ){
				echo "<H3>&ensp;You're eligible!</H3><BR>";
				echo "<input class=\"btn\" type=\"button\" value=\"Apply\" onclick=\"apply_fun('".$job_id."','".$s_mail."','".$row2['company_name']."',this)\" style=\"color: white; padding-left: 4px; padding-right: 4px; width: 100px; height: 50px; margin-left: 220px;\">";
			}else{
				echo "<H3>You're not eligible!</H3><BR>";
			}
		?>
	</body>
	<footer>
	</footer>
</html>