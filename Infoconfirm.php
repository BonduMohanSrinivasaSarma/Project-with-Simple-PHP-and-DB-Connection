<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=internship', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$_SESSION['currents']=$_GET['currents'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="img.jpg" type="image/x-icon">
    <title>Sender's Info</title>
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
      <div class="Head1" > <p> Confirm the details of sender to proceed:</p> </div>
<?php          
           $stmt = $pdo->query("SELECT * FROM Customers WHERE Sno =".$_SESSION['currents']); 
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
           $na=$row['Name'];
           print'<div class="container-fluid" style="width:570px; padding-top:10px" ><table style="background-color:white;font-size:24.5px" class="table table-hover"><tr style="background-color:white;" class="thead-dark" ><th style="font-weight:normal;">Name:</th><th style="font-weight:normal">'.$row['Name'].'</th></tr>' ;
           print '<tr><td>Email:</td><td>'.$row['Email'].'</td></tr>';
           print '<tr><td>Account Number:</td><td>'.$row['Account Number'].'</td></tr>';
           print '<tr><td>Balance:</td><td>'.$row['Balance'].'</td></tr></table></div>';
 ?>
            <?php echo'<div style="text-align:center;"> <a href="transfer.php" id="button" class="but" style="font-size:25px">Confirm</a></div>'; ?>
        </body>
</html>