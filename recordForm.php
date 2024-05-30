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
            width: 40%;
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

        #ownerName,
        #driverName,
        #ownerAddress,
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
    </style>
</head>
<body>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
    
    <form class="add-data-form" action="addRecord_Recent.php" method="post">

        <!-- Owner Information -->
        <div class="add-record-container">
            <h2>Owner Information</h2>
            <label for="ownerName">Name:</label>
            <input type="text" id="ownerName" name="ownerName" required>
            <label for="ownerAddress">Address:</label>
            <input type="text" id="ownerAddress" name="ownerAddress" required>  
                <div class="flex-container">
                    <div>
                        <label for="ownerDateOfBirth">Date of Birth:</label>
                        <input type="date" id="ownerDateOfBirth" name="ownerDateOfBirth" required>
                    </div>
                    <div>
                        <label for="ownerSex">Sex:</label>
                        <select id="ownerSex" name="ownerSex" required>
                            <option value="" disabled selected>Select below</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="UKWN">Unknown</option>
                        </select>
                    </div>
                    <div>
                        <label for="ownerBloodType">Blood Type:</label>
                        <select id="ownerBloodType" name="ownerBloodType" required>
                            <option value="" disabled selected>Select below</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="UKNWN">Unknown</option>
                        </select>
                    </div>
                    <div>
                        <label for="ownerContact">Contact Number:</label>
                        <input type="tel" id="ownerContact" name="ownerContact" required>
                    </div>
                </div>
                <div class="flex-container">
                    
                    <div>
                        <label for="ownerNationality">Nationality:</label>
                        <input type="text" id="ownerNationality" name="ownerNationality" required>
                    </div>
                    <div>
                        <label for="ownerWeight">Weight (kg):</label>
                        <input type="number" id="ownerWeight" name="ownerWeight" required>
                    </div>
                    <div>
                        <label for="ownerHeight">Height (cm):</label>
                        <input type="number" id="ownerHeight" name="ownerHeight" required>
                    </div>
                </div>
        </div>   
    
        <!-- Driver Information -->
        <div class="add-record-container">
            <h2>Driver Information</h2>
            <label for="driverName">Name:</label>
            <input type="text" id="driverName" name="driverName" required>
            <label for="driverAddress">Address:</label>
            <input type="text" id="driverAddress" name="driverAddress" required>
            <div class="flex-container">
                <div>
                    <label for="driverDateOfBirth">Date of Birth:</label>
                    <input type="date" id="driverDateOfBirth" name="driverDateOfBirth" required>
                </div>
                <div>
                    <label for="driverSex">Sex:</label>
                    <select id="driverSex" name="driverSex" required>
                        <option value="" disabled selected>Select below</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="UKWN">Unknown</option>
                    </select>
                </div>
                <div>
                    <label for="driverBloodType">Blood Type:</label>
                    <select id="driverBloodType" name="driverBloodType" required>
                        <option value="" disabled selected>Select below</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="UKNWN">Unknown</option>
                    </select>
                </div>
                <div>
                    <label for="driverContact">Contact Number:</label>
                    <input type="tel" id="driverContact" name="driverContact" required>
                </div>
            </div>
            <div class="flex-container">
                <div>
                    <label for="driverNationality">Nationality:</label>
                    <input type="text" id="driverNationality" name="driverNationality" required>
                </div>
                <div>
                    <label for="driverWeight">Weight (kg):</label>
                    <input type="number" id="driverWeight" name="driverWeight" required>
                </div>
                <div>
                    <label for="driverHeight">Height (cm):</label>
                    <input type="number" id="driverHeight" name="driverHeight" required>
                </div>
            </div>
        </div>

        <!-- Driver License Information -->
        <div class="add-record-container">
            <h2>Driver License Information</h2>
            <label for="licenseNumber">License Number:</label>
            <input type="text" id="licenseNumber" name="licenseNumber" required>
            <div class="flex-container">
                <div>
                    <label for="agencyCode">Agency Code:</label>
                    <select id="agencyCode" name="agencyCode" required>
                        <option value="">Select Agency Code</option>
                        <option value="0100">0100</option>
                        <option value="0200">0200</option>
                        <option value="0300">0300</option>
                        <option value="0401">0401</option>
                        <option value="0402">0402</option>
                        <option value="0500">0500</option>
                        <option value="0600">0600</option>
                        <option value="0700">0700</option>
                        <option value="0800">0800</option>
                        <option value="0900">0900</option>
                        <option value="1000">1000</option>
                        <option value="1100">1100</option>
                        <option value="1200">1200</option>
                        <option value="1300">1300</option>
                        <option value="1400">1400</option>
                        <option value="1500">1500</option>
                    </select>
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
                    <select id="conditionCode" name="conditionCode" required>
                        <option value="">Select Type</option>
                        <option value="A/1">Condition A/1</option>
                        <option value="B/2">Condition B/2</option>
                        <option value="C/2">Condition C/2</option>
                        <option value="3">Condition 3</option>
                        <option value="D/4">Condition D/4</option>
                        <option value="E/5">Condition E/5</option>
                        <option value="None">None</option>
                    </select>
                </div>
                <div>
                    <label for="DLCode">DL Code:</label>
                    <select id="dlCode" name="dlCode" required>
                        <option value="">Select DL Code</option>
                        <option value="R1">Motorbikes or motorized tricycles</option>
                        <option value="R2">Motor vehicle up to 4500 kg GVW</option>
                        <option value="R3">Motor vehicle above 4500 kg GVW</option>
                        <option value="R4">Automatic transmission up to 4500 kg GVW</option>
                        <option value="R5">Automatic transmission above 4500 kg GVW</option>
                        <option value="R6">Articulated Vehicle 1600 kg GVW & below</option>
                        <option value="R7">Articulated Vehicle 1601 kg up to 4500 kg GVW</option>
                        <option value="R8">Articulated Vehicle 4501 kg & above GVW</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Vehicle Information -->
        <div class="add-record-container">
            <h2>Vehicle Information & History Records</h2>
            <label for="vehiclePlateNumber">Plate Number:</label>
            <input type="text" id="vehiclePlateNumber" name="vehiclePlateNumber" required>
            <div class="flex-container">
                <div>
                    <label for="registrationDateV">Registration Date:</label>
                    <input type="date" id="registrationDateV" name="registrationDateV" required>
                </div>
                <div>
                    <label for="expirationDateV">Expiration Date:</label>
                    <input type="date" id="expirationDateV" name="expirationDateV" required>
                </div>
                <div>
                    <label for="fuel">Fuel Type:</label>
                    <select id="fuel" name="fuel" required>
                        <option value="" disabled selected>Select below</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Electric">Electric</option>
                        <option value="Hybrid">Hybrid</option>
                        <option value="UKNWN">Unknown</option>
                    </select>
                </div>
            </div>
            <div class="flex-container">
                <div>
                    <label for="model">Vehicle Model:</label>
                    <input type="text" id="model" name="model" required>
                </div>
                <div>
                    <label for="color">Vehicle Color:</label>
                    <input type="text" id="color" name="color" required>
                </div>
                <div>
                    <label for="manufacturer">Vehicle Manufacturer:</label>
                    <input type="text" id="manufacturer" name="manufacturer" required>
                </div>
                <div>
                    <label for="yearProduced">Year Produced:</label>
                    <input type="number" id="yearProduced" name="yearProduced" required>
                </div>
                <div>
                    <label for="noOfViolations">No. of Violation/s:</label>
                    <input type="number" id="noOfViolations" name="noOfViolations" required>
                </div>
                <div>
                    <label for="violationDate">Recent Date of Violation/s:</label>
                    <input type="date" id="violationDate" name="violationDate" required>
                </div>
            </div>
        </div>
        <div class="button-container">
            <!-- Submit Record Button -->
            <input type="submit" value="Submit Record" name ="SubmitRecord" class="submitRecord">
        </div>
    </form>

    

</body>
</html>
