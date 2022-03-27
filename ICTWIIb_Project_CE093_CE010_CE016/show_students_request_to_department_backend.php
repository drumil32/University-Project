<?php //please don't change this line it is need for further code
session_start();
        if( isset( $_SESSION["depart"] ) )
                $_SESSION["depart"]="add_teacher";  //we do this because 
        else
                die("wrong");
?> 

<?php

    require_once('config.php');

    if( !empty($_GET["branch"]) || !empty( $_SESSION["branch"] ) )
    {        
        if( empty($_GET["branch"]) )
            $branch2 = $_SESSION["branch"];
        else{
            $_SESSION["branch"]=$branch2 = $_GET["branch"];        
        }
            

        if( "ALL"!=$branch2 )
        {
            $table_name = $branch2 . "_student_intro";

            $sql = "SELECT * FROM `$table_name`";

            $result = mysqli_query( $conn , $sql );

            if( !$result )
                die( "selection of table was not succesfull --> ". mysqli_error($conn) );

            echo "<p><h3>Requests in ";

            switch ($branch2) 
            {
                case "ce":
                    $branch = "Computer Engineering";
                    break;

                case "it":
                    $branch = "Information & Technology";
                    break;
                
                case "me":
                    $branch = "Mechanical Engineering";
                    break;

                case "che":
                    $branch = "Chemical Engineering";
                    break;
            }
            echo $branch2 . " : ";

            $num_of_row = mysqli_num_rows( $result );

            echo $num_of_row . "</h3></p>";

            
            echo "  <table border='2' id='customers'>
                    <tbody>
                        <th>Index</th>
                        <th>Name</th>
                        <th>School Name</th>
                        <th>Action</th>";                    

            while( $row=mysqli_fetch_assoc($result) )
            {
                $fullname = $row["full_name"];
                $sno = $row["sno"];
                $branch = $branch2;
                $prev_school_name = $row["prev_school_name"];              
                echo "<tr>
                        <td>$sno</td>
                        <td>$fullname</td>
                        <td>$prev_school_name</td>                        
                        <td><button type=button value='$branch' onclick='getrequestdetail($sno,this.value)'>Show Details</button></td>
                     </tr>";
            }

            echo "</tbody>
                  </table>";

        }
        else
        {
            echo "<p><h3>Requests from all branch : </h3></p>";
            

            echo "  <table border='2' id='customers'>
                    <tbody>";
            $count=1;

            while($count<5)                    
            {
                switch ($count) 
                {
                    case 1:
                        $branch="ce";
                        $branch1="Computer Engniering";
                        break;

                    case 2:
                        $branch="it";
                        $branch1="Information & Technology";
                        break;

                    case 3:
                        $branch="me";
                        $branch1="Mechenical Enginiering";
                        break;

                    case 4:
                        $branch="che";
                        $branch1="Chemical Engingiering";
                        break;                    
                }

                $table_name =  $branch . "_student_intro";

                $sql = "SELECT * FROM `$table_name`";

                $result = mysqli_query( $conn , $sql );

                if( !$result )
                    die( "selection of table was not succesfull --> ". mysqli_error($conn) );

// $result = mysqli_query( $conn , $sql );

//             if( !$result )
//                 die( "selection of table was not succesfull --> ". mysqli_error($conn) );


                echo "<tr><th colspan='4'>Number of student's request in  ";

                echo $branch1 . " are ";

                $num_of_row = mysqli_num_rows( $result );
                
                echo $num_of_row . "</th></tr>";

                        echo "
                            <th>Index</th>
                            <th>Name</th>
                            <th>School Name</th>
                            <th>Action</th>";
                        

                while( $row=mysqli_fetch_assoc($result) )
                {
                    $fullname = $row["full_name"];
                    $sno = $row["sno"];
                    $prev_school_name = $row["prev_school_name"];             
                    echo "<tr>
                            <td>$sno</td>
                            <td>$fullname</td>
                            <td>$prev_school_name</td>                        
                            <td><button type=button value='$branch' onclick='getrequestdetail($sno,this.value)'>Show Details</button></td>
                        </tr>";
                }
                $count++;
                
            }
            echo "</tbody>
                    </table>";
        }

    }
?>