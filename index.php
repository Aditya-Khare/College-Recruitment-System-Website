<!DOCTYPE html>
<html lang="us-en">
<head>
  <link rel="icon" type="image/png" href="">
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--<title>Campus Recruitment Portal</title>-->
</head>
<body>

  <header>
    <a href="index1.html">
      <img class="logo" src="logo.png" alt="logo">
    </a>
    <nav>
      <ul class="nav_links">
        <li><a href="#">Projects</a></li>
        <li><a href="#">services</a></li>
        <li><a href="About_Us.html">About</a></li>
      </ul>
    </nav>
    <a class="cta" href="#"><button>Contact</button></a>
  </header>

  <div class="container">

    <div class="clm ps0">
      <img class ="logom" src="c4.jpg" alt="">
    </div>

    <div class="clm ps1">
      <span class="button sub s1" ><a href="javascript:lgn()">LOGIN</a></span><br>
      <span class="button sub s2" ><a href="javascript:reg()">REGISTER</a></span><br>
      <span class="button sub s3" ><a href="javascript:fp()">FORGOT PASSWORD ?</a></span>
    </div>

    <div class="clm ps2 l1">
      <h1>Login here</h1>
      <form action="login.php" id="loginform" method="POST">
        <div>
        <input class="frm" type="text" placeholder="Username" name="uname" id="usrnm" required>
        </div>
        <input class="frm" type="password" placeholder="Password" name="pwd" id="pswrd" required>
        <div>
          <select class="frm" name="type">
            <option value="Student">Student</option>
            <option value="Company">Company</option>
            <option value="Admin">Admin</option>
          </select>
        </div>
        <br>
        <div class="btn">
          <a href="javascript: {}" class="button" onclick="document.getElementById('loginform').submit(); return false;"  type="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Login
          </a>
        </div>  
      </form>
    </div>

    <div class="clm ps2 l2">
      <h1>REGISTER HERE</h1><br><br>
      <div>
        <!--<p class="frm">New student?<a href="register1.html"> <u>Click To Register<u></a></u></p>-->
            <div class="btn">
              <a href="register1.html">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                New Student
              </a>
            </div>
            <br><br>
          <div class="btn">
            <a href="company_register1.html">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              New Company
            </a>
        </div> 
      </div>
    </div>

    <div class="clm ps2 l3">
     <h1>Password reset</h1>
     <p>Enter your email address below and we'll send you an email with instructions.</p>
      <input class="frm" type="text" placeholder="Email" name="uname" id="usrnm" required>
      <br>
      <div class="btn">
        <a href="javascript:reset()">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Reset
        </a>
      </div>
    </div>

  </div>

  <script src="js.js" type="text/javascript"></script>
</body>
</html>
