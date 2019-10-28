<?php include_once('header.php'); ?>
<?php
    if (isset($_GET['keyname'])) {
        $title = $_GET['keyname'];
        
        $sqlDelivery = "SELECT * FROM delivery";
        $sqlCollection = "SELECT * FROM collection";
        $sqlBali = "SELECT * FROM bali";

        $deliveryData = mysqli_query($link, $sqlDelivery);
        $collectionData = mysqli_query($link, $sqlCollection);
        $baliData = mysqli_query($link, $sqlBali);
    }
?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> All <?php echo isset($_GET['keyname'])?$title:'';?> Records</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>

        <div class="card-body">
            <div class="table-responsive">

            <?php if ($title=='Delivery'): ?>
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
                        <?php foreach ($deliveryData as $value) : ?>
                            <tr>
                                <td><?php echo date('F d, Y' ,strtotime($value['Date'])); ?></td>
                                <td><?php echo $value['Name']; ?></td>
                                <td><?php echo $value['Mark_No']; ?></td>
                                <td><?php echo $value['Num_Heads']; ?></td>
                                <td><?php echo $value['Kg']; ?></td>
                                <td><?php echo $value['Price']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($title=='Collection'): ?>
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
                        <?php foreach ($collectionData as $value) : ?>
                            <tr>
                                <td><?php echo $value['clctr_name']; ?></td>
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
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>AMOUNT</th>
                            <th>DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($baliData as $value) : ?>
                            <tr>
                                <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?>><?php echo $value['name']; ?></td>
                                <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?>><?php echo $value['amount']; ?></td>
                                <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?>><?php echo date('F d, Y' ,strtotime($value['date'])); ?></td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif ?>

        </div>
</div>

        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>