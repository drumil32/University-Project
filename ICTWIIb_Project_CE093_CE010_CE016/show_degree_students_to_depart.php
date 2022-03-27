
<?php
    require_once( 'config.php' );

    if( isset($_GET['branchdegree']) )
    {
        $branch = $_GET['branchdegree'];
        $year = $_GET['yeardegree'];
        $table_name =  $branch . "_degree" ;

        $sql = "SELECT * FROM `$table_name` WHERE `year`='$year' ";

        $result = mysqli_query($conn, $sql);            
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<table border="1"><tbody>
    <tr>
        <th>Fullname</th><th>Email</th><th>DOB</th>
    </tr>
<?php
    if( isset($result) )
        while( $row = mysqli_fetch_assoc($result) ){
    ?>
<tr>
    <td><?php echo $row['full_name']; ?></td>
    <td><?php echo $row['stu_email']; ?></td>
    <td><?php echo $row['DOB']; ?></td>
</tr>

    <?php
        }
    ?>
</tbody></table>
</body>
</html>