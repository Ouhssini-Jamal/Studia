<!doctype html>
<html>
    <head>
        <title>sign up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/home.css">
      <!-- Javascript files-->
      <script src="js/bootstrap.bundle.min.js"></script>
      <!--google fonts-->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" href="imgs/studia1.png"/>
    </head>

    
    <body>
        <!--navbar-->
      <nav class="navbar navbar-expand-lg nav navbar-light d-flex" id="bar" style="margin-bottom: 45px;">
        <div class="container-fluid nav bg-white fixed-top">
          <a class="navbar-brand" href="index.html"><img src="./imgs/studia.png"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link " href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('register') }}">Sign Up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{ route('login') }}">Log In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
              </li>
            </ul>
            <div class="icons-container">
              <a href="#"><img src="imgs/fb-icon.png"></a>
              <a href="#"><img src="imgs/twitter-icon.png"></a>
              <a href="#"><img src="imgs/linkedin-icon.png"></a>
              <a href="#"><img src="imgs/google.png"></a>
            </div>
          </div>
        </div>
      </nav>
      <div style="margin-top: 100px;"></div><h1 class="about-title">Sign Up to <label style="color: aqua;">Studia</label></h1></div>
      <div class="text-center d-flex justify-content-center"><x-auth-validation-errors :errors="$errors" /></div>
    <form method="POST" action="{{ route('register') }}">
    @csrf
      <div class="d-flex justify-content-center w-100">
            <div class="desc w-75">
            <!-- Names input -->
          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-4 text-center mb-3">
                <label for="fname">First Name :</label>
                <br>
                <input type="text" id="fname" name="fname" placeholder="enter your first name" required/>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4  text-center">
                <label for="lname">Last Name :</label>
                <br>
                <input type="text" id="lname" name="lname" placeholder="enter your last name" required/>
            </div>
          </div>
            <!-- Email input -->
          <div class="row mt-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 text-center">
              <label for="email" >Email address :</label>
              <br>
              <input type="email" style="width: 95%;" name="email" id="email" placeholder="enter your email" required/>
            </div>
          </div>
            <!-- Password input -->
            <div class="row mt-3">
              <div class="col-lg-1"></div>
            <div class="col-lg-4 text-center mb-3">
              <label for="password">Password :</label>
              <br>
              <input type="password" name="password" id="password" placeholder="enter your password" required/>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4 text-center">
              <label for="password_confirmation" >Confirm Password :</label>
              <br>
              <input type="password" type="password" name="password_confirmation" id="confirm_password" placeholder="confirm your password" required/>
            </div>
            </div>
            <!-- choice -->
            <div class="row mt-3">
              <div class="col-lg-1"></div>
              <div class="col-lg-4 mx-2">
                <input type="radio" value="teacher" id="flexCheckDefault1" name="user_type">
                <label for="flexCheckDefault1" >
                    I'm a Tutor
                </label>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-1"></div>
              <div class="col-lg-4 mx-2">
                <input  type="radio" value="student" id="flexCheckDefault2" name="user_type">
                <label  for="flexCheckDefault2" >
                    I'm a Learner
                </label>
                </div>
            </div>
            <!-- Submit button 1-->
            <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
            </div>
            <div class="text-center mt-3">
              <span>you already have an account ? </span>
            <a href="{{ route('login') }}">Log into your account</a>
            </div>
          </div>
    </div>
    </form>
    <div class="marg"></div>
 <!-- footer start -->
 <div class="footer_section layout_padding">
  <div class="container">
   
     <div class="footer_section_2">
        <div class="row">
           <div class="col-sm-4 margin_top icon" >
             <h4 class="information_text mx-3">Contact us on :</h4>
             <a href="#" class="fa fa-facebook"></a>
             <a href="#" class="fa fa-twitter"></a>
             <a href="#" class="fa fa-linkedin"></a>
             <a href="#" class="fa fa-google"></a>
           </div>
           
           <div class="col-sm-4">
              <div class="information_main1">
                 <h4 class="information_text mx-3">Helpful Links :</h4>
                 <div class="footer_menu">
                    <ul>
                       <li><a href="index.html">Home</a></li>
                       <li><a href="about.html">About</a></li>
                       <li><a href="index.html#ser">Services</a></li>
                    </ul>
                 </div>
              </div>
           </div>
           <div class="col-sm-4">
              <div class="information_main w-100 h-100">
                 <div class="justify-content-center d-flex align-items-center w-100 h-100"><a href="index.html"><img src="imgs/Studia.png"></a></div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>
 <div class="copyright_section">
  <div class="container">
     <p class="copyright_text">© 2021 All Rights Reserved. </p>
  </div>
</div>
<!-- footer end -->
</html>