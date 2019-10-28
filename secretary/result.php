<?php include_once('header.php'); ?>
<?php
    if (isset($_POST['searchname'])) {
        $name = $_POST['names'];
        $sqlDelivery = "SELECT * FROM delivery WHERE Name='$name' ORDER BY D_ID DESC";
        $sqlCollection = "SELECT * FROM collection WHERE clctr_name='$name' OR bali_name='$name' ORDER BY id DESC";
        $sqlBali = "SELECT * FROM bali WHERE name='$name' ORDER BY id DESC";

        $deliveryData = mysqli_query($link, $sqlDelivery);
        $collectionData = mysqli_query($link, $sqlCollection);
        $baliData = mysqli_query($link, $sqlBali);
    }
?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Records for delivery, collections and bali</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        <div class="card-body">

            <div class="table-responsive">
                <!-- TABLE DELIVERY -->
                <?php if (mysqli_fetch_assoc($deliveryData)): ?>
                    <b><?php echo $name; ?></b> in Delivery<br><br>
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Mark #</th>
                                <th>NO. OF HEADS</th>
                                <th>KILOS</th>
                                <th>PRICE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $rowto1=0;
                                foreach ($deliveryData as $key => $value){ $rowto1 = $key+1; }
                                
                                foreach ($deliveryData as $key => $value) : 
                            ?>
                                <tr>
                                    <td><?php echo date('F d, Y' ,strtotime($value['Date'])); ?></td>
                                    <?php if ($key==0): ?>
                                        <td rowspan="<?php echo $rowto1;?>"><?php echo $value['Name']; ?></td>    
                                    <?php endif; ?>
                                    <td><?php echo $value['Mark_No']; ?></td>
                                    <td><?php echo $value['Num_Heads']; ?></td>
                                    <td><?php echo $value['Kg']; ?></td>
                                    <td><?php echo $value['Price']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="divider"></div>
                    No <b><?php echo $name; ?></b> Found in Delivery. <br>
                    
                <?php endif ?>

                <!-- TABLE COLLECTIONS -->
                <?php if (mysqli_fetch_assoc($collectionData)): ?>
                    <div class="divider"></div>
                    <b><?php echo $name; ?></b> in Collections<br><br>
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>COLLECTOR NAME</th>
                                <th>DATE COLLECTED</th>
                                <th>CUSTOMER</th>
                                <th>TAC AMOUNT</th>
                                <th>CHECK #</th>
                                <th>KIND OF EXPENSES</th>
                                <th>EXPENSES AMOUNT</th>
                                <th>DAMAGE NAME</th>
                                <th>DAMAGE KILO</th>
                                <th>DAMAGE AMOUNT</th>
                                <th>BALI NAME</th>
                                <th>BALI AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $rowto1=0;
                                foreach ($deliveryData as $key => $value){ $rowto1 = $key+1; }
                                foreach ($collectionData as $key => $value) : 
                            ?>
                                <tr>
                                    <?php if ($key == 0): ?>
                                        <td rowspan="<?php echo $rowto1; ?>"><?php echo $value['clctr_name']; ?></td>    
                                    <?php endif ?>
                                    
                                    <td><?php echo date('F d, Y' ,strtotime($value['date'])); ?></td>
                                    <td><?php echo $value['cust']; ?></td>
                                    <td><?php echo $value['tac_amount']; ?></td>
                                    <td><?php echo $value['chck_no']; ?></td>
                                    <td><?php echo $value['k_o_expnses']; ?></td>
                                    <td><?php echo $value['expnses_amnt']; ?></td>
                                    <td><?php echo $value['damage']; ?></td>
                                    <td><?php echo $value['dmg_kg']; ?></td>
                                    <td><?php echo $value['dmg_amount']; ?></td>
                                    <td><?php echo $value['bali_name']; ?></td>
                                    <td><?php echo $value['bali_amount']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="divider"></div>
                    No <b><?php echo $name; ?></b> Found in Collection. <br>
                    
                <?php endif ?>

                <?php if (mysqli_fetch_assoc($baliData)): ?>
                    <div class="divider"></div>
                    <b><?php echo $name; ?></b> in Bali<br><br>
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>AMOUNT</th>
                                <th>DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $rowto1=0;
                                foreach ($deliveryData as $key => $value){ $rowto1 = $key+1; }
                                foreach ($baliData as $key =>  $value) : 
                            ?>
                                <tr>
                                    <?php if ($key==0): ?>
                                        <td rowspan="<?php echo $rowto1; ?>"><?php echo $value['name']; ?></td>    
                                    <?php endif ?>
                                    <td><?php echo $value['amount']; ?></td>
                                    <td><?php echo date('F d, Y' ,strtotime($value['date'])); ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="divider"></div>
                    No <b><?php echo $name; ?></b> Found in Bali. <br>
                <?php endif ?>

            </div>



        </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>