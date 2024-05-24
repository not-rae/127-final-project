<!DOCTYPE html>
<html>
<head>
    <title>DriVerify Records: History</title>
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
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
            width: 100%;
            margin-top: 20px;
        }
        .add-record-button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: green;
            color: white;
            transition: background-color 0.3s;
        }
        .add-record-button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <h1>History</h1>
    <table>
        <tr>
            <th>Plate Number</th>
            <th>Owner</th>
            <th>Driver</th>
            <th>License Number</th>
            <th>Agency Code</th>
            <th>No. of Accidents</th>
            <th>No. of Apprehensions</th>
            <th>DL Code</th>
            <th>Description</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </table>
    <div class="add-record-container">
        <button class="add-record-button" onclick="window.location.href='addRecord.php'">Add Record</button>
    </div>
    
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
</body>
</html>
