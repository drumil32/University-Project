<!-- okk with resultid -->
<?php if( !isset($_GET["branch"])  ) die("wrong");  ?>

<?php

    require_once('config.php');

    $branch = $_GET["branch"];
    $sno = $_GET["sno"];
    
    $intro_table_name   = $_GET["branch"] . "_student_intro";
                                            
    $confirm_table_name = $_GET["branch"] . "_sem_1";

    $resultidtable = $branch . "_result";

    $sql = "SELECT * FROM $intro_table_name WHERE `$intro_table_name`.`sno` = $sno";

    $result = mysqli_query( $conn , $sql );
    if( !$result )
        die( "selection of table's row of $intro_table_name was not successfull" );
    
    $row = mysqli_fetch_row( $result );

    if( !$row )
        die( "fetching row from intro table was not successfull" );

    $full_name = $row["1"];
    $stu_email = $row["2"];
    $student_num = $row["3"];
    $parent_num = $row["4"];
    $DOB = $row["5"];
    $photo = $row["8"];
    $resultid = $student_num . $branch . $sno;
    
    $sql = "INSERT INTO `$confirm_table_name` (`sno`,`resultid`,`full_name`, `stu_email`, `student_num`, `parent_num`, `DOB`, `fees_detail`, `photo`) VALUES (NULL, '$resultid', '$full_name', '$stu_email', '$student_num', '$parent_num', '$DOB' , '0' , '$photo' );";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "insertion is not sucessfull1".  mysqli_error($conn));

    //adding resultid to result table

    // $sql = "INSERT INTO `$resultidtable`(`id`, `resultid`) VALUES (NULL,'$resultid');";

    if($branch == "ce"){

        $sql = "INSERT INTO `ce_result`(`id`, `resultid`, `maths-1`, `pps-1`, `bee-1`, `ES`, `spi-1`, `maths-2`, `pps-2`, `bee-2`, `ictw-1`, `spi-2`, `maths-3`, `pps-3`, `os`, `ictw-2`, `spi-3`, `web`, `android`, `algorithm`, `linux`, `spi-4`, `cpi`) VALUES (NULL,'$resultid','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1');";

    }
    else if($branch == "it"){

        $sql = "INSERT INTO `it_result`(`id`, `resultid`, `maths-1`, `pps-1`, `bee-1`, `ES`, `spi-1`, `maths-2`, `pps-2`, `bee-2`, `egd`, `spi-2`, `maths-3`, `android`, `os`, `english`, `spi-3`, `linux`, `elective-1`, `elective-2`, `web`, `spi-4`, `cpi`) VALUES (NULL,'$resultid','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1');";
        
    }
    else if($branch == "che"){

        $sql = "INSERT INTO `che_result`(`id`, `resultid`, `maths-1`, `em`, `physics-1`, `ES`, `spi-1`, `maths-2`, `chemistry-1`, `chemistry-2`, `physics-2`, `spi-2`, `fluid`, `egd`, `masstransfer`, `heattransfer`, `spi-3`, `elective-1`, `biochemical`, `plants`, `elective-2`, `spi-4`, `cpi`) VALUES (NULL,'$resultid','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1');"; 
        
    }
    else if($branch == "me"){

        $sql = "INSERT INTO `me_result`(`id`, `resultid`, `maths-1`, `pps`, `bee-1`, `ES`, `spi-1`, `maths-2`, `bee-2`, `me-1`, `english`, `spi-2`, `maths-3`, `me-2`, `egd-1`, `communication`, `spi-3`, `elective-1`, `me-3`, `egd-2`, `elective-2`, `spi-4`, `cpi`) VALUES (NULL,'$resultid','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1');";
        
    }



    $result = mysqli_query( $conn , $sql );
    if( !$result )
        die( "resultid is not sucessfull2" .  mysqli_error($conn));

    // echo "Please wait for a moment...<br>";

    $sql = "DELETE FROM `$intro_table_name` WHERE `$intro_table_name`.`sno` = $sno;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "deletion from $intro_table_name was not successfull3" .  mysqli_error($conn) );

    $sql  = "SET @autoid :=0;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "Error in first line" .  mysqli_error($conn));

    $sql = "UPDATE $intro_table_name SET `sno` = @autoid :=(@autoid+1);";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "second was not successfull4" .  mysqli_error($conn) );

    $sql = "ALTER TABLE $intro_table_name AUTO_INCREMENT = 1;";

    $result = mysqli_query( $conn , $sql );

    if( !$result )
        die( "third was not successfull5" .  mysqli_error($conn) );

        // sending  mail to student
        
    $email = $stu_email;
    $subject = "You are Now in saint";
    $body = "<center><h1>Hi, $full_name</h1><h2> Your Apllicaton has been accepted and you are in 1st sem of $branch\nYour credentials for saint university are ........</h2>\n<h3>ID : $email\nPasswrod : $DOB</h3><center>";
    $headers = '';
    $headers .= "Content-type: text/html\r\n";

    if (mail($email, $subject, $body, $headers)) {
        echo "Accepted...!<br>Email successfully sent to $email...";
    } else {
        echo "Email sending failed...";        
    }


        $result = mysqli_query( $conn , $sql );    
        
       if(!$result)
          die(mysqli_error($conn));        
    
?>