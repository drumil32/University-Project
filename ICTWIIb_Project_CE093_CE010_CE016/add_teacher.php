<?php session_start(); 
        if( isset($_SESSION["depart"]) )
            $_SESSION["depart"]="add_teacher"; 
        else
                die("wrong");
?>

<?php
        if( isset($_POST["email_id"]) )
        {

            require_once('config.php');

            $email_id = $_POST["email_id"];
            $password = $_POST["password"];
            $branch = $_POST['branch'];
            $sem = $_POST["sem"];
            
        //     $i=0;
        //     $branch = $user_name[$i++] . $user_name[$i++];
            
        //     $length = strlen( $user_name );

        //     if( 'E'==$user_name[$i] )
        //         $branch .= $user_name[$i++];                
            
        //     $i++;
            
        //     $name = '';

        //     for( $i ; $i<$length ; $i++ )
        //         $name .= $user_name[$i];

            $table_name = $branch."_teacher's information";
            
            $sql = "INSERT INTO `$table_name` (`sno`, `email_id`, `password` , `sem` , `token`) VALUES (NULL, '$email_id', '$password' , '$sem' , -1);";

            $result = mysqli_query( $conn , $sql );
            

            if( !$result )
                die( mysqli_error( $conn) );
            else
                $insertion=true;
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
      <title>Saint | Add Teacher</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/jpeg" href="img/sadhu.jpeg"/>
    <style>
          body{
                  background-color:rgb(77, 148, 255,0.5);
          }
        
select {
  width: 20%;
  background-color: lightgrey;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}
select:hover {
  background-color: lightgreen;
}
input[type=email] , [type=password] {
  width: 20%;
  background-color: lightgrey;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;


}
input[type=password]:hover {
  background-color: lightgreen;
}
input[type=email]:hover {
  background-color: lightgreen;
}
input[type=submit] {
  width: 30%;
  height: 40px;
  background-color: lightgrey;
  color: black;
  padding: 5px 5px;
  /* margin: 5px 0; */
  border: none;
  border-radius: 4px;
  cursor: pointer;

}
input[type=submit]:hover {
  background-color: lightgreen;
}
          
  </style>
</head>
<body>

<center>
<font face="verdana" size="5"><b>Add Teacher To Saint University</b></font><br><br><br>
<font face="verdana" size="4"><b>Return To </b><a href="check_depart.php"><b>Dashboard</b></a></font><br><br>
    <font face="verdana" size="4"><b>Back To</b> <a href="index.php"><b>Home</b></a></font> <br><br>
    <br><br><br>
    <!-- <font face="verdana" size="3"><b> -: Please give teacher's username as CE_xyz :-</b></font><br><br><br> -->
        <form action="add_teacher.php" method="POST">

                <input type="email" placeholder="email id" name="email_id" required>
                        <br>
                <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Abcde@123" maxlength="15" required>
                        <br>
                <select name="branch" required>                        
                        <option value="">--Branch--</option>
                        <option value="ce">CE</option>
                        <option value="it">IT</option>
                        <option value="me">ME</option>
                        <option value="che">CHE</option>
                </select>
                <br>
                <select name="sem">
                        <option value="">--Semester--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                </select>
                        <br><br>
                <input type="submit" value="Add">

    </form>
    <br>
    <p><?php if( isset($insertion) && $insertion ) echo "<b>Insertion is successful</b>"; elseif(isset($insertion)) echo "<b>Insertion is Not successful</b>"; ?></p>

</body>
</html>