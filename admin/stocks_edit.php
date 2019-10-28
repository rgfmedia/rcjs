<?php
    include '../backend/db.php';
    $key = $_GET['key'];

    $sql = "SELECT * FROM pig_stocks WHERE id = '$key'";
    $result = mysqli_query($link, $sql);


?>
 
<form class="" action="stocks.php" method="post">
    <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
        <div class="modal-body">
            <?php foreach ($result as $key => $value): ?>
                <input type="hidden" name="id" value="<?php echo $id = $value['id']; ?>">
                
                <div class="form-group">
                    <input class="form-control" type="date" placeholder="Date" name="date" value="<?php echo $value['date']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Name" name="driver" value="<?php echo $value['driver']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Kind" name="kind" value="<?php echo $value['kind']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="No.of Heads" name="noheads" value="<?php echo ($value['no_heads']==0)?'':$value['no_heads']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Kilos" name="kilos" value="<?php echo ($value['kilos']==0)?'':$value['kilos']; ?>" >
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
