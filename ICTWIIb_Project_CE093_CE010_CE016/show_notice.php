<?php //please don't change this line it is need for further code NOTE :- HERE NAME OF FILE IS DIFFRENT FROM IT'S WORK MEANS IT'S NOT ONLY SHOW DATA OF STUDENT TO DEPART IT ALSO USE IN SHOW DATA OF STUDENT TO HIM/HER SELF
session_start();
        if(isset( $_SESSION["depart"] ) )
        {
                $_SESSION["depart"]="show_all_detail_of_accepted_Stu"; 
                $j="d"; //sign from where user come :---> like if $j=="d" means department is comes for see student's account
        }
         elseif( isset($_SESSION["branchstu"]) )
                 $j="s"; //sign from where user come :---> like if $j=="s" means student is comes for see his own account
         
        elseif( isset($_SESSION["branch"]) )
                 $j="t";

        else
                die("wrong");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
      <title>Saint | Notice</title>
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
.topnav a.active1 {
  background-color: red;
  color: white;
}
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
    <center><table border='2' CELLSPACING='0' id='customers'>
        <tr>
            <th>Index</th>
            <th>Notice</th>
            <th>Time</th>
        </tr>


        <?php

            // session_start();
            require_once('config.php');
            $sign = $_GET['sign'];

            if( 1==$sign ){
                $table_name = "notice_to_teacher";
                 if(isset($_SESSION["depart"]))
                echo "<br><center><h4>Notice Of Teacher</h4></center>";
            }
            else{
                $table_name = "notice_to_student";
                if(isset($_SESSION["depart"]))
                echo "<br><center><h4>Notice Of Student</h4></center>";
            }

            $sql = "SELECT * FROM `$table_name`";

            $result = mysqli_query( $conn , $sql );

            if(!$result)
                die( mysqli_error($conn) );
           
            while( $row=mysqli_fetch_assoc($result) )
            {

                $index = $row['sno'];
                $notice = $row['notice'];
                $time = $row['time'];

                echo "  <tr>
                        <td>$index</td>
                        <td>$notice</td>
                        <td>$time</td>
                        </tr>";
            }

            if(!isset($_SESSION["depart"])){
            if( 1==$_GET['sign'] ){
                
                // $sno = $_SESSION["sno"];
                 $branch = $_SESSION["branch"];
                 $sem = $_SESSION["sem"];
                echo "<div class='topnav' id='myTopnav'>
  <a href='check_teacher.php' >Home</a>
  <a href='tec_b_and_sem.php?branch=$branch'>Creat Result</a>
   <a href='show_notice.php?sign=1' class='active1'>Notice</a>
  <a href='studentlogin.php'>Logout</a>
  <a href='javascript:void(0);' class='icon' onclick='myFunction()'>
    <i class='fa fa-bars'></i>
  </a>
</div><br>";
            }
            else{
                $sno = $_SESSION["sno"];
                 $branch = $_SESSION["branchstu"];
                 $sem = $_SESSION["sem"];
                echo "<div class='topnav' id='myTopnav'>
  <a href='check_stu.php' >Home</a>
  <a href='show_all_detail_of_accepted_stu_to_depart.php?branch=$branch&sem=$sem&sno=$sno'>My Acccount Details</a>
   <a href='show_notice.php?sign=0' class='active'>Notice</a>
  <a href='studentlogin.php'>Logout</a>
  <a href='javascript:void(0);' class='icon' onclick='myFunction()'>
    <i class='fa fa-bars'></i>
  </a>
</div><br>";}}
        ?>        
    </table>
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