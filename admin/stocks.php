<?php include_once('header.php'); ?>
<?php

    if (isset($_POST['addStocks'])) {
        // code...
        $date = $_POST['date'];
        $driver = $_POST['driver'];
        $kind = $_POST['kind'];
        $noheads = $_POST['noheads'];
        $kilos = $_POST['kilos'];
        
        $sql = "INSERT INTO pig_stocks VALUES (null, '$date', '$driver', '$kind', '$noheads', '$kilos')";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        header('location:stocks.php');
    }
    if (isset($_POST['update'])) {
        // code...
        $getDate = $_POST['getDate'];
        $id = $_POST['id'];
        $date = $_POST['date'];
        $driver = $_POST['driver'];
        $kind = $_POST['kind'];
        $noheads = $_POST['noheads'];
        $kilos = $_POST['kilos'];

        $sql = "UPDATE pig_stocks SET date='$date', driver='$driver', kind='$kind', no_heads='$noheads', kilos='$kilos' WHERE id='$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        if ($getDate != 'null') {
            header('location:stocks.php?date='.$getDate);
        } else {
            header('location:stocks.php');
        }
    }
    if (isset($_POST['delete'])) {
        // code...
        $getDate = $_POST['getDate'];
        $key = $_POST['id'];
        $sql = "DELETE FROM pig_stocks WHERE id = '$key'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        if ($getDate != 'null') {
            header('location:stocks.php?date='.$getDate);
        } else {
            header('location:stocks.php');
        }
    }
?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Pig Stocks Records</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (!isset($_GET['date'])): ?>
                <button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#stocksModal">
                   <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">New</span>
                </button>
            <?php endif; ?>
        </div>
        <div class="card-body">

            <?php if (isset($_GET['date'])): ?>
                <?php include 'table-pig-stocks.php'; ?>
            <?php else: ?>
                <?php include 'table-pig-stocks.php'; ?>
            <?php endif; ?>
        </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
