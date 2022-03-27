<?php session_start(); if( !isset($_SESSION['email_id']) || !isset($_SESSION['branch']) ) die('wrong'); 
require_once('config.php');

$semc = $_SESSION["sem"];
$branchc = $_SESSION["branch"];
$tablename = $branchc."_result";
$resultid = $_SESSION['resultid']; 

$sql = "SELECT * FROM `$tablename` WHERE `$tablename`.`resultid` = '$resultid';";
$result = mysqli_query( $conn , $sql );
if( !$result )
    die( "result selection was not successfull". mysqli_error($conn));

$row = mysqli_fetch_assoc($result);

$subject = array(5);

$count = 0;
$i = 1;
// echo "$resultid<br>";
// echo "<table border=2><tbody><tr>";
if($semc == "1"){
    while ($fieldinfo = mysqli_fetch_field($result)) {
    $sub = $fieldinfo -> name;
    if($count == 2 || $count == 3 || $count == 4 || $count == 5){
        $i ++;
        $subject["$i"] = $sub;
    }
    $count ++;
    if($i == 5)
        break;
}}
else if($semc == "2"){
    while ($fieldinfo = mysqli_fetch_field($result)) {
    $sub = $fieldinfo -> name;
    if($count == 9 || $count == 7 || $count == 8 || $count == 10){
        $i ++;
        $subject["$i"] = $sub;
        // $count ++;
    }
    $count ++;
    if($i == 5)
        break;
}}
else if($semc == "3"){
    while ($fieldinfo = mysqli_fetch_field($result)) {
    $sub = $fieldinfo -> name;
    if($count == 15 || $count == 12 || $count == 13 || $count == 14){
        $i ++;
        $subject["$i"] = $sub;
        // $count ++;
    }
    $count ++;
    if($i == 5)
        break;
}}
else if($semc == "4"){
    while ($fieldinfo = mysqli_fetch_field($result)) {
    $sub = $fieldinfo -> name;
    if($count == 17 || $count == 18 || $count == 19 || $count == 20){
        $i ++;
        $subject["$i"] = $sub;
        // $count ++;
    }
    $count ++;
    if($i == 5)
        break;
}}

// echo "Put result of sem : $semc in $branchc";
?>



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
input[type=text], select {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #333;
}
  </style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="check_teacher.php">Home</a>
  <a href='<?php echo "tec_b_and_sem.php?branch=$branchc"; ?>' class="active">Creat Result</a>
   <a href="show_notice.php?sign=1">Notice</a>
  <a href="teacherlogin.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<?php echo "<center><h2>Branch : $branchc </h2><h2>Sem : $semc</h2><h2>Creat Result Of $resultid</h2></center>"; ?>
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
<center> 
    <form action="create_result.php" method="POST">
        <label><?php echo "$subject[2]"; ?></label>
        <input type="text" value=""  name="sub1" required>
        <label><?php echo "$subject[3]"; ?></label>
        <input type="text" value=""  name="sub2" required>
        <label><?php echo "$subject[4]"; ?></label>
        <input type="text" value=""  name="sub3" required>
        <label><?php echo "$subject[5]"; ?></label>
        <input type="text" value=""  name="sub4" required>
       <input type="submit" value="Done!!">
    </form></center>

<?php

    if( isset( $_POST["sub1"] ) && isset( $_POST["sub2"] ) && isset( $_POST["sub3"] ) && isset( $_POST["sub4"] ) )
    {
    
        $branch = $_SESSION["branch"];
        $sem = $_SESSION["sem"];
        $sno = $_SESSION["sno"];
         $resultid = $_SESSION['resultid'];
         $tablename1 = $branch."_result";

        // insert result code...

        $sub1 = $_POST['sub1'];
        $sub2 = $_POST['sub2'];
        $sub3 = $_POST['sub3'];
        $sub4 = $_POST['sub4'];
        $spiname = "spi-".$sem;
        $spi = ($sub1+$sub2+$sub3+$sub4)/4;

        // if($sem == "1"){
            $sql = "UPDATE $tablename1 SET `$subject[2]`='$sub1',`$subject[3]`='$sub2',`$subject[4]`='$sub3',`$subject[5]`='$sub4',`$spiname`='$spi' WHERE `resultid` = '$resultid';";
            $result = mysqli_query( $conn , $sql );
            if( !$result )
            die( "sesecion of row is not possiable1 " . mysqli_error($conn) );

        if($semc == 4){
            $sql = "SELECT * FROM `$tablename1` WHERE `resultid` = '$resultid';";
            $result = mysqli_query( $conn , $sql );
             if( !$result )
                die( "sem 4 cpi selection not possible " . mysqli_error($conn) );
            $row = mysqli_fetch_assoc( $result );
            $se1 = $row["spi-1"];
            $se2 = $row["spi-2"];
            $se3 = $row["spi-3"];
            $se4 = $row["spi-4"];

            $cpi = (($se1+$se2+$se3+$se4)/4);

            $sql = "UPDATE $tablename1 SET `cpi`='$cpi' WHERE `resultid` = '$resultid';";
            $result = mysqli_query( $conn , $sql );
             if( !$result )
                die( "sem 4 cpi final calculation selection not possible " . mysqli_error($conn) );
        }

        $old_table_name = $branch . "_sem_" . $sem;

        $sql = "SELECT * FROM `$old_table_name` WHERE `sno` = $sno;";
        
        $result = mysqli_query( $conn , $sql );
        
        if( !$result )
            die( "sesecion of row is not possiable " . mysqli_error($conn) );

        $row = mysqli_fetch_assoc( $result );

        $full_name = $row["full_name"];
        $stu_email = $row["stu_email"];
        $student_num = $row["student_num"];
        $parent_num = $row["parent_num"];
        $DOB = $row["DOB"];
        $fees_detail = $row["fees_detail"];
        $photo = $row["photo"];$resultid = $row["resultid"];

        if( 4>$sem )
        {
            $new_table_name = $branch . "_sem_" . ($sem+1);
            $sql = "INSERT INTO `$new_table_name` (`sno`,`resultid`, `full_name`, `stu_email`, `student_num`, `parent_num`, `DOB`, `fees_detail`, `photo`) VALUES (NULL,'$resultid', '$full_name', '$stu_email', '$student_num', '$parent_num', '$DOB', '0', '$photo');";
        }
        else
        {
            $year = date('Y');
            $new_table_name = $branch . "_degree" ;
            $sql = "INSERT INTO `$new_table_name` (`sno`,`resultid`, `full_name`, `stu_email`, `student_num`, `parent_num`, `DOB`,  `photo`,`year`) VALUES (NULL,'$resultid', '$full_name', '$stu_email', '$student_num', '$parent_num', '$DOB', '$photo' , '$year');";
        }

        
        $result = mysqli_query( $conn , $sql );

        if( !$result )
            die( "insertion of row in new table is not successsfull ". mysqli_error($conn) );

        $sql = "DELETE FROM `$old_table_name` WHERE `$old_table_name`.`sno` = $sno";

        $result = mysqli_query( $conn , $sql );        

        // I think this is not need think this is for reseat sno after deletion a row from table

        $sql  = "SET @autoid :=0;";

        $result = mysqli_query( $conn , $sql );

        if( !$result )
            die( "in first line" . mysqli_error($conn));

        $sql = "UPDATE $old_table_name SET `sno` = @autoid :=(@autoid+1);";

        $result = mysqli_query( $conn , $sql );

        if( !$result )
            die( "second was not successfull" . mysqli_error($conn));

        $sql = "ALTER TABLE $old_table_name AUTO_INCREMENT = 1;";

        $result = mysqli_query( $conn , $sql );

        if( !$result )
            die( "third was not successfull" . mysqli_error($conn));

            ////////////////////////////////////////////////////////////////////////////////////////////
        
        else
        {            
            // Sending mail to student for marks detail

            $email = $stu_email;
            if($sem == "4"){
                $newsem = "graduate";
            }
            else
                $newsem = $sem + 1 ;
            $subject1 = "Saint Result Sem : $sem";
            $body = "<center><h1>Hi $full_name <br>Congratulations..!<br> You have passed Sem : $sem</h1><br><h2>you are now in sem : $newsem</h2><br><h3>Your result is given below...<br><table border=1><tbody><tr><td>".$subject[2]."</td><td>$sub1</td></tr><tr><td>".$subject[3]."</td><td>$sub2</td></tr><tr><td>".$subject[4]."</td><td>$sub3</td></tr><tr><td>".$subject[5]."</td><td>$sub4</td></tr></tbody></table></center>Spi : $spi</h3>";
            $headers .= "Content-type: text/html\r\n";
        
            if (mail($email, $subject1, $body, $headers)) {
                echo "Email successfully sent to $email...";
            } else {
                echo "Email sending failed...";
            }
        
        
                $result = mysqli_query( $conn , $sql );    
                
               if(!$result)
                  die(mysqli_error($conn)); 

            echo '  <script>
                      location.replace("tec_b_and_sem.php");
                    </script>';
        }
    }
    else
    {
                $_SESSION["branch"] = $_GET["branch"];
                $_SESSION["sem"] = $_GET["sem"];
                $_SESSION["sno"] = $_GET["sno"];
    }
?>


</body>
</html>