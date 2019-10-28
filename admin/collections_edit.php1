
<?php
    include '../backend/db.php';
    $key = $_GET['key'];

    $sql = "SELECT * FROM collection WHERE id = '$key'";
    $result = mysqli_query($link, $sql);
    $id='';
  // $members = $mysqli_query("SELECT * FROM `details` WHERE `sn`='$id'");
  // $mem = mysqli_fetch_assoc($members);

?>

<form class="" action="collections.php" method="post">
    <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">

    <div class="modal-body">

            
                <?php foreach ($result as $key => $value): ?>
                    <input type="hidden" name="id" value="<?php echo $id = $value['id']; ?>">
                    <input type="hidden" name="cbalidate" value="<?php echo $value['date']; ?>">
                    <input type="hidden" name="cbaliname" value="<?php echo $value['bali_name']; ?>">
                    <input type="hidden" name="cbaliamount" value="<?php echo $value['bali_amount']; ?>">
                   
                    <input type="hidden" name="ccollector" value="<?php echo $value['clctr_name']; ?>">
                    <input type="hidden" name="cdate" value="<?php echo $value['date']; ?>">
                    <input type="hidden" name="ccusname" value="<?php echo $value['cust']; ?>">

                    <div class="form-group">
                         <input class="form-control" type="text" placeholder="Name" name="clcname" value="<?php echo $value['clctr_name']; ?>" >
                    </div>
                    <div class="form-group">
                        Date of collection
                         <input class="form-control" type="date" placeholder="Enter Date" name="date" value="<?php echo $value['date']; ?>" >
                     </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Customer Name" name="cusname" value="<?php echo $value['cust']; ?>" >
                    </div>
                   <!--  <div class="form-group">
                        Date of delivery
                        <input class="form-control" type="date" name="datedelivered" value="<?php echo $value['date_delivered']; ?>" >
                    </div> -->
                    <div class="form-group">
                        <input class="form-control numberformat" type="text" placeholder="T.A.C Amount" name="tacamnt" value="<?php echo number_format($value['tac_amount']); ?>" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Check #" name="chckno" value="<?php echo $value['chck_no']; ?>" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Kind of Expenses" name="koe" value="<?php echo $value['k_o_expnses']; ?>" >
                    </div>
                    <div class="form-group">
                        <input class="form-control numberformat" type="text" placeholder="Expenses Amount" name="ea" value="<?php echo ($value['expnses_amnt']==0)?'':number_format($value['expnses_amnt']); ?>" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Damage" name="damage" value="<?php echo $value['damage']; ?>" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Damage Kilos" name="damagekg" value="<?php echo ($value['dmg_kg']==0)?'':$value['dmg_kg']; ?>" >
                    </div>
                    <div class="form-group">
                        <input class="form-control numberformat" type="text" placeholder="Damage Amount" name="damamount" value="<?php echo ($value['dmg_amount']==0)?'':number_format($value['dmg_amount']); ?>" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Bali Name" name="baliname" value="<?php echo $value['bali_name']; ?>" >
                    </div>
                    <div class="form-group">
                        <input class="form-control numberformat" type="text" placeholder="Bali Amount" name="baliamnt" value="<?php echo ($value['bali_amount']==0)?'':number_format($value['bali_amount']); ?>" > 
                    </div>
                
            
                <?php endforeach; ?>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary btn-sm btn-icon-split" name="update">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>
                <span class="text">Update</span>
            </button>
            <button class="btn btn-danger btn-sm btn-icon-split" name="delete" onclick="return confirm('Are you sure you want to delete?');">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Delete</span>
            </button>
       <!--  <input type="submit" class="btn btn-success" name="update" value="Update">
        <button type="sumit" class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete?');">
            Delete
        </button> -->
    </div>
</form>
<script type="text/javascript" src="../js/addCommas.js"></script>