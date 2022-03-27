<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
      <title>Saint | Student Dashboard</title>
  <link rel="icon" type="image/jpeg" href="assets/img/sadhu.jpeg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
      /* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add an active class to highlight the current page */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
  display: none;
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
  </style>
</head>

<?php session_start(); ?>

<?php 
            if( isset($_POST["branch"]) )
            {
                $_SESSION["branchstu"] = $_POST["branch"];
                $_SESSION["given_email"]=$_POST["given_email"]; 
                $_SESSION["password"]=$_POST["password"]; 
                $_SESSION["sem"]=$_POST["sem"]; 
            } 
            elseif( !isset($_SESSION["sem"]) )
                die( "wrong" );
    ?>

<?php

    require_once('config.php');
    
    $branch = $_SESSION["branchstu"];
    $sem = $_SESSION["sem"];
    $table_name = $branch . "_sem_" . $_SESSION["sem"];

    $stu_email = $_SESSION['given_email'];
    $dob = $_SESSION['password'];
    
    $sql = "SELECT * FROM `$table_name` WHERE `stu_email`='$stu_email' and `DOB`='$dob' ";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "Table selection from database isn't possible --> " . mysqli_error($conn) );
                
    $row=mysqli_fetch_assoc($result);
    
        $date = $row["DOB"];
        $img = $row["photo"];

    if( !empty($_POST["branch"]) )
            $_SESSION["sno"] = $row["sno"];
            
    $sno = $_SESSION["sno"];
    
    if( !$row )
    {
        $_SESSION['password']='!!!';
        echo '<script>
              location.replace("studentlogin.php");
              </script>';
    }            
    //echo $row["full_name"] . "<br>";
   // echo  "show_all_detail_of_accepted_stu_to_depart.php?branch=$branch&sem=$sem&sno=$sno";
    // echo "<a href='show_notice.php?sign=0'>show notice sent by department</a>";
    // echo "<a href='studentlogin.php'>logout</a>";

?>
<body>
<div class="topnav" id="myTopnav">
  <a href="check_stu.php" class="active">Home</a>
  <a href='<?php echo "show_all_detail_of_accepted_stu_to_depart.php?branch=$branch&sem=$sem&sno=$sno"; ?>'>My Acccount Details</a>
   <a href="show_notice.php?sign=0">Notice</a>
  <a href="studentlogin.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<?php echo "<center><br><br><h1>Welcome ... !</h1><br><h2>". $row["full_name"] . "</h2></center><br>"; ?>
<?php echo "<center><img src=\"$img\" width=300px height=400px><center>";  ?>
<script type="text/javascript">
    function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>