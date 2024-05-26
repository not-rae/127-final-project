<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
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
        .message-container {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .message-container h1 {
            color: green;
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
        .menu-button {
            background-color: blue;
            color: white;
        }
        .menu-button:hover {
            background-color: darkblue;
        }
        .add-button {
            background-color: green;
            color: white;
        }
        .add-button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h1>Added Successfully</h1>
        <div class="button-container">
            <button class="menu-button" onclick="window.location.href='index.php'">Back to Menu</button>
            <button class="add-button" onclick="window.location.href='recordForm.php'">Add Another Record</button>
        </div>
    </div>
</body>
</html>
