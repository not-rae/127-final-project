<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriVerify: Homepage</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #fff;
            background-repeat: no-repeat;
            background-size: cover; 
            background-position: center; 
            max-width: 100%;
        }
        h1 {
            margin-bottom: 50px;
            font-size:70px;
        }

        .button-container {
            display: flex; 
            flex-wrap: wrap;
            justify-content: center; 
            gap: 2rem;
        }

        .add-record-container {
            display: flex; 
            flex-wrap: wrap;
            justify-content: center; 
            gap: 2rem;
        }
        
        .add-record-container button {
            margin-top: 20px;
            padding: 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            transition: transform 0.3s, opacity 0.3s;
            flex-direction: column; 
            align-items: center;
            display: flex;
        }

        .add-record-container button .bx {
            font-size: 40px; 
            margin-bottom: 10px; 
        }
        
        .button-container button {
            display: flex;
            flex-direction: column; 
            align-items: center; 
            padding: 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            transition: transform 0.3s, opacity 0.3s;
        }

        .button-container button .bx {
            font-size: 40px;
            margin-bottom: 10px; 
        }

        .button-container button.vehicle {
            background-color: #4CAF50;
            color: white;
        }
        .button-container button.driver-license {
            background-color: #2541b2;
            color: white;
        }
        .button-container button.owner {
            background-color: #9C27B0;
            color: white;
        }
        .button-container button.driver {
            background-color: #540b0e;
            color: white;
        }

        .button-container button:hover {
            opacity: 0.8;
            transform: scale(0.9);
        }

        .add-record-container button.history {
            background-color: #FF9800;
            color: white;
        }
        .add-record-container button.violation {
            background-color: #2F2963;
            color: white;
        }

        .add-record-container button.lto {
            background-color: #607D8B;
            color: white;
        }

        .add-record-container button.insertRecord {
            background-color: #D40000;
            color: white;
        }

        .add-record-container button.fileReport {
            background-color: #642CA9;
            color: white;
        }


        .add-record-container button:hover {
            opacity: 0.8;
            transform: scale(0.9);
        }

    </style>
</head>
<body>
    <h1>Welcome to DriVerify!</h1>
    <div class="button-container">
        <div>
            <button class="vehicle" onclick="window.location.href='vehicle.php'">
                <i class='bx bxs-car'></i>
                <span>Vehicle Records</span>
            </button>
        </div>

        <div>
            <button class="owner" onclick="window.location.href='owner.php'">
                <i class='bx bxs-user'></i>
                <span>Owner Records</span>
            </button>
        </div>
        <div>
            <button class="driver" onclick="window.location.href='driver.php'">
                <i class='bx bxs-tachometer'></i>
                <span>Driver Records</span>
            </button>
        </div>
        <div>
            <button class="driver-license" onclick="window.location.href='driverLicense.php'">
                <i class='bx bxs-id-card'></i>
                <span>Driver License Records</sapn>
            </button>
        </div>
    </div>
    <div class="add-record-container">
        <div>
            <button class="history" onclick="window.location.href='history.php'">
                <i class='bx bx-history'></i>
                <span>History Records<span>
            </button>
        </div>
        <div>
            <button class="violation" onclick="window.location.href='violation.php'">
                <i class='bx bxs-error-circle'></i>
                <span>Violation Records</span>
            </button>
        </div>
        <div>
            <button class="lto" onclick="window.location.href='LTO.php'">
                <i class='bx bxs-cog'></i>
                <span>LTO Records</sapn>
            </button>
        </div>
        <div>
            <button class="insertRecord" onclick="window.location.href='recordForm.php'">
                <i class='bx bxs-file-plus'></i>
                <span>Add Record</span>
            </button>
        </div>
        <div>
            <button class="fileReport" onclick="window.location.href='fileReport.php'">
                <i class='bx bxs-report'></i>
                <span>File Report</span>
            </button>
        </div>
    </div>
</body>
</html>
