<!DOCTYPE html>
<html>
<head>
    <title>Add Sell</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
        }
        form {
            width: 25%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid none;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: none;
            color: none;
        }
        input[type="submit"]:hover {
            background-color: none;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Add Sell</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="CustomerID">Customer ID:</label>
        <input type="text" id="CustomerID" name="CustomerID" required><br>

        <label for="ProductID">Product ID:</label>
        <input type="text" id="ProductID" name="ProductID" required><br>

        <label for="SellingPrice">Selling Price:</label>
        <input type="number" id="SellingPrice" name="SellingPrice" required><br>

        <label for="DateOfPurchase">Date of Purchase:</label>
        <input type="date" id="DateOfPurchase" name="DateOfPurchase" required><br>

        <input type="submit" value="Add Sell">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customerID = $_POST['CustomerID'];
        $productID = $_POST['ProductID'];
        $sellingPrice = $_POST['SellingPrice'];
        $dateOfPurchase = $_POST['DateOfPurchase'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "final";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT BuyingPrice FROM Product WHERE ProductID = ?");
        $stmt->bind_param("i", $productID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $buyingPrice = $row['BuyingPrice'];
            if ($sellingPrice > $buyingPrice && strtotime($dateOfPurchase) <= time()) {
                $stmt = $conn->prepare("INSERT INTO Sell (CustomerID, ProductID, SellingPrice, DateOfPurchase) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iiis", $customerID, $productID, $sellingPrice, $dateOfPurchase);

                if ($stmt->execute()) {
                    echo "<p>New sell record added successfully</p>";
                } else {
                    echo "<p>Error: " . $stmt->error . "</p>";
                }

                $stmt->close();
            } else {
                echo "<p>Invalid selling price or date of purchase</p>";
            }
        } else {
            echo "<p>Product not found</p>";
        }

        $conn->close();
    }
    ?>
    <a href="sellmenu.php">Back to Menu</a>
</body>
</html>
