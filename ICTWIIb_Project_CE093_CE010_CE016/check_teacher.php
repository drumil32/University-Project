<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
      <title>Saint | Teacher Dashboard</title>
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
  background-color: red;
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
<body>


<?php
    session_start();
     if( !empty($_POST["email_id"]) )
     {
            $_SESSION["email_id"] = $_POST["email_id"];
            $_SESSION["password"] = $_POST["password"];
            $_SESSION['sem']=$_POST['sem'];
            $_SESSION['branch'] = $_POST['branch'];
     }
     elseif( !isset($_SESSION["email_id"]) )
        die( "wrong" );
        
?>

<?php

    if( isset($_SESSION["email_id"]) )
    {
        require_once('config.php'); 
        
        $email_id = $_SESSION["email_id"];
        $password = $_SESSION["password"];
        $sem = $_SESSION["sem"];
        $branch = $_SESSION["branch"];
        
        // $i=0;
        // $branch = $user_name[$i++] . $user_name[$i++];
        
        // $length = strlen( $user_name );

        // if( 'E'==$user_name[$i] )
        //     $branch .= $user_name[$i++];                
        
        // $i++;
        
        // $name = "";

        // for( $i ; $i<$length ; $i++ )
        //     $name .= $user_name[$i];

        // echo "$branch";


        $table_name = $branch."_teacher's information";

        $sql = "SELECT * FROM `$table_name` WHERE `email_id`='$email_id' && `password`='$password' && `sem`='$sem' ";

        $result = mysqli_query($conn,$sql);
        
        $row=mysqli_fetch_assoc($result); 
        
        if(!$row )
            die( "you don't give true branch name" );

        $_SESSION["check_teacher"] = "yes";

        // echo "<a href=" . "tec_b_and_sem.php?branch=$branch" . ">create result</a>" ;
        // echo $email_id . " and semseter is :- " . $sem;
        // echo "<a href='show_notice.php?sign=1'>show notice sent by department</a>";
        
        // echo "<a href='teacherlogin.php'>Logout</a>";                                                    
    }

?>
<div class="topnav" id="myTopnav">
  <a href="check_teacher.php" class="active">Home</a>
  <a href='<?php echo "tec_b_and_sem.php?branch=$branch"; ?>'>Creat Result</a>
   <a href="show_notice.php?sign=1">Notice</a>
  <a href="teacherlogin.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<?php echo "<center><br><br><h1>Welcome ... To $branch Teacher's Dashboard</h1><br><h2>". $email_id. "</h2><br><h3>Your Semester is </h3>" . "$sem" . "</center>"; ?>
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