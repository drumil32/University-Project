<!DOCTYPE html>
<html lang="en">
<head>
    <title>Saint | Forgot Password</title>
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
    
    // NOTE :- sign 1 indecate teacher
    //         sign 0 indecate department
    //         sign -1 indecate student

    if( isset($_GET['sign'])  )
    {
        // echo "sign $;";        
        $_SESSION['sign'] = $_GET['sign'];
    }

    require_once('config.php');

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) 
    {
        $email_id = $_POST['email_id'];

        $sign = $_SESSION['sign'];
        
        if( 0!=$sign )
        {
            $sem = $_POST['sem'];
            $branch = $_POST['branch'];
        }

        // die($sign);

        if( 0!=$sign )
        {
            if( 1==$sign )
            {
                $table_name = $branch . "_teacher's information";
                $sql = "SELECT * FROM `$table_name` WHERE `email_id`='$email_id' && `sem`='$sem'";
            }
            else
            {
                $table_name = $branch . "_sem_" . $sem;
                $sql = "SELECT * FROM `$table_name` WHERE `stu_email`='$email_id' ";
            }
        }
        else
        {            
            $table_name = "depart";
            $sql = "SELECT * FROM `$table_name` WHERE `user_name`='$email_id' ";
        }


        $result = mysqli_query($conn , $sql );                

        $row = mysqli_fetch_assoc($result);


        if( !$row )
            echo "<h2>please give true information</h2>";
        elseif( -1!=$sign )
        {            
            $token = rand(1,1000000);
            $sno = $row['sno'];
            
            $sql = "UPDATE `$table_name` SET `token` = '$token' WHERE `sno` = '$sno';";

            $result = mysqli_query( $conn , $sql );

            
            if( 1==$sign )
                $location = 'teacherlogin.php';
            else
                $location = 'depart_login.php';

            if( !$result )
            {
                echo "<script>
                        alert('Sorry, something is wrong please try again');
                      </script>
                      <script>
                        location.replace('$location');
                      </script>";
            }
            
            if( 0!=$sign )
                $link = "http://localhost/phpproject/recovery_password_for_d_or_t.php?sign=$sign&branch=$branch&sem=$sem&token=$token";
            else
                $link = "http://localhost/phpproject/recovery_password_for_d_or_t.php?sign=$sign&token=$token";
    
            $subject = "Password recory";
            $body = "<center><h1>Saint Password Recovery</h1><br><h2>Use This Link For Changing The Password :- " . "<a href='$link'>Click</a></h2></center>";
            $headers = '';
            $headers .= "Content-type: text/html\r\n";
        
            if (mail($email_id, $subject, $body, $headers)) {
                echo "  <script>
                            alert('Mail is send successfully');
                        </script>

                        <script>
                            location.replace('$location');
                        </script>";
            } else {
                echo "Email sending failed...";
            }
        }
        else
        {
            $DOB = $row['DOB'];
            $subject = "Password recory";
            $body = "Your date of birth is --> $DOB";
            $headers = "From: Admin Saint";
        
            if (mail($email_id, $subject, $body, $headers)) {
                echo "
                <script>
                    location.replace('studentlogin.php');
                </script>
                ";
            } else {
                echo "Email sending failed...";
            }

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
        <h1>Forgot Password</h1>
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
              <p>Please enter your email address below and we will send you information to change your password.</p>
              <label class="label-default" for="un">Email Address</label><br> <input type="email" name="email_id" class="form-control" placeholder="Email ID" required><br><br>
                  <?php
        if( 0!=$_SESSION['sign'] )
        {
            echo  '<select name="sem" required class="form-control">
                        <option value="">--Semester--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                <br><br>
                    <select name="branch" required class="form-control">                        
                            <option value="">--Branch--</option>
                            <option value="ce">CE</option>
                            <option value="it">IT</option>
                            <option value="me">ME</option>
                            <option value="che">CHE</option>
                    </select>
                <br><br>';
        }
    ?>
              <input type="submit" value="submit" class="btn btn-primary mb-2">
            </div>
          </div>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>