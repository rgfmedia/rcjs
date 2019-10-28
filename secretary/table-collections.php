<?php
    if (isset($_GET['date'])) {
        $getDate = $_GET['date'];
        $sql = "SELECT * FROM collection WHERE Date = '$getDate' ORDER BY id DESC";
    } else {
        $sql = "SELECT * FROM collection WHERE Date = '$date' ORDER BY id DESC";
    }
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($result);

?>
<?php if (empty($data)): ?>
    
    No Records Found.
<?php else: ?>


    <table class="table table-responsive table-bordered" >
        <thead>
            <tr>
                <th>COLLECTOR NAME</th>
                <th>DATE</th>
                <th>CUSTOMER NAME</th>
                <th>COLLECTIONS</th>
                <th>TOTAL AMOUNT OF COLLECTIONS</th>
                <th>CHECK NO.</th>
                <th>KIND OF EXPENSES</th>
                <th>EXPENSES AMOUNT</th>
                <th>TOTAL AMOUNT OF EXPENSES</th>
                <th>DAMAGE</th>
                <th>DAMAGE K/s</th>
                <th>DAMAGE AMOUNT</th>
                <th>TOTAL AMOUNT OF DAMAGE</th>
                <th>BALI NAME</th>
                <th>BALI AMOUNT</th>
                <th>TOTAL AMOUNT OF BALI</th>
                <th>TOTAL REMITTANCE</th>
                <th>ALL TOTAL REMITTANCE</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $name='';
                $name2='';
                $keyloop=1;
                $pskey=0;
                $keyrow=array();
                $name1=array();
                
                $totalHExp=array();
                $totalHDam=array();
                $totalHBal=array();
                $totalRem=array();
                $totalTAC=0;
                $totalExp=0;
                $totalDam=0;
                $totalBal=0;
                $allTotalRem=0;
                
                foreach ($result as $key => $value){ $name1[]=$value; $keyloop += $key; }
                

            // $increment=0;
            
            // foreach ($result as $key => $value) {
            //     if ($name2 != $value['clctr_name']) {
                    
            //         foreach ($name1 as $z => $values) {
                        
            //             if ($values['clctr_name'] == $value['clctr_name']) {
            //                 $increment++;
            //                 unset($name1[$z]);
            //             } else {
            //                 break;
            //             }

            //         }
            //         $keyrow[$key]=$increment;
            //     }
            //     $increment=0;

            //     $name2 = $value['clctr_name'];
            // }

                $TAC=0; $EXP=0; $DAM=0; $BAL=0;
                foreach ($result as $key => $value) {
                    if ($name2 != $value['clctr_name']) {
                        foreach ($name1 as $k => $names) {
                            if ($names['clctr_name'] == $value['clctr_name']) {
                                $pskey++;
                                $totalTAC += $names['tac_amount'];
                                $totalExp += $names['expnses_amnt'];
                                $totalDam += $names['dmg_amount'];
                                $totalBal += $names['bali_amount'];

                                unset($name1[$k]);
                            } else { break; }
                        }
                        $TAC += $totalTAC; $EXP += $totalExp; $DAM += $totalDam; $BAL += $totalBal;

                        $keyrow[$key] = $pskey;
                        $totalRem[$key] = $totalTAC - ($totalExp + $totalDam+$totalBal);
                        $allTotalRem += $totalRem[$key];
                    }
                    $name2 = $value['clctr_name'];  $pskey = 0; $totalTAC=0; $totalExp=0; $totalDam=0; $totalBal=0;
                }
                
                foreach ($result as $key => $value):
            ?>
                <tr>
                    <?php if ($name != $value['clctr_name']): ?>
                        <td rowspan="<?php echo $keyrow[$key]; ?>">
                            <?php echo $value['clctr_name']; ?>     
                        </td>
                    <?php endif; ?>

                    <td><?php echo date('m/d/Y' ,strtotime($value['date'])); ?></td>
                    <td><?php echo $value['cust']; ?></td>
                    <td><?php echo ($value['tac_amount'] == 0) ? '':'&#x20b1; '. number_format($value['tac_amount']); ?></td>
                    
                    <?php if ($key == 0): ?>
                        <td rowspan="<?php echo $keyloop; ?>">
                            <?php echo '&#x20b1; '. number_format($TAC); ?>
                                
                        </td>
                    <?php endif; ?>

                    
                    <td><?php echo $value['chck_no']; ?></td>
                    <td><?php echo $value['k_o_expnses']; ?></td>

                    <td><?php echo ($value['expnses_amnt'] == 0) ? '':'&#x20b1; '. number_format($value['expnses_amnt']); ?></td>
                    
                    <?php if ($key == 0): ?>
                        <td rowspan="<?php echo $keyloop; ?>">
                            <?php echo '&#x20b1; '. number_format($EXP); ?>
                                
                        </td>
                    <?php endif; ?>                    

                    <td><?php echo $value['damage']; ?></td>
                    <td><?php echo ($value['dmg_kg'] == 0) ? '':$value['dmg_kg']; ?></td>
                    <td><?php echo ($value['dmg_amount'] == 0) ? '':'&#x20b1; '. number_format($value['dmg_amount']); ?></td>
                    
                    
                    <?php if ($key == 0): ?>
                        <td rowspan="<?php echo $keyloop; ?>">
                            <?php echo '&#x20b1; '. number_format($DAM); ?>
                                
                        </td>
                    <?php endif; ?>

                    <td><?php echo $value['bali_name']; ?></td>
                    <td><?php echo ($value['bali_amount'] == 0) ? '':'&#x20b1; '. number_format($value['bali_amount']); ?></td>
                    
                    
                    <?php if ($key == 0 ): ?>
                        <td rowspan="<?php echo $keyloop; ?>">
                            <?php echo '&#x20b1; '. number_format($BAL); ?>
                                
                        </td>
                    <?php endif; ?>
                    
                    <?php if ($name != $value['clctr_name']): ?>
                        <td rowspan="<?php echo $keyrow[$key]; ?>">
                            <?php echo '&#x20b1; '. number_format($totalRem[$key]); ?>     
                        </td>
                    <?php endif; ?>

                    <?php if ($key == 0): ?>
                        <td rowspan="<?php echo $keyloop; ?>">
                            <?php echo '&#x20b1; '. number_format($allTotalRem); ?>
                        </td>    
                    <?php endif ?>
                    

                    <td>
                        <center>
                            <button class="btn btn-primary btn-sm" data-namekey="<?php  echo $value['id']; ?>" data-toggle="modal" data-target="#collectionsModalEdit">
                                <span class="icon ">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </button>
                        </center>
                    </td>

                </tr>
            <?php
                $name = $value['clctr_name']; endforeach;
            ?>

        </tbody>
    </table>

<?php endif;?>