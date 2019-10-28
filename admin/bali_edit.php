<?php
    include '../backend/db.php';
    $key = $_GET['key'];

    $sql = "SELECT * FROM bali WHERE id = '$key'";
    $result = mysqli_query($link, $sql);
    
  // $members = $mysqli_query("SELECT * FROM `details` WHERE `sn`='$id'");
  // $mem = mysqli_fetch_assoc($members);

?>


<form class="" action="bali.php" method="post">
    <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
        <div class="modal-body">
            <?php foreach ($result as $key => $value): ?>
                <input type="hidden" name="id" value="<?php echo $id = $value['id']; ?>">
                <input type="hidden" name="is_paid" value="<?php echo $is_paid = $value['is_paid']; ?>">
                
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Name" name="name" value="<?php echo $value['name']; ?>" >
                </div>
                <div class="form-group">
                    <input  type="text" class="form-control numberformat" placeholder="Amount" name="amount" value="<?php echo number_format($value['amount']); ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" placeholder="Enter Date" name="date" value="<?php echo $value['date']; ?>" >
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
            <button class="btn btn-warning btn-sm btn-icon-split" name="updateBool">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>
                <span class="text"><?php echo ($is_paid==0)?'Update to green':'Update to red'; ?></span>
            </button>

        </div>
    </form>
</div>
<script type="text/javascript" src="../js/addCommas.js"></script>