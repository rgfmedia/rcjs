<?php
    //date_default_timezone_set('Asia/Manila');
    //$date = date('Y-m-d');
    if (isset($_GET['date'])) {
        $getDate = $_GET['date'];
        $sql = "SELECT * FROM kapital ORDER BY id DESC";
    } else {
        $sql = "SELECT * FROM kapital ORDER BY id DESC";
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
                <th>KIND</th>
                <th>FARM</th>
                <th>SACKS</th>
                <th>NO. OF PIGS</th>
                <th>KILOS</th>
                <th>SUBTOTAL</th>
                <th>TOTAL</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $keyloop=1;
                $total=0;
                foreach ($result as $key => $value){ $keyloop += $key; $total+=$value['total']; }
                // foreach ($allTotal as $key => $value) { $total += $value; }
                foreach ($result as $key => $value):
            ?>
                <tr>
                    <td><?php echo $value['kind']; ?></td>
                    <td><?php echo $value['farm']; ?></td>
                    <td><?php echo ($value['sacks'] == 0) ? '': $value['sacks']; ?></td>
                    <td><?php echo ($value['no_pigs'] == 0) ? '': $value['no_pigs']; ?></td>
                    <td><?php echo ($value['kilos'] == 0) ? '': $value['kilos']; ?></td>
                    <td><?php echo number_format($value['total']); ?></td>
                    <?php if ($key == 0): ?>
                        <td rowspan="<?php echo $keyloop; ?>">
                            <?php echo number_format($total); ?>
                        </td>

                    <?php endif; ?>
                    <td>
                        
                        <center>
                                <button class="btn btn-primary btn-sm" data-namekey="<?php  echo $value['id']; ?>" data-toggle="modal" data-target="#kapitalModalEdit">
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
</div>
<?php endif;?>