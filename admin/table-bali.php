<?php

    $sql = "SELECT * FROM bali ORDER BY id DESC";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($result);

?>
<?php if (empty($data)): ?>
    
    No Records Found.
<?php else: ?>

    <div class="table-responsive">
        <table class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                
                <?php foreach ($result as $key => $value): ?>
                    <tr>
                        
                        <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?>>
                            <?php echo $value['name']; ?>
                        </td>    
                        

                        <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?>> <?php echo '&#x20b1; '. number_format($value['amount'],2); ?> </td>
                        <td <?php echo ($value['is_paid']==0)?'style=background:#ff000096;color:#ffff':'style=background:#0080008a;color:#ffff'; ?>> <?php echo date('F d, Y' ,strtotime($value['date'])); ?> </td>
                        <td>
                            <center>
                                <button class="btn btn-primary btn-sm" data-namekey="<?php  echo $value['id']; ?>" data-toggle="modal" data-target="#baliModalEdit">
                                    <span class="icon ">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </button>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>        
    </div>
    <br><hr><br>
    <div class="table-responsive">
        <table class="table text-center table-bordered dataTable">
            <thead>
                <th>Name</th>
                <th>Salary</th>
                <th>Total Bali</th>
                <th>Remaining Balance</th>
            </thead>
            <tbody>
                
                <?php
                    
                    $name='';
                    $totalAmount=0;
                    $storedAmount=array();
                    $storedName=array();
                    $cloneBali=array();
                    $salary=array();

                    $sqlBali = "SELECT * FROM bali ORDER BY name ASC";
                    $baliResult = mysqli_query($link, $sqlBali);
                    $sqlSalary = "SELECT * FROM employee";
                    $salaryResult = mysqli_query($link, $sqlSalary);

                    foreach ($salaryResult as $value) {
                        $valueDate = new DateTime($value['date']);
                        $valueDate = $valueDate->format('F');
                        if ($valueDate == $realDate) {
                            if ($name != $value['name']) {
                                $salary[$value['name']] = $value['salary'];
                            }
                            $name = $value['name'];
                        }
                    }
                    
                    foreach ($baliResult as $key => $value) {$cloneBali[]=$value;}
                    
                    foreach ($baliResult as $key => $value) {
                        $valueDate = new DateTime($value['date']);
                        $valueDate = $valueDate->format('F');
                        if ($valueDate == $realDate) {
                            
                            if ($name != $value['name']) {

                                foreach ($cloneBali as $names) {
                                    $valueDate = new DateTime($names['date']);
                                    $valueDate = $valueDate->format('F');
                                    if ($valueDate == $realDate) {
                                        if ($names['name'] == $value['name']) {
                                            $totalAmount+=$names['amount'];
                                        }
                                    }
                                }
                                $storedName[$key]=$value['name'];
                                $storedAmount[$key]=$totalAmount;
                            }
                            $name = $value['name']; $totalAmount=0;
                        }
                    }$name='';

                    foreach ($storedName as $key => $value):
                ?>

                    <tr>
                        <td><?php echo $value; ?></td>
                        <td>
                            <?php
                                $damount=0;
                                foreach ($salary as $daName => $getAmount) {
                                    if ($daName == $value) {
                                        echo '&#x20b1; '. number_format($damount = $getAmount);
                                    } 
                                }
                                if ($damount==0) {
                                    echo '&#x20b1; 0';
                                }
                            ?>
                        </td>
                        <td><?php echo '&#x20b1; '. number_format($storedAmount[$key]); ?></td>
                        <td>
                            <?php echo '&#x20b1; '. number_format($damount-$storedAmount[$key]); ?>
                        </td>
                        
                        
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif;?>
