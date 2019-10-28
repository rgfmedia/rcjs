<?php

    if (isset($_GET['date'])) {
        $getDate = $_GET['date'];
        $sql = "SELECT * FROM kumprada WHERE date = '$getDate' ORDER BY id DESC";
    } else {
        $sql = "SELECT * FROM kumprada WHERE date = '$date' ORDER BY id DESC";
    }

$result = mysqli_query($link, $sql) or die('Error querying database.');
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
                <th>DRIVER</th>
                <th>FARM</th>
                <th>NO. OF PIGS</th>
                <th>KILOS</th>
                <th>PRICE</th>
                <th>TOTAL</th>
                <th>OVERALL TOTAL</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $keyloop=1;
                $total=0;
                $pskey=0;
                $name='';
                $name2='';
                $name1 = array();
                $overalltotal = array();
                $totalamount=0;
                $keyrow = array();
                foreach ($result as $key => $value) { 
                    $name1[]=$value;
                    $keyloop += $key; 
                    //$total+= $value['kilos'] * $value['price']; 
                }
                foreach ($result as $key => $value) {
                        if ($name2 != $value['driver']) {
                            foreach ($name1 as $k => $names) {
                                if ($names['driver'] == $value['driver']) {
                                    $pskey++;
                                    $totalamount += $names['price'] * $names['kilos'];
                                    unset($name1[$k]);
                                } else { break; }
                            }

                            $overalltotal[$key] = $totalamount;
                            $keyrow[$key] = $pskey;

                        }
                        $name2 = $value['driver']; $pskey = 0; $totalamount=0;
                    }

                foreach ($result as $key => $value):
            ?>  
                <tr>
                    <?php if ($name != $value['driver']): ?>
                    <td rowspan="<?php echo $keyrow[$key]; ?>">
                        <?php echo date('F d, Y' ,strtotime($value['date'])); ?>
                    </td>
                    <td rowspan="<?php echo $keyrow[$key]; ?>"  >
                        <?php echo $value['driver']; ?>
                    </td>
                    <?php endif; ?>
                    <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?> ><?php echo $value['farm']; ?></td>
                    <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?> ><?php echo ($value['no_pigs'] == 0) ? '': $value['no_pigs']; ?></td>
                    <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?> ><?php echo number_format($value['kilos'],2); ?></td>
                    <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?> ><?php echo '&#x20b1; '. number_format($value['price'],2); ?></td>
                    <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?> ><?php echo '&#x20b1; '. number_format($value['kilos'] * $value['price'],2); ?></td>
                    <?php if ($name != $value['driver']): ?>
                        <td rowspan="<?php echo $keyrow[$key]; ?>">
                            <?php echo '&#x20b1; '. number_format($overalltotal[$key],2); ?>
                        </td>
                    <?php endif; ?>
                    <td>
                        <center>
                            <button class="btn btn-primary btn-sm" data-namekey="<?php  echo $value['id']; ?>" data-toggle="modal" data-target="#kumpradaModalEdit">
                                <span class="icon ">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </button>
                        </center>
                    </td>

                </tr>
            <?php
                $name=$value['driver']; 
                endforeach;
            ?>
        </tbody>
    </table>
</div>
<?php endif; ?>