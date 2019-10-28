<?php include_once('header.php'); ?>
<?php
    
    $baliname='';
    $baliamnt='';

    if (isset($_POST['addCollection'])) {
        // code...
        $clcname = $_POST['clcname'];
        $date = $_POST['date'];
        $cusname = $_POST['cusname'];
        //$datedelivered = $_POST['datedelivered'];
        $tacamnt = str_replace(',', '', $_POST['tacamnt']);
        $chckno = $_POST['chckno'];
        $koe = $_POST['koe'];
        $ea = str_replace(',', '', $_POST['ea']);
        $damage = $_POST['damage'];
        $damagekg = $_POST['damagekg'];
        $damamount = str_replace(',', '', $_POST['damamount']);

        if (!empty($_POST['baliname']) AND !empty($_POST['baliamnt'])) {

            $baliname = $_POST['baliname'];    
            $baliamnt = str_replace(',', '', $_POST['baliamnt']);

            $baliSql = "INSERT INTO bali VALUES (null, '$baliname', '$baliamnt', '$date', 0)";
            mysqli_query($link, $baliSql) or die('Error querying database for bali.');
        }

        $sql = "INSERT INTO collection VALUES (null, '$clcname', '$date', '$cusname', '$tacamnt', '$chckno', '$koe', '$ea', '$damage', '$damagekg', '$damamount', '$baliname', '$baliamnt',0 )";

        $result = mysqli_query($link, $sql) or die('Error querying database for collection.');
        $result = true;
        if ($result == true) {
            
            $sqlDev = "SELECT Price, COUNT(Num_Heads) as totalHeads, SUM(Kg) as totalKilo, SUM(Kg*Price) as total  FROM delivery WHERE Name='$cusname' AND is_paid=0";

            $sqlDev1 = "SELECT COUNT(Num_Heads) as heads, Date, SUM(Kg) as kilo FROM delivery WHERE Name='$cusname' AND is_paid=0 GROUP BY Date";

            $devResult = mysqli_query($link, $sqlDev) or die('Error querying database for delivery.');

            $devResult1 = mysqli_query($link, $sqlDev1) or die('Error querying database for delivery.');
            
            $devVal = array();
            $devVal = mysqli_fetch_assoc($devResult);

            //$totalHeads = $devVal['totalHeads'];
            $totalKilo = $devVal['totalKilo'];
            $price = $devVal['Price'];

            
            
            $sqlCol = "SELECT SUM(tac_amount) as totalCol FROM collection WHERE cust='$cusname' AND is_paid=0";
            $colResult = mysqli_query($link, $sqlCol) or die('Error querying database for delivery.');
            $totalCol = mysqli_fetch_assoc($colResult)['totalCol'];

            foreach ($devResult1 as $key => $value) {
                $kilo = $value['kilo'];
                $date_deliver = $value['Date'];
                $heads = $value['heads'];

                $sqlCollectibles = "INSERT INTO collectibles VALUES (null, '$clcname', '$cusname', '$heads', '$kilo', '$price', '$tacamnt', '$totalCol', '$date', '$date_deliver')";

                mysqli_query($link, $sqlCollectibles) or die('Error querying database for collectibles.');


            }
            
            
            
            if ($devVal['total'] <= $totalCol) {

                $sqlUpdateDev = "UPDATE delivery SET is_paid=1 WHERE Name='$cusname' AND is_paid=0";
                $sqlUpdateCol = "UPDATE collection SET is_paid=1 WHERE cust='$cusname' AND is_paid=0";

                mysqli_query($link, $sqlUpdateDev) or die('Error querying database for delivery.');
                mysqli_query($link, $sqlUpdateCol) or die('Error querying database for delivery.');
            }
        }

            
        header('location:collections.php');
    }
    if (isset($_POST['update'])) {
        // code...
        $getDate = $_POST['getDate'];
        $id = $_POST['id'];

        $clcname = $_POST['clcname'];
        $date = $_POST['date'];
        $cusname = $_POST['cusname'];
        //$datedelivered = $_POST['datedelivered'];
        $tacamnt = str_replace(',', '', $_POST['tacamnt']);
        $chckno = $_POST['chckno'];
        $koe = $_POST['koe'];
        $ea = str_replace(',', '', $_POST['ea']);
        $damage = $_POST['damage'];
        $damagekg = $_POST['damagekg'];
        $damamount = str_replace(',', '', $_POST['damamount']);
    //after sa $damamount

        $cbalidate = $_POST['cbalidate'];
        $cbaliname = $_POST['cbaliname'];
        $cbaliamount = $_POST['cbaliamount'];

        $baliname = $_POST['baliname'];
        $baliamnt = str_replace(',', '', $_POST['baliamnt']);

        if (!empty($_POST['baliname']) AND !empty($_POST['baliamnt'])) {
        	

            if (empty($cbaliname) AND empty($cbaliamount)) {
            	$baliSql = "INSERT INTO bali VALUES (null, '$baliname', '$baliamnt', '$date', 0)";
            } else {
            	$baliSql = "UPDATE bali SET name='$baliname', amount='$baliamnt' WHERE date='$cbalidate' AND name='$cbaliname' AND amount='$cbaliamount'";
            }
            

            mysqli_query($link, $baliSql) or die('Error querying database.');    

        } else {
        	
            $baliSql = "DELETE FROM bali WHERE date='$cbalidate' AND name='$cbaliname' AND amount='$cbaliamount'";
            mysqli_query($link, $baliSql) or die('Error querying database.');
        }
        

        $sql = "UPDATE collection SET clctr_name='$clcname', date='$date', cust= '$cusname', tac_amount='$tacamnt', chck_no='$chckno', k_o_expnses='$koe', expnses_amnt='$ea', damage='$damage', dmg_kg='$damagekg', dmg_amount='$damamount', bali_name='$baliname', bali_amount='$baliamnt' WHERE id = '$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');



        if ($result == true) {



            $sqlDev = "SELECT Price, COUNT(Num_Heads) as totalHeads, SUM(Kg) as totalKilo, SUM(Kg*Price) as total  FROM delivery WHERE Name='$cusname' AND is_paid=0";
            $devResult = mysqli_query($link, $sqlDev) or die('Error querying database for delivery.');
            
            $devVal = array();
            $devVal = mysqli_fetch_assoc($devResult);

            $totalHeads = $devVal['totalHeads'];
            $totalKilo = $devVal['totalKilo'];
            $price = $devVal['Price'];

            
            $sqlCol = "SELECT SUM(tac_amount) as totalCol FROM collection WHERE cust='$cusname' AND is_paid=0";
            $colResult = mysqli_query($link, $sqlCol) or die('Error querying database for delivery.');
            $totalCol = mysqli_fetch_assoc($colResult)['totalCol'];

            $ccollector=$_POST['ccollector'];
            $cdate=$_POST['cdate'];
            $ccusname=$_POST['ccusname'];

            $sqlCollectibles = "UPDATE collectibles SET collector_name='$clcname', customer='$cusname', number_of_heads='$totalHeads', total_kilo='$totalKilo', price='$price', collections='$tacamnt', tac='$totalCol', date_collected='$date' 
                                    WHERE collector_name='$ccollector' AND customer='$ccusname' AND date_collected='$cdate'";
            mysqli_query($link,$sqlCollectibles) or die('Error Collectibles');

            
            if ($devVal['total'] <= $totalCol) {

                $sqlUpdateDev = "UPDATE delivery SET is_paid=1 WHERE Name='$cusname' AND is_paid=0";
                $sqlUpdateCol = "UPDATE collection SET is_paid=1 WHERE cust='$cusname' AND is_paid=0";

                mysqli_query($link, $sqlUpdateDev) or die('Error querying database for delivery.');
                mysqli_query($link, $sqlUpdateCol) or die('Error querying database for delivery.');
            }


        }

        
        if ($getDate != 'null') {
            header('location:collections.php?date='.$getDate);
        } else {
            header('location:collections.php');
        }

    }
    if (isset($_POST['delete'])) {
        
        $id = $_POST['id'];
        $getDate = $_POST['getDate'];
        $cusname = $_POST['cusname'];

        $sql = "DELETE FROM collection WHERE id = '$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        //bali query start--
        $cbalidate = $_POST['cbalidate']; $cbaliname = $_POST['cbaliname']; $cbaliamount = $_POST['cbaliamount'];

        $baliSql = "DELETE FROM bali WHERE date='$cbalidate' AND name='$cbaliname' AND amount='$cbaliamount'";
        mysqli_query($link, $baliSql) or die('Error querying database.');    
        //bali query end --

        //delivery query start --
        $ccollector=$_POST['ccollector'];
        $cdate=$_POST['cdate'];
        $ccusname=$_POST['ccusname'];

        $sqlCollectibles="DELETE FROM collectibles WHERE collector_name='$ccollector' AND customer='$ccusname' AND date_collected='$cdate'";
        mysqli_query($link,$sqlCollectibles) or die('Error Collectibles');

        //delivery query end --

        if ($getDate != 'null') {
            header('location:collections.php?date='.$getDate);
        } else {
            header('location:collections.php');
        }

    }
?>

  <div class="container-fluid">
            <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Collections Records</h6>
          <div class="card shadow mb-4">


            <div class="card-header py-3">
<?php if (!isset($_GET['date'])): ?>
               <button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#collectionsModal">
                   <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">New</span>
               </button>
<?php endif; ?>
            </div>
                    <div class="card-body">
                        </p> 
                        <?php if (isset($_GET['date'])): ?>
                            <?php include 'table-collections.php'; ?>
                        <?php else: ?>
                            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#collectionsModal" style="margin-bottom:5px;">
                                ADD
                            </button> -->
                            <?php include 'table-collections.php'; ?>
                        <?php endif; ?>
</div>

          </div>
   </div>
</div>

<?php include_once('footer.php'); ?>
