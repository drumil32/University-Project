<?php
// echo "hello";
session_start();

    if ( isset($_GET['branchsearchstu']) ) {
        require_once('../../config.php');
       $_SESSION['branchdetail'] = $branch = $_GET['branchsearchstu'];
       $_SESSION['sem'] = $sem = $_GET['semsearchstu'];
        $table_name = $branch . "_sem_" . $sem;
         $col_name = $_GET['selectsearchstu'];
        $_SESSION['select'] = "111";
        $data = $_GET['datasearchstu'];
        
        $sql = "SELECT * FROM `$table_name` WHERE `$col_name`='$data' ";
                        
        $result = mysqli_query( $conn , $sql );
        
        $row = mysqli_fetch_assoc($result);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

    <?php
        if( isset($row) )
        {
            if( $row )
            {
                $sno = $row['sno'];
                // echo "itsadg";
                ?>
    <p>FULL NAME :- <?php  echo $row['full_name']; ?> </p>

    <p>EMAIL ID :- <?php echo $row['stu_email'] ?> </p>

    <p>FEE DETAILS :- <?php if( 0==$row["fees_detail"] )                        
                    echo "<a style='color:red;cursor:pointer;' onclick='getData61($sno)'>Remaining</a>";  //modify it
                else
                    echo "<p style='color:green;'>done<p>";?> </p>

    <?php echo "<button type=button value=$sno onclick='getData51(this.value)'>Show Details</button>"; ?>

    <?php
        }
       
    }
     else
        {
            echo "This Student Is Not Available";
        }
    ?>

</body>
</html>