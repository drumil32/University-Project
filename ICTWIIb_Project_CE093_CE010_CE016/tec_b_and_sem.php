<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
      <title>Saint | Creat Result</title>
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
<?php session_start();
    if( isset($_SESSION["given_username"]) && !isset($_SESSION['branch']) )

        $_SESSION["branch"] = $_GET["branch"];

    elseif( !isset( $_SESSION["branch"] ) )

        die("wrong");        

    $branch = $_SESSION["branch"];

?>
    <div class="topnav" id="myTopnav">
  <a href="check_teacher.php">Home</a>
  <a href='<?php echo "tec_b_and_sem.php?branch=$branch";  ?>' class="active">Creat Result</a>
   <a href="show_notice.php?sign=1">Notice</a>
  <a href="teacherlogin.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<?php echo "<center><h2>$branch Result Dashboard <br></h2>"; ?>
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

<?php

    require_once('config.php');

    // if( isset($_POST['sem']) )
    //     $_SESSION['sem'] = $_POST['sem'];

    if( isset($_SESSION['sem']) )
    {

        $sem = $_SESSION["sem"];
        
        $table_name = $branch . "_sem_" . $sem;

        $sql = "SELECT * FROM `$table_name`";

        $result = mysqli_query( $conn , $sql );

        if( !$result )
            die( "selection of table is not sucess". mysqli_error($conn) );

            echo   "<table border='2' id='customers'>
                    <tbody>";

            echo "<tr><th colspan='5'>Number of students in $branch  is ";

            $num_of_row = mysqli_num_rows( $result );
            
            echo $num_of_row . "</th></tr>";

            echo"<th>Index</th>
                <th>Name</th>
                <th>Student Email ID</th>
                <th>Resultid</th><th>Action</th>";            

            while( $row=mysqli_fetch_assoc($result) )
            {
                $fullname = $row["full_name"];
                $sno = $row["sno"];      
                $stu_email = $row["stu_email"];
                $resultid = $row["resultid"];
                $_SESSION['resultid'] = $resultid;
                echo "<tr>
                        <td>$sno</td>
                        <td>$fullname</td>
                        <td>$stu_email</td>
                        <td>$resultid</td>
                        <td>";

                if( 0==$row["fees_detail"] )                        
                    echo "Fee is Remaing</td>";  //modify it
                else
                    echo "<a href='create_result.php?branch=$branch&sem=$sem&sno=$sno'>Create Result</a></td> </tr>";
            }            
    }

    // $_SESSION['resultid'] = $resultid;
    // $subject = array(5);
    // $subject[5] = "Hello";
    // echo "$subject[]";


echo "</center>";

?>
