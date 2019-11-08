<?php
    include '../backend/db.php';
    $key = $_GET['key'];

    $sql = "SELECT * FROM kumprada WHERE id = '$key'";
    $result = mysqli_query($link, $sql);

?>

<form class="form-group" action="kumprada.php" method="post">
    <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
        <div class="modal-body">
            <?php foreach ($result as $key => $value): ?>
                <input type="hidden" name="id" value="<?php echo $id = $value['id']; ?>">
                <input type="hidden" name="is_paid" value="<?php echo $is_paid = $value['is_paid']; ?>">
                
                <!-- <div class="form-group">
                    <input class="form-control" type="date" placeholder="Enter Date" name="date" value="<?php echo $value['date']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Driver" name="driver" value="<?php echo $value['driver']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Farm" name="farm" value="<?php echo $value['farm']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Number of Pigs" name="no_pigs" value="<?php echo $value['no_pigs']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Kilos" name="Pig Kilo" value="<?php echo $value['pig_kilo']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control numberformat" type="text" placeholder="Pig Price" name="price" value="<?php echo number_format($value['pig_price']); ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Kilos" name="Feeds Kilo" value="<?php echo $value['feeds_kilo']; ?>" >
                </div>
                <div class="form-group">
                    <input class="form-control numberformat" type="text" placeholder="Feeds Price" name="price" value="<?php echo number_format($value['feeds_price']); ?>" >
                </div> -->
                <div class="form-group form-inline ">
                <input class="form-control" type="date" placeholder="Date" name="date" value="<?php echo $value['date']; ?>">
                &nbsp; &nbsp;
                <input class="form-control" type="text" placeholder="Enter Farm name" name="farm" value="<?php echo $value['farm']; ?>" >

            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Driver" name="driver" value="<?php echo $value['driver']; ?>" width="80%" >
            </div>
            <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Pigs" value="" disabled="">
                 &nbsp;
                <input class="form-control" type="text" placeholder="Feeds" value="" disabled="">
            </div>
            <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="# of Pigs" name="no_pigs" value="<?php echo $value['no_pigs']; ?>" >
                 &nbsp;
                <input class="form-control" type="text" placeholder="Kilos" name="feedskilo" value="<?php echo $value['feeds_kilo']; ?>" >
            </div>
            <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Kilos" name="pigkilo" value="<?php echo $value['pig_kilo']; ?>" >
                 &nbsp;
                 <input class="form-control" type="text" placeholder="Price" name="feedsprice" value="<?php echo number_format($value['feeds_price']); ?>" >
            </div>
            <div class="form-group form-inline">
                <input class="form-control numberformat" type="text" placeholder="Price" name="pigprice" value="<?php echo number_format($value['pig_price']); ?>" width="50%" >
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
                <span class="text"><?php echo ($is_paid==0)?'Green':'Red'; ?></span>
            </button>
        </div>
    </form>
</div>
<script type="text/javascript" src="../js/addCommas.js"></script>