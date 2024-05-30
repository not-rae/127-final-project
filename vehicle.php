<!-- 
    This is responsible for showing the values from the driverLicense table

-->

<!DOCTYPE html>
<html>
<head>
    <title>DriVerify: Vehicle Records</title>
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
    <h1>Vehicle Records</h1>
    <table>
        <tr>
            <th>Plate Number</th>
            <th>Registration Date</th>
            <th>Expiration Date</th>
            <th>Owner</th>
            <th>Driver</th>
            <th>Model</th>
            <th>Color</th>
            <th>Manufacturer</th>
            <th>Year Produced</th>
            <th>Fuel</th>
        </tr>
        <?php
        include 'DBConnector.php';

            $sqlVehicle ="SELECT * FROM Vehicle";
            $resultVehicle = $conn->query($sqlVehicle);

            if($resultVehicle->num_rows > 0){
                while($rowVehicle = $resultVehicle->fetch_assoc()) {
                    echo 
                        "<tr>". 
                        "<td align = 'center' >".$rowVehicle["plateNumber"]."</td>". 
                        "<td align = 'center' >".$rowVehicle["registrationDate"]."</td>". 
                        "<td align = 'center' >".$rowVehicle["expirationDate"]."</td>".
                        "<td align = 'center' >".$rowVehicle["ownerNameV"]."</td>".
                        "<td align = 'center' >".$rowVehicle["driverNameV"]."</td>". 
                        "<td align = 'center' >".$rowVehicle["model"]."</td>". 
                        "<td align = 'center' >".$rowVehicle["color"]."</td>".
                        "<td align = 'center' >".$rowVehicle["manufacturer"]."</td>".  
                        "<td align = 'center' >".$rowVehicle["yearProduced"]."</td>".
                        "<td align = 'center' >".$rowVehicle["fuel"]."</td>". 
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
