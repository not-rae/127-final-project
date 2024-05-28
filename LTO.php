<!DOCTYPE html>
<html>
<head>
    <title>DriVerify Records: LTO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* display: flex; */
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            margin-left: 10%;
        }
        h1 {
            margin-bottom: 40px;
            margin-left: 35%;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
            margin-bottom: 2%;
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
            margin-left: 40%;
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
            <th>Actions</th>
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
