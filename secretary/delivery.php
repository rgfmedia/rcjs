<?php include_once('header.php'); ?>
<?php

    if (isset($_POST['add'])) {
        // code...
        $date = $_POST['date'];
        $name = $_POST['name'];
        $mark = $_POST['mark'];
        $numheads = $_POST['numheads'];
        $kilo = $_POST['kilo'];
        $price = str_replace(',', '', $_POST['price']);

        $sql = "INSERT INTO delivery VALUES (null, '$date', '$name', '$mark', '$numheads', '$kilo', '$price', now(),0)";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        header('location:delivery.php');
    }
    if (isset($_POST['update'])) {
        // code...
        $getDate = $_POST['getDate'];
        $id = $_POST['id'];
        $date = $_POST['date'];
        $name = $_POST['name'];
        $mark = $_POST['mark'];
        $numheads = $_POST['numheads'];
        $kilo = $_POST['kilo'];
        $price = str_replace(',', '', $_POST['price']);
        
        $sql = "UPDATE delivery SET Date='$date', Name='$name', Mark_No= '$mark', Num_Heads='$numheads', Kg='$kilo', Price='$price' WHERE D_ID = '$id'";
            $result = mysqli_query($link, $sql) or die('Error querying database.');
        
        if ($getDate != 'null') {
            header('location:delivery.php?date='.$getDate);
        } else {
            header('location:delivery.php');
        }

    }
    if (isset($_POST['delete'])) {
        
        $id = $_POST['id'];
        $getDate = $_POST['getDate'];
        $sql = "DELETE FROM delivery WHERE D_ID = '$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        if ($getDate != 'null') {
            header('location:delivery.php?date='.$getDate);
        } else {
            header('location:delivery.php');
        }

    }
?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Delivery Records</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (!isset($_GET['date'])): ?>
                <button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#deliveryModal">
                   <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">New</span>
                </button>
            <?php endif; ?>
        </div>
        <div class="card-body">

            <?php if (isset($_GET['date'])): ?>
                <?php include 'table-delivery.php'; ?>
            <?php else: ?>
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deliveryModal" style="margin-bottom:5px;">
                    ADD
                </button> -->
                <?php include 'table-delivery.php'; ?>
            <?php endif; ?>
        </div>
        </div>
    </div>


  <!-- container-scroller -->
<?php include_once('footer.php'); ?>
