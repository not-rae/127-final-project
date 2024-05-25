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
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        h1 {
            margin-bottom: 20px;
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
    <h1>Driver Form</h1>
    <div class="add-record-container">
        <form class="add-record-form" action="addRecord.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="driverName" required>

            <div class="flex-container">
                <div>
                    <label for="dateOfBirth">Date of Birth:</label>
                    <input type="date" id="dateOfBirth" name="driverDateOfBirth" required>
                </div>
                <div>
                    <label for="sex">Sex:</label>
                    <select id="sex" name="driverSex" required>
                        <option value="" disabled selected>Select below</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="UKWN">Unknown</option>
                    </select>
                </div>
                <div>
                <label for="bloodType">Blood Type:</label>
                    <select id="bloodType" name="driverBloodType" required>
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
                    <input type="tel" id="contact" name="driverContact" required>
                </div>
            </div>

            <div class="flex-container">
                <div>
                    <label for="nationality">Nationality:</label>
                    <input type="text" id="nationality" name="driverNationality" required>
                </div>
                <div>
                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" name="driverWeight" required>
                </div>
                <div>
                    <label for="height">Height (cm):</label>
                    <input type="number" id="height" name="driverHeight" required>

                </div>

            </div>

            <label for="address">Address:</label>
            <input type="text" id="address" name="driverAddress" required>

         

            <br><br>
            <input type="submit" value="SubmitDriver" name = "SubmitDriver">
        </form>
    </div>
    <div class="button-container">
        <button onclick="window.location.href='driver.php'">Back to Driver Records</button>
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
</body>
</html>