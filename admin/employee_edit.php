<?php
    include '../backend/db.php';
    $key = $_GET['key'];

    $sql = "SELECT * FROM employee WHERE id = '$key'";
    $result = mysqli_query($link, $sql);
    
  // $members = $mysqli_query("SELECT * FROM `details` WHERE `sn`='$id'");
  // $mem = mysqli_fetch_assoc($members);

?>


<form class="" action="employee.php" method="post">
    
        <div class="modal-body">
            <?php foreach ($result as $key => $value): ?>
                <input type="hidden" name="id" value="<?php echo $id = $value['id']; ?>">
                
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Position" name="position" value="<?php echo $value['position']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Name" name="name" value="<?php echo $value['name']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control numberformat" type="text" placeholder="Amount Salary" name="salary" value="<?php echo number_format($value['salary']); ?>" >
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