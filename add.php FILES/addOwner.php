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

    <h1>Owner Form</h1>
    <div class="add-record-container">
        <form class="add-record-form" action="addRecord.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="ownerName" required>

            <div class="flex-container">
                <div>
                    <label for="dateOfBirth">Date of Birth:</label>
                    <input type="date" id="dateOfBirth" name="ownerDateOfBirth" required>
                </div>
                <div>
                    <label for="sex">Sex:</label>
                    <select id="sex" name="ownerSex" required>
                        <option value="" disabled selected>Select below</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="UKWN">Unknown</option>
                    </select>
                </div>
                <div>
                <label for="bloodType">Blood Type:</label>
                    <select id="bloodType" name="ownerBloodType" required>
                        <option value="" disabled selected>Select below</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="B+">B+</option>
                        <option value="B+">B-</option>
                        <option value="UKNWN">Unknown</option>
                    </select>
                </div>
                <div>
                    <label for="contact">Contact Number:</label>
                    <input type="tel" id="contact" name="ownerContact" required>
                </div>
            </div>

            <div class="flex-container">
                <div>
                    <label for="nationality">Nationality:</label>
                    <input type="text" id="nationality" name="ownerNationality" required>
                </div>
                <div>
                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" name="ownerWeight" required>
                </div>
                <div>
                    <label for="height">Height (cm):</label>
                    <input type="number" id="height" name="ownerHeight" required>

                </div>
                 <div>
                 <label for="noOfVehiclesOwned">Number of Vehicles Owned:</label>
                <input type="number" id="noOfVehiclesOwned" name="noOfVehiclesOwned" required>
                </div>
            </div>

            <label for="address">Address:</label>
            <input type="text" id="address" name="ownerAddress" required>

         

            <br><br>
            <input type="submit" value="SubmitOwner" name = "SubmitOwner">
        </form>
    </div>
    <div class="button-container">
        <button onclick="window.location.href='owner.php'">Back to Owner Records</button>
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
</body>
</html>
