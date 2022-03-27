<?php //please don't change this line it is need for further code NOTE :- HERE NAME OF FILE IS DIFFRENT FROM IT'S WORK MEANS IT'S NOT ONLY SHOW DATA OF STUDENT TO DEPART IT ALSO USE IN SHOW DATA OF STUDENT TO HIM/HER SELF
session_start();
        if(isset( $_SESSION["depart"] ) )
        {
                $_SESSION["depart"]="show_all_detail_of_accepted_Stu"; 
                $j="d"; //sign from where user come :---> like if $j=="d" means department is comes for see student's account
        }
         elseif( isset($_SESSION["branchstu"]) )
                 $j="s"; //sign from where user come :---> like if $j=="s" means student is comes for see his own account
         
        else
                die("wrong");
?> 

<?php

    require_once('config.php');
    if(isset($_SESSION['branchdetail'])){
    $branch =  $_SESSION['branchdetail'];
    $sem = $_SESSION['sem'];
}
    $sno = $_GET['sno'];


    if(!empty($_SESSION["branchstu"])){
    $branch = $_GET["branch"];
    $sem = $_GET["sem"];      }

    $table_name = $branch . "_sem_".$sem;
    $result_table = $branch . "_result";

    $sql = "SELECT * FROM `$table_name` WHERE `$table_name`.`sno` = $sno;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "selection of row was not successfull" );

        $row = mysqli_fetch_assoc($result);

        $fullname = $row["full_name"];
        $stu_email = $row["stu_email"];
        $student_num = $row["student_num"];
        $parent_num = $row["parent_num"];
        $date = $row["DOB"];
        $fee = $row["fees_detail"];
        $resultid = $row["resultid"];
        $photo = $row["photo"];
        if($j=="d"){
            $_SESSION['resultiddel'] = $resultid;
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Saint | Student Detail</title>
    <link rel="icon" href="assets/img/sadhu.jpeg" type="image/jpeg">
</head>
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
<body>
<?php if(!isset($_SESSION["depart"])){
          
                $sno = $_SESSION["sno"];
                 $branch = $_SESSION["branchstu"];
                 $sem = $_SESSION["sem"];
                echo "<div class='topnav' id='myTopnav'>
  <a href='check_stu.php' >Home</a>
  <a href='show_all_detail_of_accepted_stu_to_depart.php?branch=$branch&sem=$sem&sno=$sno' class='active'>My Acccount Details</a>
   <a href='show_notice.php?sign=0'>Notice</a>
  <a href='studentlogin.php'>Logout</a>
  <a href='javascript:void(0);' class='icon' onclick='myFunction()'>
    <i class='fa fa-bars'></i>
  </a>
</div><br>";} ?>
    <center>
    <h2>Student Info</h2>
                
    <table border="2" style="display: inline-block;">
        <tbody>
            <tr><td colspan="2"><center><?php echo "<img src=\"$photo\" width=100px height=100px>";  ?></center></td></tr>
            <tr>
                <td>Full Name</td>
                <td>
                    <?php echo $fullname; ?>
                </td>
            </tr>
            <tr>
                <td>Student Email</td>
                <td>
                    <?php echo $stu_email; ?>
                </td>
            </tr>
            <tr>
                <td>contact Number</td>
                <td>
                    <?php echo $student_num; ?>
                </td>
            </tr>
            <tr>
                <td>Parent's contact Number</td>
                <td>
                    <?php echo $parent_num; ?>
                </td>
            </tr>
            <tr>
                <td>Branch</td>
                <td><?php echo $branch; ?></td>
            </tr>
            <tr>
                <td>Sem</td>
                <td><?php echo $sem; ?></td>
            </tr>
            <tr>
                <td>Date Of Birth[YYYY-DD-MM]:</td>
                <td><?php echo $date;  ?></td>
            </tr>
            
                <?php 
                if($j=="d") {
                        // echo "<td colspan='2'><a href=" . "ACTION_of_deletion_of_stu_by_depart.php?branch=$branch&sem=$sem&sno=$sno" . ">Delete</a></td>";
                        
                        if(isset($_SESSION['select']) && $_SESSION['select'] == "111"){
                            $_SESSION['select'] = '';
                        echo "<td colspan='2'><button style='background-color:red;cursor:pointer;' type=button value=$sno onclick='getData71(this.value)'>Remove Student</button></td>"; 
                        }
                        else{
                            
                            echo "<td colspan='2'><button style='background-color:red;cursor:pointer;' type=button value=$sno onclick='getData7(this.value)'>Remove Student</button></td>";
                        }
                        
                }
                else 
                {
                        echo "<td> Fee Details</td><td>";
                        if(0==$fee)
                                echo "Remaing</td>";
                         else
                                 echo "Paid</td>";
                }
                ?>
                
            </tr>
        </tbody>
    </table>
    <h2>Result Info</h2>



    <?php
        // echo "<img src=".$location."/".$branch."/".$fullname.".jpg".  "width=  '300px' height=  '300px' >";

    $sql = "SELECT * FROM `$result_table` WHERE `$result_table`.`resultid` = '$resultid';";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "result selection was not successfull" );
    $count = 0;

    $row = mysqli_fetch_assoc($result);

    echo "<table border=2><tbody><tr>";
    while ($fieldinfo = mysqli_fetch_field($result)) {
    $count ++;
    $sub = $fieldinfo -> name;
    if($count != 2 && $count != 1)
        echo "<td>$sub</td>";
  }

  $count = 0;
  $result = mysqli_query( $conn , $sql );
    echo "</tr><tr>";
    while ($fieldinfo = mysqli_fetch_field($result)) {
        $count ++;
    $sub = $fieldinfo -> name;
    if($count != 2 && $count != 1)
    echo "<td>$row[$sub]</td>";
  }
    echo "</tr></tbody></table>";

    ?>
    </center>
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