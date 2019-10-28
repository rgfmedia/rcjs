<?php include_once('header.php'); ?>
<?php
    if (isset($_POST['addBali'])) {
        // code...
        $name = $_POST['name'];
        $amount = str_replace(',', '', $_POST['amount']);
        $date = $_POST['date'];
        
        $sql = "INSERT INTO bali VALUES (null, '$name', '$amount', '$date',0)";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        header('location:bali.php');
    }
    if (isset($_POST['update'])) {
        // code...
        $getDate = $_POST['getDate'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $amount = str_replace(',', '', $_POST['amount']);
        $date = $_POST['date'];

        $sql = "UPDATE bali SET name='$name', amount='$amount', date='$date' WHERE id='$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        if ($getDate != 'null') {
            header('location:bali.php?date='.$getDate);
        } else {
            header('location:bali.php');
        }
    }
    if (isset($_POST['delete'])) {
        // code...
        $getDate = $_POST['getDate'];
        $key = $_POST['id'];
        $sql = "DELETE FROM bali WHERE id = '$key'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        if ($getDate != 'null') {
            header('location:bali.php?date='.$getDate);
        } else {
            header('location:bali.php');
        }
    }
    if (isset($_POST['updateBool'])) {
        $id = $_POST['id'];
        $is_paid = $_POST['is_paid'];
        if ($is_paid==0) {
            $sql = "UPDATE bali SET is_paid=1 WHERE id='$id'";
        } else {
            $sql = "UPDATE bali SET is_paid=0 WHERE id='$id'";
        }
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        header('location:bali.php');
    }
    
?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Bali Records</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#baliModal">
               <span class="icon text-white-50">
                  <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">New</span>
            </button>            
        </div>
        <div class="card-body">

            <?php include 'table-bali.php'; ?>
            
        </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>