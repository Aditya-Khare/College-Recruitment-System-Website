<html lang="us-en">
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/style1.css">
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <meta charset="utf-8">
		<nav class="navbar navbar-fixed-top" id="top-nav">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Campus Recruitment System</a>
				</div>
				<ul id="list1" class="nav navbar-nav">
					<li class="active"><a href="admin_dash.php">Home</a></li>
		           	<li class="active"><a href="delete_student_a.php">Delete Student</a></li>
				   	<li class="active"><a href="delete_company_a.php">Delete Company</a></li>
				   	<li class="active"><a href="index1.html">Logout</a></li>
				</ul>
			</div>
		</nav>
	</head>
	
	<body>
		<h1 align="center">ADMIN DASHBOARD</h1>
		<div class=" container-fluid" id="dash">
			<div class="row">
		    	<div class="col-sm-12">
			  	<br><br>
			  		<div>
						<?php
						  	session_start();
								$servername="127.0.0.1";
								$username="root";
								$password="";
								$dbname="project";
									
								// Create connection
				                $conn = new mysqli($servername, $username, $password, $dbname);
				                // Check connection
					            if ($conn->connect_error) {
					                die("Connection failed: " . $conn->connect_error);
					            }  
								echo "<style>
							                table, th, td {
							                   border: 2px solid black;
							                   border-collapse: collapse;
											}
							                th, td {
							                   padding: 5px;
							                    text-align: left;    
							                }
					                </style>";
										  
								echo  " 
									<form method=\"POST\" action=\"\" style=\"display: inline-flex;\">
								        <select type=\"text\" name=\"name\" placeholder=\"Select\" style=\"height: 30px;\">
											<option label=\"cts\">SELECT TO CHECK</option>
											<option label=\"trs\">TOTAL REGISTERED STUDENTS</option>
									        <option label=\"tps\">TOTAL PLACED STUDENTS</option>
										    <option label=\"trc\">TOTAL REGISTERED COMPANIES</option>
											<option label=\"trc\">STUDENTS PLACED IN BANGLORE</option>
											<option label=\"trc\">STUDENTS PLACED AS DEVELOPERS</option>
											<option label=\"trc\">TOTAL VACANCIES</option>
								       	<input class=\"btn\" style=\"color: white; margin-left: 20px; padding-left: 10px; padding-right: 10px; text-transform: uppercase;\"type=\"submit\"></input>
							        </form>
							    ";
								if(isset($_POST['name']) && $_POST['name']=="TOTAL REGISTERED STUDENTS") {
					                     
					               	$sql = "SELECT * FROM students";
					                $result = $conn->query($sql);
									
					               	echo "<h4 align=\"center\">REGISTERED STUDENTS</h4>";
								   	echo "<br>";
						            if ($result->num_rows > 0) {
						                echo "<table class=\"table table-hover\"><tr><th>Name</th><th>Email</th><th>Password</th><th>Contact No.</th><th>D.O.B.</th><th>Degree</th><th>Branch</th><th>Year of Passing</th><th>C.P.I.</th><th>12th Percentage</th><th>10th Percentage</th></tr>";
						               	while($row = $result->fetch_assoc()) {
						                	echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["pwd"]."</td><td>".$row["phone"]."</td><td>".$row["dob"]."</td><td>".$row["degree"]."</td><td> ".$row["branch"]."</td><td>".$row["year"]."</td><td>".$row["cpi"]."</td><td>".$row["twp"]."</td><td>".$row["tenp"]."</td></tr>";
						                }
					              	echo "</table>";
					         		}  else {
					            		echo "0 results";
					               	}
								}
								  
							  	if(isset($_POST['name']) && $_POST['name']=="TOTAL VACANCIES") {
					                     
					               	$sql = "SELECT * FROM vacancy";
					                $result = $conn->query($sql);
									
					               	echo "<h4 align=\"center\">TOTAL VACANCIES</h4>";
								   	echo "<br>";
						            if ($result->num_rows > 0) {
						                echo "<table class=\"table table-hover\"><tr><th>Company Name</th><th>Job Title</th><th>Salary</th><th>Location</th><th>Bond</th></tr>";
					     
						               while($row = $result->fetch_assoc()) {
						                echo "<tr><td>".$row["company_name"]."</td><td>".$row["job_title"]."</td><td>".$row["salary"]."</td><td>".$row["location"]."</td><td> ".$row["bond"]."</td></tr>";
						               }
						              echo "</table>";
					         		}  else {
					            		echo "0 results";
					               	}
								}
												  
								if(isset($_POST['name']) && $_POST['name']=="TOTAL REGISTERED COMPANIES") {
						                     
						            $sql = "SELECT * FROM companys";
						            $result = $conn->query($sql);
									echo "<h4 align=\"center\">REGISTERED COMPANIES</h4>";
									echo "<br>";
							        if ($result->num_rows > 0) {
							            echo "<table class=\"table table-hover\"><tr><th>Name</th><th>Email</th><th>Phone</th><th>Location</th><th>C.E.O.</th><th>C.T.O</th><th>H.R.</th><th>Worth</th><th>Founded in</th><th>Founder</th></tr>";
							            while($row = $result->fetch_assoc()) {
							               	echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td> ".$row["phone"]."</td><td> ".$row["location"]."</td><td> ".$row["ceo"]."</td><td> ".$row["cto"]."</td><td> ".$row["hr"]."</td><td> ".$row["worth"]."</td><td> ".$row["found"]."</td><td> ".$row["founder"]."</td></tr>";
							            }
							           	echo "</table>";
							        }  else {
							           echo "0 results";
							        }
								}
									  
								if(isset($_POST['name']) && $_POST['name']=="TOTAL PLACED STUDENTS") {
						                     
						            $sql = "SELECT * FROM students as S,applications as A,vacancy as V where S.email=A.s_mail and A.job_id=V.job_id and A.status=1 ";
						            $result = $conn->query($sql);
										
						            echo "<h4 align=\"center\">PLACED STUDENTS</h4>";
									echo "<br>";
						            if ($result->num_rows > 0) {
						               	echo "<table class=\"table table-hover\"><tr><th>Name</th><th>Email</th><th>Contact No.</th><th>Degree</th><th>Branch</th><th>C.P.I.</th><th>12th Percentage</th><th>10th Percentage</th><th>Company</th><th>Job Title</th><th>Salary (LPA)</th><th>Location</th></tr>";
						     
						            	while($row = $result->fetch_assoc()) {
						               		echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["degree"]."</td><td> ".$row["branch"]."</td><td>".$row["cpi"]."</td><td>".$row["twp"]."</td><td>".$row["twnp"]."</td><td>".$row["company_name"]."</td><td>".$row["job_title"]."</td><td>".$row["salary"]."</td><td>".$row["location"]."</td></tr>";
						                }
						              	echo "</table>";
						         	}  else {
						            	echo "0 results";
						            }
								}
									  
								if(isset($_POST['name']) && $_POST['name']=="STUDENTS PLACED IN BANGLORE") {
					                     
						            $sql = "SELECT * FROM students as S,applications as A,vacancy as V where S.email=A.s_mail and A.job_id=V.job_id and A.status=1 and V.location='Banglore'";
						            $result = $conn->query($sql);
									
						            echo "<h4 align=\"center\">STUDENTS PLACED IN BANGLORE</h4>";
									echo "<br>";
						            if ($result->num_rows > 0) {
						               	echo "<table class=\"table table-hover\"><tr><th>Name</th><th>Email</th><th>Contact No.</th><th>Degree</th><th>Branch</th><th>C.P.I.</th><th>12th Percentage</th><th>10th Percentage</th><th>Company</th><th>Job Title</th><th>Salary (LPA)</th><th>Location</th></tr>";
						     
						            	while($row = $result->fetch_assoc()) {
						               		echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["degree"]."</td><td> ".$row["branch"]."</td><td>".$row["cpi"]."</td><td>".$row["twp"]."</td><td>".$row["tenp"]."</td><td>".$row["company_name"]."</td><td>".$row["job_title"]."</td><td>".$row["salary"]."</td><td>".$row["location"]."</td></tr>";
						                }
						             	echo "</table>";
						         	}  else {
						            	echo "0 results";
						            }
								}
							
								if(isset($_POST['name']) && $_POST['name']=="STUDENTS PLACED AS DEVELOPERS") {
					                     
						            $sql = "SELECT * FROM students as S,applications as A,vacancy as V where S.email=A.s_mail and A.job_id=V.job_id and A.status=1 and V.job_title='Developer'";
						            $result = $conn->query($sql);
										
						            echo "<h4 align=\"center\">STUDENTS PLACED AS DEVELOPERS</h4>";
									echo "<br>";
						            if ($result->num_rows > 0) {
						              	echo "<table class=\"table table-hover\" ><tr><th>Name</th><th>Email</th><th>Contact No.</th><th>Degree</th><th>Branch</th><th>C.P.I.</th><th>12th Percentage</th><th>10th Percentage</th><th>Company</th><th>Job Title</th><th>Salary (LPA)</th><th>Location</th></tr>";
						     
						            	while($row = $result->fetch_assoc()) {
						               		echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["degree"]."</td><td> ".$row["branch"]."</td><td>".$row["cpi"]."</td><td>".$row["twp"]."</td><td>".$row["tenp"]."</td><td>".$row["company_name"]."</td><td>".$row["job_title"]."</td><td>".$row["salary"]."</td><td>".$row["location"]."</td></tr>";
						                }
						              	echo "</table>";
						         	}  else {
						            	echo "0 results";
						            }
								}
			           		$conn->close();
			          	?>
					</div>
		  		</div>
			</div> 
 		</div>
	</body>

	<footer>
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
	</footer>
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
  				position: fixed;
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
    			font-family: Nova Square;
    			font-weight: bolder;
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
            input{
				background-color: white;
				color: black;
				letter-spacing: 4px;
				width: 25%;
			}
			input[type=number] {
				background-color: white;
				color: black;
				letter-spacing: 4px;
			}
			select, option{
				background-color: white;
				color: black;
				height: 50px;
				letter-spacing: 4px;
			}
			hr{
				border-color: black;
			}
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
			  padding-right: 4px;
			  padding-left: 4px;
			  padding-top: 4px;
			  padding-bottom: 4px;
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
			table,th, td, tr {
				border-style: all;
				border-color: black;
				border-width: 2px;
			}            
	</style>
</html>