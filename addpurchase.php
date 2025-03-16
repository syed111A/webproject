<!DOCTYPE html>
<html>
<head>
    <title>Add Purchase</title>
    <style>
        form {
            max-width: 400px;
            margin: auto;
            padding: 1em;
            border: 1px solid #ccc;
            border-radius: 1em;
        }
        div.form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1em;
        }
        label {
            width: 45%;
            margin-right: 1em;
            text-align: right;
        }
        input[type="text"], input[type="number"], input[type="date"] {
            width: 50%;
        }
        input[type="submit"] {
            width: 100%;
            padding: 1em;
            margin-top: 1em;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 1em;
        }
    </style>
</head>
<body style ="text-align: center;">
    <h2>Add Purchase</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="Brand">BrandID:</label>
            <input type="text" id="Brand" name="Brand" required>
        </div>

        <div class="form-group">
            <label for="Supplier">SupplierID:</label>
            <input type="text" id="Supplier" name="Supplier" required>
        </div>

        <div class="form-group">
            <label for="NoOfSuits">No of Suits Purchased:</label>
            <input type="number" id="NoOfSuits" name="NoOfSuits" min="1" required>
        </div>

        <div class="form-group">
            <label for="TotalAmount">Total Amount Paid:</label>
            <input type="number" id="TotalAmount" name="TotalAmount" min="0" required>
        </div>

        <div class="form-group">
            <label for="DateOfPurchase">Date of Purchase:</label>
            <input type="date" id="DateOfPurchase" name="DateOfPurchase" max="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <input type="submit" name="submit" value="Add Purchase">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $brand = $_POST['Brand'];
        $supplier = $_POST['Supplier'];
        $noOfSuits = $_POST['NoOfSuits'];
        $totalAmount = $_POST['TotalAmount'];
        $dateOfPurchase = $_POST['DateOfPurchase'];

        
        if (!empty($brand) && !empty($supplier) && $noOfSuits > 0 && $totalAmount > 0 && $dateOfPurchase <= date('Y-m-d') && $dateOfPurchase >= date('Y-m-d', strtotime('-7 days'))) {

            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "final";

           
            $conn = new mysqli($servername, $username, $password, $database);

          
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $stmt = $conn->prepare("INSERT INTO purchase (BrandID, SupplierID, NoOfSuitsPurchased, TotalAmountPaid, DateOfPurchase) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssids", $brand, $supplier, $noOfSuits, $totalAmount, $dateOfPurchase);

            
            if ($stmt->execute()) {
                echo "New purchase added successfully";
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
    <a href="purchasemenu.php">Back to Menu</a>
</body>
</html>
