<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriVerify: Add Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #000;
        }
        h2 {
            font-size: 45px;
            margin-bottom: 20px;
        }
        .add-record-container {
            width: 100%;
            margin: 10px 55px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .add-data-form {
            width: 60%;
            margin: 20px auto;
            display: flex; 
            flex-wrap: wrap;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        select {
            width: 98%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="date"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 15px 23px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 1rem 0 0 1rem; /* 1rem top, 1rem left */
        }
        button:hover {
            background-color: #0056b3;
        }
        .button-container {
            width: 100%;
        }
        input[type="submit"] {
            font-size: 18px;
            padding: 18px 40px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 30px auto;
            display: block;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
    
    <form class="add-data-form" action="addReport.php" method="post">
        <div class="add-record-container">
            <h2>File Report</h2>
                <label for="userID">User ID (Owner):</label>
                <input type="text" id="userID" name="userID" required>
                <label for="licenseNumber">License Number (Driver):</label>
                <input type="text" id="licenseNumber" name="licenseNumber" required>  
                <label for="plateNumber">Plate Number:</label>
                <input type="text" id="plateNumber" name="plateNumber" required>  
                <label for="violation">Violation/s:</label>
                <select id="violation" name="violation">
                    <option value="" disabled selected>Select below</option>
                    <option value="V001">Smoke Belching</option>
                    <option value="V002">Driving While Intoxicated/Drugged</option>
                    <option value="V003">Disregarding Traffic Signs</option>
                    <option value="V004">Jallosies</option>
                    <option value="V005">Reckless Driving</option>
                </select>
                <label for="violationDate">Recent Date of Violation/s:</label>
                <input type="date" id="violationDate" name="violationDate">           
        </div>
        <div class="button-container">
            <!-- Submit Record Button -->
            <input type="submit" value="Submit" name="SubmitReport" class="submitReport">
        </div>
    </form>
</body>
</html>
