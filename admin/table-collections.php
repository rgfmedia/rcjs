<?php
    
    if (isset($_POST['search'])) {
        $date = $_POST['searchDate'];
        

        $sql = "SELECT * FROM collectibles WHERE date_collected = '$date' ORDER BY id DESC";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_assoc($result);
    }
?>

<?php if (empty($data)): ?>
    
    No Records Found.
<?php else: ?>

Date of collection : <?php echo date('F d, Y' ,strtotime($date)); ?>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CUSTOMER NAME</th>
                <th>DATE OF DELIVERY</th>
                <th>NO. OF HEADS</th>
                <th>KILOS</th>
                <th>PRICE</th>
                <th>DELIVERY TOTAL</th>
                <th>COLLECTION</th>
                <th>TOTAL BALANCE</th>
                <th>DATE OF COLLECTION</th>
                <th>COLLECTOR NAME</th>
                <!-- <th>DAMAGE</th>
                <th>DAMAGE KILOS RETURNED</th> -->
            </tr>
        </thead>
        <tbody>
            <?php 
                $name1=array();
                $name3=array();
                $keyrow=array();
                $keyrow_customer=array();
                $total_balance=array();
                $total=0;
                
                $customer_name='';
                $name='';
                
                $pskey=0;
                $name2='';
                $rowspan=1;
                $tac=0;



                foreach ($result as $key => $value) { 
                    $rowspan+=$key;
                    $tac = $value['tac'];
                    //$totalCollectibles+=$value['price']*$value['total_kilo'] - $value['tac'];
                    $name1[]=$value;
                    $name3[]=$value;

                }
                foreach ($result as $key => $value) {
                    if ($name2 != $value['collector_name']) {
                        foreach ($name1 as $k => $names) {
                            if ($names['collector_name'] == $value['collector_name']) {
                                $pskey++;
                            unset($name1[$k]);
                            } else { break; }
                        }
                        $keyrow[$key] = $pskey;
                    }
                    $name2 = $value['collector_name']; $pskey = 0;
                } $name2=''; $pskey=0;
                
                foreach ($result as $key => $value) {
                    if ($name2 != $value['customer']) {
                        foreach ($name3 as $k => $names) {
                            if ($names['customer'] == $value['customer']) {
                                $pskey++;
                                $total += $names['total_kilo'] * $names['price'];
                            unset($name3[$k]);
                            } else { break; }
                        }
                        $total_balance[$key] = $total - $value['tac'];
                        $keyrow_customer[$key] = $pskey;
                    }
                    $name2 = $value['customer']; $pskey = 0; $total=0;
                }
                
                foreach ($result as $key => $value): ?>
                    
                    <tr>
                        <?php if ($customer_name != $value['customer']): ?>
                            <td rowspan="<?php echo $keyrow_customer[$key]; ?>">
                                <?php echo $value['customer']; ?>
                            </td>
                        <?php endif ?>
                        <td><?php echo $value['date_delivery']; ?></td>
                        <td><?php echo $value['number_of_heads']; ?></td>
                        <td><?php echo $value['total_kilo']; ?></td>
                        <td> <?php echo $value['price']; ?> </td>
                        <td> <?php echo number_format($value['total_kilo'] * $value['price']); ?> </td>
                        
                        <?php if ($customer_name != $value['customer']): ?>
                            <td rowspan="<?php echo $keyrow_customer[$key]; ?>">
                                <?php echo number_format($value['collections']); ?>
                            </td>
                            <td rowspan="<?php echo $keyrow_customer[$key]; ?>">
                                <?php echo number_format($total_balance[$key]); ?>
                            </td>
                            <td rowspan="<?php echo $keyrow_customer[$key]; ?>">
                                <?php echo $value['date_collected']; ?>
                            </td>
                            <td rowspan="<?php echo $keyrow_customer[$key]; ?>">
                                <?php echo $value['collector_name']; ?>
                            </td>

                        <?php endif ?>
                    </tr>
                <?php $name = $value['collector_name']; $customer_name = $value['customer']; endforeach; ?>
                    
        </tbody>
    </table>
</div>
<?php endif; ?>

