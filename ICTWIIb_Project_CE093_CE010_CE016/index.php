<?php

    session_start();
    
    require_once "config.php";

    if(isset($_GET['notice']) && 1==$_GET['notice'] )
    {
        $intro_table  =  $_SESSION["branch"] . "_student_intro";

            $fullname = $_SESSION["fullname"];
            $student_email = $_SESSION["student_email"];
            $student_num = $_SESSION['stu_number'];
            $parent_num = $_SESSION["parent_num"];
            $date = $_SESSION["date"];
            $month = $_SESSION["month"];
            $year = $_SESSION["year"];
            $school_name = $_SESSION["school_name"];
            $self_intro = $_SESSION["self_intro"];
            $branch = $_SESSION['branch'];
            $img1name = $_SESSION["stu_number"] . "photo.jpg";
            $img2name = $_SESSION["stu_number"] . "result.jpg";
            $img2 = '';
            $img1 = '';
            $img1 = $_SESSION["photo1"];
            $img2 = $_SESSION["result1"];
            
            rename($img1, "stu_photo/".$branch."/photo/".$img1name);
            rename($img2, "stu_photo/".$branch."/result/".$img2name);
            
            $inim1 = "stu_photo/".$branch."/photo/".$img1name;
            $inim2 = "stu_photo/".$branch."/result/".$img2name;
            
            $sql = "INSERT INTO `$intro_table` (`sno`, `full_name`, `stu_email`, `student_num`, `parent_num`, `DOB`, `prev_school_name`, `self_intro`, `photo`, `result`) VALUES (NULL, '$fullname', '$student_email', '$student_num', '$parent_num', '$year-$month-$date' , '$school_name', '$self_intro', '$inim1', '$inim2');";
    
            // Seding Mail to Student

    $email = $student_email;
    
    $subject = "Welcome To Saint University";
    $body = "<center><h1>Hi, $fullname </h1><br><h2> You have Applied to Saint University\nWe will notify you when your application will be accpetd\nThanks for applying to Saint<h2></center>";
    $headers = '';
    $headers .= "Content-type: text/html\r\n";

    if (mail($email, $subject, $body, $headers)) {
        echo "Email successfully sent to $email...";
    } else {
        echo "Email sending failed...";
    }


        $result = mysqli_query( $conn , $sql );    
        
       if(!$result)
          die(mysqli_error($conn));        
    }

    session_destroy();        
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Saint University | Home</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/img/sadhu.jpeg" type="image/jpeg">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="assets/css/style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body> 

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>vasuforyou481210@gmail.com</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>9327271053</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="https://www.instagram.com/vashishthchaudhary/"><span class="fa fa-instagram"></span></a></li>
                      <li><a href="https://www.youtube.com/channel/UCT_aAHVTwIPvW3mEUfHbB7g"><span class="fa fa-youtube"></span></a></li>
                      <li><a href="https://wa.link/u7w477"><span class="fa fa-whatsapp"></span></a></li>
                      <li><a href="https://www.linkedin.com/in/vashishth-patel-312a52204"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="mailto:Vashishthchaudhary48@outlook.com"><span class="fa fa-skype"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <!-- <a class="navbar-brand" href="index.php"><i class="fa fa-university"></i><span>saint</span></a> -->
          <a class="navbar-brand" href="index.php"><table><tbody><tr><td><img src="assets/img/sadhu.jpeg" height="40px" width="40px"></td><td><i><span>saint university</span></td></tr></tbody></table></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="index.php">Home</a></li>            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="course.html">Course Archive</a></li>                
                <li><a href="course-detail.html">Course Detail</a></li>                
              </ul>
            </li>           
            <li><a href="depart_login.php">Administrator</a></li>           
            <li><a href="contact.html">Contact</a></li>
            <li><a href="loginpage.php">Login</a></li>               
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->

  <!-- Start Slider -->
  <section id="mu-slider">
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="assets/img/slider/1.png" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Welcome To Saint</h4>
        <span></span>
        <h2>Where Education Is Nature</h2>
        <p></p>
        <a href="guestlogin.php" class="mu-read-more-btn">Apply Now</a>
      </div>
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="assets/img/slider/2.png" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Best Quality Free Education</h4>
        <span></span>
        <h2>Education Is Not For Business</h2>
        <p></p>
        <a href="guestlogin.php" class="mu-read-more-btn">Apply Now</a>
      </div>
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="assets/img/slider/3.png" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Exclusivly For Education</h4>
        <span></span>
        <h2>Education For Everyone</h2>
        <p></p>
        <a href="guestlogin.php" class="mu-read-more-btn">Apply Now</a>
      </div>
    </div>
    <!-- Start single slider item -->    
  </section>
  <!-- End Slider -->
  <!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-book"></span>
              <h3>Learn Online</h3>
              <p>Due to this pandamic we have started education online. We provide best education on online as well as offline also.</p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-users"></span>
              <h3>Expert Teachers</h3>
              <p>We have world class expert teachers and faculties so you can get best education. Teachers are well qualified in their area.</p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-table"></span>
              <h3>Best Classrooms</h3>
              <p>We have aslo a nice and well build infrastructure and also digital class to make student interactive in classroom also.</p>
            </div>
            <!-- Start single service -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>About Us</h2>              
                  </div>
                  <!-- End Title -->
                  <p>Established in 1920. Saint University has long been a home to critical thinking, progressive edcation, and a conscientious community. The school is commited to pushing positive change and creating a caring world for everyone.</p>
                  <ul>
                    <li>University has a rich infrastructure and has a 100 acre sprawling campus.</li>
                    <li>We also focus on sports and in cultural activites.</li>
                    <li>There is a big benefit of a dadicated university.</li>
                  </ul>
                  <p>Our ultimate goal is to achieve a big succes in education and also providing a good knowladge to people.</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-right">                            
                <a id="mu-abtus-video" href="https://www.youtube.com/embed/_Pvo0s1R2o8" target="mutube-video">
                  <img src="assets/img/about-us.png" alt="img">
                </a>                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->

  <!-- Start about us counter -->
  <section id="mu-abtus-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-abtus-counter-area">
            <div class="row">
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-book"></span>
                  <h4 class="counter">568</h4>
                  <p>Subjects</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-users"></span>
                  <h4 class="counter">3500</h4>
                  <p>Students</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-flask"></span>
                  <h4 class="counter">65</h4>
                  <p>Modern Lab</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single no-border">
                  <span class="fa fa-user-secret"></span>
                  <h4 class="counter">250</h4>
                  <p>Teachers</p>
                </div>
              </div>
              <!-- End counter item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us counter -->

  <!-- Start features section -->
  <section id="mu-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-features-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Our Features</h2>
              <p>Here is some small highlights of our university..! Take a look..!</p>
            </div>
            <!-- End Title -->
            <!-- Start features content -->
            <div class="mu-features-content">
              <div class="row">
                <div class="col-lg-4 col-md-4  col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-book"></span>
                    <h4>Professional Courses</h4>
                    <p>We provide professional courses on engineering like compuret science , chemical engineering , mechanical engineering and information technology.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-users"></span>
                    <h4>Expert Teachers</h4>
                    <p>We have expert teachers and faculties to provide best education to students and also to serve best practical knowledge to students.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-laptop"></span>
                    <h4>Online Learning</h4>
                    <p>We work on offline platform as well as online platform to provide best learning experience to student. We use Google Meet platform for teaching students. We also take lab sessions and practical in online mode.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-microphone"></span>
                    <h4>Audio Lessons</h4>
                    <p>We also provide audio lessons to blind students for theis studies and to  make them interactive to other students.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-film"></span>
                    <h4>Video Lessons</h4>
                    <p>We also provide video lessons and also recorded sessions to students for revising them the lectures and notes.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-certificate"></span>
                    <h4>Professional Certificate</h4>
                    <p>Saint provides you a valid and valuable certificated on completing the degree or a course. This certificate is very useful for student's placements.</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- End features content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End features section -->

  <!-- Start our teacher -->
  <section id="mu-our-teacher">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2>Our Teachers</h2>
              <p>Here is some highlights of our teachers..! Take a look..!</p>
            </div>
            <!-- end title -->
            <!-- begain our teacher content -->
            <div class="mu-our-teacher-content">
              <div class="row">
                <div class="col-lg-3 col-md-3  col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="assets/img/teachers/teacher-01.jpeg" alt="teacher img" height="260px" width="265px">
                      <div class="mu-our-teacher-social">
                        <a href="https://github.com/vasu-1"><span class="fa fa-github"></span></a>
                        <a href="https://wa.link/u7w477"><span class="fa fa-whatsapp"></span></a>
                        <a href="https://www.linkedin.com/in/vashishth-patel-312a52204"><span class="fa fa-linkedin"></span></a>
                        <a href="https://www.instagram.com/vashishthchaudhary/"><span class="fa fa-instagram"></span></a>
                      </div>
                    </figure>                    
                    <div class="mu-ourteacher-single-content">
                      <h4>Drumil Akhenia</h4>
                      <span>Programming Teacher</span>
                      <p>Drumil has been a programming teacher ever since 2014. he knows all programming languages including scripting languages.</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="assets/img/teachers/teacher-02.jpg" alt="teacher img" height="260px" width="265px"> 
                      <div class="mu-our-teacher-social">
                        <a href="https://github.com/vasu-1"><span class="fa fa-github"></span></a>
                        <a href="https://wa.link/u7w477"><span class="fa fa-whatsapp"></span></a>
                        <a href="https://www.linkedin.com/in/vashishth-patel-312a52204"><span class="fa fa-linkedin"></span></a>
                        <a href="https://www.instagram.com/vashishthchaudhary/"><span class="fa fa-instagram"></span></a>
                      </div>
                    </figure>                    
                    <div class="mu-ourteacher-single-content">
                      <h4>Priyanshi Bhadresa</h4>
                      <span>Physics Teacher</span>
                      <p>Priyanshi has been a physics teacher ever since 2010. she knows all about physics including quantom physics. She has best experience of teaching.</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="assets/img/teachers/teacher-03.jpeg" alt="teacher img" height="260px" width="265px">
                      <div class="mu-our-teacher-social">
                        <a href="https://github.com/vasu-1"><span class="fa fa-github"></span></a>
                        <a href="https://wa.link/u7w477"><span class="fa fa-whatsapp"></span></a>
                        <a href="https://www.linkedin.com/in/vashishth-patel-312a52204"><span class="fa fa-linkedin"></span></a>
                        <a href="https://www.instagram.com/vashishthchaudhary/"><span class="fa fa-instagram"></span></a>
                      </div>
                    </figure>                    
                    <div class="mu-ourteacher-single-content">
                      <h4>Jeet savsani</h4>
                      <span>English Teacher</span>
                      <p>Jeet has been a english teacher ever since 2012. he knows all about english and he is a gold medalist in english.</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="assets/img/teachers/teacher-04.jpg" alt="teacher img" height="260px" width="265px">
                      <div class="mu-our-teacher-social">
                        <a href="https://github.com/vasu-1"><span class="fa fa-github"></span></a>
                        <a href="https://wa.link/u7w477"><span class="fa fa-whatsapp"></span></a>
                        <a href="https://www.linkedin.com/in/vashishth-patel-312a52204"><span class="fa fa-linkedin"></span></a>
                        <a href="https://www.instagram.com/vashishthchaudhary/"><span class="fa fa-instagram"></span></a>
                      </div>
                    </figure>                    
                    <div class="mu-ourteacher-single-content">
                      <h4>Vashishth Patel</h4>
                      <span>ES Teacher</span>
                      <p>Vashishth has been a enviromnent science teacher ever since 2016. he is expert in enviromnent and gold medalist in ES subject.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <!-- End our teacher content -->           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End our teacher -->

  <!-- Start testimonial -->
  <section id="mu-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div id="mu-testimonial-slide" class="mu-testimonial-content">
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Saint University is best for computer science engineering. I have got 72 lakhs package from on campus placement. Thank you Saint..!</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="assets/img/testimonial-1.jpg" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>Pranav Shah</h4>
                  <span>Happy Student</span>
                </div>
              </div>
              <!-- end testimonial single item -->
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Saint is very good and well known university. The management and education is fabulous in this university.</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="assets/img/testimonial-3.png" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>Miraj Chaudhary</h4>
                  <span>Happy Parent</span>
                </div>
              </div>
              <!-- end testimonial single item -->
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Saint has provided me everything.. there is no words for it.. Thank you so much Saint..!</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="assets/img/testimonial-2.png" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>Stev Angel</h4>
                  <span>Happy Student</span>
                </div>
              </div>
              <!-- end testimonial single item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End testimonial -->

  <!-- Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Information</h4>
                <ul>
                  <li><a href="#mu-about-us">About Us</a></li>
                  <li><a href="#mu-features">Features</a></li>
                  <li><a href="">Course</a></li>
                  <li><a href="">Term Of Use</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Student Help</h4>
                <ul>
                  <li><a href="guestlogin.php">Get Started</a></li>
                  <li><a href="#">My Questions</a></li>
                  <li><a href="">Download Files</a></li>                
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>News letter</h4>
                <p>Get latest update, news & academic offers</p>
                <form class="mu-subscribe-form">
                  <input type="email" placeholder="Type your Email">
                  <button class="mu-subscribe-btn" type="submit">Subscribe!</button>
                </form>               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Contact</h4>
                <address>
                  <p>Phone: 9327271053 </p>
                  <p>Website: http://saint.mywebcommunity.org</p>
                  <p>Email: vasuforyou481210@gmail.com</p>
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; All Right Reserved. Designed by <a href="http://saint.mywebcommunity.org/" rel="nofollow">Saint</a></p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->
  
  <!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
  
  
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 

  </body>
</html>