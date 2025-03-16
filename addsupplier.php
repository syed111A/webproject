<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            text-align: center;
        }
        form {
            max-width: 200px;
            margin: auto;
            padding: 1em;
            border: 1px solid #ccc;
            border-radius: 1em;
            text-align: left;
        }
        label {
            width: 70%;
            margin-right: 1em;
            text-align: right;
            display: inline-block;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="tel"] {
            width: 80%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 90%;
            padding: 1em;
            margin-top: 1em;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 90%;
            margin-top: 1em;
        }
        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 1em;
        }
    </style>
    <title>Add Supplier</title>
</head>
<body>
    <h2>Add Supplier</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="SupplierName">Supplier Name:</label>
            <input type="text" id="SupplierName" name="SupplierName" required>
        </div>
        <div>
            <label for="SupplierLocation">Supplier Location:</label>
            <input type="text" id="SupplierLocation" name="SupplierLocation" required>
        </div>
        <div>
            <label for="SupplierContact">Supplier Contact:</label>
            <input type="tel" id="SupplierContact" name="SupplierContact" pattern="\+?[1-9]\d{1,14}" required>
        </div>
        <input type="submit" name="submit" value="Add Supplier">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $supplierName = $_POST['SupplierName'];
        $supplierLocation = $_POST['SupplierLocation'];
        $supplierContact = $_POST['SupplierContact'];

       
        if (!empty($supplierName) && !empty($supplierLocation) && preg_match('/^\+?[1-9]\d{1,14}$/', $supplierContact)) {
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "final";

            $conn = new mysqli($servername, $username, $password, $database);

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $stmt = $conn->prepare("INSERT INTO Supplier (SupplierName, SupplierLocation, SupplierContact) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $supplierName, $supplierLocation, $supplierContact);

            
            if ($stmt->execute()) {
                echo "New supplier added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            
            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid input data";
        }
    }
    ?>
<a href="suppliermenu.php">Back to Menu</a>
</body>
</html>
