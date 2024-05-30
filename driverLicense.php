<!-- 
    This is responsible for showing the values from the driverLicense table

-->

<!DOCTYPE html>
<html>
<head>
    <title>DriVerify: Driver License Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #ffffff;
        }
        h1 {
            font-size: 45px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #ff7d00;
        }
        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .button-container button {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
    <h1>Driver License Records</h1>
    <table>
        <tr>
            <th>Driver ID</th>
            <th>Driver Name</th>
            <th>License Number</th>
            <th>Agency Code</th>
            <th>Issue Date</th>
            <th>Expiration Date</th>
            <th>Condition Code</th>
            <th>DL Code</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'DBConnector.php';
            $sqlDriverLicense ="SELECT * FROM driverLicense";
            $resultDriverLicense = $conn->query($sqlDriverLicense);

            if($resultDriverLicense->num_rows > 0){
                while($rowtDriverLicense = $resultDriverLicense->fetch_assoc()) {
                    echo 
                        "<tr>". 
                        "<td align = 'center' >".$rowtDriverLicense["driverID"]."</td>". 
                        "<td align = 'center' >".$rowtDriverLicense["driverNameDL"]."</td>". 
                        "<td align = 'center' >".$rowtDriverLicense["licenseNumber"]."</td>". 
                        "<td align = 'center' >".$rowtDriverLicense["agencyCode"]."</td>".
                        "<td align = 'center' >".$rowtDriverLicense["issueDate"]."</td>". 
                        "<td align = 'center' >".$rowtDriverLicense["expirationDate"]."</td>". 
                        "<td align = 'center' >".$rowtDriverLicense["conditionCode"]."</td>".
                        "<td align = 'center' >".$rowtDriverLicense["DLCode"]."</td>".  
                        "<td align='center'>" .

                        //returns the values from the table that will be used in the editDriver.php

                        "<form action='editDriverLicense.php' method='post' style='display:inline;'>" .
                            "<input type='hidden' name='driverID' value='".$rowtDriverLicense['driverID']."'>" .
                            "<input type='hidden' name='driverName' value='".$rowtDriverLicense['driverNameDL']."'>" .
                            "<input type='hidden' name='licenseNumber' value='".$rowtDriverLicense['licenseNumber']."'>" .
                            "<input type='hidden' name='agencyCode' value='".$rowtDriverLicense['agencyCode']."'>" .
                        
                            "<button type='submit'>Edit</button>" .
                        "</form>" .
                        "</td>" .
                        "</tr>";
                    }
            } else {
                echo "0 results";
            }
        ?>
    </table>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
</body>
</html>
