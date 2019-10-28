<?php include_once('header.php'); ?>
<?php
    if (isset($_POST['add'])) {
        // code...
        $getDate = $_POST['getDate'];
        $kind = $_POST['kind'];
        $farm = $_POST['farm'];
        $sacks = $_POST['sacks'];
        $nopigs = $_POST['nopigs'];
        $kilo = $_POST['kilo'];
        $total = str_replace(',', '', $_POST['total']);

        $sql = "INSERT INTO kapital VALUES (null, '$kind', '$farm', '$sacks', '$nopigs', '$kilo', '$total')";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        header('location:kapital.php?');
    }
    if (isset($_POST['update'])) {
        // code...
        $getDate = $_POST['getDate'];
        $id = $_POST['id'];
        $kind = $_POST['kind'];
        $farm = $_POST['farm'];
        $sacks = $_POST['sacks'];
        $no_pigs = $_POST['no_pigs'];
        $kilos = $_POST['kilos'];
        $total = str_replace(',', '', $_POST['total']);


        $sql = "UPDATE kapital SET kind='$kind', farm='$farm', sacks='$sacks', no_pigs='$no_pigs', kilos='$kilos', total='$total' WHERE id='$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        if ($getDate != 'null') {
            header('location:kapital.php?date='.$getDate);
        } else {
            header('location:kapital.php');
        }
    }
    if (isset($_POST['delete'])) {
        // code...
        $getDate = $_POST['getDate'];
        $key = $_POST['id'];
        $sql = "DELETE FROM kapital WHERE id = '$key'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        if ($getDate != 'null') {
            header('location:kapital.php?date='.$getDate);
        } else {
            header('location:kapital.php');
        }
    }
?>
<div class="container-fluid">
            <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Capital Records</h6>
          <div class="card shadow mb-4">


            <div class="card-header py-3">
<?php if (!isset($_GET['date'])): ?>
               <button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#kapitalModal">
                   <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">New</span>
               </button>
<?php endif; ?>
            </div>
                    <div class="card-body">
                        <?php if (isset($_GET['date'])): ?>
                            <?php include 'table-kapital.php'; ?>
                        <?php else: ?>
                            
                            <?php include 'table-kapital.php'; ?>
                        <?php endif; ?>                        
                    </div>

          </div>
   </div>
</div>
<?php include_once('footer.php'); ?>
