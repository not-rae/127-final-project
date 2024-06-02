<!DOCTYPE html>
<html>
<head>
    <title>DriVerify: Owner Records</title>
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
    <h1>Owner Records</h1>
    <table>
        <tr>
            <th>Owner ID</th>
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

        $sqlOwner = "SELECT * FROM User WHERE userRole IN ('owner', 'both')";
        $resultOwner = $conn->query($sqlOwner);

            if($resultOwner->num_rows > 0){
                while($rowOwner = $resultOwner->fetch_assoc()) {
                    echo 
                        "<tr>". 
                        "<td align = 'center' >".$rowOwner["userID"]."</td>". 
                        "<td align = 'center' >".$rowOwner["userName"]."</td>". 
                        "<td align = 'center' >".$rowOwner["sex"]."</td>". 
                        "<td align = 'center' >".$rowOwner["dateOfBirth"]."</td>".
                        "<td align = 'center' >".$rowOwner["userAddress"]."</td>". 
                        "<td align = 'center' >".$rowOwner["contactNumber"]."</td>". 
                        "<td align = 'center' >".$rowOwner["nationality"]."</td>".
                        "<td align = 'center' >".$rowOwner["bloodType"]."</td>".  
                        "<td align = 'center' >".$rowOwner["weightInKG"]."</td>".
                        "<td align = 'center' >".$rowOwner["heightInCM"]."</td>". 
                        "<td align='center'>" .
                            "<form action='deleteOwner.php' method='post' style='display:inline;'>" .
                                "<input type='hidden' name='userID' value='".$rowOwner['userID']."'>" .
                                "<button type='submit'>Delete</button>" .
                            "</form>" .
                            "<form action='editOwner.php' method='post' style='display:inline;'>" .
                                "<input type='hidden' name='ownerID' value='".$rowOwner['userID']."'>" .
                                "<input type='hidden' name='ownerName' value='".$rowOwner['userName']."'>" .
                                "<input type='hidden' name='ownerSex' value='".$rowOwner['sex']."'>" .
                                "<input type='hidden' name='ownerDateOfBirth' value='".$rowOwner['dateOfBirth']."'>" .
                                "<input type='hidden' name='ownerAddress' value='".$rowOwner['userAddress']."'>" .
                                "<input type='hidden' name='ownerContact' value='".$rowOwner['contactNumber']."'>" .
                                "<input type='hidden' name='ownerNationality' value='".$rowOwner['nationality']."'>" .
                                "<input type='hidden' name='ownerBloodType' value='".$rowOwner['bloodType']."'>" .                                 
                                "<input type='hidden' name='ownerWeight' value='".$rowOwner['weightInKG']."'>" .
                                "<input type='hidden' name='ownerHeight' value='".$rowOwner['heightInCM']."'>" .
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