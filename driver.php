<!DOCTYPE html>
<html>
<head>
    <title>DriVerify: Driver Records</title>
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
    <h1>Driver Records</h1>
        <table>
            <tr>
                <th>Driver ID</th>
                <th>Name</th>
                <th>Sex</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Nationality</th>
                <th>Blood Type</th>
                <th>Weight (kg)</th>
                <th>Height (cm)</th>
                <th>Actions</th>
            </tr>
            <?php
            include 'DBConnector.php';

            $sqlDriver = "SELECT * FROM User WHERE userRole IN ('driver', 'both')";
            $resultDriver = $conn->query($sqlDriver);
            
            if($resultDriver->num_rows > 0){
                while($rowDriver = $resultDriver->fetch_assoc()) {
                    echo 
                        "<tr>". 
                        "<td align= 'center' >".$rowDriver["userID"]."</td>". 
                        "<td align= 'center' >".$rowDriver["userName"]."</td>". 
                        "<td align= 'center' >".$rowDriver["sex"]."</td>". 
                        "<td align= 'center' >".$rowDriver["dateOfBirth"]."</td>".
                        "<td align= 'center' >".$rowDriver["userAddress"]."</td>". 
                        "<td align= 'center' >".$rowDriver["contactNumber"]."</td>". 
                        "<td align= 'center' >".$rowDriver["nationality"]."</td>".
                        "<td align= 'center' >".$rowDriver["bloodType"]."</td>".  
                        "<td align= 'center' >".$rowDriver["weightInKG"]."</td>". 
                        "<td align= 'center' >".$rowDriver["heightInCM"]."</td>". 
                        "<td align= 'center' >" .
                            "<form action='deleteDriver.php' method='post' style='display:inline;'>" .
                                "<input type='hidden' name='userID' value='".$rowDriver['userID']."'>" .
                                "<button type='submit'>Delete</button>" .
                            "</form>" .
                            "<form action='editDriver.php' method='post' style='display:inline;'>" .
                                "<input type='hidden' name='driverID' value='".$rowDriver['userID']."'>" .
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
