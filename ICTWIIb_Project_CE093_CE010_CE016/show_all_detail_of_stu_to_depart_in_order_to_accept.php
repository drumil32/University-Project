<!-- okk with resultid -->
<?php session_start(); ?>

<?php

    require_once ('config.php');

    $branch = $_GET["branch"];
    $sno = $_GET["sno"];

    $table_name =  $_GET["branch"] . "_student_intro";

    $sql = "SELECT * FROM `$table_name` WHERE `$table_name`.`sno` = $sno;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "selection of row was not successfull" );

        $row = mysqli_fetch_assoc($result);

        $fullname = $row["full_name"];
        $student_email_id = $row["stu_email"];
        $student_num = $row["student_num"];
        $parent_num = $row["parent_num"];
        $date = $row["DOB"];
        $school_name = $row["prev_school_name"];
        $self_intro = $row["self_intro"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h3>Student Details</h3>
    <table border="2" >
        <tbody>
            <tr>
                <th>Full Name</th>
                <td>
                    <?php echo $fullname; ?>
                </td>
            </tr>
            <tr>
                <th>Your Number</th>
                <td>
                    <?php echo $student_num; ?>
                </td>
            </tr>
            <tr>
                <th>Your Email ID</th>
                <td>
                    <?php echo $student_email_id; ?>
                </td>
            </tr>
            <tr>
                <th>Parent's Number</th>
                <td>
                    <?php echo $parent_num; ?>
                </td>
            </tr>
            <tr>
                <th>Your Branch</th>
                <td><?php echo $branch; ?></td>
            </tr>
            <tr>
                <th>DOB</th>
                <td><?php echo $date;  ?></td>
            </tr>
            <tr>
                <th>Your School Name</th>
                <td><?php echo $school_name; ?></td>
            </tr>
            <tr>
                <th>Your self Introduction</th>
                <td><?php echo $self_intro; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                <?php echo "<button type=button value='$branch' onclick='acceptstu($sno,this.value)'>Accept Student</button>"; ?>
              
                </td>
            </tr>
        </tbody>
    </table>

    <?php
        
        // echo "<img src=".$location."/".$branch."/".$fullname.".jpg".  "width=  '300px' height=  '300px' >";        
    ?>
</body>
</html>