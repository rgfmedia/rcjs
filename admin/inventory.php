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
                            echo number_format($value['totalSale']);
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($getCollection as $key => $value) {
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
                        <?php foreach ($getCollectibles as $key => $value) {
                            echo number_format($value['totalCollectibles']);
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($getDelivery as $key => $value) {
                            echo $inventoryHeads = number_format($value['heads']);
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($getDelivery as $key => $value) {
                            echo $inventoryKilos = number_format($value['overallKilos']);
                        } ?>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
            <br>
            <hr>
            <br>

            <?php
                
                $sqlKumpradaOld = "SELECT SUM(no_pigs) as totalHeads, SUM(kilos) as totalKilos FROM kumprada WHERE  date >= '$fromDate' AND date <= '$toDate'";
                $getSqlKumpradaOld = mysqli_query($link, $sqlKumpradaOld);
                $valSqlKumpradaOld = mysqli_fetch_assoc($getSqlKumpradaOld);

                $sqlKumpradaNew = "SELECT SUM(no_pigs) as newTotalHeads, SUM(kilos) as newTotalKilos FROM kumprada WHERE date > '$toDate'";
                $getSqlKumpradaNew = mysqli_query($link, $sqlKumpradaNew);
                $valSqlKumpradaNew = mysqli_fetch_assoc($getSqlKumpradaNew);

                
            ?>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <td></td>
                    <td>TOTAL NO. OF HEADS</td>
                    <td>TOTAL NO. OF KILOS</td>
                </thead>

                <tbody>
                    <tr>
                        <td><b>STOCKYARDS SALIN</b></td>
                        <td><?php echo $valSqlKumpradaOld['totalHeads']; ?></td>
                        <td><?php echo $valSqlKumpradaOld['totalKilos']; ?></td>
                    </tr>
                    <tr>
                        <td><b>TOTAL SALE</b></td>
                        <td><?php echo $inventoryHeads; ?></td>
                        <td><?php echo $inventoryKilos; ?></td>
                    </tr>
                    <?php if (!empty($valSqlKumpradaNew['newTotalHeads'])): ?>
                        <tr>
                            <td><b>NEW STOCK</b></td>
                            <td><?php echo $valSqlKumpradaNew['newTotalHeads']; ?></td>
                            <td><?php echo $valSqlKumpradaNew['newTotalKilos']; ?></td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
</div>

            <?php endif;?>




            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
