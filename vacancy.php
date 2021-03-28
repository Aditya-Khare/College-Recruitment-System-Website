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
	  </head>
	  <body>
	  
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

		
		

		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$job_title=$_POST['job_title'];
			$salary=$_POST['salary'];
			$deadline=$_POST['deadline'];
			$bond=$_POST['bond'];
			$year=$_POST['year'];
			$cpi=$_POST['cpi'];
			$twp=$_POST['12p'];
			$tenp=$_POST['10p'];
			$branch=$_POST['branch'];
			$age=$_POST['age'];
			$degree=$_POST['degree'];
			$location=$_POST['location'];
			/*echo $name . "<BR>";
			echo $email. "<BR>";
			echo $dob. "<BR>";
			echo $branch. "<BR>";
			echo $year. "<BR>";
			echo $cpi. "<BR>";
			echo $twp. "<BR>";
			echo $tenp. "<BR>";
			echo $pwd. "<BR>";
			echo $phone. "<BR>";
			echo $degree. "<BR>";*/
			
			$sql="INSERT into vacancy(company_name,job_title,salary,location,deadline,bond,age_e,degree_e,cpi_e,year_e,12p_e,10p_e) values(\"".$_SESSION['name']."\",\"".$job_title."\",".$salary.",\"".$location."\",\"".$deadline."\",".$bond.",".$age.",\"".$degree."\",".$cpi.",".$year.",".$twp.",".$tenp." );";
			;
			
			if($conn->query($sql)===TRUE){
			$GLOBALS['conn']->close();
		echo "<SCRIPT type='text/javascript'> //not showing me this
								alert('Vacancy Created Succesfully!!');
								window.location.replace(\"company_dash.php\");
							</SCRIPT>";
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
			
			/*
			$GLOBALS['conn']->close();
			header('Location: company_dash.php ');
			echo '<script language="javascript">';
			echo 'alert("Vacancy succesfully created!")';
			echo '</script>';*/
		}
	  ?>
	  
		<div class=" container-fluid " id="dash" >
		<h1>CREATE VACANCY</h1>
		<form action="vacancy.php" method="POST" enctype="multipart/form-data">
        <div class="container">
		   <h2>JOB DETAILS</h2>
           <hr>
           <ol>		   
			   	<li><h4><label for="job_title"><b>JOB TITLE</b></label></h4>
	           	<input type="text" name="job_title" required></li>

	          	<li><h4><label for="salary"><b>SALARY</b></label></h4>
	          	<input type="decimal" placeholder="in LPA" name="salary" required> </li>
		
				<li><h4><label for="location"><b>LOCATION</b></label></h4>
	          	<input type="text" placeholder="Ex.Delhi" name="location"></li>
			  
		      	<li><h4><label for="deadline"><b>DEADLINE</b></label></h4>
	          	<input type="date" placeholder=" " name="deadline"></li>
		
	          	<li><h4><label for="bond"><b>BOND</b></label></h4>
	          	<input type="number" placeholder=" " name="bond"></li>
		
		      	<li><h4><label for="10p"><b>10<sup>th</sup> PERCENTAGE</b></label></h4>
	          	<input type="decimal" placeholder="Ex.85.5" name="10p"></li>
			  
			  	<li><h4><label for="12p"><b>12<sup>th</sup> PERCENTAGE</b></label></h4>
	          	<input type="decimal" placeholder="Ex.85.5" name="12p"></li>
			  
				<li><h4><label for="year"><b>YEAR</b></label></h4>
				<input type="number" placeholder="Ex.2019" name="year"></li>

				<li><h4><label for="cpi"><b>CGPA</b></label></h4>
				<input type="decimal" placeholder="Enter minimum cpi required" name="cpi"></li>

				<li><h4><label for="degree"><b>COURSE</b></label></h4>
				<select name="Degree" placeholder="Select">
				<option label="btech">B.Tech</option>
				<option label="btech">MBA.Tech</option>
				<option label="be">MCA</option>
				<option label="me">B.TECH(INTEGRATED)</option>
				<option label="bca">B.PHARM</option>
				<option label="mca">M.PHARM</option>
				<option label="msc">MBA.PHARM</option>
				</select></li>

				<li><h4><label for="branch"><b>BRANCH</b></label></h4>
				<select name="branch" placeholder="Select">
				<option label="cse">C.E</option>
				<option label="it">IT</option>
				<option label="ece">MECHANICAL</option>
				<option label="mee">EXTC</option>
				<option label="msme">MXTC</option>
				<option label="che">CIVIL</option>
				</select></li>

				<li><h4><label for="age"><b>MAXIMUM AGE</b></label></h4>
				<input type="number" placeholder=" " name="age"></li>
		  </ol>
		</div>
		<br>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <br>
    <button type="submit" class="registerbtn btn">
    	<div>
    	<a>
    		<span></span>
    		<span></span>
    		<span></span>
    		<span></span>
    		Create Vacancy
    	</a>
    	</div>
    </button>
  
		</form>
  		</div>

	</body>
		<footer>
		<nav class="navbar navbar-footer" id="bottom-nav">
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

			#col2{
				/*background: red;*/
				width :350px;
				height: 100px;
				float : left;
				margin: 50px;
				display: table-cell;
			}

			#col3{
				/*background: green;*/
				width :350px;
				height: 100px;
				float : left;
				margin : 50px;
				display: table-cell;
				color: black;
				font-weight: bold;
			}

			#col4{
				/*background: blue;*/
				width :220px;
				height: 100px;
				float : left;
				/*margin : 10px;*/
				display: table-cell;
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
		  	a,p{
		  		color: black;
		  		font-weight: bold;
		  		position: relative;
  				display: inline-block;
	  			/*color: #2196f3;*/
	  			text-transform: uppercase;
	  			/*letter-spacing: 4px;*/
	  			text-decoration: none;
	  			/*font-size: 24px;*/
	  			overflow: hidden;
	  			/*transition: 0.2s*/
		  	}

		  	a:hover{

		  	}

		  	a:hover:after{
		  		background-color: none;
		  		box-shadow: 0 0 10px magenta , 0 0 40px red , 0 0 80px magenta;
		  	}
		  	h4{
		  		color: black;
		  		font-weight: 300;
		  	}

			.wrapper
			{
				transform: translate(-50%, -50%);
			}

			.button{
				display: block;
				width: 200px;
				height: 40px;
				line-height: 40px;
				font-size: 18px;
				font-family: sans-serif;
				text-decoration: none;
				color: white;
				border: 2px solid white;
				letter-spacing: 2px;
				text-align: center;
				position: relative;
			}

			span{
				position: relative;
			  	z-index: 2;

			}

			.button:after{
				position: absolute;
				content: "";
				top: 0;
				left: 0;
				width: 0;
				height: 100%;
				background: #0080ff;
				background-color: black;
				/*transition: all .35s;*/
				box-shadow: 0 0 10px magenta , 0 0 40px red , 0 0 80px magenta;
	  			/*transition-delay: 0.5s;*/
			}

			.button:hover{
				color: #fff;
				/*box-shadow: 0 0 10px magenta , 0 0 40px red , 0 0 80px magenta;*/
			}

			.button:hover:after{
				width: 100%;
				position: relative;
  				display: inline-block;
	  			/*color: #2196f3;*/
	  			text-transform: uppercase;
	  			/*letter-spacing: 4px;*/
	  			text-decoration: none;
	  			/*font-size: 24px;*/
	  			overflow: hidden;
	  			/*transition: 0.2s*/
			}

			.container {
				position: relative;
			}

			.center {
				display: block;
				margin-left: auto;
				margin-right: auto;
				width: 10%;
			}

			img { 
			  width: 10%;
			  height: auto;
			  opacity: 1.0;
			}

			.BottomImage{
				height: 100px;
				width: 100px;
				opacity: 100%;
			}
			body {
			  background-image: url('bg2.jpg'); 
			  background-repeat: no-repeat; 
			  background-size: cover;
			  font-family: Nova square;
			  color: black;
			}
			label{
				color: black;
			}
			li{
				letter-spacing: 4px;
				opacity: 100%
			}
			h1{
    			text-align: center;
    			font-family: Nova Square;
    			font-weight: bolder;
			}

            h2 {
            	
            	font-weight: bold;
            	font-family: Nova Square;
            }
			h5{
				color: black;
			}
			#col1 figure{
				background-color: white;
				max-width: 30%;

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
		</style>
</html>