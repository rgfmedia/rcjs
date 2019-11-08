<?php include_once('header.php'); ?>
<div class="container-fluid">

    <div class="card shadow mb-4">


        <div class="card-header ">
             <h6 class=" text-primary"><i class="fas fa-fw fa-home"></i> Inventory Records</h6>
        </div>

        <div class="card-body">


          

             <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <div class="form-inline">
                        <div class="form-horizontal">
                          <small>From</small><br>
                          <input id="fromdate" class="form-control" type="date" name="fromDate" required="">
                        </div>
                        &nbsp;
                        <div class="form-horizontal">
                          <small>To</small><br>
                          <input id="todate" class="form-control" type="date" name="toDate" required="">
                        </div>
                  
                        &nbsp;
                        <div class="form-horizontal">
                          <br>
                          <button class="btn btn-primary btn-md btn-icon-split" type="submit" name="searchDate">
                                     <span class="icon ">
                                        <i class="fas fa-search"></i>
                                      </span>
                                      
                           </button>
                        </div>
                      </div>
                       </form>
<br>

            <?php
            $totalS=0;
            $totalC=0;
                if (isset($_POST['searchDate'])) {
                    $fromDate = $_POST['fromDate'];
                    $toDate = $_POST['toDate'];
                    $deliveryData = "SELECT SUM(Kg*Price) as totalSale, 
                                                COUNT(Num_Heads) as heads, 
                                                    SUM(Kg) as overallKilos 
                                                        FROM `delivery` 
                                                            WHERE Date >= '$fromDate' AND Date <= '$toDate'";

                    $collectionData = "SELECT SUM(tac_amount) as totalCollection, 
                                                SUM(tac_amount)-SUM(expnses_amnt+dmg_amount+bali_amount) as totalRemittance, SUM(expnses_amnt) as totalExpenses, 
                                                        SUM(dmg_amount) as damageAmount 
                                                            FROM `collection` 
                                                                WHERE date >= '$fromDate' AND date <= '$toDate'";

                    // $collectiblesData = "SELECT SUM(delivery.Kg * delivery.Price) - SUM(tac_amount) as totalCollectibles FROM delivery 
                    //                         JOIN collection ON delivery.Name = collection.cust 
                    //                             WHERE collection.date >= '$fromDate' AND collection.date <= '$toDate' 
                    //                                 AND delivery.collector = collection.clctr_name
                    //                                     AND delivery.date_collected = collection.date";
                    $collectiblesData = "SELECT SUM(total_kilo * price) - SUM(collections) as totalCollectibles FROM collectibles WHERE date_collected >= '$fromDate' AND date_collected <= '$toDate'";

                    $baliData = "SELECT SUM(amount) as baliAmount FROM `bali` WHERE date >= '$fromDate' AND date <= '$toDate'";


                    $getDelivery = mysqli_query($link, $deliveryData);
                    $getCollection = mysqli_query($link, $collectionData);
                    $getCollectibles = mysqli_query($link, $collectiblesData);
                    $getBali = mysqli_query($link, $baliData);
                    $data1 = mysqli_fetch_assoc($getDelivery);
                    $data2 = mysqli_fetch_assoc($getCollection);
                    $data3 = mysqli_fetch_assoc($getCollectibles);
                    $data4 = mysqli_fetch_assoc($getBali);
                }

            ?>
            <?php if (empty($data1['totalSale']) AND empty($data2['totalCollection']) AND empty($data3['totalCollectibles']) AND empty($data4['baliAmount'])): ?>
    
                No Records Found. 
            <?php else: ?>

                Date:
                <?php echo date('m/d/Y' ,strtotime( $fromDate)); ?>
                - 
                <?php echo date('m/d/Y' ,strtotime( $toDate)); ?>
                <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th colspan="9"><center>TOTAL AMOUNT OF</center> </th>
                    </tr>
                    <th>SALE</th>
                    <th>COLLECTIONS</th>
                    <th>REMITTANCE</th>
                    <th>EXPENSES</th>
                    <th>BALI</th>
                    <th>DAMAGE</th>
                    <th>COLLECTIBLES</th>
                    <th>HEADS</th>
                    <th>OVERALL TOTAL KILOS</th>
                </thead>

                <tbody>
                    <tr>
                    <td>
                        <?php foreach ($getDelivery as $key => $value) {
                            $totalS = $value['totalSale'];
                            echo number_format($value['totalSale']);
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($getCollection as $key => $value) {
                            $totalC = $value['totalCollection'];
                            echo number_format($value['totalCollection']);
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($getCollection as $key => $value) {
                            echo number_format($value['totalRemittance']);
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($getCollection as $key => $value) {
                            echo number_format($value['totalExpenses']);
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($getBali as $key => $value) {
                            echo number_format($value['baliAmount']);
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($getCollection as $key => $value) {
                            echo number_format($value['damageAmount']);
                        } ?>
                    </td>
                    <td>
                        <!-- <?php foreach ($getCollectibles as $key => $value) {
                            echo number_format($value['totalCollectibles']);
                        } ?> -->
                        <?php echo number_format($totalS - $totalC); ?>
                    </td>
                    <td>
                        <?php foreach ($getDelivery as $key => $value) {
                            echo $inventoryHeads = number_format($value['heads']);
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($getDelivery as $key => $value) {
                            $inventoryKilos = $value['overallKilos'];
                            echo number_format($value['overallKilos']);
                        } ?>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
            <ul>
                <li>Collectibles = SALE - COLLECTIONS</li>
            </ul>
            <br>
            <hr>
            <br>

            <?php
                
                $sqlKumpradaOld = "SELECT SUM(no_pigs) as totalHeads, SUM(pig_kilo) as totalKilos FROM kumprada WHERE  date >= '$fromDate' AND date <= '$toDate'";
                $getSqlKumpradaOld = mysqli_query($link, $sqlKumpradaOld);
                $valSqlKumpradaOld = mysqli_fetch_assoc($getSqlKumpradaOld);

                $sqlKumpradaNew = "SELECT SUM(no_pigs) as newTotalHeads, SUM(pig_kilo) as newTotalKilos FROM kumprada WHERE date > '$toDate'";
                $getSqlKumpradaNew = mysqli_query($link, $sqlKumpradaNew);
                $valSqlKumpradaNew = mysqli_fetch_assoc($getSqlKumpradaNew);


                $sqlKumpradaDate = "SELECT date, farm FROM kumprada WHERE date BETWEEN '$fromDate' AND '$toDate' ";
                $getKumpradaDate = mysqli_query($link, $sqlKumpradaDate);
                $datakum = mysqli_fetch_assoc($getKumpradaDate);

                $sqlCapitalDate = "SELECT date FROM kapital";
                $getCapitalDate = mysqli_query($link, $sqlCapitalDate);
                $data = mysqli_fetch_assoc($getCapitalDate);
                
                asdasdsadsad asdas 
                asdasdsadsad
                if ( !is_null($data)) {
                    foreach ( $getKumpradaDate as $k => $kumpradaDate ) {
                        if (in_array($kumpradaDate['date'], $getCapitalDate)) {
                            var_dump('expression');
                        }
                    }
                } else {
                    $datekumprada = $datakum['date'];
                    $farmkumprada = $datakum['farm'];
                }

                //var_dump($datekumprada);
            ?>

            <ul>
                <li>Stockyards Salin = KUMPRADA - TOTAL SALE</li>
                <li>Total kilos dli eh apil ang FEEDS</li>
                <li>Ang SUBMIT mo adto na sa ADMIN sa KAPITAL mao nai mo adto sa ubos sa KAPITAL nga page <br> 
                pareha rag porma then every submit sa is 1 Transaction.</li>
            </ul>
            
            <div class="table-responsive">
            <form method="POST" action="<?php echo htmlspecialchars('../admin/capital.php'); ?>">
                <input type="hidden" name="date" value="<?php echo $datekumprada; ?>">
                <input type="hidden" name="farm" value="<?php echo $farmkumprada; ?>">
                <table class="table table-bordered">
                    <thead>
                        <td></td>
                        <td>TOTAL NO. OF HEADS</td>
                        <td>TOTAL NO. OF KILOS</td>
                    </thead>

                    <tbody>
                        <tr>
                            <td><b>STOCKYARDS SALIN</b></td>
                            <td><input type="" name="ssheads" class="form-control" value="<?php echo $valSqlKumpradaOld['totalHeads'] - $inventoryHeads; ?>"></td>
                            <td><input type="" id="t1" name="sskilos" class="form-control autoSubtract" value="<?php echo $valSqlKumpradaOld['totalKilos']; ?>"></td>
                        </tr>
                        <tr>
                            <td><b>TOTAL SALE</b></td>
                            <td><input type="" name="tsheads" class="form-control" value="<?php echo $inventoryHeads; ?>"></td>
                            <td><input type="" id="t2" name="tskilos" class="form-control autoSubtract" value="<?php echo $inventoryKilos; ?>"></td>
                        </tr>
                         <tr>
                            <td><b>SALIN</b></td>
                            <td><input type="text" name="sheads" class="form-control" value=""></td>
                            <td><input type="text" id="t3" name="skilos" class="form-control autoSubtract" value=""></td>
                        </tr>
                        <tr>
                            <td><b>SALIN FEEDS</b></td>
                            <td></td>
                            <td><input type="text" name="sfeeds" class="form-control" value=""></td>
                            
                        </tr>
                        <tr>
                            <td><b>RIP</b></td>
                            <td><input type="text" name="rip" class="form-control" value=""></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                           
                            <td>
                                <input type="text" id="total" name="total" value="<?php echo intval($valSqlKumpradaOld['totalKilos']) - $inventoryKilos; ?>">
                            </td>
                        </tr>
                        <?php if (!empty($valSqlKumpradaNew['newTotalHeads'])): ?>
                            <tr>
                                <td><b>NEW STOCK</b></td>
                                <td><?php echo $valSqlKumpradaNew['newTotalHeads']; ?></td>
                                <td><?php echo $valSqlKumpradaNew['newTotalKilos']; ?></td>
                            </tr>

                            <?php endif ?>
                            <tr>
                                <td colspan="2"></td>
                                <td ><center><button type="submit" name="inv_submit" class="btn btn-md btn-primary shadow-sm " > Submit</button></center> </td>
                            </tr>
                        
                    </tbody>
                </table>
            </form>
        </div>

            <?php endif;?>

            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
<script type="text/javascript">
    (function($) {
        'use strict';

        $('.autoSubtract').on('keyup', function(){
            var t1 = $("#t1").val(),
                t2 = $("#t2").val(),
                t3 = $("#t3").val();

            var total = t1 - t2 - t3;
            $('#total').val(total);

        });
    })(jQuery);;
</script>