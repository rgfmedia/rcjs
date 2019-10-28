<?php
    //date_default_timezone_set('Asia/Manila');
    //$date = date('Y-m-d');
    if (isset($_GET['date'])) {
        $getDate = $_GET['date'];
        $sql = "SELECT * FROM expenses WHERE date = '$getDate'";
    } else {
        $sql = "SELECT * FROM expenses WHERE date = '$date'";
    }
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($result);

?>
<?php if (empty($data)): ?>
    <br>
    No Records Found.
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>KIND OF EXPENSES</th>
                    <th>SACKS</th>
                    <th>Expenses</th>
                    <th>TOTAL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $keyloop=1;
                    $total=0;
                    foreach ($result as $key => $value){ $keyloop += $key; $total+=$value['expenses']; }
                    // foreach ($allTotal as $key => $value) { $total += $value; }
                    foreach ($result as $key => $value):
                ?>
                    <tr>
                        <td><?php echo date('F d, Y' ,strtotime($value['date'])); ?></td>
                        <td><?php echo $value['kexpenses']; ?></td>
                        <td><?php echo ($value['sacks'] == 0) ? '': $value['sacks']; ?></td>
                        <td><?php echo '&#x20b1; '. number_format($value['expenses'],2); ?></td>
                        <?php if ($key == 0): ?>
                            <td rowspan="<?php echo $keyloop; ?>">
                                <?php echo '&#x20b1; '. number_format($total,2); ?>
                            </td>
                        <?php endif; ?>
                        <td>
                            <center>
                                <button class="btn btn-primary btn-sm" data-namekey="<?php  echo $value['id']; ?>" data-toggle="modal" data-target="#expensesModalEdit">
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