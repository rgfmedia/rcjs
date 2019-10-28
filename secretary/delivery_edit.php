<?php
    include '../backend/db.php';
    $key = $_GET['key'];

    $sql = "SELECT * FROM delivery WHERE D_ID = '$key'";
    $result = mysqli_query($link, $sql);
    
  // $members = $mysqli_query("SELECT * FROM `details` WHERE `sn`='$id'");
  // $mem = mysqli_fetch_assoc($members);

?>

<form class="" action="delivery.php" method="post">
    <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
        <div class="modal-body">
            <?php foreach ($result as $key => $value): ?>
                <input type="hidden" name="id" value="<?php echo $id = $value['D_ID']; ?>">
                
                <div class="form-group">
                    <input class="form-control" type="date" placeholder="Enter Date" name="date" value="<?php echo $value['Date']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Name" name="name" value="<?php echo $value['Name']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Mark #" name="mark" value="<?php echo $value['Mark_No']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Number of Heads" name="numheads" value="<?php echo $value['Num_Heads']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Kilos" name="kilo" value="<?php echo $value['Kg']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control numberformat" type="text" placeholder="Price" name="price" value="<?php echo number_format($value['Price']); ?>" >
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
        </div>
    </form>
</div>
<script type="text/javascript" src="../js/addCommas.js"></script>