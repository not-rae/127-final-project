<!DOCTYPE html>
<html>
<head>
    <title>DriVerify: History Records</title>
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
    <h1>History Records</h1>
    <table>
        <tr>
            <th>Plate Number</th>
            <th>Owner</th>
            <th>Driver</th>
            <th>License Number</th>
            <th>DL Code</th>
            <th>Agency Code</th>
            <th>Report ID</th>
            <th>Violation ID</th>
            <th>Recent Date of Violation</th>
            <th>Action</th>

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
                        "<td align = 'center' >".$rowtHistory["DLCode"]."</td>".  
                        "<td align = 'center' >".$rowtHistory["agencyCode"]."</td>". 
                        "<td align = 'center' >".$rowtHistory["reportID"]."</td>".
                        "<td align = 'center' >".$rowtHistory["violationID"]."</td>". 
                        "<td align = 'center' >".$rowtHistory["violationDate"]."</td>".
                        "<td align = 'center' >".
                        "<form action='editHistory.php' method='post' style='display:inline;'>" .
                        "<input type='hidden' name='reportID' value='".$rowtHistory['reportID']."'>" .
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