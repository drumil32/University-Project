<?php

if(isset($_POST['author']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['comment'])){


	$name = $_POST['author'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$comment = $_POST['comment'];
	$to = "vasuforyou481210@gmail.com";
	$body = "<center><h3>From : $name <br>Mail : $email</h3><h4>Comment : $comment</h4><center>";
	$headers='';
	$headers=$headers .= "Content-type: text/html\r\n";
	if(mail($to, $subject, $body, $headers)){
		echo "<script>location.href = 'contact.html';</script>";
	}
	else{
		echo "<center><h1>Email Sending Failed</h1><br><h2>Send Query Again <a href='contact.php'>Contact Page</a></h2></center>";
	}

}
else{
	echo "<script>location.href = 'contact.html';</script>";
}


?>