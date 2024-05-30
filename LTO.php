<!-- 
    This is responsible for showing the values from the lto table

-->



<!DOCTYPE html>
<html>
<head>
    <title>DriVerify: LTO Records</title>
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
    <h1>LTO Records</h1>
    <table>
        <tr>
            <th>Agency Code</th>
            <th>Agency Name</th>
            <th>Location</th>
            <th>Email Address</th>
            <th>Contact Number</th>
            <th>Starting Hour</th>
            <th>Ending Hour</th>
            <th>No. of Drivers Registered</th>
        </tr>
        <?php
        include 'DBConnector.php';

        $sqlLTO = "SELECT * FROM LTO";
        $resultLTO = $conn->query($sqlLTO);
        
        if($resultLTO->num_rows > 0){
            while($rowLTO = $resultLTO->fetch_assoc()) {
                echo 
                    "<tr>". 
                    "<td align = 'center' >".$rowLTO["agencyCode"]."</td>". 
                    "<td align = 'center' >".$rowLTO["agencyName"]."</td>". 
                    "<td align = 'center' >".$rowLTO["LTOaddress"]."</td>". 
                    "<td align = 'center' >".$rowLTO["emailAddress"]."</td>". 
                    "<td align = 'center' >".$rowLTO["contactNumber"]."</td>". 
                    "<td align = 'center' >".$rowLTO["startingHour"]."</td>". 
                    "<td align = 'center' >".$rowLTO["endingHour"]."</td>". 
                    "<td align = 'center' >".$rowLTO["noOfDriversRegistered"]."</td>".
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
