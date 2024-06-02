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
    <script>
        function toggleRequiredFields(sectionId, isRequired) {
            var section = document.getElementById(sectionId);
            var inputs = section.querySelectorAll('input, select');
            inputs.forEach(function(input) {
                if (isRequired) {
                    input.setAttribute('required', 'required');
                } else {
                    input.removeAttribute('required');
                }
            });
        }

        function showSection() {
            var driverLicense = document.getElementById("driverLicense");
            var vehicleSection = document.getElementById("vehicleSection");
            driverLicense.style.display = "none";
            vehicleSection.style.display = "none";
            toggleRequiredFields("driverLicense", false);
            toggleRequiredFields("vehicleSection", false);

            var userRole = document.querySelector('input[name="userRole"]:checked').value;

            if (userRole === "Driver") {
                driverLicense.style.display = "block";
                toggleRequiredFields("driverLicense", true);
            } else if (userRole === "Owner") {
                vehicleSection.style.display = "block";
                toggleRequiredFields("vehicleSection", true);
            } else if (userRole === "Both") {
                driverLicense.style.display = "block";
                vehicleSection.style.display = "block";
                toggleRequiredFields("driverLicense", true);
                toggleRequiredFields("vehicleSection", true);
            }
        }

        window.onload = function() {
            showSection();
        };
    </script>
</head>
<body>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
    
    <form class="add-data-form" action="addRecord_Recent.php" method="post">
        <!-- Personal Information -->
        <div class="add-record-container">
            <h2>Personal Information</h2>
            <label for="userName">Name:</label>
            <input type="text" id="userName" name="userName" required>
            <label for="userAddress">Address:</label>
            <input type="text" id="userAddress" name="userAddress" required>  
            <div class="flex-container">
                <div>
                    <label for="dateOfBirth">Date of Birth:</label>
                    <input type="date" id="dateOfBirth" name="dateOfBirth" required>
                </div>
                <div>
                    <label for="sex">Sex:</label><br>
                    <input type="radio" id="male" name="sex" value="M">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="sex" value="F">
                    <label for="female">Female</label><br>
                    <input type="radio" id="unknown" name="sex" value="UKWN">
                    <label for="unknown">Unknown</label>
                </div>
                <div>
                    <label for="bloodType">Blood Type:</label>
                    <select id="bloodType" name="bloodType" required>
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
                    <label for="contact">Contact Number:</label>
                    <input type="tel" id="contact" name="contact" required>
                </div>
            </div>
            <div class="flex-container">
                <div>
                    <label for="nationality">Nationality:</label>
                    <input type="text" id="nationality" name="nationality" required>
                </div>
                <div>
                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" name="weight" required>
                </div>
                <div>
                    <label for="height">Height (cm):</label>
                    <input type="number" id="height" name="height" required>
                </div>
                <div>
                    <label for="userRole">Role:</label><br>
                    <input type="radio" id="driver" name="userRole" value="Driver" onclick="showSection()">
                    <label for="driver">Driver</label><br>
                    <input type="radio" id="owner" name="userRole" value="Owner" onclick="showSection()">
                    <label for="owner">Owner</label><br>
                    <input type="radio" id="both" name="userRole" value="Both" onclick="showSection()">
                    <label for="both">Owner & Driver</label>
                </div>
            </div>
        </div>

        <div class="button-container">
            <!-- Submit Record Button -->
            <input type="submit" value="Submit" name="SubmitRecord" class="submitRecord">
        </div>


        <!-- Driver License Section -->
        <div id="driverLicense" class="hidden-section">
            <h2>Driver License Information</h2>
            <label for="licenseNumber">License Number:</label>
            <input type="text" id="licenseNumber" name="licenseNumber">
            <div class="flex-container">
                <div>
                    <label for="agencyCode">Agency Code:</label>
                    <select id="agencyCode" name="agencyCode">
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
                    <input type="date" id="issueDate" name="issueDate">
                </div>
                <div>
                    <label for="expirationDate">Expiration Date:</label>
                    <input type="date" id="expirationDate" name="expirationDate">
                </div>
                <div>
                    <label for="conditionCode">Condition Code:</label>
                    <select id="conditionCode" name="conditionCode">
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
                    <select id="dlCode" name="dlCode">
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

        <!-- Vehicle Section -->
        <div id="vehicleSection" class="hidden-section">
            <h2>Vehicle Information</h2>
            <label for="vehiclePlateNumber">Plate Number:</label>
            <input type="text" id="vehiclePlateNumber" name="vehiclePlateNumber">
            <div class="flex-container">
                <div>
                    <label for="registrationDateV">Registration Date:</label>
                    <input type="date" id="registrationDateV" name="registrationDateV">
                </div>
                <div>
                    <label for="expirationDateV">Expiration Date:</label>
                    <input type="date" id="expirationDateV" name="expirationDateV">
                </div>
                <div>
                    <label for="fuel">Fuel Type:</label>
                    <select id="fuel" name="fuel">
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
                    <input type="text" id="model" name="model">
                </div>
                <div>
                    <label for="color">Vehicle Color:</label>
                    <input type="text" id="color" name="color">
                </div>
                <div>
                    <label for="manufacturer">Vehicle Manufacturer:</label>
                    <input type="text" id="manufacturer" name="manufacturer">
                </div>
                <div>
                    <label for="yearProduced">Year Produced:</label>
                    <input type="number" id="yearProduced" name="yearProduced">
                </div>
            </div>        
        </div>
    </form>
</body>
</html>