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
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="img.jpg" type="image/x-icon">
    <title>Customers</title>
</head>
<body class="Customerbg">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <img src="img.jpg" alt="Loading" class="navimg">
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
                <a class="nav-link active" aria-current="page" href="customers.php">Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transactions.php">Transactions</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="Head1"><p>Select the Sender to Transfer Money:</p></div>
<?php
    if(isset($_SESSION['deladd'])){echo"<div class='notify'>".$_SESSION['deladd']."</div>";unset($_SESSION['deladd']);}
    if(isset($_SESSION['deladd1'])){echo"<div class='notify' style='color:red'>".$_SESSION['deladd1']."</div>";unset($_SESSION['deladd1']);}
    $stmt = $pdo->query("SELECT * FROM Customers");
    print'<div class="container-fluid" ><table style="background-color:white;font-size:17.5px" class="table table-bordered  table-hover"><tr style="background-color:silver;" class="thead-dark"><th>Account Number</th><th>Customer Name</th><th>Email</th><th>Current Balance</th><th></th></tr>';
      while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
          print "<tr><td>".$row["Account Number"]."</td><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row['Balance']."
          <td><a class='but' href='Infoconfirm.php?currents=".$row["Sno"]." '>Select</a></td></tr>";
      }
      '</table></div>'
?>
</body>
</html>   