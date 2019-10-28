<?php
    
    if (isset($_GET['date'])) {
        $getDate = $_GET['date'];
        $sql = "SELECT * FROM pig_stocks WHERE date = '$getDate' ORDER BY driver DESC";
    } else {
        $sql = "SELECT * FROM pig_stocks WHERE date = '$date' ORDER BY driver DESC";
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
                <th>DRIVER</th>
                <th>KIND</th>
                <th>NO. OF HEADS</th>
                <th>KILOS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $pskey=0;
                $name='';
                $name1 = array();
                $keyrow = array();
                $name2 = '';
                foreach ($result as $key => $value){ $name1[]=$value; }
                foreach ($result as $key => $value) {
                    if ($name2 != $value['driver']) {
                        foreach ($name1 as $names) {
                            if ($names['driver'] == $value['driver']) { $pskey++; }
                        }
                        $keyrow[$value['driver']] = $pskey;
                    }
                    $name2 = $value['driver']; $pskey = 0;
                }
                foreach ($result as $key => $value):
            ?>
                <tr>
                    <?php if ($name != $value['driver']): ?>
                        <td rowspan="<?php echo $keyrow[$value['driver']]; ?>">
                            <?php echo date('F d, Y' ,strtotime($value['date'])); ?>
                        </td>
                        <td rowspan="<?php echo $keyrow[$value['driver']]; ?>">
                            <?php echo $value['driver']; ?>
                        </td>
                    <?php endif ?>

                    <td> <?php echo $value['kind']; ?> </td>
                    <td> <?php echo ($value['no_heads'] == 0) ? '': $value['no_heads']; ?> </td>
                    <td> <?php echo ($value['kilos'] == 0) ? '': number_format($value['kilos']); ?> </td>
                    <td>
                        <center>
                            <button class="btn btn-primary btn-sm" data-namekey="<?php  echo $value['id']; ?>" data-toggle="modal" data-target="#stocksModalEdit">
                                <span class="icon ">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </button>
                        </center>
                    </td>
                </tr>

            <?php
               $name=$value['driver']; endforeach;
            ?>
        </tbody>
    </table>
</div>
<?php endif; ?>