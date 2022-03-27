<?php
// echo "111<br>";
    if ( isset($_GET['branchsearchtea']) ) {
        require_once('../../config.php');

        $table_name = $_GET['branchsearchtea'] . "_teacher's information";
        
        // $sem = $_GET['semsearchtea'];
        $branch = $_GET['branchsearchtea'];
        $data = $_GET['datasearchtea'];
        // echo $sem .$data .$branch;
        $sql = "SELECT * FROM `$table_name` WHERE `email_id`='$data' ";
        
        
        
        $result = mysqli_query( $conn , $sql );

        // die( mysqli_error($conn) );
        
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
    <p>Email :- <?php  echo $row['email_id']; ?> </p>

    <p>Sem :- <?php  echo $row['sem']; ?> </p>                

    <p>Password :- <?php echo $row['password']; ?> </p>

    <p>Action :- <?php echo "For Deleting Teacher Go To Teacher Management"; ?> </p>

    <?php
        }
       
    }
     else
        {
            echo "This Teacher Is Not Available";
        }
    ?>

</body>
</html>