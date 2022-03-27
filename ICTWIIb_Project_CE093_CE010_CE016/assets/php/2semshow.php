
<?php
session_start();
$conn = new mysqli('localhost', 'root', '', '3803425_sadhu');
//Check for connection error
if($conn->connect_error){
  die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
}
        $_SESSION["depart"]="show_brif_intro_of_accepeted_stu";
        $branch2 = $_GET['empid'];
        $sem = '2';

        $table_name = $branch2 . "_sem_" . $sem;
        echo "<h3>sem : $sem<br>$branch2</h3>";

        $sql = "SELECT * FROM `$table_name`";

        $result = mysqli_query( $conn , $sql);

        if( !$result )
            die( "selection of table is not sucess" );

            echo   "<table border='2' id='customers'>
                    <tbody>";
                    $branch1 = '';
            switch ($branch2) 
            {
                case "ce":
                    $branch1 = "Computer Engineering";
                    break;

                case "it":
                    $branch1 = "Information & Technology";
                    break;
                
                case "me":
                    $branch1 = "Mechanical Engineering";
                    break;

                case "che":
                    $branch1 = "Chemical Engineering";
                    break;
            }
            echo "<tr><th colspan='5'>Number of students in sem : $sem of  " .$branch1 . " is ";

            $_SESSION['branchdetail'] = $branch2;
            $_SESSION['sem'] = '2';

            $num_of_row = mysqli_num_rows( $result );
            
            echo " ".$num_of_row . "</th></tr>";

            echo"<th>Index</th>
                <th>Name</th>
                <th>Email ID</th>
                <th>Fee Details</th>";            

            echo "<th>Action</th>";

            while( $row=mysqli_fetch_assoc($result) )
            {
                $fullname = $row["full_name"];
                $sno = $row["sno"];
                $email_id = $row['stu_email'];
                echo "<tr>
                        <td>$sno</td>
                        <td>$fullname</td>
                        <td>$email_id</td>
                        <td>";

                if( 0==$row["fees_detail"] )                        
                    echo "<a style='color:red;cursor:pointer;' onclick='getData6($sno)'>Remaining</a></td>";  //modify it
                else
                    echo "<p style='color:green;'>done<p></td>";

                echo "<td><button type=button value=$sno onclick='getData5(this.value)'>Show Details</button></td>";
            }
            // echo "<td><a href=" . "show_all_detail_of_accepted_stu_to_depart.php?branch=$branch2&sem=$sem&sno=$sno". " >show all details</a></td>
            //             </tr>";
    


?>