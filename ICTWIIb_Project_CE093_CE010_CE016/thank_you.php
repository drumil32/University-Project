<?php session_start(); ?>

<?php

    if( !isset($_SESSION["fullname"])  )
    {
        echo "<script>
              alert( 'wrong' );
              location.replace('index.php');
              </script>";
    }
    $img2 = '';
    $img1 = '';
    $img1 = $_SESSION["photo1"];
    $img2 = $_SESSION["result1"];
    require_once('config.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="img/sadhu.jpeg"/>
    <title>Registered to saint</title>
    <style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.button1 {
  background-color: red; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
    </style>
</head>
<body bgcolor=lightyellow>
    <script type="text/javascript">
        function preback(){window.history.forward();}
        setTimeout("preback()",0);
        window.onunload=function(){null};
    </script>
    <center><h2 style="font-size:6vw; font-family:arial;">You Are Registered To Saint</h2></center>
    <center>
    <marquee><font color=red>After this submission you will not be able to modify any data</font></marquee>
    <br><br><table border="2" style="display: inline-block;">
    <tbody>
            <tr>
                <td>Full Name</td>
                <td>
                    <?php echo $_SESSION["fullname"]; ?>
                </td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>
                    <?php echo  $_SESSION["stu_number"]; ?>
                </td>
            </tr>
            <tr>
                <td>Email ID</td>
                <td>
                    <?php echo  $_SESSION["student_email"]; ?>
                </td>
            </tr>
            <tr>
                <td>Parent's Number</td>
                <td>
                    <?php echo $_SESSION["parent_num"]; ?>
                </td>
            </tr>
            <tr>
                <td>Branch</td>
                <td><?php echo $_SESSION["branch"];?></td>
            </tr>
            <tr>
                <td>DOB [DD-MM-YYYY]:</td>
                <td><?php echo $_SESSION['date'] . '-' .$_SESSION['month'].'-'.$_SESSION['year']; ?></td>
            </tr>
            <tr>
                <td>School Name</td>
                <td><?php echo $_SESSION["school_name"]; ?></td>
            </tr>           
            <tr>
                <td>Achievements</td>
                <td><?php echo $_SESSION["self_intro"]; ?></td>
            </tr>
            <tr>
                    <td>Photo</td>
                    <th><?php echo "<img src=\"$img1\" width=100px height=100px>";  ?></th>
            </tr>
            <tr>
                    <td>Result</td>
                    <th><?php echo "<img src=\"$img2\" width=100px height=100px>";  ?></th>
            </tr>
        </tbody>
    </table>
      <br>
        <a href="guestlogin.php" class="button">edit</a>&nbsp;<a href='index.php?notice=1' class="button1">Submit</a>
</center>
</body>
</html>