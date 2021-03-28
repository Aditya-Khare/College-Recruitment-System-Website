<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/style1.css">
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

		<nav class="navbar navbar-fixed-top" id="top-nav">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" style="font-family:Nova Square" href="#">Campus Recruitment System</a>
				</div>
				<ul id="list1" class="nav navbar-nav">
					<li class="active"><a href="company_dash.php">Home</a></li>
					<li class="active"><a href="index1.html">Logout</a></li>
					<li class="active"><a href="delete_company.php">Delete Account</a></li>
				</ul>
			</div>
		</nav>
		
		<script>
			function trclick(s_mail,job_id,object){
				//alert("Clicked hoh ho");
				if (s_mail == "") {
					return;
				} else { 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp1 = new XMLHttpRequest();
						xmlhttp2 = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
						xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp1.onreadystatechange = function() {
						if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
							document.getElementById("display").innerHTML = xmlhttp1.responseText;
						}
					};
					xmlhttp2.onreadystatechange = function() {
						if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
							document.getElementById("dispjob").innerHTML = xmlhttp2.responseText;
						}
					};
					xmlhttp1.open("GET","getstudent.php?email="+s_mail,true);
					xmlhttp2.open("GET","getjobdetails.php?job_id="+job_id,true);
					xmlhttp1.send();
					xmlhttp2.send();
				}
			};
			
			function changeStatus(val,app_id,object){
					alert(val+" "+app_id);
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					/*xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("sapp").innerHTML = this.responseText;
						}
					};*/
					xmlhttp.open("GET","updateStatus.php?s="+val+"&app_id="+app_id,true);
					xmlhttp.send();
				
			};
		</script>

	</head>
	
	<body>
		<h2 align="center" style="font-family:Nova Square">COMPANY DASHBOARD</h2>
		<div class=" container-fluid" id="dash">
			<div class="row">
				<div class="col-sm-3" >
					<div class="row">
						<h2>COMPANY DETAILS</h2>
						<br>
						<?php
							session_start();
							$servername="127.0.0.1";
							$username="root";
							$password="";
							$dbname="project";
							
							$conn = new mysqli($servername,$username,$password,$dbname);

							if($conn->connect_error){
								die("Connection failed: ".$conn->connect_error);
							}
							$sql="Select * from companys where email=\"".$_SESSION['email']."\"";
							$result = $conn->query($sql);
							$row=$result->fetch_assoc();
							 $_SESSION['name']=$row['name'];
							echo"  <div class=\"table-responsive table-bordered\" style=\"border-color: black; border-style: all;\" >            
										<table class=\"table table-hover\">
										  <tr>
											<th>Name</th>
											<td>".$row['name']."</td>
											</tr>
										  <tr>
											<th>Email</th>
											<td>".$row['email']."</td>

										  </tr>
										  <tr>
											<th>Contact No.</th>
											<td>".$row['phone']."</td>

										  </tr>
										  <tr>
											<th>Location</th>
											<td>".$row['location']."</td>
											</tr>
										  <tr>
											<th>C.E.O.</th>
											<td>".$row['ceo']."</td>

										  </tr>
										  <tr>
											<th>C.T.O.</th>
											<td>".$row['cto']."</td>

										  </tr>
										  
										  <tr>
											<th>H.R.</th>
											<td>".$row['hr']."</td>
											</tr>

										</tbody>
									  </table>
									</div>
							";
						?>
					</div>
					<div class="row">
						<h2>CAMPANY JOBS</h2>
						<?php
							
							$servername="127.0.0.1";
							$username="root";
							$password="";
							$dbname="project";
												
							$conn = new mysqli($servername,$username,$password,$dbname);
							if (!$conn) {
								die('Could not connect: ' . mysqli_error($conn));
							}

							$sql="SELECT * FROM vacancy WHERE company_name = '".$_SESSION['name']."'";
							$result = $conn->query($sql);



							echo "<div class=\"table-responsive table-bordered\" style=\"border-color: black; border-style: all;\" >            
									<table class=\"table table-hover\">
									<tr>
										<th> Job Id </th>
										<th>Job Title</th>
										<th>Salary (in Lks./anum)</th>
										<th>Location</th>
									</tr>
							";
											   
							while($row = $result->fetch_assoc()){	   
								echo "<form action=\"deleteVacancy.php\" method=\"POST\">";
								echo "
									<tr>
									<td> <input  type=\"number\" name=\"job_id\" value=\"".$row['job_id']."\" readonly maxlength=\"4\" size=\"4\" style=\"width:40px;\"></td>
									<td>".$row['job_title']."</td>
									<td>".$row['salary']."</td>
									<td>".$row['location']."";
								echo " <button type=\"submit\">X</button> </td>";
								echo "</tr>";
								echo "</form>";
							}	
										
							echo "
								</table>
							 </div>";		

						?><br>
						
					</div>
					<div class="btn">
						<a href="vacancy.php">
						<span></span>
				        <span></span>
          				<span></span>
          				<span></span>
						CREATE VACANCY
					</a>	
					</div>
					
				</div>
				<div class="col-sm-4">
					<h2>DETAILS ABOUT THE STUDENT</h2>
					<div id="display">
						<br>
						<div class="table-responsive  table-bordered" style="border-color: black; border-style: all;">            
							<table class="table table-hover">
							  <tr>
								<th>Name</th>
								<td>---</td>
							  </tr>
							  <tr>
								<th>Email</th>
								<td>---</td>

							  </tr>
							  <tr>
								<th>Date of Birth</th>
								<td>---</td>

							  </tr>
							  <tr>
								<th>Branch</th>
								<td>---</td>
								</tr>
							  <tr>
								<th>Year of Passing out</th>
								<td>---</td>

							  </tr>
							  <tr>
								<th>CGPA</th>
								<td>---</td>

							  </tr>
							  
							  <tr>
								<th>12th Percentage</th>
								<td>---</td>
								</tr>
							  <tr>
								<th>10th Percentage</th>
								<td>---</td>

							  </tr>
							  <tr>
								<th>Contact No.</th>
								<td>---</td>

							  </tr>
							  
							  <tr>
								<th>Course</th>
								<td>---</td>
							  </tr>

							</table>
						</div>
					</div>
					<div id="dispjob">
					</div>
					
					
					  
				  
				</div>
				<div class="col-sm-4">
					<h2>NAME OF STUDENTS APPLIED!</h2>
					<p>Click for more details about the student</p>
					<div id="sapp">
					<?php
					 $servername="127.0.0.1";
					 $username="root";
					 $password="";
					 $dbname="project";
					 
					 $conn = new mysqli($servername,$username,$password,$dbname);
					 
					 if($conn->connect_error){
						 die("Connection failed: ".$conn->connect_error);
						 }
						 
						 
						$sql="Select * from applications where c_mail='".$_SESSION['email']."'";
						$result=$conn->query($sql);
						
			
					echo  "<div class=\"table-responsive table-bordered\" style=\"border-color: black; border-style: all;\" >            
					  <table class=\"table table-hover\">
						<thead>
						  <tr>
							<th>App Id</th>
							<th>Name of students</th>
							<th>Job_id</th>
							<th>Status</th>
						  </tr>
						</thead>
						<tbody>";
						
						while($row=$result->fetch_assoc()){
							
						   $sql2="Select * from students where email='".$row['s_mail']."'";
						   $result2=$conn->query($sql2);
						   $row2=$result2->fetch_assoc();
						   echo "<form action=\"updateStatus.php\" method=\"POST\">";
						   echo "<tr onclick=\"trclick('".$row['s_mail']."','".$row['job_id']."',this)\">";
						   echo "<td> <input  type=\"number\" name=\"app_id\" value=\"".$row['app_id']."\" readonly maxlength=\"4\" size=\"4\" style=\"width:40px;\"></td>";
						   echo "<td>".$row2['name']."</td>";
						   echo "<td>".$row['job_id']."</td>";
						   echo "<td>";
						    
							echo "<select name=\"status\">";
							if($row['status'] == 0){
								
								echo "<option value=\"0\">Pending</option>
									  <option value=\"1\">Accept</option>
									  <option value=\"-1\">Reject</option>";
									 
							}elseif($row['status'] == 1){
								
								echo "<option value=\"1\">Accepted</option>
									  <option value=\"0\">Pending</option>
									  <option value=\"-1\">Reject</option>";
									 
							}else {
								echo "<option value=\"-1\">Rejected</option>
									  <option value=\"0\">Pending</option>
									  <option value=\"1\">Accept</option>";
								
							}
							 echo "</select>";
							
							echo " <button type=\"submit\">Update</button> </td>";
						   echo "</tr>";
						   echo "</form>";
						   }
						   
						  echo"</tbody>
								</table>
							   </div>";
								
					  ?>
					  </div>
				</div>
			</div>
			
		</div>

	</body>
	<nav class="navbar navbad-default" id="bottom-nav">
			<div class="container-fluid">
				<div id="col1" >
					<ul id="blist1">
						<li><a href='#'>About Us</a></li>
						<li><a href='#'>FAQs</a></li>
						<li><a href='#'>Contact Us</a></li>
					</ul>
				</div>
				
				<div id="col2" >
					<ul id="blist1">
						<li><a href='#'>Privacy Policy</a></li>
						<li><a href='#'>Legal</a></li>
						<li><a href='#'>Work With Us</a></li>
					</ul>
				</div>
				
				<div id="col3" class=" container-fluid">
				
					<ul id="blist3" >
						<li><i class="fa fa-facebook fa-2x" ><a href='#'></a></i></li>
						<li><i class="fa fa-twitter fa-2x"><a href='#'></a></i></li>
						<li><i class="fa fa-instagram fa-2x"><a href='#'></a></i></li>
						<li><i class="fa fa-linkedin fa-2x"><a href='#'></a></i></li>
					</ul>
				</div>
				
			</div>
		</nav>
	
	<style>
            #top-nav{
				opacity: 100%;	
				font-weight: bold;
				font-size-adjust: auto;
				display: inline-block;
	  			text-transform: uppercase;
	  			text-decoration: none;
	  			overflow: hidden;
	  			transition: 0.8s;
	  			width: 100%;
	  			display:inline-grid;
  				justify-content: space-between;
  				align-items: center;
  				padding: 30px 1-%;
  				background: #101116;
  				height: 50px;
  				text-align: left;
			}
			#top-nav a{
				color: white;
				font-weight: bold;
            	font-size: 15px;
            	letter-spacing: 2px;
			}
			
			#top-nav a:hover{
				color: white;
  				background: transparent;
  				box-shadow: 0 0 10px #2196f3 , 0 0 40px #2196f3 , 0 0 80px #2196f3;
  				transition-delay: 0.5s;
			}

			#bottom-nav{
				opacity: 100%;	
				font-weight: bold;
				font-size-adjust: auto;
				display: inline-block;
	  			text-transform: uppercase;
	  			text-decoration: none;
	  			overflow: hidden;
	  			transition: 0.8s;
	  			width: 100%;
	  			display:inline-grid;
  				justify-content: space-between;
  				align-items: center;
  				padding: 30px 1-%;
  				background: #101116;
  				height: auto;
			}
            #bottom-nav a{
            	color: white;
            	font-weight: bold;
            	font-size: auto;
            	letter-spacing: 2px;
            }
            #col1{
				/*background: red;*/
				width :350px;
				height: 100px;
				float : left;
				margin: 50px;
				display: table-cell;
			}

			#col2{
				/*background: green;*/
				width :350px;
				height: 100px;
				float : left;
				margin : 50px;
				display: table-cell;
				color: black;
				font-weight: bold;
			}

			#col3{
				/*background: blue;*/
				width :220px;
				height: 100px;
				float : left;
				/*margin : 10px;*/
				display: table-row;
			}
				
			#blist1{
				list-style-type:none;
				margin-top: 15px;
				color:white;
			}

			 #blist2 li{
				display : inline;
				size: 100px;
				padding: 6px;
				cursor : pointer;
				color:white;
				position: center;
			}
			#blist3 {
				color:white;
				size: 100px;
				position: center;
				padding-top: 50px;
			}

		  	a{
		  		color: black;
		  		font-weight: bold;
		  		position: relative;
  				display: inline-block;
	  			text-transform: uppercase;
	  			text-decoration: none;
	  			overflow: hidden;
		  	}

		  	h4{
		  		color: black;
		  		font-weight: 300;
		  	}

			body {
			  background-image: url('bg2.jpg'); 
			  background-repeat: no-repeat; 
			  background-size: cover;
			  background-position: center;
			  color: black;
			  font-weight: bolder;
			}
			label{
				color: black;
			}
			li{
				font-weight: bold;
				opacity: 100%
			}
			h5{
				color: black;
			}
			
            h1{
                text-align: center;
            }
            
            h2 {
            	text-align: center;
            	font-weight: bold;
            	font-family: Nova Square;
            }
            #col-sm-4,  #col-sm-5, #col-sm-2, #col-sm-3 {
                height: auto;
                margin: 10px;
                background: none;
            }
            #row {
            	font-weight: bolder;
            }
            #col-sm-4,  #col-sm-5, #col-sm-2, #col-sm-3 table{
            	border: none;
            	justify-content: auto;
            }
             

            /*---------------------------------------------*/
            .btn{
			  position: relative;
			  margin: 0;
			  margin-bottom: 10px;
			  padding: 0;
			  display: flex;
			  justify-content: center;
			  align-items: center;
			  min-height: 10px;
			  background: #333;
			  font-family: monospace;
			  width:auto;
			}
			.btn a{
			  position: relative;
			  display: inline-block;
			  padding: 15px 30px;
			  color: #2196f3;
			  text-transform: uppercase;
			  letter-spacing: 4px;
			  text-decoration: none;
			  font-size: 24px;
			  overflow: hidden;
			  transition: 0.2s;
			}
			.btn a:hover{
			  color: #255684;
			  background: #2196f3;
			  box-shadow: 0 0 10px #2196f3 , 0 0 40px #2196f3 , 0 0 80px #2196f3;
			  transition-delay: 0.5s;
			}
			.btn a span{
			  position: absolute;
			  display: block;
			}
			.btn a span:nth-child(1){
			  top:0;
			  left:-100%;
			  width: 100%;
			  height:2px;
			  background: linear-gradient(90deg,transparent,#2196f3);
			}
			.btn a:hover span:nth-child(1){
			  left:100%;
			  transition: 0.5s;
			}
			.btn a span:nth-child(2){
			  top:-100%;
			  right:0%;
			  height: 100%;
			  width:2px;
			  background: linear-gradient(180deg,transparent,#2196f3);
			}
			.btn a:hover span:nth-child(2){
			  top:100%;
			  transition: 0.5s;
			  transition-delay: 0.125s;
			}
			.btn a span:nth-child(3){
			  bottom: 0;
			  right:-100%;
			  width: 100%;
			  height:2px;
			  background: linear-gradient(270deg,transparent,#2196f3);
			}
			.btn a:hover span:nth-child(3){
			  right:100%;
			  transition: 0.5s;
			  transition-delay: 0.25s;
			}
			.btn a span:nth-child(4){
			  bottom:-100%;
			  left:0%;
			  height: 100%;
			  width:2px;
			  background: linear-gradient(360deg,transparent,#2196f3);
			}
			.btn a:hover span:nth-child(4){
			  bottom:100%;
			  transition: 0.5s;
			  transition-delay: 0.325s;
			}
			hr{
				border-color: black;
			}
        </style>
</html>