<?php if(!isset($_GET["branch"])) die("wrong"); ?>

<?php

    require_once('config.php');

    $branch = $_GET["branch"];
    $sno = $_GET["sno"];
    
    $intro_table_name = $_GET["branch"] . "_teacher's information";

    $sql = "DELETE FROM `$intro_table_name` WHERE `$intro_table_name`.`sno` = $sno;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "deletion from $intro_table_name was not successfull" );

    $sql  = "SET @autoid :=0;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "in first line" );

    $sql = "UPDATE `$intro_table_name` SET `sno` = @autoid :=(@autoid+1);";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "second was not successfull" );

    $sql = "ALTER TABLE `$intro_table_name` AUTO_INCREMENT = 1;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "third was not successfull" );
            
     echo "sucessfull";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>    

    <script>
        location.replace("show_teacher's_details_to_depart.php");
    </script>

</body>
</html>