<?php //please don't change this line it is need for further code
session_start();
        if(isset($_SESSION["depart"])) $_SESSION["depart"]="NON"; else die("worong"); ?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Teacher Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/jpeg" href="img/sadhu.jpeg"/>
  
    <style>
          .back{
                  background-color:rgb(77, 148, 255,0.5);
          }
          .btn{
                  background-color:pink;
                  height:40px;
                  width:60px;
                  border-radius:10px;
                  cursor:pointer;
          }
          .sel{
                  background-color:pink;
                  height:35px;
                  width:90px;
                  border-radius:10px;
                  
          }
          .btn:hover,.sel:hover{
                  background-color:yellow;
                  
          }
          #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: lightgray;
  color: black;
}
          
  </style>
  
</head>

<body>

       <div class="back">
<center>
<font face="verdana" size="5"><b>Teacher's Details</b></font><br><br><br>
<font face="verdana" size="4"><b>Return To </b><a href="check_depart.php"><b>Dashboard</b></a></font><br><br>
    <font face="verdana" size="4"><b>Back To <b/><a href="index.php"><b>Home</b></a></font><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="branch"><font face="verdana" size="4"><b>Select Branch</b></font></label>
        <select name="branch" class="sel" id="branch" required>
            <option value="">--Branch--</option>
            <option value="ALL">ALL</option>
            <option value="ce">CE</option>
            <option value="it">IT</option>
            <option value="me">ME</option>
            <option value="che">CHE</option>
        </select>
        <input type="submit" value="Go" class="btn">
    </form>
    <hr color="black"></div>
</body>

</html>


<?php

    require_once('config.php');

    if( !empty($_POST["branch"]) || !empty( $_SESSION["branch"] ) )
    {        
        if( empty($_POST["branch"]) )
            $branch2 = $_SESSION["branch"];
        else
            $_SESSION["branch"]=$branch2 = $_POST["branch"];     

        if( "ALL"!=$branch2 )
        {
            $new_branch = $branch2;
            $count=$limit = 1;
        }else
        {
            $new_branch = "ce";
            $count=1;
            $limit=4;
        }

        echo   "<center><table border='2' id='customers'>
                <tbody>";

        while($count<=$limit)
        {

            $table_name = $new_branch . "_teacher's information";

            $sql = "SELECT * FROM `$table_name`";

            $result = mysqli_query( $conn , $sql );

            if( !$result )
                die( "selection of table was not succesfull --> ". mysqli_error($conn) );        

            switch ($new_branch) 
            {
                case "ce":
                    $branch1 = "Computer Enginering";
                    $current_branch=$new_branch;
                    $new_branch="it";
                    break;

                case "it":
                    $branch1 = "Information & Technology";
                    $current_branch=$new_branch;
                    $new_branch="me";
                    break;
                
                case "me":
                    $branch1 = "Mechenical Enginering";
                    $current_branch=$new_branch;
                    $new_branch="che";
                    break;

                case "che":
                    $branch1 = "Chemical Enginering";
                    $current_branch="che";
                    break;
            }

            echo "<tr><th colspan='5'>Number of teachers in  " .$branch1 . "is ";

            $num_of_row = mysqli_num_rows( $result );
            
            echo $num_of_row . "</th></tr>";
            

            echo"<th>Index</th>
                <th>email_id</th>
                <th>Password</th>
                <th>Sem</th>
                <th>Action</th>";
                    

            while( $row=mysqli_fetch_assoc($result) )
            {
                $email_id = $row["email_id"];
                $sem = $row["sem"];
                $sno = $row["sno"];
                $password = $row["password"];
                echo "<tr>
                        <td>$sno</td>
                        <td>$email_id</td>
                        <td>$password</td>
                        <td>$sem</td>                        
                        <td><a href=" . "ACTION_of_deletion_of_teacher_by_depart.php?branch=$current_branch&sno=$sno". ">Delete</a></td>
                     </tr>";
            }
            $count++;
        }
        echo "</tbody>
              </table></center>";       
    }
?>