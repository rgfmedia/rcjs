<?php include_once('header.php'); ?>
<?php
    if (isset($_POST['addKumprada'])) {
        // code...
        $getDate = $_POST['getDate'];
        $date = $_POST['date'];
        $driver = $_POST['driver'];
        $farm = $_POST['farm'];
        $no_pigs = $_POST['no_pigs'];
        $pig_kilos = $_POST['pigkilo'];
        $pig_price = str_replace(',', '', $_POST['pigprice']);

        $feeds_kilo = $_POST['feedskilo'];
        $feeds_price = str_replace(',', '', $_POST['feedsprice']);

        $is_paid = $_POST['is_paid'];
        // $expenses = $_POST['expenses'];

        $ahente = $_POST['ahente'];
        $aprice = $_POST['aprice'];
        $sopprice = $_POST['sopprice'];
        $rprice = $_POST['rprice'];
        $dprice = $_POST['dprice'];
        $lprice = $_POST['lprice'];
        $tprice = $_POST['tprice'];
        $eprice = $_POST['eprice'];
        $total_expenses = $aprice + $sopprice + $rprice + $dprice + $lprice + $tprice + $eprice;


        $sql = "INSERT INTO kumprada VALUES (null, '$date', '$driver', '$farm', '$no_pigs', '$pig_kilos', '$pig_price', '$feeds_kilo', '$feeds_price', '$total_expenses', '$is_paid')";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        



        $esql = "INSERT INTO expenses VALUES (null, '$date', '$farm', '$ahente', '$aprice', '$sopprice', '$rprice', '$dprice', '$lprice', '$tprice', '$eprice')";
        $eresult = mysqli_query($link, $esql) or die('Error querying database in expenses.');

        header('location:kumprada.php');
    }
    if (isset($_POST['update'])) {
        // code...
        $getDate = $_POST['getDate'];
        $id = $_POST['id'];
        $date = $_POST['date'];
        $driver = $_POST['driver'];
        $farm = $_POST['farm'];
        $no_pigs = $_POST['no_pigs'];
        
        $pig_kilos = $_POST['pigkilo'];
        $pig_price = str_replace(',', '', $_POST['pigprice']);

        $feeds_kilo = $_POST['feedskilo'];
        $feeds_price = str_replace(',', '', $_POST['feedsprice']);


        $sql = "UPDATE kumprada SET date='$date', driver='$driver', farm='$farm', no_pigs='$no_pigs', pig_kilo='$pig_kilos', pig_price='$pig_price', feeds_kilo='$feeds_kilo', feeds_price='$feeds_price' WHERE id='$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        if ($getDate != 'null') {
            header('location:kumprada.php?date='.$getDate);
        } else {
            header('location:kumprada.php');
        }
    }
    if (isset($_POST['delete'])) {
        // code...
        $getDate = $_POST['getDate'];
        $key = $_POST['id'];
        $sql = "DELETE FROM kumprada WHERE id = '$key'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        
        if ($getDate != 'null') {
            header('location:kumprada.php?date='.$getDate);
        } else {
            header('location:kumprada.php');
        }
    }
    if (isset($_POST['updateBool'])) {
        $getDate = $_POST['getDate'];
        $id = $_POST['id'];
        $is_paid = $_POST['is_paid'];
        if ($is_paid==0) {
            $sql = "UPDATE kumprada SET is_paid=1 WHERE id='$id'";
        } else {
            $sql = "UPDATE kumprada SET is_paid=0 WHERE id='$id'";
        }
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        if ($getDate != 'null') {
            header('location:kumprada.php?date='.$getDate);
        } else {
            header('location:kumprada.php');
        }
    }
?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Kumprada Records</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (!isset($_GET['date'])): ?>
                <button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#kumpradaModal">
                   <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">New</span>
                </button>
            <?php endif; ?>
        </div>
        <div class="card-body">

            <?php if (isset($_GET['date'])): ?>
                <?php include 'table-kumprada.php'; ?>
            <?php else: ?>
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deliveryModal" style="margin-bottom:5px;">
                    ADD
                </button> -->
                <?php include 'table-kumprada.php'; ?>
            <?php endif; ?>
        </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>