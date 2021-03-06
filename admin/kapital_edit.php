<?php
    include '../backend/db.php';
    $key = $_GET['key'];

    $sql = "SELECT * FROM kapital WHERE id = '$key'";
    $result = mysqli_query($link, $sql);

?>

<form class="" action="kapital.php" method="post">
    <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">

    <div class="modal-body">
        <?php foreach ($result as $key => $value): ?>
            <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
            
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Kind" name="kind" value="<?php echo $value['kind']; ?>" >
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="<?php echo $value['farm']; ?>" >
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Sacks" name="sacks" value="<?php echo ($value['sacks']==0)?'':$value['sacks']; ?>" >
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Number of Pigs" name="no_pigs" value="<?php echo ($value['no_pigs']==0)?'':$value['no_pigs']; ?>" >
            </div>
             <div class="form-group">
                <input class="form-control" type="text" placeholder="Kilos" name="kilos" value="<?php echo ($value['kilos']==0)?'':$value['kilos']; ?>" >
            </div>
             <div class="form-group">
                <input class="form-control numberformat" type="text" placeholder="Total" name="total" value="<?php echo number_format($value['total']); ?>" >
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
<script type="text/javascript" src="../js/addCommas.js"></script>