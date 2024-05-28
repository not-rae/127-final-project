<!DOCTYPE html>
<html>
<head>
    <title>DriVerify: Add Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        h1 {
            margin-bottom: 20px;
        }
        .navbar {
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .navbar a {
            padding: 14px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 17px;
            color: white;
            margin: 0 5px;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 30px;
            margin-top: 15px;
            margin-bottom: 20px;
        }
        .navbar a.owner {
            background-color: #9C27B0; 
        }
        .navbar a.driver {
            background-color: #FF5722; 
        }
        .navbar a.vehicle {
            background-color: #4CAF50; 
        }
        .navbar a.driver_license {
            background-color: #2196F3; 
        }
        .navbar a.history {
            background-color: #FF9800; 
        }
        .navbar a:hover,
        .navbar a.active {
            background-color: #ddd;
            color: black;
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
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin-top: 20px;
        }
        .add-record-form {
            width: 50%;
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }
        .add-record-form label {
            display: block;
            margin-bottom: 10px;
        }
        .add-record-form input[type="text"],
        .add-record-form input[type="date"],
        .add-record-form input[type="number"],
        .add-record-form input[type="tel"],
        .add-record-form select {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .flex-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .flex-container label {
            width: 100%;
        }
        .flex-container input,
        .flex-container select {
            width: calc(100% - 0px);
        }
        .add-record-form input[type="submit"] {
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .add-record-form input[type="submit"]:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="addVehicle.php" class="vehicle">Vehicle Form</a>
        <a href="addOwner.php" class="owner">Owner Form</a>
        <a href="addDriver.php" class="driver">Driver Form</a>
        <a href="addDriverLicense.php" class="driver_license">Driver License Form</a>
        <a href="addHistory.php" class="history">History Form</a>
    </div>

    <h1>Driver License Form</h1>
    <div class="add-record-container">
        <form class="add-record-form" action="addRecord.php" method="post">
            <div class="flex-container">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="licenseNumber">License Number:</label>
                    <input type="text" id="licenseNumber" name="licenseNumber" required>
                </div>
                <div>
                    <label for="agencyCode">Agency Code:</label>
                    <input type="text" id="agencyCode" name="agencyCode" required>
                </div>
            </div>
            <div class="flex-container">
                <div>
                    <label for="applicationType">Application Type:</label>
                    <input type="text" id="applicationType" name="applicationType" required>
                </div>
                <div>
                    <label for="issueDate">Issue Date:</label>
                    <input type="date" id="issueDate" name="issueDate" required>
                </div>
                <div>
                    <label for="expirationDate">Expiration Date:</label>
                    <input type="date" id="expirationDate" name="expirationDate" required>
                </div>
                <div>
                    <label for="conditionCode">Condition Code:</label>
                    <input type="text" id="conditionCode" name="conditionCode" required>
                </div>
            </div>
            <div class="flex-container">
                <div>
                    <label for="dlCode">DL Code:</label>
                    <input type="text" id="dlCode" name="dlCode" required>
                </div>
            </div>
            <input type="submit" value="SubmitDriverLicense" name ="SubmitDriverLicense">
        </form>
    </div>
    <div class="button-container">
        <button onclick="window.location.href='driverLicense.php'">Back to Driver License Records</button>
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
    
    <script>
        // Add active class to the current button (highlight it)
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('.navbar a');
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].className += ' active';
            }
        }
    </script>
</body>
</html>
