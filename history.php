<!DOCTYPE html>
<html>
<head>
    <title>DriVerify Records: History</title>
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
            width: 90%;
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
    <h1>History</h1>
    <table>
        <tr>
            <th>Plate Number</th>
            <th>Owner</th>
            <th>Driver</th>
            <th>License Number</th>
            <th>Agency Code</th>
            <th>No. of Violation/s</th>
            <th>Recent Date of Violation/s</th>
            <th>DL Code</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'DBConnector.php';

            $sqlHistory ="SELECT * FROM history";
            $resultHistory = $conn->query($sqlHistory);


            if($resultHistory->num_rows > 0){
                    while($rowtHistory = $resultHistory->fetch_assoc()) {

                echo 

                    "<tr>". 
                    "<td align = 'center' >".$rowtHistory["plateNumber"]."</td>". 
                    "<td align = 'center' >".$rowtHistory["ownerNameH"]."</td>". 
                    "<td align = 'center' >".$rowtHistory["driverNameH"]."</td>". 
                    "<td align = 'center' >".$rowtHistory["licenseNumber"]."</td>".
                    "<td align = 'center' >".$rowtHistory["agencyCode"]."</td>". 
                    "<td align = 'center' >".$rowtHistory["noOfViolations"]."</td>". 
                    "<td align = 'center' >".$rowtHistory["recentViolationDate"]."</td>".
                    "<td align = 'center' >".$rowtHistory["DLCode"]."</td>".  
                    "<td align='center'>" .
                        "<form action='deleteHistory.php' method='post' style='display:inline;'>" .
                            "<input type='hidden' name='licenseNumber' value='".$rowtHistory['licenseNumber']."'>" .
                            "<button type='submit'>Delete</button>" .
                        "</form>" .
                        "<form action='editHistory.php' method='post' style='display:inline;'>" .
                        
                            "<input type='hidden' name='plateNumber' value='".$rowtHistory['plateNumber']."'>" .
                            "<input type='hidden' name='ownerNameH' value='".$rowtHistory['ownerNameH']."'>" .
                            "<input type='hidden' name='driverNameH' value='".$rowtHistory['driverNameH']."'>" .
                            "<input type='hidden' name='licenseNumber' value='".$rowtHistory['licenseNumber']."'>" .
                            "<input type='hidden' name='agencyCode' value='".$rowtHistory['agencyCode']."'>" .
                            "<input type='hidden' name='DLCode' value='".$rowtHistory['DLCode']."'>" .
                            "<button type='submit'>Edit</button>" .
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
