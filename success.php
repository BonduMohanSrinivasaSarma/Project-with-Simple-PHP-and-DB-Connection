<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=internship', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->query("SELECT * FROM customers WHERE Sno=".$_GET['receiversl']);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt1 = $pdo->query("SELECT * FROM customers WHERE Sno=".$_SESSION['currents']);
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

$status="Unsuccessful";

$receivername=$row['Name'];
$sendername=$row1['Name'];

if(($_SESSION['amount']<=0) || $row1['Balance']<$_SESSION['amount'])
{
$receiveramount=$row['Balance'];
$senderamount=$row1['Balance'];
$_SESSION['deladd1']="Money Transaction Failed. Please Check Balance of the Sender or minimum amount to be transferred";
}
else
{
$receiveramount=$row['Balance']+$_SESSION['amount'];
$senderamount=$row1['Balance']-$_SESSION['amount'];
$_SESSION['deladd']="Money Trasaction Successful";
$status="Successful";
}
$tp=$row1['Account Number']." ---> ".$row['Account Number'];

$stmt=$pdo->query("update customers set Balance=$receiveramount where Sno=".$_GET['receiversl']);
$stmt=$pdo->query("update customers set Balance=$senderamount where Sno=".$_SESSION['currents']);
$pdo->query("insert into Transactions (Transactionprocess,Sender,Receiver,Amount,Status) values ('".$tp."','".$sendername."','".$receivername."','".$_SESSION['amount']."','$status')");
header("Location:customers.php");
?>