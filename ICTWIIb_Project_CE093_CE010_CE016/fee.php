<?php //please don't change this line it is need for further code
session_start();
        if( isset( $_SESSION["depart"] ) && $_SESSION["depart"]=="show_brif_intro_of_accepeted_stu" );
        elseif(isset($_SESSION['select']) && $_SESSION['select'] == "111");
        else
                die("wrong");
?> 

<?php

    require_once('config.php');

    // $branch = $_GET["branch"];
    // $sem = $_GET["sem"];
    $sno = $_GET['sno']; 
    $branch = $_SESSION['branchdetail'];
    $sem = $_SESSION['sem'];       

     echo $sno . $branch . $sem ;   

    $table_name = $branch . "_sem_".$sem  ;
    
    $sql = "UPDATE `$table_name` SET `fees_detail` = '1' WHERE `$table_name`.`sno` = '$sno';";
    
    $result = mysqli_query( $conn , $sql );
    
    if( !$result )
            die("something wrong on server --> " . mysqli_error($conn) );    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>fees accepted</title>
</head>
<body>
    <script>
        location.replace("check_depart.php");
    </script>
</body>
</html>