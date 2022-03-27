<!DOCTYPE html>
<html lang="en">
<head>
    <title>Saint | Password Recovery</title>
    <link rel="icon" href="assets/img/sadhu.jpeg" type="image/jpeg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        #highlighted {
  position: relative;
  background-color: #dc143c;
}
#highlighted .container-fluid h1, 
#highlighted .container-fluid p {
  color: #fff;
}
#highlighted .container-fluid h1 {
  font-size: 54px;
  font-family: Verlag,museo-sans,'Helvetica Neue',Helvetica,Arial,sans-serif;
  color: #414141;
  font-weight: 300;
}
#content {
  background-position: right bottom;
  background-repeat: no-repeat;
}
.interior-page {
  background-color: #FFF;
  padding-bottom: 30px;
}
#highlighted+#content.interior-page .interior-page-nav {
  margin-top: -4em;
}
#highlighted+#content.interior-page .interior-page-nav, 
.interior-page .interior-page-nav {
  padding-left: 0;
}
.sidebar {
  margin-top: 2em;
}
.content-area-right {
  max-width: 1200px;
  padding-right: 15px;
  padding-left: 15px;
}
.container-fluid>.row h2.crumb-title {
  margin-bottom: 0;
}
.page-title {
  min-height: 50px;
}
.page-title, ul {
  margin: 0;
  list-style: none;
}
.content-crumb-div {
  margin: 5px 0 20px;
}
a {
  text-decoration: none;
}
.container-fluid .row .modal, 
.page .modal {
  position: fixed;
  top: 35%;
}
#highlighted+#content.interior-page .interior-page-nav, 
.interior-page .interior-page-nav {
  padding-left: 0;
}
#highlighted+#content.interior-page .interior-page-nav {
  margin-top: -4em;
}
.dynamicDiv.panel-group {
  border: 1px solid #E7E9E9;
  margin-left: 30px;
}
.panel-group {
  margin-bottom: 0;
  background-color: #fff;
}
.panel-group .panel {
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
  border: none;
  box-shadow: none;
}
.panel-group .panel-heading {
  padding: 0;
  border: none;
}
.panel-default>.panel-heading {
  color: #333;
  background-color: #f5f5f5;
  border-color: #ddd;
}
.panel-group .panel-heading .panel-title {
  font-size: 1.1em;
  font-family: Verlag,museo-sans,'Helvetica Neue',Helvetica,Arial,sans-serif;
}
.interior-page-nav .panel-group .panel-heading .panel-title a {
  background: 0 0;
}
.panel-group .panel-heading .panel-title a {
  display: block;
  padding: 15px 45px 15px 15px;
  background: url(/resources/images/misc/icon_accordion-open.png) 95% center no-repeat #f6f6f6;
}
span.subMenuHighlight, 
ul.panel-heading li.panel-title a:hover {
  color: #ed3c95;
}
.panel-group .panel-heading .panel-title {
  font-size: 1.1em;
  font-family: Verlag,museo-sans,'Helvetica Neue',Helvetica,Arial,sans-serif;
}
ul.panel-heading {
  margin-bottom: 1px;
}
.panel-group .panel-heading .panel-title a {
  display: block;
  padding: 15px 45px 15px 15px;
  background: url(/resources/images/misc/icon_accordion-open.png) 95% center no-repeat #f6f6f6;
}
.panel-group {
  margin-bottom: 0;
  background-color: #fff;
}
.label-default {
  background-color: #fff;
  margin-top: 10px;
}
label {
  display: inline-block;
  margin-bottom: 5px;
  font-weight: 700;
}
.form-control {
  border-radius: 0;
}
.btn-primary {
  color: #fff;
  background-color: #dc143c;
  border-color: #ea3e10;
  width: 100%;
}
.btn-block {
  display: block;
}
.btn {
  padding: 8px 28px;
  font-weight: 400;
  -webkit-transition: background .3s ease-in;
  transition: background .3s ease-in;
  white-space: normal;
  border-width: 0 0 1px;
}
.content-area-right {
  margin-top: 10px;
}
@media (min-width: 992px)
  #highlighted .container-fluid {
    margin-bottom: 2.5rem;
  }

    </style>
    </head>
<?php

    require_once('config.php');

    if( isset( $_GET['sign'] ) ) {
        $_SESSION['sign'] = $_GET['sign'];
        
        if( 1==$_SESSION['sign'] )
        {
            $_SESSION['sem'] = $_GET['sem'];
            $_SESSION['branch'] = $_GET['branch'];
        }

        $token = $_SESSION['token'] = $_GET['token'];    
        
        if( 1==$_SESSION['sign'] )
        {
            $sem = $_SESSION['sem'];
            $table_name = $_SESSION['branch'] . "_teacher's information";

            $sql = "SELECT * FROM `$table_name` WHERE `sem`='$sem' and `token`='$token' ";                
        }
        else
        {
            $table_name = 'depart';
            $sql = "SELECT * FROM `$table_name` WHERE `token`='$token'";
        }

        $result = mysqli_query( $conn , $sql );
        // die( mysqli_error($conn) );
        $row = mysqli_fetch_assoc($result);

        if(  !$row )
        {
            if( 1==$_SESSION['sign'] )
                $location = 'teacherlogin.php';
            else
                $location = 'depart_login.php';

            echo "<script>                  
                    alert('Link is expired');
                  </script>
                  <script>
                    location.replace('$location');
                  </script>";
        }

        $_SESSION['row'] = $row;
    }

    if ( $_SERVER["REQUEST_METHOD"] == "POST" )
    {
        if( $_POST["primary_password"]==$_POST["secondary_password"] )
        {
            $token = $_SESSION['token'];
            $branch = $_SESSION['branch'];
            $row = $_SESSION['row'];
            // if( 1==$_SESSION['sign'] )
            // {
            //     $sem = $_SESSION['sem'];
            //     $table_name = $branch . "_teacher's information";

            //     $sql = "SELECT * FROM `$table_name` WHERE `sem`='$sem' and `token`='$token' ";                
            // }
            // else
            // {
            //     $table_name = 'depart';
            //     $sql = "SELECT * FROM `$table_name` WHERE `token`='$token'";
            // }

            // $result = mysqli_query( $conn , $sql );
            // // die( mysqli_error($conn) );
            // $row = mysqli_fetch_assoc($result);

            // if(  !$row )
            //     die( "link is expired ");

            $sno = $row['sno'];
            $password = $_POST['primary_password'];

            $sql = "UPDATE `$table_name` SET `token` = '-1' WHERE  `sno` = '$sno'";
            $result = mysqli_query( $conn , $sql );

            $sql = "UPDATE `$table_name` SET `password`='$password' WHERE `sno` = '$sno'";
            $result = mysqli_query( $conn , $sql );
                
            
            // $result = mysqli_query( $conn , $sq2 );

            // $row['password'] = $_POST['primary_password'];
            // $row['token'] = -1;

            if( 1==$_SESSION['sign'] )
                $location = 'teacherlogin.php';
            else
                $location = 'depart_login.php';
            echo "
                    <script>                  
                        alert('Password is change successfully');
                    </script>                    
                    <script>
                        location.replace('$location');
                    </script>
                ";
        }
        else
        {
            echo "Password missmatch";
        }
    }
    
    
    ?>

<body>

    <center>
 
        <!-- <input type="email" name="email_id" class="mb-2 mr-sm-2" style="" placeholder="Email ID" required> -->
    </form>
    </center>
    <div id="highlighted" class="hl-basic hidden-xs">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2">
        <h1>Password Recovery</h1>
      </div>
    </div>
  </div>
</div>
<div id="content" class="interior-page">
  <div class="container-fluid">
    <div class="row">
      <!--Content-->
      <form action="" method="post" class="form-inline">
      <div class="col-sm-9 col-md-9 col-lg-10 content equal-height">
        <div class="content-area-right">
          <div class="row">
            <div class="col-md-5 forgot-form">
              <p>Enter New Password ... !</p>
             <input type="password" name="primary_password" placeholder="New_Password"><br><br>
        <input type="password" name="secondary_password" placeholder="Confirm_Password"><br><br>
              <input type="submit" value="submit" class="btn btn-primary mb-2">
            </div>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
