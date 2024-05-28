<!DOCTYPE html>
<html>
<head>
    <title>DriVerify Records: Driver License</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        h1 {
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
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .add-record-container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 20px;
        }
        .add-record-button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: green;
            color: white;
            transition: background-color 0.3s;
        }
        .add-record-button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <h1>Driver License Record</h1>
    <table>
        <tr>
            <th>Driver ID</th>
            <th>Name</th>
            <th>License Number</th>
            <th>Agency Code</th>
            <!-- <th>Application Type</th> -->
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
                        "<form action='deleteOwner.php' method='post' style='display:inline;'>" .
                            "<input type='hidden' name='driverID' value='".$rowtDriverLicense['driverID']."'>" .
                            "<button type='submit'>Delete</button>" .
                        "</form>" .
                        "<form action='editDriverLicense.php' method='post' style='display:inline;'>" .
                            "<input type='hidden' name='driverID' value='".$rowtDriverLicense['driverID']."'>" .
                            "<button type='submit'>Edit</button>" .
                        "</form>" .
                        "<form action='editDriverLicense.php' method='post' style='display:inline;'>" .
                            "<input type='hidden' name='driverID' value='".$rowtDriverLicense['driverID']."'>" .
                            "<input type='hidden' name='driverName' value='".$rowtDriverLicense['driverNameDL']."'>" .
                            "<input type='hidden' name='agencyCode' value='".$rowtDriverLicense['agencyCode']."'>" .
                            "<input type='hidden' name='licenseNumber' value='".$rowtDriverLicense['licenseNumber']."'>" .
                        "</form>" .
                    "</td>" .
                    "</tr>";
            }
        }

        else {
            echo "0 results";

        }
    ?>
    </table>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
</body>
</html>
