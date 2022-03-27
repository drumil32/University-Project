<?php session_start(); if(!isset($_SESSION["branchdetail"]) || !isset($_SESSION['depart']) ) die("wrong"); ?>


<?php

    require_once('config.php');

    $branch = $_SESSION["branchdetail"];
    $sem = $_SESSION["sem"];
    $sno = $_GET["sno"];
    $resultid = $_SESSION["resultiddel"];
    
    $table_name = $branch . "_sem_" . $sem;
    $table_name1 = $branch . "_result";

    $sql = "DELETE FROM `$table_name` WHERE `$table_name`.`sno` = $sno;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "deletion from $table_name was not successfull" );

    

    $sql  = "SET @autoid :=0;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "in first line" );

    $sql = "UPDATE $table_name SET `sno` = @autoid :=(@autoid+1);";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "second was not successfull" );

    $sql = "ALTER TABLE $table_name AUTO_INCREMENT = 1;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "third was not successfull" );


    $sql = "DELETE FROM `$table_name1` WHERE `$table_name1`.`resultid` = '$resultid';";
    $result = mysqli_query( $conn , $sql );
    if( !$result )
        die( "deletion from $table_name1 was not successfull" );
    $sql  = "SET @autoid :=0;";
    $result = mysqli_query( $conn , $sql );
    if( !$result )
        die( "in first line1" );
    $sql = "UPDATE $table_name1 SET `id` = @autoid :=(@autoid+1);";
    $result = mysqli_query( $conn , $sql );
    if( !$result )
        die( "second was not successfull1" );
    $sql = "ALTER TABLE $table_name1 AUTO_INCREMENT = 1;";
    $result = mysqli_query( $conn , $sql );
    if( !$result )
        die( "third was not successfull1" );


     echo "sucessfully removed student";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

<script>
    location.replace("check_depart.php");
</script>

</body>
</html>