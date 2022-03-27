<?php session_start(); if( !isset($_SESSION["branch"]) ) die("wrong"); ?>


<?php        
        
        require_once('config.php');

        $branch =  $_SESSION["branch"];
        $sno = $_SESSION["sno"];

        $table_name = $branch . "_accepted_student_intro";

        $sql = "SELECT * FROM `$table_name` WHERE `$table_name` . `sno` = $sno";

        $result = mysqli_query( $conn , $sql );

        if( !$result )
            die( "we can't connect to database --> " . mysqli_error($conn) );

        $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatiblev" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2" style="display: inline-block;">
        <caption>You Are registered</caption>
        <tbody>
            <tr>
                <td>Full Name</td>
                <td>
                    <?php echo $row["full_name"]; ?>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td>
                    <?php echo $row["user_name"]; ?>
                </td>
            </tr>
            <tr>
                <td>Your contact Number</td>
                <td>
                    <?php echo $row["student_no"]; ?>
                </td>
            </tr>
            <tr>
                <td>Your parent's contact Number</td>
                <td>
                    <?php echo $row["parent_no"]; ?>
                </td>
            </tr>
            <tr>
                <td>Your Branch</td>
                <td><?php echo $branch; ?></td>
            </tr>
            <tr>
                <td>Date Of Birth[YYYY-DD-MM]:</td>
                <td><?php echo $row["DOB"]; ?></td>
            </tr>
            <tr>
                <td>Your School Name</td>
                <td><?php echo $row["prev_school_name"]; ?></td>
            </tr>
            <tr>
                <td>Your self Introduction</td>
                <td><?php echo $row["self_intro"]; ?></td>
            </tr>
            <tr>
                <td><a href="check_stu.php">Back</a></td>
            </tr>
        </tbody>
    </table>

    <?php
//            echo "<br>". $location.$fullname.".jpg";
         echo "<img src=".$location.$fullname.".jpg".  "width=  '300px' height=  '300px' >";
    ?>
</body>
</html>