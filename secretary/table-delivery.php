<?php
    if (isset($_GET['date'])) {
        $getDate = $_GET['date'];
        $sql = "SELECT * FROM delivery WHERE Date = '$getDate' order by D_ID desc ";
    } else { $sql = "SELECT * FROM delivery WHERE Date = '$date' order by D_ID desc  "; }

    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($result);
?>
<?php if (empty($data)): ?>
   
    No Records Found.
<?php else: ?>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>DATE</th>
                <th>CUSTOMER</th>
                <th>MARK #</th>
                <th>NO. OF HEADS</th>
                <th>TOTAL NO. OF HEADS</th>
                <th>KILOS</th>
                <th>TOTAL KILOS</th>
                <th>OVERALL TOTAL KILOS</th>
                <th>PRICE</th>
                <th>TOTAL</th>
                <th>TOTAL AMOUNT OF SALE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total = 0;
                $totalkg=0; //partial total para sa kilogram
                $name=''; //para sa conditional sa table
                $totalkilogram = array();
                $name1=array(); //array storage para sa foreach condition
                $name2=''; //temporay variable para condition inside sa foreach
                $pskey=0; //key increment para sa rowspan
                $keyrow=array(); //storage para sa pskey
                $rowto1=0; //para sa total
                $totalheads=0;
                $overallkilos=0;
                foreach ($result as $key => $value){ $name1[]=$value; $rowto1 = $key+1; }
                foreach ($result as $key => $value) {
                    if ($name2 != $value['Name']) {
                        foreach ($name1 as $k => $names) {                                                    // code...
                            if ($names['Name'] == $value['Name']) {
                                $pskey++; $totalkg += $names['Kg'];
                                //$totalheads += $names['Num_Heads'];
                                $overallkilos += $names['Kg'];
                                unset($name1[$k]);
                            } else {
                                break;
                            }
                        }

                        $keyrow[$key] = $pskey;
                        $totalkilogram[$key] = $totalkg;
                        $total += $totalkg * $value['Price'];
                    }
                    $name2 = $value['Name']; $pskey = 0; $totalkg=0;
                }
                foreach ($result as $key => $value):
            ?>
                <tr>
                    <?php if ($name != $value['Name']): ?>
                        <td rowspan="<?php echo $keyrow[$key]; ?>">
                            <?php echo date('m/d/Y' ,strtotime($value['Date'])); ?>
                        </td>
                        <td rowspan="<?php echo $keyrow[$key]; ?>">
                            <?php echo $value['Name']; ?>
                        </td>
                    <?php endif; ?>

                    <td><?php echo $value['Mark_No']; ?></td>
                    <td><?php echo ($value['Num_Heads']==0)?'':$value['Num_Heads']; ?></td>

                    <?php if ($key == 0): ?>
                        <td rowspan="<?php echo $rowto1; ?>">
                            <?php echo number_format($rowto1); ?>
                        </td>
                    <?php endif ?>
                    

                    <td><?php echo ($value['Kg']==0)?'':$value['Kg']; ?></td>

                    <?php if ($name != $value['Name']): ?>
                        <td rowspan="<?php echo $keyrow[$key]; ?>">
                            <?php echo ($totalkilogram[$key]==0)?'':$totalkilogram[$key]; ?>
                        </td>
                    <?php endif; ?>

                    <?php if ($key == 0): ?>
                        <td rowspan="<?php echo $rowto1; ?>">
                            <?php echo ($overallkilos==0)?'':$overallkilos; ?>
                        </td>
                    <?php endif; ?>

                    <?php if ($name != $value['Name']): ?>
                        <td rowspan="<?php echo $keyrow[$key]; ?>">
                            <?php echo '&#x20b1; '. number_format($value['Price']); ?>
                        </td>
                        <td rowspan="<?php echo $keyrow[$key]; ?>">
                            <?php echo '&#x20b1;'. number_format($totalkilogram[$key] * $value['Price']); ?>
                        </td>
                    <?php endif; ?>
                    <?php if ($key == 0): ?>
                        <td rowspan="<?php echo $rowto1; ?>">
                            <?php echo '&#x20b1; '. number_format($total); ?>
                        </td>
                    <?php endif; ?>

                    
                        <td>
                            <center>
                                <button class="btn btn-primary btn-sm" data-namekey="<?php  echo $value['D_ID']; ?>" data-toggle="modal" data-target="#deliveryModalEdit">
                                    <span class="icon ">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </button>
                            </center>
                        </td>
                    
                </tr>
            <?php  $name=$value['Name']; endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</div>
