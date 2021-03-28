<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/style1.css">
		<nav class="navbar navbar-fixed-top" id="top-nav">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Campus Recruitment System</a>
				</div>
				<ul id="list1" class="nav navbar-nav">
					<li class="active"><a href="company_dash.php">Home</a></li>
					<li class="active"><a href="index1.html">Logout</a></li>
				</ul>
			</div>
		</nav>
		
		<?php
			session_start();
				$servername="127.0.0.1";
				$username="root";
				$password="";
				$dbname="project";
				
				function phpAlert($msg) {
				    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
				}

				// Create connection
            	$conn = new mysqli($servername, $username, $password, $dbname);
            	// Check connection
            	if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
            	} 
				  
				if($_SERVER["REQUEST_METHOD"]=="POST"){
					$uname = $_POST['uname'];
					$pwd = $_POST['pwd'];
					$sql1="SELECT pwd from companys where email=\"" . $uname . "\"";
					$result = $GLOBALS['conn']->query($sql1);
					if($result->num_rows == 0){
					    phpAlert(   "Wrong username entered!"   );
						//header('Location: student_dash.php');
					}
					else{
						$row=$result->fetch_assoc();
						if($row['pwd']==$pwd){
							$sql2="Delete from companys where email='".$uname."'";
							$result = $GLOBALS['conn']->query($sql2);
							//phpAlert("Deleted!");
							//header('Location: index.html');
							$sql3="Delete from applications where c_mail='".$uname."'";
							$result3 = $GLOBALS['conn']->query($sql3);
							
							$sql4="Delete from vacancy where company_name='".$_SESSION['name']."'";
							$result4 = $GLOBALS['conn']->query($sql4);
							
							echo "  <SCRIPT type='text/javascript'> 
										//not showing me this
										alert('Deleted');
										window.location.replace(\"index1.html\");
									</SCRIPT>
							";
						}
						else{
							phpAlert("Wrong password!");	
						}
					}
				}				 
        	$conn->close();
        ?>
	</head>
	<body>		
		<h2>DELETE COMPANY ACCOUNT</h2>
		<div class="text-center" id="main" style="width: auto;border-color: none; background-color: transparent; padding-bottom: 50px;">
  			<img class="img-responsive " src="Images/bye.png" height="200" width="500">
  		</div>
		
		<div class=" well container-fluid text-center" id="frm1" style="background-color: transparent; width: 500px;">
			<form action="" method="POST">
				<div style="display: inline-flex;">
					<label for="usrnm"><b>Enter Username :&ensp;</b></label>
					<input type="text" placeholder="Enter Username" name="uname" id="usrnm" required>
				</div>
				<br><br>
				<div>
					<label for="pswrd"><b>Enter Password :&ensp;</b></label>
					<input type="password" placeholder="Enter Password" name="pwd" id="pswrd" required>
				</div>
				<br>
				<div style="display: inline-grid;">
					<button class="btn" type="submit" style="color: white; padding-left: 20px; padding-right: 20px;">Delete</button>
				</div>
	        </form>
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
