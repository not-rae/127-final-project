<?php

include 'DBConnector.php';




$sqlLTO = "SELECT * FROM LTO";
$resultLTO = $conn->query($sqlLTO);


if($resultLTO->num_rows > 0){
        while($rowLTO = $resultLTO->fetch_assoc()) {

            echo 
                "<h2>". "LTO AGENCY ". "</h2>".
                '<table style = "width: 100%" >'.
                "<tr>".
                    "<th>"."Agency Codde"."</th>".
                    "<th>"."Agency Name"."</th>".
                    "<th>"."Location"."</th>".
                    "<th>"."Email Address"."</th>".
                    "<th>"."Contact Number"."</th>".
                    "<th>"." Year Level "."</th>".
                    "<th>"."    Graduation Status "."</th>".
                    "<th>"." Images "."</th>".
                "</tr>".

                "<tr>". 
                "<td align = 'center' >".$row["id"]."</td>". 
                "<td align = 'center' >".$row["student_Name"]."</td>". 
                "<td align = 'center' >".$row["age"]."</td>". 
                "<td align = 'center' >".$row["email"]."</td>". 
                "<td align = 'center' >".$row["course"]."</td>". 
                "<td align = 'center' >".$row["year_level"]."</td>". 
                "<td align = 'center' >".$row["graduation_Status"]."</td>". 
                "<td align = 'center' >". '<img src="'.$row["images"].' " width="200" height="200">'. "</td>".
                "</tr>".

                "</table>"
                
                ;
                 
        }
    }

    else {
        echo "0 results";

    }



















































?>