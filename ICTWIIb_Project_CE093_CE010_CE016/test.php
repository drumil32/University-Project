<?php
    if ( isset($_GET['branch']) ) {
        require_once('../../config.php');

        $table_name = $_GET['branch'] . "_teacher's information";
        $data = $_GET['data'];
        $sem = $_GET['semster'];
        $branch = $_GET['branch'];
        
        $sql = "SELECT * FROM `$table_name` WHERE `email_id`='$data' and `sem`='$sem' ";
        
        
        
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
    <form action="" method="GET">
        <select name="branch" required>

            <option value="">--Branch--</option>

            <option value="ce">CE</option>
            <option value="it">IT</option>
            <option value="che">CHE</option>
            <option value="me">ME</option>
        </select>
        <select name="semster" required>

            <option value="">--semster--</option>

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <input type="text" name="data" required >
        <input type="submit" value="go">
    </form>

    <?php
        if( isset($row) )
        {
            if( $row )
            {
                $sno = $row['sno'];
                echo "itsadg";
                ?>
    <p>name :- <?php  echo $row['email_id']; ?> </p>                

    <p>password :- <?php echo $row['password']; ?> </p>

    <p>action :- <?php echo "<a href='../../ACTION_of_deletion_of_teacher_by_depart.php?branch=$branch&sno=$sno'>Delete</a>"; ?> </p>

    <?php
        }
        else
        {
            echo "this email id as teacher is not available";
        }
    }
    ?>

</body>
</html>