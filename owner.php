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

        $sqlOwner = "SELECT * FROM User WHERE userRole IN ('Owner', 'Both')";
        
        $resultOwner = $conn->query($sqlOwner);


       

        if ($resultOwner->num_rows > 0 ) {
            while ($rowOwner = $resultOwner->fetch_assoc() ) {
                
                echo "<tr>";
                echo "<td align='center'>".$rowOwner["userID"]."</td>";
                echo "<td align='center'>".$rowOwner["userName"]."</td>";
                echo "<td align='center'>".$rowOwner["sex"]."</td>";
                echo "<td align='center'>".$rowOwner["dateOfBirth"]."</td>";
                echo "<td align='center'>".$rowOwner["userAddress"]."</td>";
                echo "<td align='center'>".$rowOwner["contactNumber"]."</td>";
                echo "<td align='center'>".$rowOwner["nationality"]."</td>";
                echo "<td align='center'>".$rowOwner["bloodType"]."</td>";
                echo "<td align='center'>".$rowOwner["weightInKG"]."</td>";
                echo "<td align='center'>".$rowOwner["heightInCM"]."</td>";
                echo "<td align='center'>";
                echo "<form action='deleteOwner.php' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='userID' value='".$rowOwner['userID']."'>";
                echo "<button type='submit'>Delete</button>";
                echo "</form>";
                echo "<form action='editOwner.php' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='ownerID' value='".$rowOwner['userID']."'>";
                echo "<button type='submit'>Edit</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>0 results</td></tr>";
        }
        ?>
    </table>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
</body>
</html>
