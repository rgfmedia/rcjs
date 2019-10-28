<?php
include '../db_connect.php';
if(isset($_POST['newbank'])) 
{

$txtdate = ($_POST["tdate"]);
$txtname = ($_POST["tname"]);
$txtcheck = ($_POST["tcheck"]);
$txtamount = str_replace(',', '', $_POST["tamount"]);
$txtcustomer = ($_POST["tcustomer"]);
$txtstatus = ($_POST["status"]);


$query= "INSERT INTO banks(Date,Name,CheckNo,Amount,Details,Status,IO) value('$txtdate','$txtname','$txtcheck','$txtamount','$txtcustomer','$txtstatus','in')";

$result = mysqli_query($link, $query) or die('Error querying database.');
    
      echo("<meta http-equiv='refresh' content='1'>");
      mysqli_close($link); 

            
}


if(isset($_POST['newbankout'])) 
{

$txtdate = ($_POST["tdate"]);
$txtname = ($_POST["tname"]);
$txtcheck = ($_POST["tcheck"]);
$txtamount = str_replace(',', '', $_POST["tamount"]);
$txtcustomer = ($_POST["tcustomer"]);
$txtstatus = ($_POST["status"]);


$query= "INSERT INTO banks(Date,Name,CheckNo,Amount,Details,Status,IO) value('$txtdate','$txtname','$txtcheck','$txtamount','$txtcustomer','$txtstatus','out')";

$result = mysqli_query($link, $query) or die('Error querying database.');
    
      echo("<meta http-equiv='refresh' content='1'>");
      mysqli_close($link); 

            
}



if (isset($_POST['update'])) {
    // code...

    $getDate = $_POST['getDate'];
    $id = ($_POST["id"]);
    $txtdate = ($_POST["tdate"]);
	$txtname = ($_POST["tname"]);
	$txtcheck = ($_POST["tcheck"]);
	$txtamount = str_replace(',', '', $_POST["tamount"]);
	$txtcustomer = ($_POST["tcustomer"]);
    $txtstatus = ($_POST["status"]);

    $sql = "UPDATE banks SET Date='$txtdate', Name='$txtname', CheckNo='$txtcheck', Amount='$txtamount', Details='$txtcustomer', Status='$txtstatus' WHERE BNo='$id'";
    $result = mysqli_query($link, $sql) or die('Error querying database.');

    if ($getDate != 'null') {
        header('location:banks.php?date='.$getDate);
    } else {
        header('location:banks.php');
    }
}

if (isset($_POST['updateout'])) {
    // code...

    $getDate = $_POST['getDate'];
    $id = ($_POST["id"]);
    $txtdate = ($_POST["tdate"]);
  $txtname = ($_POST["tname"]);
  $txtcheck = ($_POST["tcheck"]);
  $txtamount = str_replace(',', '', $_POST["tamount"]);
  $txtcustomer = ($_POST["tcustomer"]);
    $txtstatus = ($_POST["status"]);

    $sql = "UPDATE banks SET Date='$txtdate', Name='$txtname', CheckNo='$txtcheck', Amount='$txtamount', Details='$txtcustomer', Status='$txtstatus' WHERE BNo='$id'";
    $result = mysqli_query($link, $sql) or die('Error querying database.');

    if ($getDate != 'null') {
        header('location:banks_out.php?date='.$getDate);
    } else {
        header('location:banks_out.php');
    }
}



if (isset($_POST['delete'])) {
        // code...
    $getDate = $_POST['getDate'];
    $key = $_POST['id'];
    $sql = "DELETE FROM banks WHERE BNo = '$key'";
    $result = mysqli_query($link, $sql) or die('Error querying database.');
    if ($getDate != 'null') {
        header('location:banks.php?date='.$getDate);
    } else {
        header('location:banks.php');
    }
}
if (isset($_POST['deleteout'])) {
        // code...
    $getDate = $_POST['getDate'];
    $key = $_POST['id'];
    $sql = "DELETE FROM banks WHERE BNo = '$key'";
    $result = mysqli_query($link, $sql) or die('Error querying database.');
    if ($getDate != 'null') {
        header('location:banks.php?date='.$getDate);
    } else {
        header('location:banks_out.php');
    }
}
 if(isset($_POST['new'])) 
{
    $new = ($_POST["bno"]);
    echo $new;
    echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#new').modal('show');
          });
          </script>";
} 

?>

