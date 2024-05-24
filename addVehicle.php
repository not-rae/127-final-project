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
    <h1>Vehicle Form</h1>
    <div class="add-record-container">
        <form class="add-record-form" action="addRecord.php" method="post">
            <div class="flex-container">
                <div>
                    <label for="plateNumber">Plate Number:</label>
                    <input type="text" id="plateNumber" name="plateNumber" required>
                </div>
                <div>
                    <label for="owner">Owner Name:</label>
                    <input type="text" id="owner" name="owner" required>
                </div>
                <div>
                    <label for="driver">Driver Name:</label>
                    <input type="text" id="driver" name="driver" required>
                </div>
            </div>
            <div class="flex-container">
                <div>
                    <label for="registrationDate">Registration Date:</label>
                    <input type="date" id="registrationDate" name="registrationDate" required>
                </div>
                <div>
                    <label for="expirationDate">Expiration Date:</label>
                    <input type="date" id="expirationDate" name="expirationDate" required>
                </div>
                <div>
                    <label for="model">Vehicle Model:</label>
                    <input type="text" id="model" name="model" required>
                </div>
                <div>
                    <label for="color">Vehicle Color:</label>
                    <input type="text" id="color" name="color" required>
                </div>
            </div>
            <div class="flex-container">
                <div>
                    <label for="manufacturer">Vehicle Manufacturer:</label>
                    <input type="text" id="manufacturer" name="manufacturer" required>
                </div>
                <div>
                    <label for="yearProduced">Year Produced:</label>
                    <input type="number" id="yearProduced" name="yearProduced" required>
                </div>
                <div>
                    <label for="fuel">Fuel Type: </label>
                    <select id="fuel" name="fuel" required>
                        <option value="" disabled selected>Select below</option>
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                        <option value="electric">Electric</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="button-container">
        <button onclick="window.location.href='vehicle.php'">Back to Vehicle Records</button>
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
</body>
</html>
