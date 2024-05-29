<!DOCTYPE html>
<html>
<head>
    <title>DriVerify Records: Driver</title>
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
        .table-container {
            width: 95%; /* Adjust as needed */
            max-height: 400px; /* Set a fixed height for the scrollable area */
            overflow-y: auto; /* Enable vertical scrolling */
            margin: 20px 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed; /* Ensure table takes full width */
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
            position: sticky;
            top: 0; /* Stick the header to the top */
            z-index: 1; /* Ensure header is above the table body */
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
    <h1>Driver Record</h1>
    <div class="table-container">
        <table>
            <thead>
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
            </thead>
  
            <?php
            include 'DBConnector.php';

            $sqlDriver = "SELECT * FROM carDriver";
            $resultDriver = $conn->query($sqlDriver);
            
            if($resultDriver->num_rows > 0){
                while($rowDriver = $resultDriver->fetch_assoc()) {
                    echo 
                        "<tr>". 
                        "<td align='center'>".$rowDriver["driverID"]."</td>". 
                        "<td align='center'>".$rowDriver["driverName"]."</td>". 
                        "<td align='center'>".$rowDriver["sex"]."</td>". 
                        "<td align='center'>".$rowDriver["dateOfBirth"]."</td>".
                        "<td align='center'>".$rowDriver["driverAddress"]."</td>". 
                        "<td align='center'>".$rowDriver["contactNumber"]."</td>". 
                        "<td align='center'>".$rowDriver["nationality"]."</td>".
                        "<td align='center'>".$rowDriver["bloodType"]."</td>".  
                        "<td align='center'>".$rowDriver["weightInKG"]."</td>". 
                        "<td align='center'>".$rowDriver["heightInCM"]."</td>". 
                        "<td align='center'>" .
                            "<form action='deleteDriver.php' method='post' style='display:inline;'>" .
                                "<input type='hidden' name='driverID' value='".$rowDriver['driverID']."'>" .
                                "<button type='submit'>Delete</button>" .
                            "</form>" .
                            "<form action='editDriver.php' method='post' style='display:inline;'>" .
                                "<input type='hidden' name='driverID' value='".$rowDriver['driverID']."'>" .
                                "<input type='hidden' name='driverName' value='".$rowDriver['driverName']."'>" .
                                "<input type='hidden' name='driverDateOfBirth' value='".$rowDriver['dateOfBirth']."'>" .
                                "<input type='hidden' name='driverAddress' value='".$rowDriver['driverAddress']."'>" .
                                "<input type='hidden' name='driverContact' value='".$rowDriver['contactNumber']."'>" .
                                "<input type='hidden' name='driverNationality' value='".$rowDriver['nationality']."'>" .
                                "<input type='hidden' name='driverWeight' value='".$rowDriver['weightInKG']."'>" .
                                "<input type='hidden' name='driverHeight' value='".$rowDriver['heightInCM']."'>" .
                                "<button type='submit'>Edit</button>" .
                            "</form>" .
                        "</td>" .
                        "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>0 results</td></tr>";
            }
            ?>
        
        </table>
    </div>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
</body>
</html>
