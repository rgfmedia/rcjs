<?php
    //date_default_timezone_set('Asia/Manila');
    //$date = date('Y-m-d');
    if (isset($_GET['sdate'])) {
        $getDate = $_GET['txtdate'];
        $sql = "SELECT * FROM sumada WHERE date = '$getDate'";
    } else {
        $sql = "SELECT * FROM sumada WHERE date = '$date'";
    }
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
                <th>KIND</th>
                <th>SACKS</th>
                <th>NO. OF PIGS</th>
                <th>KILOS</th>
                <th>TOTAL</th>
                <th>INCOME</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $keyloop=1;
                $total=0;
                foreach ($result as $key => $value){ $keyloop += $key; 
                    if ($key == 0) { $total=$value['expenses']; }
                    else { $total -= $value['expenses'];}
                }
                // foreach ($allTotal as $key => $value) { $total += $value; }
                
                foreach ($result as $key => $value):
            ?>
                <tr>
                    <td><?php echo date('m/d/Y' ,strtotime($value['date'])); ?></td>
                    <td><?php echo $value['kind']; ?></td>
                    <td><?php echo $value['sacks']; ?></td>
                    <td><?php echo ($value['no_pigs']==0)?'':$value['no_pigs']; ?></td>
                    <td><?php echo ($value['kilos']==0)?'':$value['kilos']; ?></td>
                    <td><?php echo '&#x20b1; '. number_format($value['expenses'],2); ?></td>
                    <?php if ($key == 0): ?>
                        <td rowspan="<?php echo $keyloop; ?>">
                            <?php echo '&#x20b1; '. number_format($total,2); ?>
                        </td>
                    <?php endif; ?>
                    <td>
                        <center>
                            <button class="btn btn-primary btn-sm" data-namekey="<?php  echo $value['id']; ?>" data-toggle="modal" data-target="#sumadaModalEdit">
                                <span class="icon ">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </button>
                        </center>
                    </td>

                </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

