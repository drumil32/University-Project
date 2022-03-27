<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/jpeg" href="img/sadhu.jpeg"/>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saint | Registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style type="text/css">
body{
    background-color: #dee9ff;
}

.registration-form{
    padding: 50px 0;
}

.registration-form form{
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .form-icon{
    text-align: center;
    background-color: #5891ff;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-bottom: 50px;
    line-height: 100px;
}

.registration-form .item{
    border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
}

.registration-form .social-media{
    max-width: 600px;
    background-color: #fff;
    margin: auto;
    padding: 35px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    color: #9fadca;
    border-top: 1px solid #dee9ff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .social-icons{
    margin-top: 30px;
    margin-bottom: 16px;
}

.registration-form .social-icons a{
    font-size: 23px;
    margin: 0 3px;
    color: #5691ff;
    border: 1px solid;
    border-radius: 50%;
    width: 45px;
    display: inline-block;
    height: 45px;
    text-align: center;
    background-color: #fff;
    line-height: 45px;
}

.registration-form .social-icons a:hover{
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
          $('#birth-date').mask('00/00/0000');
          $('#phone-number').mask('0000-0000');
         })

        function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
    </script>
</head>

<?php

                                                            // declaretion of variable

    $stu_name_error = $input_student_name = $school_name_error = $input_school_name = $input_student_num  = $input_stu_email = $input_parent_num = "";

    $student_num_error = $photo_error = $parent_num_error = $result_error = $stu_email_error = $branch_error = $DOB_error = $branch = $date = $month = $year = "";

                                                            // we put empty keys in session so that in form we don't need to check it is set or not we can dirctly use it

        if( !isset($_SESSION['fullname']) )
        {
                $_SESSION['fullname'] = '';
                $_SESSION['stu_number'] = '';
                $_SESSION['student_email'] = '';
                $_SESSION['parent_num'] = '';
                $_SESSION['branch'] = '';
                $_SESSION['date'] = '';
                $_SESSION['month'] = '';
                $_SESSION['year'] = '';
                $_SESSION['school_name'] = '';
                $_SESSION['file_name'] = '';
                $_SESSION['self_intro'] = '';                                                         
                $_SESSION['photo'] = '';
                $_SESSION['result'] = '';
        }



    if( $_SERVER["REQUEST_METHOD"] == "POST" )
    {
                                                                // student's name validation

        $input_student_name = trim( $_POST["student_name"] );
        if( empty($input_student_name) )
            $stu_name_error = "Please give student's name";
        elseif( !filter_var($input_student_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))) )
            $stu_name_error = "Please give valid student name";

        $_SESSION["fullname"] = $input_student_name;

                                                                // user name validation

// USER NAME------------
        
        // $input_student_num  = trim( $_POST["stu_number"] );
        // if( empty($input_student_num ) )
        //     $student_num_error = "Please give user name";
        // elseif( !filter_var($input_student_num , FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))) )
        //     $student_num_error = "Please give valid user name";

        // $_SESSION["stu_number"] = $input_student_num ;            




                                                                // student email id
            
        $input_stu_email = trim( $_POST["student_email"] );
        if( empty($input_stu_email) )
            $stu_email_error = "Please give student's email id";
        elseif( !filter_var( $input_stu_email , FILTER_VALIDATE_EMAIL ) )
            $stu_email_error = "Please give valid email address";
        else
        {
            // // Check given mail address is exists or not

            // // Include library file

            // require_once 'mail_seting.php';
            // // Initialize library class
            // $mail = new VerifyEmail();

            // // Set the timeout value on stream
            // $mail->setStreamTimeoutWait(20);

            // // Set debug output mode
            // $mail->Debug= TRUE; 
            // $mail->Debugoutput= 'html'; 

            // // Set email address for SMTP request
            // // $mail->setEmailFrom('from@email.com');

            // // Email to check
            // $email = $input_stu_email;

            // // Check if email is valid and exist
            // if($mail->check($email)){}
            // else{
            //     // echo 'Email &lt;'.$email.'&gt; is valid, but not exist!'; 
            //     $stu_email_error = "Email addresss isn't exists";
            // } 
        }

        $_SESSION["student_email"] = $input_stu_email;


                                                                    // student's number validation

        $input_student_num = trim( $_POST["student_num"] );
        if( empty($input_student_num) )
            $student_num_error = "Please give parent's contac number";
        elseif( !ctype_digit( $input_student_num  ) || strlen($input_student_num)!=10 )
            $student_num_error = "Please give valid contac number";

        $_SESSION['stu_number'] = $input_student_num;
                                                                                


                                                                    // parent's number validation

        $input_parent_num = trim( $_POST["parent_num"] );
        if( empty($input_parent_num) )
            $parent_num_error = "Please give parent's contac number";
        elseif( !ctype_digit( $input_parent_num  ) || strlen($input_parent_num)!=10 )
            $parent_num_error = "Please give valid contac number";

        $_SESSION["parent_num"] = $input_parent_num;
            
            
                                                                // branch and date of birth validation

        $branch = $_POST["branch"];
        
        if( empty($branch) )
            $branch_error = "Please select branch";
        else
            $_SESSION["branch"] = $branch;
            
        $date =  $_POST["date"];
        $month = $_POST["month"];
        $year = $_POST["year"];

        if( empty($date) || empty($month) || empty($year) )
            $DOB_error = "Please select Date of Birth";
        else
        {
            $_SESSION["month"] = $month;
            $_SESSION["year"] = $year;
            $_SESSION["date"] = $date;
        }

        
                                                                


                                                                // school name validation

        $input_school_name = trim( $_POST["school_name"] );
        if( empty($input_school_name) )
            $school_name_error = "Please give school name";
        elseif( !filter_var( $input_school_name , FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))) )
            $school_name_error = "Please give valid school name";  
        
        $_SESSION["school_name"] = $input_school_name;


                                                            // photo valideation

        if( !empty($_FILES['file']['name'][0]) )
        {
            $_SESSION["photo"] = $_FILES['file']['name'][0];
            
            $_SESSION["file_size1"] = $_FILES['file']['size'][0];
            $_SESSION["tmp_photo"] = $_FILES['file']['tmp_name'][0];

            if( $_SESSION["file_size1"]>100000 )
                $photo_error = "please give a file whose size is not more than 100KB ";
            else{
                    
                    
                        $file1 = $_FILES['file'][0];
	  		$filename1 = $_FILES['file']['name'][0];
	  		$filetmpname1 = $_FILES['file']['tmp_name'][0];
	  		$filesize1 = $_FILES['file']['size'][0];
	  		$fileerror1 = $_FILES['file']['error'][0];
	  		$filetype1 = $_FILES['file']['type'];
	  		//$image = $_FILES["file"]["name"]; 
			$img1 = "dust/".$input_student_num . "photo.jpg";
                        $_SESSION['photo1'] = $img1;
	 		$fileext1 = explode('.', $filename1);
	  		$fileactualext1 = strtolower(end($fileext1));
	  				
	  					$filedestination1 = 'dust/'.$input_student_num . "photo.jpg";
	  					move_uploaded_file($filetmpname1,$filedestination1);
                    
                    
                    
            }
        }elseif( empty($_SESSION["photo"]) )
            $photo_error = "please give a file";


                                                            // result validataion
        if( !empty($_FILES['file']['name'][1]) )
        {
            $_SESSION["result"] = $_FILES['file']['name'][1];
            
            $_SESSION["file_size2"] = $_FILES['file']['size'][1];
            $_SESSION["tmp_result"] = $_FILES['file']['tmp_name'][1];

            if( $_SESSION["file_size2"]>100000 )
                $result_error = "please give a file whose size is not more than 100KB ";
                else{
                    
                    
            // $file2 = $_FILES['file'][1];
	  		$filename2 = $_FILES['file']['name'][1];
	  		$filetmpname2 = $_FILES['file']['tmp_name'][1];
	  		$filesize2 = $_FILES['file']['size'][1];
	  		$fileerror2 = $_FILES['file']['error'][1];
	  		$filetype2 = $_FILES['file']['type'];
	  		//$image = $_FILES["file"]["name"]; 
			$img2 = "dust/".$input_student_num  . "result.jpg";
                        $_SESSION['result1'] = $img2;
	 		$fileext2 = explode('.', $filename2);
	  		$fileactualext2 = strtolower(end($fileext2));
	  				
              $filedestination2 = 'dust/'. $input_student_num . "result.jpg";
	  					move_uploaded_file($filetmpname2,$filedestination2);
                    
                    
                    
            }
        }elseif( empty($_SESSION["result"]) )
            $result_error = "please give a file";



                                                                
                                                                // tirm self introduction

            $input_self_intro = trim( $_POST["self_intro"] );
            $_SESSION["self_intro"] = $input_self_intro;
                    
            if( empty($stu_name_error) && empty($student_num_error) && empty($stu_email_error) && empty($parent_num_error) && empty($branch_error) && empty($DOB_error) && empty($school_name_error) && empty($photo_error) && empty($result_error) )
            {
                ?>
                <script>
                    location.replace("thank_you.php");
                </script>

<?php  } } ?>

<body>
<div class="w3-top">
  <div class="w3-bar w3-card" style="background-color: rgb(77, 148, 255);">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-left" href="index.php" title="Toggle Navigation Menu"><i class="fa fa-home"></i></a>
    <a href="index.php" class="w3-padding-large w3-hover-red w3-hide-small w3-left"><i class="fa fa-home" style="color: black;"></i></a>
    <a href="#band" class="w3-bar-item w3-button w3-padding-large w3-hide-small">COURSES</a>
    <a href="#tour" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ABOUT US</a>
    <a href="contact.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#band" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">COURSES</a>
  <a href="#tour" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">ABOUT US</a>
  <a href="contact.html" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
</div><br>
       <div class="registration-form">
        <center><h2 style="font-size:6vw;">Welcome to saint university</h2></center><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype='multipart/form-data'>
            <div class="form-icon" style="background-color: white;">
                <span><img src="img/sadhu.jpeg" alt="" style="border-radius: 50%;" height="100px" width="100px"></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item"  name="student_name" placeholder="Full Name *" id="Sname" value="<?php echo $_SESSION["fullname"]; ?>" title="only albhbets" maxlength = "50" ><span><?php echo $stu_name_error; ?></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="student_num" placeholder="Phone Number *" id="stu_num" value="<?php echo $_SESSION['stu_number']; ?>" ><span><?php echo $student_num_error; ?></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="parent_num" placeholder="Parent's contact no. *" id="parent_num" value="<?php echo $_SESSION['parent_num'] ; ?>" ><span><?php echo $parent_num_error; ?></span>
            </div>
            <div class="form-group">
                <input type="email" class="form-control item"  name="student_email" maxlength="49" id="Semail_id" value="<?php  echo $_SESSION['student_email']; ?>" placeholder="Email *" ><span><?php echo $stu_email_error; ?></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="school_name" value="<?php echo $_SESSION["school_name"]; ?>" id="Pschool" placeholder="Previous school name *" >
            <span><?php echo $school_name_error; ?></span>
            </div>
            <div class="form-group">
                <textarea  name="self_intro" placeholder="Tell us about your achievements *" class="form-control item" ><?PHP echo $_SESSION["self_intro"]; ?></textarea>
                
            </div>
                        <div class="form-group">
                <label for="branch" class="lebal">Branch : *</label>
                <select class="form-control item" style="height: 40px;" name="branch" id="branch">
                  <option value="<?php echo $_SESSION["branch"]; ?>"><?php if( empty($_SESSION["branch"]) ) echo "--select branch--"; else echo $_SESSION["branch"]; ?></option>
                <?php
                
                if( $branch!='CE' )
                echo "<option value='ce'>CE</option>";
                if( $branch!='IT' )
                echo "<option value='it'>IT</option>";
                if( $branch!='ME' )
                echo "<option value='me'>ME</option>";
                if( $branch!='CHE' )
                echo "<option value='che'>CHE</option>"; ?>  
                </select><span><?php echo $branch_error; ?></span>
            </div>
            <div class="form-group">
                <label for="Age" class="lebal">Birthdate : *</label>
                <table>
                    <tbody>
                        <tr>
                            <td>
            <select name="date"  class="form-control item" style="height: 40px;" style="width: 80px;" id="" >
                <option value="<?php echo $_SESSION["date"]; ?>"> <?php if( empty($_SESSION["date"]) ) echo "D"; else echo $_SESSION["date"]; ?> </option>
                <?php
                    for($i=1 ; $i<=31 ; $i++ )
                    {
                        if( $date!=$i )
                            echo "<option value= " . $i . ">". $i . "</option>" ;
                    }
                ?>
                </select>
                                </td>  
                                <td>     
                <select name="month" class="form-control item" style="height: 40px;" style="width: 80px;" id="" >
                    <option value="<?php echo $_SESSION["month"]; ?>"> <?php if( empty($_SESSION["month"]) ) echo "M"; else echo $_SESSION["month"]; ?></option>
                    <?php                    
                        for( $i=1 ; $i<=12 ; $i++ )
                        {
                            if( $month!=$i )
                                echo "<option value= " . $i .">" . $i . "</option>" ;
                        }
                    ?>
                </select>       
            </td>
            <td>
                <select name="year" class="form-control item" style="height: 40px;" style="width: 80px;" id="" >
                    <option value="<?php echo $_SESSION['year']; ?>"><?php if( empty($_SESSION["year"]) ) echo "Y"; else echo $_SESSION["year"]; ?></option>
                <?php
                        $year2 = date("Y");
                        for($i=$year2-22 ; $i<=$year2-18 ; $i++ )
                        {
                            if( $year!=$i )
                                echo "<option value=" . $i .">" . $i ."</option>";
                        }
                ?>                        
                </select>
            </td>
        </tr>
                </tbody>
                </table>
                <span><?php echo $DOB_error; ?></span>
            </div>
            <div class="form-group">
                <label for="photo" class="lebal">Your Photo : *</label>
                <input type="file" class="form-control item" name="file[]" value="<?php echo $_SESSION["photo"]; ?>" id="photo" accept=".jpg" title="only jpg format and size not more than 100KB" >
            <span><?php echo $photo_error; ?></span>
            </div>
            <div class="form-group">
                <label for="result" class="lebal">Your Result : *</label>
                <input type="file" class="form-control item" name="file[]" value="<?php echo $_SESSION["result"]; ?>" id="result" accept=".jpg" title="only jpg format and size not more than 100KB" >
            <span><?php echo $result_error; ?></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">submit</button>
            </div>
        </form>
        <div class="social-media">
            <h5>Contact us if any query</h5>
            <div class="social-icons">
                <a href="https://www.youtube.com/channel/UCT_aAHVTwIPvW3mEUfHbB7g"><i class="icon-social-youtube" title="youtube"></i></a>
                <a href="https://www.instagram.com/vashishthchaudhary/"><i class="icon-social-instagram" title="instagram"></i></a>
                 <a href="https://www.linkedin.com/in/vashishth-patel-312a52204"><i class="icon-social-linkedin" title="linkedin"></i></a>
                <a href="https://wa.link/u7w477"><i class="fa fa-whatsapp" title="whatsapp"></i></a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    

<br>
</body>
</html>