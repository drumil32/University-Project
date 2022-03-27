
<!DOCTYPE html>
<html lang="en">

<head>
      <title>Student Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="icon" type="image/jpeg" href="img/sadhu.jpeg"/>
  <style>
          .back{
                  background-color:rgb(77, 148, 255,0.5);
          }
          .btn{
                  background-color:pink;
                  height:40px;
                  width:60px;
                  border-color:black;
                  border-radius:10px;
                  cursor:pointer;
          }
          .sel{
                  background-color:pink;
                  height:35px;
                  width:90px;
                  border-color:black;
                  border-radius:10px;
                  
          }
          .btn:hover,.sel:hover{
                  background-color:yellow;
                  
          }
          
  </style>
</head>

<body>
    <div id="comments">
        <form id="myForm" method="POST">
  <select name="branch" id="branch" class="sel" required>
            <option value="">--Branch--</option>
            <option value="CE">CE</option>
            <option value="IT">IT</option>
            <option value="ME">ME</option>
            <option value="CHE">CHE</option>
        </select>&nbsp;<br>
  <select name="sem" required class="sel">
          <option value="">--sem--</option>
          <option value="1">1st</option>
          <option value="2">2nd</option>
          <option value="3">3rd</option>
          <option value="4th">4th</option>
        </select>
        <button id="button">submit</button>
        </form>
</div> 


<!-- <p>Click the "Try it" button to display the value of the first element in the form.</p>
 -->
<!-- <button onclick="myFunction()">Try it</button> -->

<!-- <p id="demo"></p> -->

<!-- <script>
function myFunction() {
  var x = document.getElementById("myForm").elements[0].value;
  document.getElementById("demo").innerHTML = x;
}
</script> -->

<script>
    
    $(document).ready(function(){
        $("button").click(function(){
            var branch = "CE";
            var sem = "1";
            $("#comments").load("test.php", {
                branchnew: branch,
                semnew: sem
            });
        });
    });

</script>

</body>

</html>