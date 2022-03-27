<?php

    session_start();     
    if( $_SESSION["depart"]=="login" )
    {
        $_SESSION["username"] = $_POST["user_name"];
        $_SESSION["password"] = $_POST["password"];
    }
    elseif( !isset($_SESSION['username']) )
      die("wrong");

    $_SESSION["branch"] = "";    
?>
<?php                
        require_once('config.php');        

        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        $sql = "SELECT * FROM `depart` WHERE `user_name`='$username' && `password`='$password'";        
        
        $result = mysqli_query( $conn , $sql );

        if( !$result )
            die( "we can't select a row from table --> " . mysqli_error($conn) );

        $row=mysqli_fetch_assoc($result);

        // die( mysqli_error($conn) );

        if( !$row )
            die( "please give true username and password" ) ;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Saint | Administrator Dashboard</title>
    <link rel="icon" type="image/jpeg" href="img/sadhu.jpeg"/>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<style type="text/css">
/* Googlefont Poppins CDN Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebar{
  position: fixed;
  height: 100%;
  width: 240px;
  background: #0A2558;
  transition: all 0.5s ease;
}
.sidebar.active{
  width: 60px;
}
.sidebar .logo-details{
  height: 80px;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 28px;
  font-weight: 500;
  color: #fff;
  min-width: 60px;
  text-align: center
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 24px;
  font-weight: 500;
}
.sidebar .nav-links{
  margin-top: 10px;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  height: 50px;
}
.sidebar .nav-links li a{
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li a.active{
  background: #081D45;
}
.sidebar .nav-links li a:hover{
  background: #081D45;
}
.sidebar .nav-links li i{
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: #fff;
}
.sidebar .nav-links li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
}
.sidebar .nav-links .log_out{
  position: absolute;
  bottom: 0;
  width: 100%;
}
.home-section{
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section{
  width: calc(100% - 60px);
  left: 60px;
}
.home-section nav{
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section nav{
  left: 60px;
  width: calc(100% - 60px);
}
.home-section nav .sidebar-button{
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: 500;
}
nav .sidebar-button i{
  font-size: 35px;
  margin-right: 10px;
}
.home-section nav .search-box{
  position: relative;
  height: 50px;
  max-width: 550px;
  width: 100%;
  margin: 0 20px;
}
nav .search-box input{
  height: 100%;
  width: 100%;
  outline: none;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}
nav .search-box .bx-search{
  position: absolute;
  height: 40px;
  width: 40px;
  background: #2697FF;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 4px;
  line-height: 40px;
  text-align: center;
  color: #fff;
  font-size: 22px;
  transition: all 0.4 ease;
}
.home-section nav .profile-details{
  display: flex;
  align-items: center;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  height: 50px;
  min-width: 190px;
  padding: 0 15px 0 2px;
}
nav .profile-details img{
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}
nav .profile-details .admin_name{
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin: 0 10px;
  white-space: nowrap;
}
nav .profile-details i{
  font-size: 25px;
  color: #333;
}
.home-section .home-content{
  position: relative;
  padding-top: 104px;
}
.home-content .overview-boxes{
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 20px;
  margin-bottom: 26px;
}
.overview-boxes .box{
  display: flex;
  align-items: center;
  justify-content: center;
  width: calc(100% / 4 - 15px);
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.overview-boxes .box-topic{
  font-size: 20px;
  font-weight: 500;
}
.home-content .box .number{
  display: inline-block;
  font-size: 35px;
  margin-top: -6px;
  font-weight: 500;
}
.home-content .box .indicator{
  display: flex;
  align-items: center;
}
.home-content .box .indicator i{
  height: 20px;
  width: 20px;
  background: #8FDACB;
  line-height: 20px;
  text-align: center;
  border-radius: 50%;
  color: #fff;
  font-size: 20px;
  margin-right: 5px;
}
.box .indicator i.down{
  background: #e87d88;
}
.home-content .box .indicator .text{
  font-size: 12px;
}
.home-content .box .cart{
  display: inline-block;
  font-size: 32px;
  height: 50px;
  width: 50px;
  background: #cce5ff;
  line-height: 50px;
  text-align: center;
  color: #66b0ff;
  border-radius: 12px;
  margin: -15px 0 0 6px;
}
.home-content .box .cart.two{
   color: #2BD47D;
   background: #C0F2D8;
 }
.home-content .box .cart.three{
   color: #ffc233;
   background: #ffe8b3;
 }
.home-content .box .cart.four{
   color: #e05260;
   background: #f7d4d7;
 }
.home-content .total-order{
  font-size: 20px;
  font-weight: 500;
}
.home-content .sales-boxes{
  display: flex;
  justify-content: space-between;
  /* padding: 0 20px; */
}

/* left box */
.home-content .sales-boxes .recent-sales{
  width: 65%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.home-content .sales-boxes .sales-details{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sales-boxes .box .title{
  font-size: 24px;
  font-weight: 500;
  /* margin-bottom: 10px; */
}
.sales-boxes .sales-details li.topic{
  font-size: 20px;
  font-weight: 500;
}
.sales-boxes .sales-details li{
  list-style: none;
  margin: 8px 0;
}
.sales-boxes .sales-details li a{
  font-size: 18px;
  color: #333;
  font-size: 15;
  text-decoration: none;
}
.sales-boxes .box .button{
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
.sales-boxes .box .button a{
  color: #fff;
  background: #0A2558;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}
.sales-boxes .box .button a:hover{
  background:  #0d3073;
}

/* Right box */
.home-content .sales-boxes .top-sales{
  width: 35%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 0;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.sales-boxes .top-sales li{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 10px 0;
}
.sales-boxes .top-sales li a img{
  height: 40px;
  width: 40px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 10px;
  background: #333;
}
.sales-boxes .top-sales li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sales-boxes .top-sales li .product,
.price{
  font-size: 17px;
  font-weight: 400;
  color: #333;
}
/* Responsive Media Query */
@media (max-width: 1240px) {
  .sidebar{
    width: 60px;
  }
  .sidebar.active{
    width: 220px;
  }
  .home-section{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section{
    /* width: calc(100% - 220px); */
    overflow: hidden;
    left: 220px;
  }
  .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section nav{
    width: calc(100% - 220px);
    left: 220px;
  }
}
@media (max-width: 1150px) {
  .home-content .sales-boxes{
    flex-direction: column;
  }
  .home-content .sales-boxes .box{
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
  }
  .home-content .sales-boxes .top-sales{
    margin: 0;
  }
}
@media (max-width: 1000px) {
  .overview-boxes .box{
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {
  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i{
    display: none;
  }
  .home-section nav .profile-details{
    height: 50px;
    min-width: 40px;
  }
  .home-content .sales-boxes .sales-details{
    width: 560px;
  }
}
@media (max-width: 550px) {
  .overview-boxes .box{
    width: 100%;
    margin-bottom: 15px;
  }
  .sidebar.active ~ .home-section nav .profile-details{
    display: none;
  }
}
select {
  width: 12%;
  background-color: lightgrey;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}
select:hover {
  background-color: lightgreen;
}
input {
  width: 20%;
  background-color: lightgrey;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;

}
input:hover {
  background-color: lightgreen;
}
button {
  width: 100px;
  background-color: lightgrey;
  color: black;
  padding: 5px 5px;
  /* margin: 5px 0; */
  border: none;
  border-radius: 4px;
  cursor: pointer;

}
button:hover {
  background-color: lightgreen;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: lightgray;
  color: black;
}
</style>


   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-home'></i>
      <span class="logo_name">Department</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active" onclick="openPage(event, 'contentName1')">
            <i class='bx bx-grid-alt' ></i>
            <span class="nav-1 links_name nav-tab active">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#" onclick="openPage(event, 'contentName2')">
            <i class='bx bx-user' ></i>
            <span class="nav-2 links_name nav-tab">Student Request</span>
          </a>
        </li>
        <li>
          <a href="#" onclick="openPage(event, 'contentName3')">
            <i class='bx bx-list-ul' ></i>
            <span class="nav-3 links_name nav-tab" >Total Student</span>
          </a>
        </li>
        <li>
          <a href="#" onclick="openPage(event, 'contentName4')">
            <i class='bx bx-coin-stack' ></i>
            <span class="nav-4 links_name nav-tab" >Teacher Management</span>
          </a>
        </li>
        <li>
          <a href="#" onclick="openPage(event, 'contentName7')"> 
            <i class='bx bx-search' ></i>
            <span class="nav-6 links_name nav-tab">Search Teacher</span>
          </a>
        </li>
        <li>
          <a href="#" onclick="openPage(event, 'contentName8')"> 
            <i class='bx bx-search' ></i>
            <span class="nav-6 links_name nav-tab">Search Student</span>
          </a>
        </li>
        <li>
          <a href="#" onclick="openPage(event, 'contentName5')">
            <i class='bx bx-message' ></i>
            <span class="nav-5 links_name nav-tab">Notice Management</span>
          </a>
        </li>
        <li>
          <a href="#" onclick="openPage(event, 'contentName9')">
            <i class='bx bx-award' ></i>
            <span class="nav-5 links_name nav-tab">Degree Student</span>
          </a>
        </li>
        <li>
          <a href="#" onclick="openPage(event, 'contentName6')"> 
            <i class='bx bx-cog' ></i>
            <span class="nav-6 links_name nav-tab">Setting</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
 -->        <li class="log_out">
          <a href="depart_login.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Saint University</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="img/sadhu.jpeg" alt="">
        <span class="admin_name"><?php echo $row["user_name"];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

<!-- first part to be show in front page -->


<!-- total student counting and total request counting this php part is also use for recent notice which sent by depart to teacher and student -->

<?php

$branch = array("ce", "che", "it" , "me" );

$curerent_student = $total_requests_in_orderd_to_join = $j = $total_teacher = 0;

for ($i=0; $i < 4; $i++) { 
  $table_name = $branch[$i] . "_result";

  $sql = "SELECT * FROM `$table_name` WHERE `cpi`='-1';";

  $teacher_table_name = $branch[$i] . "_teacher's information";

  $sql_for_teacher = "SELECT * FROM `$teacher_table_name`";

  $teacher_result = mysqli_query($conn,$sql_for_teacher);
  
  $teacher_in_each_branch = mysqli_num_rows($teacher_result);

  $total_teacher += $teacher_in_each_branch;

  $result = mysqli_query( $conn , $sql );
  
  if( !$result )
    die( "$table_name can't be select successfully in order to calculate total student error in D.B. is -->"  );

    $num_of_rows_in_each_result_table = mysqli_num_rows( $result );

    $curerent_student += $num_of_rows_in_each_result_table;

    $table_name = $branch[$i] . "_student_intro";

    $sql = "SELECT * FROM `$table_name`";

    $result = mysqli_query( $conn , $sql );

    $for_recent_request[$j] = mysqli_fetch_assoc( $result );
    $j++;
    $for_recent_request[$j] = mysqli_fetch_assoc( $result );
    $j++;


    $total_requests_in_each_branch = mysqli_num_rows( $result );

    $total_requests_in_orderd_to_join += $total_requests_in_each_branch;

}
  // echo $total_requests_in_orderd_to_join . "  " . $curerent_student;
?>

    <div class="home-content Right-bar" id="contentName1">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Request</div>
            <div class="number"><?php echo $total_requests_in_orderd_to_join; ?></div>
            <div class="indicator">
              <!-- <i class='bx bx-up-arrow-alt'></i> -->
              <!-- <span class="text">Up from yesterday</span> -->
            </div>
          </div>
          <i class='bx bx-user cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Student</div>
            <div class="number"><?php echo $curerent_student; ?></div>
            <div class="indicator">
              <!-- <i class='bx bx-up-arrow-alt'></i> -->
              <!-- <span class="text">Up from yesterday</span> -->
            </div>
          </div>
          <i class='bx bxs-user cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Teachers</div>
            <div class="number"> <?php echo "$total_teacher"; ?> </div>
            <div class="indicator">
              <!-- <i class='bx bx-up-arrow-alt'></i> -->
              <!-- <span class="text">Up from yesterday</span> -->
            </div>
          </div>
          <i class='bx bx-user cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Visits</div>
            <div class="number">104</div>
            <div class="indicator">
              <!-- <i class='bx bx-down-arrow-alt down'></i> -->
              <!-- <span class="text">Down From Today</span> -->
            </div>
          </div>
          <i class='bx bxs-user cart four' ></i>
        </div>
      </div>

<!-- total  students -->



      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Requests</div>
          <div class="sales-details">
          
            <ul class="details">
            <li class="topic">Students Name</li>
            <?php
                $count = 8;
                for( $i = 0; $i < $count; $i++){
                  echo "<li>"; echo $for_recent_request[$i]['full_name']; "</li>";
                }
            ?>
          </ul>
          <ul class="details">
            <li class="topic">Branch</li>
            <?php
                
                for( $i = 0; $i < 4; $i++)
                {                
                  echo "<li>"; echo $branch[$i]; "</li>";
                  echo "<li>"; echo $branch[$i]; "</li>";
                }
            ?>
            <li></li>
          </ul>
        <!--   <ul class="details">
            <li class="topic">Total</li>
            <li><a href="#">$204.98</a></li>
            <li><a href="#">$24.55</a></li>
            <li><a href="#">$25.88</a></li>
            <li><a href="#">$170.66</a></li>
            <li><a href="#">$56.56</a></li>
            <li><a href="#">$44.95</a></li>
            <li><a href="#">$67.33</a></li>
             <li><a href="#">$23.53</a></li>
             <li><a href="#">$46.52</a></li>
          </ul>
 -->          </div>
          <div class="button">
            <a href="#" onclick="openPage(event, 'contentName2')">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Recent Notice To Teacher</div>
          <ul class="top-sales-details">
          
          <?php
                  

                  $sql = "SELECT * FROM `notice_to_teacher`";
                  $result = mysqli_query( $conn , $sql );
                  $id = $num_of_rows_in_notice_to_teacher_table = mysqli_num_rows( $result );
                  
                  $count=4;

                  while( $count-- )
                  {
                    
                    echo "<li>";

                      $sql = "SELECT * FROM `notice_to_teacher` where `sno`='$id' ";
                      $result = mysqli_query( $conn , $sql );

                      $row = mysqli_fetch_assoc( $result );

                      if( !$row )
                        break;

                      // die( var_dump($row) );
                      echo '<span class="product">'.$row["notice"].'</span>';
                      echo "<span class='price'>".$row["time"]."</span>";
                    
                    echo "</li>";
                    $id--;
                  }
          ?>
            
            
              
          <div class="title">Recent Notice To Student</div>
                  
          <?php
                  

                  $sql = "SELECT * FROM `notice_to_student`";
                  $result = mysqli_query( $conn , $sql );
                  $id = $num_of_rows_in_notice_to_student_table = mysqli_num_rows( $result );
                  
                  $count=4;

                  while( $count-- )
                  {
                    
                    echo "<li>";

                      $sql = "SELECT * FROM `notice_to_student` where `sno`='$id' ";
                      $result = mysqli_query( $conn , $sql );

                      $row = mysqli_fetch_assoc( $result );

                      if( !$row )
                        break;

                      // die( var_dump($row) );
                      echo '<span class="product">'.$row["notice"].'</span>';
                      echo "<span class='price'>".$row["time"]."</span>";
                    
                    echo "</li>";
                    $id--;
                  }
          ?>

          </ul>
        </div>
      </div>
    </div>

<!-- student request 2nd part  -->
    <script>
      
      function getrequest(branch, divid){
                $.ajax({
                    url: '/phpproject/show_students_request_to_department_backend.php?branch='+branch, 
                    success: function(html) {
                        var ajaxDisplay = document.getElementById(divid);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getrequestdetail(sno, branch){
                $.ajax({
                    url: '/phpproject/show_all_detail_of_stu_to_depart_in_order_to_accept.php?branch='+branch+'&sno='+sno, 
                    success: function(html) {
                        var divid = 'requestdetails';
                        var ajaxDisplay = document.getElementById(divid);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function acceptstu(sno, branch){
                $.ajax({
                    url: '/phpproject/accept_stu_by_depart.php?branch='+branch+'&sno='+sno, 
                    success: function(html) {
                        var divid = 'requestdetails';
                        var ajaxDisplay = document.getElementById(divid);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
    </script>
    <div class="home-content Right-bar" id="contentName2" style="display: none;">
        <center><h2>Student Requests</h2><br>
        <select name="branch" id="branch"  class="form-control" onchange='getrequest(this.value, "request")'>
            <option value="">--Branch--</option>
            <option value="ALL">ALL</option>
            <option value="ce">CE</option>
            <option value="it">IT</option>
            <option value="me">ME</option>
            <option value="che">CHE</option>
        </select></center>
        <br><br>
    <center>
        <div id="request"></div>
          <div id="requestdetails"></div></center>
        <br>
  <!-- <a href="show_students_request_to_department_backend.php">Show Request</a> -->
    </div>

<!-- total student 3rd part  -->
        <script type="text/javascript">
            function getData1(empid, divid){
                $.ajax({
                    url: '/phpproject/assets/php/1semshow.php?empid='+empid, 
                    success: function(html) {
                        var ajaxDisplay = document.getElementById(divid);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getData2(empid, divid){
                $.ajax({
                    url: '/phpproject/assets/php/2semshow.php?empid='+empid, 
                    success: function(html) {
                        var ajaxDisplay = document.getElementById(divid);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getData3(empid, divid){
                $.ajax({
                    url: '/phpproject/assets/php/3semshow.php?empid='+empid, 
                    success: function(html) {
                        var ajaxDisplay = document.getElementById(divid);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getData4(empid, divid){
                $.ajax({
                    url: '/phpproject/assets/php/4semshow.php?empid='+empid, 
                    success: function(html) {
                        var ajaxDisplay = document.getElementById(divid);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getData5(sno){
                $.ajax({
                    url: '/phpproject/show_all_detail_of_accepted_stu_to_depart.php?sno='+sno, 
                    success: function(html) {
                        var divid1 = 'displaydata';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getData51(sno){
                $.ajax({
                    url: '/phpproject/show_all_detail_of_accepted_stu_to_depart.php?sno='+sno, 
                    success: function(html) {
                        var divid1 = 'searchresult1';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getData61(sno){
                $.ajax({
                    url: '/phpproject/fee.php?sno='+sno, 
                    success: function(html) {
                        var divid1 = 'searchresult1';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getData6(sno){
                $.ajax({
                    url: '/phpproject/fee.php?sno='+sno, 
                    success: function(html) {
                        var divid1 = 'displaydata';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getData7(sno){
                $.ajax({
                    url: '/phpproject/ACTION_of_deletion_of_stu_by_depart.php?sno='+sno, 
                    success: function(html) {
                        var divid1 = 'displaydata';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function getData71(sno){
                $.ajax({
                    url: '/phpproject/ACTION_of_deletion_of_stu_by_depart.php?sno='+sno, 
                    success: function(html) {
                        var divid1 = 'searchresult1';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function sendnotice(sign){
                $.ajax({
                    url: '/phpproject/send_notice.php?sign='+sign, 
                    success: function(html) {
                        var divid1 = 'sendnotice';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function sendnotice(sign){
                $.ajax({
                    url: '/phpproject/send_notice.php?sign='+sign, 
                    success: function(html) {
                        var divid1 = 'sendnotice';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function shownotice(sign){
                $.ajax({
                    url: '/phpproject/show_notice.php?sign='+sign, 
                    success: function(html) {
                        var divid1 = 'sendnotice';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
            function shownotice(sign){
                $.ajax({
                    url: '/phpproject/show_notice.php?sign='+sign, 
                    success: function(html) {
                        var divid1 = 'sendnotice';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }

        </script>



    <div class="home-content Right-bar" id="contentName3" style="display: none;">

        <center><h2>Student Details</h2><br>
                <form method="post">
                  <label>1st Sem Details</label>
              <select name="empid" id="empid"  class="form-control" onchange="getData1(this.value, 'displaydata')">
            <option value="">--Branch--</option>
            <option value="ce">CE</option>
            <option value="it">IT</option>
            <option value="me">ME</option>
            <option value="che">CHE</option>
          </select>

            <label>2nd Sem Details</label>
              <select name="empid" id="empid"  class="form-control" onchange='getData2(this.value, "displaydata")'>
            <option value="">--Branch--</option>
            <option value="ce">CE</option>
            <option value="it">IT</option>
            <option value="me">ME</option>
            <option value="che">CHE</option>
        </select>

        <label>3rd Sem Details</label>
              <select name="empid"  class="form-control" onchange='getData3(this.value, "displaydata")'>
            <option value="">--Branch--</option>
            <option value="ce">CE</option>
            <option value="it">IT</option>
            <option value="me">ME</option>
            <option value="che">CHE</option>
        </select>

        <label>4th Sem Details</label>
              <select name="empid" id="empid"  class="form-control" onchange="getData4(this.value, 'displaydata')">
            <option value="">--Branch--</option>
            <option value="ce">CE</option>
            <option value="it">IT</option>
            <option value="me">ME</option>
            <option value="che">CHE</option>
        </select>
        
        
            <div id="displaydata">
            </div>
            <div id="displaystudent">
            </div>
        </form>
        </center>
    </div>



<!-- teacher management 4rth part  -->

    <div class="home-content Right-bar" id="contentName4" style="display: none;">
       <center> <h1>Teacher Management</h1><br>
  <a href="add_teacher.php">Add A Teacher</a>&nbsp;&nbsp;
  <a href="show_teacher's_details_to_depart.php">Show Teacher`s Details</a></center>
    </div>


    <!-- search engine part 7 here-->
    <script>
      function searchteacher(){
        var branchsearchtea = document.getElementById('branchsearchtea').value;
        var datasearchtea = document.getElementById('datasearchtea').value;
                $.ajax({
                    url: '/phpproject/assets/php/teachersearch.php?branchsearchtea='+branchsearchtea+'&datasearchtea='+datasearchtea, 
                    success: function(html) {
                        var divid1 = 'searchresult';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
    </script>
    <script>
      function searchstudent(){
        var branchsearchstu = document.getElementById('branchsearchstu').value;
        var datasearchstu = document.getElementById('datasearchstu').value;
        var selectsearchstu = document.getElementById('selectsearchstu').value;
        var semsearchstu = document.getElementById('semsearchstu').value;

                $.ajax({
                    url: '/phpproject/assets/php/studentsearch.php?branchsearchstu='+branchsearchstu+'&datasearchstu='+datasearchstu, 
                    type: "get",
                    data: {
                        selectsearchstu: selectsearchstu,
                        semsearchstu: semsearchstu
                    },

                    success: function(html) {
                        var divid1 = 'searchresult1';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
    </script>
    <div class="home-content Right-bar" id="contentName7" style="display: none;">
       <center><h1>Search Teacher</h1>


        <select name="branch" required id="branchsearchtea">

            <option value="">--Branch--</option>

            <option value="ce">CE</option>
            <option value="it">IT</option>
            <option value="che">CHE</option>
            <option value="me">ME</option>
        </select>
        <input type="text" name="data" required id="datasearchtea" placeholder="Type Mail">
        <button type="button" onclick="searchteacher();">Search Teacher</button>

        <br><div id="searchresult"></div>

</center></div>
<div class="home-content Right-bar" id="contentName8" style="display: none;"><center>



        <h1>Search Student</h1>

        <select name="branch" id="branchsearchstu" required>

            <option value="">--Branch--</option>

            <option value="ce">CE</option>
            <option value="it">IT</option>
            <option value="che">CHE</option>
            <option value="me">ME</option>
        </select>
        <select name="semster" required id="semsearchstu">

            <option value="">--semster--</option>

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <select name="col_name" required id="selectsearchstu">
            <option value="">Option</option>

            <option value="stu_email">Email_ID</option>
            <option value="full_name">FULL NAME</option>
        </section>

        <input type="text" name="data" required placeholder="keyword" id="datasearchstu">
        <button type="button" onclick="searchstudent();">Search Student</button>
<div id="searchresult1"></div>

       </center>
   </center> </div>


<!-- notice management 5th part  -->
    <script>
        function submitgo(){
                var notice = document.getElementById("notice").value;
                $.ajax({
                    url: '/phpproject/send_notice.php?notice='+notice, 
                    success: function(html) {
                        var divid1 = 'sendnotice';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
    </script>


    <div class="home-content Right-bar" id="contentName5" style="display: none;">
      <center>
        <h2>Notice Management</h2><br>
          <button type="button" onclick="sendnotice('1')">Send To Teacher</button>&nbsp;
          <button type="button" onclick="sendnotice('0')">Send To Student</button>&nbsp;
          <button type="button" onclick="shownotice('1')">Show Of Teacher</button>&nbsp;
          <button type="button" onclick="shownotice('0')">Show Of Student</button>
        <br><br>
        <div id="sendnotice"></div>
      </center>
        </div>

<!-- settings 6th part  -->

    <div class="home-content Right-bar" id="contentName6" style="display: none;">
        <center><h1 style="font-size:5vw;">User Profile</h1></center>
    </div>

<!-- degree part -->
    <script>
      function searchdegree(){
        var branchdegree = document.getElementById('branchdegree').value;
        var yeardegree = document.getElementById('yeardegree').value;

                $.ajax({
                    url: '/phpproject/show_degree_students_to_depart.php', 
                    type: "get",
                    data: {
                        branchdegree: branchdegree,
                        yeardegree: yeardegree
                    },

                    success: function(html) {
                        var divid1 = 'searchresult3';
                        var ajaxDisplay = document.getElementById(divid1);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
    </script>

    <div class="home-content Right-bar" id="contentName9" style="display: none;">
        <center><h1>Search Graduate Student</h1><br>

        <select name="year" required id="yeardegree">
        <?php
for ($year = 2016; $year < date('Y'); $year++) {
    echo "<option value='$year'>$year</option>";
}

?>
    </select>

    <select name="branch" required id="branchdegree">
        <option value="ce">CE</option>
        <option value="it">IT</option>
        <option value="me">ME</option>
        <option value="che">CHE</option>
    </select>
<button type="button" onclick="searchdegree();">Search Student</button>
<div id="searchresult3"></div>
</center>
    </div>

  </section>



<script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
<script type="text/javascript">
  function openPage(evt, pageName) {
    var i, pagecontent, tablinks;
    pagecontent = document.getElementsByClassName("Right-bar");
    for (i = 0; i < pagecontent.length; i++) {
        pagecontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("nav-tab");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(pageName).style.display = "block";
    evt.currentTarget.className += " active";
}

</script>

</body>
</html>