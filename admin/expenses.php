<?php include_once('header.php'); ?>
<?php
    if (isset($_POST['addExpenses'])) {
        // code...
        $getDate = $_POST['getDate'];
        $date = $_POST['date'];
        $kexpenses = $_POST['kexpenses'];
        $sacks = $_POST['sacks'];
        $expenses = str_replace(',', '', $_POST['expenses']);

        $sql = "INSERT INTO expenses VALUES (null, '$date', '$kexpenses', '$sacks', '$expenses')";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        header('location:expenses.php');
    }
    if (isset($_POST['update'])) {
        // code...
        $getDate = $_POST['getDate'];
        $id = $_POST['id'];
        $date = $_POST['date'];
        $kexpenses = $_POST['kexpenses'];
        $sacks = $_POST['sacks'];
        $expenses = str_replace(',', '', $_POST['expenses']);


        $sql = "UPDATE expenses SET date='$date', kexpenses='$kexpenses', sacks='$sacks', expenses='$expenses' WHERE id='$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        if ($getDate != 'null') {
            header('location:expenses.php?date='.$getDate);
        } else {
            header('location:expenses.php');
        }
    }
    if (isset($_POST['delete'])) {
        // code...
        $getDate = $_POST['getDate'];
        $key = $_POST['id'];
        $sql = "DELETE FROM expenses WHERE id = '$key'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        if ($getDate != 'null') {
            header('location:expenses.php?date='.$getDate);
        } else {
            header('location:expenses.php');
        }
    }
?>
 <div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Expenses Records</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (!isset($_GET['date'])): ?>
                <button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#expensesModal">
                   <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">New</span>
                </button>
            <?php endif; ?>
        </div>
        <div class="card-body">

            <?php if (isset($_GET['date'])): ?>
                <?php include 'table-expenses.php'; ?>
            <?php else: ?>
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deliveryModal" style="margin-bottom:5px;">
                    ADD
                </button> -->
                <?php include 'table-expenses.php'; ?>
            <?php endif; ?>
        </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
