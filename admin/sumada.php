<?php include_once('header.php'); ?>
<?php
    if (isset($_POST['addSumada'])) {
        // code...
        $getDate = $_POST['getDate'];
        $date = $_POST['date'];
        $kind = $_POST['kind'];
        $sacks = $_POST['sacks'];
        $no_pigs = $_POST['no_pigs'];
        $kilos = $_POST['kilos'];
        $expenses = str_replace(',', '', $_POST['expenses']);

        $sql = "INSERT INTO sumada VALUES (null, '$date', '$kind', '$sacks', '$no_pigs', '$kilos', '$expenses')";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        header('location:sumada.php');
    }
    if (isset($_POST['update'])) {
        // code...
        $getDate = $_POST['getDate'];
        $id = $_POST['id'];
        $date = $_POST['date'];
        $kind = $_POST['kind'];
        $sacks = $_POST['sacks'];
        $no_pigs = $_POST['no_pigs'];
        $kilos = $_POST['kilos'];
        $expenses = str_replace(',', '', $_POST['expenses']);


        $sql = "UPDATE sumada SET date='$date', kind='$kind', sacks='$sacks', no_pigs='$no_pigs', kilos='$kilos', expenses='$expenses' WHERE id='$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        if ($getDate != 'null') {
            header('location:sumada.php?date='.$getDate);
        } else {
            header('location:sumada.php');
        }
    }
    if (isset($_POST['delete'])) {
        // code...
        $getDate = $_POST['getDate'];
        $key = $_POST['id'];
        $sql = "DELETE FROM sumada WHERE id = '$key'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        if ($getDate != 'null') {
            header('location:sumada.php?date='.$getDate);
        } else {
            header('location:sumada.php');
        }
    }
?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Sumada Records</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
             <div class="form-inline">
                            <div class="form-horizontal">
           
            <?php if (!isset($_GET['date'])): ?>
                <button class="btn btn-primary btn-md btn-icon-split" data-toggle="modal" data-target="#sumadaModal">
                   <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">New</span>
                </button>
            <?php endif; ?>
        </div>
        &nbsp; &nbsp;
            
<div class="form-horizontal">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <div class="input-group pull-right">
           <input type="date" class=" form-control" name="txtdate" >
            <div class="input-group-append">
                <button type="submit" name="sdate" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        </form>
    </div>
  
        </div>
        <div class="card-body">

            <?php if (isset($_POST['sdate'])): ?>
                <?php include 'table-sumada.php'; ?>
            <?php else: ?>
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deliveryModal" style="margin-bottom:5px;">
                    ADD
                </button> -->
                <?php include 'table-sumada.php'; ?>
            <?php endif; ?>
        </div>
        
    </div>
</div>
<?php include_once('footer.php'); ?>

