<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriVerify: Add Record</title>
    <style>
        /* Body style */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        /* Container style */
        .add-record-container {
            width: 100%;
            margin: 10px 55px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Form style */
        .add-data-form {
            width: 100%;
            margin: 20px auto;
            display: flex; /* Set display to flex */
            flex-wrap: wrap;
        }

        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Title style */
        h2 {
            color: #333;
            margin-bottom: 15px;
        }

        /* Label style */
        label {
            display: block;
            margin-bottom: 5px;
        }

        #userName,
        #driverName,
        #userAddress,
        #driverAddress,
        #licenseNumber {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Input style */
        input[type="text"],
        input[type="tel"] {
            width: 83%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="date"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="number"] {
            width: 83%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Button style */
        
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

        /* Submit button style */
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

        /* Hidden section style */
        .hidden-section {
            display: none;
            width: 100%;
            margin: 10px 0;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
    
    <form class="add-data-form" action="addReport.php" method="post">
        <!-- Personal Information -->
        <div class="add-record-container">
            <h2>File Report</h2>
                <label for="userID">User ID (Owner):</label>
                <input type="text" id="userID" name="userID" required>
                <label for="licenseNumber">License Number (Driver):</label>
                <input type="text" id="licenseNumber" name="licenseNumber" required>  
                <label for="plateNumber">Plate Number:</label>
                <input type="text" id="plateNumber" name="plateNumber" required>  
            <div>
                    <label for="violation">Violation/s:</label>
                    <select id="violation" name="violation">
                        <option value="" disabled selected>Select below</option>
                        <option value="V001">Smoke Belching</option>
                        <option value="V002">Driving While Intoxicated/Drugged</option>
                        <option value="V003">Disregarding Traffic Signs</option>
                        <option value="V004">Jallosies</option>
                        <option value="V005">Reckless Driving</option>
                    </select>
                <div>
                    <label for="violationDate">Recent Date of Violation/s:</label>
                    <input type="date" id="violationDate" name="violationDate">
                </div>
           
        </div>

        <div class="button-container">
            <!-- Submit Record Button -->
            <input type="submit" value="Submit" name="SubmitReport" class="submitReport">
        </div>
 

    </form>
</body>
</html>
