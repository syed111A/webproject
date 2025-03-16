<html>
<head>
    <title>SHAH FABRICS Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            color: white;
            display: block;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #555;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        .table-options {
            display: none;
            background-color: white;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .table-options a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s;
        }
        .table-options a:hover {
            background-color: #f2f2f2;
            color: #666;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .center-image {
            margin-top: 20px;
            text-align: center;
        }
        .center-image img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Jeela Dashboard</h2>
        <a href="#customer" onclick="showOptions('customer')">Customer</a>
        <a href="#supplier" onclick="showOptions('supplier')">Supplier</a>
        <a href="#brand" onclick="showOptions('brand')">Brand</a>
        <a href="#product" onclick="showOptions('product')">Product</a>
        <a href="#sell" onclick="showOptions('sell')">Sell</a>
        <a href="#purchase" onclick="showOptions('purchase')">Purchase</a>
        <a href="#expenditure" onclick="showOptions('expenditure')">Expenditure</a>
        <a href="#payment" onclick="showOptions('payment')">Payment</a><br><br>
        <a href="#queries" onclick="showOptions('queries')">Queries</a>
    </div>
    <div class="content">
        <h1>Welcome to the Jeela Company Dashboard</h1>
        <div id="customer" class="table-options">
            <h2>Customer Options</h2>
            <a href="Add New Customer.php">Add New Customer</a>
            <a href="View Customers.php">View Customers</a>
        </div>
        <div id="supplier" class="table-options">
            <h2>Supplier Options</h2>
            <a href="Add New Supplier.php">Add New Supplier</a>
            <a href="View Suppliers.php">View Suppliers</a>
        </div>
        <div id="brand" class="table-options">
            <h2>Brand Options</h2>
            <a href="Add New Brand.php">Add New Brand</a>
            <a href="View Brand.php">View Brands</a>
        </div>
        <div id="product" class="table-options">
            <h2>Product Options</h2>
            <a href="Add New Product.php">Add New Product</a>
            <a href="View Product.php">View Products</a>
        </div>
        <div id="sell" class="table-options">
            <h2>Sell Options</h2>
            <a href="Add New Sell.php">Add New Sell</a>
            <a href="View Sell.php">View Sells</a>
        </div>
        <div id="purchase" class="table-options">
            <h2>Purchase Options</h2>
            <a href="Add New Purchase.php">Add New Purchase</a>
            <a href="View Purchase.php">View Purchases</a>
        </div>
        <div id="expenditure" class="table-options">
            <h2>Expenditure Options</h2>
            <a href="Add New Expenditure.php">Add New Expenditure</a>
            <a href="View Expenditures.php">View Expenditures</a>
        </div>
        <div id="payment" class="table-options">
            <h2>Payment Options</h2>
            <a href="Add New Payment.php">Add New Payment</a>
            <a href="View Payment.php">View Payments</a>
        </div>
        <div id="queries" class="table-options">
            <h2>Queries</h2>
            <a href="Q1_View All Customers.php">View All Customers</a>
            <a href="Q2_Customer Suit Summary.php">Customer Suit Summary</a>
            <a href="Q3_View Customer Details.php">View Customer Details</a>
            <a href="Q4_View All Customer Purchases.php">View All Customer Purchases</a>
            <a href="Q5_View Customer Purchases.php">View Customer Purchases</a>
            <a href="Q6_View Customer Payments.php">View Customer Payments</a>
            <a href="Q7_Total Sales.php">Total Sales</a>
            <a href="Q8_Sales Between Dates.php">Sales Between Dates</a>
            <a href="Q9_Total Payments Between Dates.php">Total Payments Between Dates</a>
            <a href="Q10_Total Purchases.php">Total Purchases</a>
            <a href="Q11_View All Purchases.php">View All Purchases</a>
            <a href="Q12_Purchases Between Dates.php">Purchases Between Dates</a>
            <a href="Q13_Customers Remaining Amount.php">Customers Remaining Amount</a>
            <a href="Q14_Customer Remaining Amount.php">Customer Remaining Amount</a>
            <a href="Q15_Total Sale per Brand and Customer.php">Total Sale per Brand and Customer</a>
            <a href="Q16_Total Purchase per Customer.php">Total Purchase per Customer</a>
            <a href="Q17_Total Investment.php">Total Investment</a>
            <a href="Q18_Total Sales.php">Total Sales</a>
            <a href="Q19_Total Expenditure.php">Total Expenditure</a>
            <a href="Q20_Current Account Value.php">Current Account Value</a>
            <a href="Q21_Total Remaining Amount.php">Total Remaining Amount</a>
        </div>
        <div class="center-image">
            <img src="DB.jpg" alt="Dashboard Image">
        </div>
    </div>

    <script>
        function showOptions(table) {
            var options = document.getElementsByClassName('table-options');
            for (var i = 0; i < options.length; i++) {
                options[i].style.display = 'none';
            }
            document.getElementById(table).style.display = 'block';
        }
    </script>
</body>
</html>
