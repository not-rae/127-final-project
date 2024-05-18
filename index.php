<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriVerify: Homepage</title>
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
            flex-direction: column;
            gap: 10px;
        }
        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button-container button.vehicle {
            background-color: #4CAF50;
            color: white;
        }
        .button-container button.history {
            background-color: #FF9800;
            color: white;
        }
        .button-container button.driver-license {
            background-color: #2196F3;
            color: white;
        }
        .button-container button.owner {
            background-color: #9C27B0;
            color: white;
        }
        .button-container button.driver {
            background-color: #FF5722;
            color: white;
        }
        .button-container button.lto {
            background-color: #607D8B;
            color: white;
        }
        .button-container button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Welcome to DriVerify!</h1>
    <div class="button-container">
        <button class="vehicle" onclick="window.location.href='vehicle.php'">Vehicle Records</button>
        <button class="owner" onclick="window.location.href='owner.php'">Owner Records</button>
        <button class="driver" onclick="window.location.href='driver.php'">Driver Records</button>
        <button class="driver-license" onclick="window.location.href='driverLicense.php'">Driver License Records</button>
        <button class="lto" onclick="window.location.href='LTO.php'">LTO Records</button>
        <button class="history" onclick="window.location.href='history.php'">History Records</button>
        <br><br>
    </div>
</body>
</html>