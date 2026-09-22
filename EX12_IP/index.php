<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 900px;
        }
        h2 {
            margin-top: 0;
            color: #2c3e50;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Employee Details List</h2>
        
        <?php
        // Load the XML file
        $xml = simplexml_load_file("employees.xml") or die("Error: Cannot load XML file.");

        echo "<table>";
        echo "<tr><th>Emp ID</th><th>Name</th><th>Department</th><th>Designation</th><th>Salary</th></tr>";

        // Loop through each <employee> element and display its details
        foreach ($xml->employee as $emp) {
            echo "<tr>";
            echo "<td>" . $emp->id . "</td>";
            echo "<td>" . $emp->name . "</td>";
            echo "<td>" . $emp->department . "</td>";
            echo "<td>" . $emp->designation . "</td>";
            echo "<td>$" . $emp->salary . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>

    </div>
</body>
</html>