<?php session_start(); ?>

<?php
    if( isset($_POST["marks"]) )
    {
        require_once('config.php');
                    
        $j = $_SESSION["sem"]."_marks";
        
        
        $marks = $_POST["marks"];
        $sno =  $_SESSION["sno"];
        
        $sql = "UPDATE `activity_of_student` SET `$j` = '$marks' WHERE `activity_of_student`.`Sr no.` = $sno ; ";         

        $result = mysqli_query( $conn , $sql );

        if( !$result )
            die( "selection is not successfull" . mysqli_error($conn) );

                
        $_SESSION["marks"] = $marks;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form action="give_marks.php" method="POST">
        <input type="text" value="<?php if(isset($marks)) echo $marks; ?>"  name="marks" >
        <input type="submit" value="Done!!">
    </form>
    <?php if(isset($result)) echo "insertion was successfully"; ?>
</body>
</html>