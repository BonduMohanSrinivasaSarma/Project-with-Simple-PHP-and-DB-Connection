<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=internship', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="img.jpg" type="image/x-icon">
    <title>Transactions</title>
</head>
<body style="background-color: rgb(162, 229, 238);">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <img src="img.jpg" alt="" style="width:45px; height: 45px; float: left;">
          <a class="navbar-brand" href="index.html" style="padding-left: 4px;">People Bank</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav" style="font-size: 17px;">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="customers.php">Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="transactions.php">Transactions</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="Head1"> <p> Transaction Details :</p> </div>
<?php
    $stmt = $pdo->query("SELECT * FROM Transactions");
      print'<div class="container-fluid" ><table style="background-color:white; font-size:17.5px" class="table table-bordered table-hover style="margin:100px""><tr style="background-color:silver;" class="thead-dark"><th style="width:300px">Transaction</th><th>Sender</th><th>Receiver</th><th>Amount</th><th style="width:150px">Status</th><th>Time</th></tr>';
      while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
          print "<tr><td>".$row["Transactionprocess"]."</td><td>".$row["Sender"]."</td><td>".$row["Receiver"]."</td><td>".$row["Amount"]."</td><td>".$row["Status"]."</td><td>".$row["Time Stamp"]."</td></tr>";
      }'</table><div>'
?>
</body>
</html>