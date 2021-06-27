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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Transferring Money</title>
    <link rel="shortcut icon" href="img.jpg" type="image/x-icon">
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
                <a class="nav-link"  href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="customers.php">Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transactions.php">Transactions</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<?php
         if(isset($_POST["amount"]))$_SESSION["amount"]=$_POST["amount"];
         else $_SESSION["amount"]=0;
        echo'  <h2 class="t1">Enter the Amount to Transfer and Select the Receiver:</h2>
          <h3 class="t2">Amount : </h3> 
          <form method="POST" style="margin:10px"> <input type="number" min=0 name="amount" placeholder='.$_SESSION['amount'].'><input type="submit" value="Confirm" style="background-color:lightgreen; font-weight:bold"></form>';
          
    if(isset($_SESSION["deladd"])){echo'<div style="color:green".$_SESSION["deladd"]."<div>';}
    ?>

<?php
   $stmt = $pdo->query("SELECT * FROM Customers WHERE NOT Sno =".$_SESSION['currents']);
      print'<div class="container-fluid"><table style="background-color:white; font-size:17.5px"  class="table table-bordered table-hover"><tr style="background-color:silver;" class="thead-dark"><th>Account Number</th><th>Customer Name</th><th>Email</th><th>Current Balance</th><th></th></tr>';
      while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
          print "<tr><td>".$row["Account Number"]."</td><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row['Balance']."<td>
          <a class='but' href='success.php?receiversl=".$row["Sno"]."'>Select</a></td></tr>";
      }'</table></div>'
  ?>   
</body>
</html>


