<?php

    session_start();
    if( !isset($_SESSION["password"]) || !isset($_SESSION["username"]) )
        die('wrong');
        
    $_SESSION['depart']="send_notice";
    if(isset($_GET['sign']))
        $_SESSION['sign'] = $_GET['sign'];

    if( 1==$_SESSION['sign'] ){
        $table_name="notice_to_teacher";
        echo "<br><center><h4>Send Notice To Teacher</h4></center>";
    }
    else{
        $table_name="notice_to_student";
        echo "<br><center><h4>Send Notice To Student</h4></center>"; 
    }
        
    $sign=$_SESSION['sign'];

    if( isset($_GET['notice']) && ($_GET['notice']) )
    {
        $notice = trim( $_GET['notice'] );
        if( empty($notice) )
            $error="please give notice";

        if( empty($error) )
        {
            require_once('config.php');

            $sql = "INSERT INTO `$table_name` (`sno`, `notice`, `time`) VALUES (NULL, '$notice', CURRENT_TIMESTAMP);";

            $result = mysqli_query( $conn , $sql );

            if(!$result)
                die( mysqli_error($conn) );
            else
            {

                echo "<script>
                         location.replace('send_notice.php?notice=0&sign=$sign');
                      </script>";
                      echo "<center><h4>notice successfully sent...! to " . $_SESSION['sign'] . "</h4></center>";

            }

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body><center>
    <form id="idform">
        <textarea name="notice" id="notice" cols="30" rows="10" placeholder="Write Notice Here"></textarea>
        <button type="button" onclick="submitgo();">Send Notice</button>
        <span><?php if( isset($error) ) echo $error; ?></span>
    </form>
    </center>
</body>
</html>