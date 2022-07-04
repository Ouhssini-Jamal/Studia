<!DOCTYPE html>
<html lang="en">
    <head>
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
      <title>Studia</title>
    </head>
    <body>

        <!--navbar-->
      <nav class="navbar navbar-expand-lg navbar-light d-flex" id="bar" style="margin-bottom: 45px;">
        <div class="container-fluid nav bg-white fixed-top">
          <a class="navbar-brand" href="/"><img src="imgs/studia.png"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Log In</a>
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
      <!--intro section-->
      <div class="intro">
        <div class="row">
          <div class="col d-flex justify-content-center mt-4 mb-5 title text-center"><h1 class="p-2 w-75">Studia E-learning platform</h1></div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-sm-3 d-flex text-center"><h3 id="quote">good education is a foundation for a better future.</h3></div>
            <div class="row d-flex justify-content-between justify-content-center">
              <div class="col-4"></div>
              <div class= "col-sm-2 d-flex justify-content-center " style="margin-top: 50px;"><a href="{{ route('register') }}"><button class="btn btn-warning btn-rounded " style="width: 100px;">Sign Up</button></a></div>
              <div class= "col-sm-2 d-flex justify-content-center " style="margin-top: 50px;"><a href="{{ route('login') }}"><button class="btn btn-warning btn-rounded " style="width: 100px;">Log In</button></a></div>
              <div class="col-4"></div>
            </div>
        </div>
      </div>
      <!-- services section start -->
      <div class="services-desc" id="ser" style="margin-top: 80px;">
        <h1 class="text-center serv-title"><span style="color: aqua;">Our</span> Services</h1>
        <center><hr style="height: 20px; width: 40px;color: rgb(0, 255, 234);border-radius: 30%;"></center>
        <div class="row mt-5 mb-3 d-flex justify-content-center">
          <div class="col-sm-5 mb-3 d-flex justify-content-center">
            <div class="img-wraper">
              <img class="serv-img w-100 h-100" src="imgs/p1.jpeg">
              <p class="img__description w-100 h-100 d-flex justify-content-center align-items-center">create / join a classroom.</p>
            </div>
          </div>
          <div class="col-sm-5 d-flex justify-content-center ">
            <div class="img-wraper">
              <img class="serv-img w-100 h-100" src="imgs/p2.jpeg">
              <p class="img__description w-100 h-100 d-flex justify-content-center align-items-center">upload / get access to a course.</p>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-sm-5 mb-3 d-flex justify-content-center">
            <div class="img-wraper">
              <img class="serv-img w-100 h-100" src="imgs/p3.jpeg">
              <p class="img__description w-100 h-100 d-flex justify-content-center align-items-center">contact between students and teachers.</p>
            </div>
          </div>
          <div class="col-sm-5 d-flex justify-content-center">
            <div class="img-wraper">
              <img class="serv-img w-100 h-100" src="imgs/p4.jpeg">
              <div class="img__description w-100 h-100 d-flex justify-content-center align-items-center">post / comment in the classroom.</div>
            </div>
          </div>
        </div>
      </div>
      <!-- services section ends-->
      <!-- why us section start -->
      <div class="mt-4">
        <h1 class="about-title">Why <label style="color: aqua;">Us</label></h1>
        <div class=" row d-flex justify-content-center" >
          <div class="col-sm-3"></div>
          <div class="desc col-sm-6">
            our platform is dedicated to guarantee one of the best user experience ever, as a persons that knows what e-learning field needs, we chose the name Studia that refers to study to show what this platform is made for, also we have a great services for both students and teachers, so a teacher can create a classroom in the platform with any convenient name, so the students can join this classroom to communicate with their teacher and have an access to the course files that are already uploaded by a teacher, also in every classroom the students can post and comment freely just to emphasis of an atmosphere of a real classroom.
          </div>
          <div class="col-sm-3"></div>
        </div>
      </div>
 <!-- footer start -->
 <div class="footer_section layout_padding">
  <div class="container">

     <div class="footer_section_2">
        <div class="row">
           <div class="col-sm-4 margin_top icon" >
             <h4 class="information_text mx-3">Contact us on :</h4>
             <a href="#" class="fa fa-facebook" ></a>
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
                       <li><a href="{{ route('about') }}">About</a></li>
                       <li><a href="#ser">Services</a></li>
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
</body>
</html>
