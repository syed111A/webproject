<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect('localhost', 'root', '', 'final');

    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $brand_id = $_POST['brandid'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $buying_price = $_POST['buyingprice'];
    $fabric_material = $_POST['fabricmaterial'];
    $color = $_POST['color'];
    $supplier_id = $_POST['supplier_id'];
    $description = $_POST['description'];

  
    $query = "INSERT INTO Product (BrandID, Category, Type, BuyingPrice, FabricMaterial, color, SupplierID, Description) 
              VALUES ('$brand_id', '$category', '$type', '$buying_price', '$fabric_material', '$color', '$supplier_id', '$description')";

    if (mysqli_query($conn, $query)) {
        $message = "Product added successfully.";
    } else {
        $message = "Error: " . $query . "<br>" . mysqli_error($conn);
    }

   
    mysqli_close($conn);
}

$conn = mysqli_connect('localhost', 'root', '', 'final');
$brands_query = "SELECT BrandID, BrandName FROM Brand";
$brands_result = mysqli_query($conn, $brands_query);
$suppliers_query = "SELECT SupplierID, SupplierName FROM Supplier";
$suppliers_result = mysqli_query($conn, $suppliers_query);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            margin-top: 20px;
        }
        form {
            display: inline-block;
            text-align: left;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        label {
            font-weight: bold;
        }
        input[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        select, input[type="number"], input[type="text"], textarea {
            width: calc(100% - 10px);
            padding: 6px;
            margin-top: 6px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Add New Product</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <label for="brand_id">Brand:</label><br>
            <select id="brand_id" name="brand_id" required>
                <?php while($row = mysqli_fetch_assoc($brands_result)) {
                    echo "<option value='".$row['BrandID']."'>".$row['BrandName']."</option>";
                } ?>
            </select>
        </div>
        <div>
            <label for="category">Category:</label><br>
            <select id="category" name="category" required>
                <option value="Stitched">Stitched</option>
                <option value="Unstitched">Unstitched</option>
            </select>
        </div>
        
        <div>
            <input type="submit" value="Add Product">
        </div>
    </form>

    <?php
    if (!empty($message)) {
        echo "<h2>$message</h2>";
    }
    ?>
</body>
</html>

