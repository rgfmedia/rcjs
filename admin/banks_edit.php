
<?php
    include '../backend/db.php';
    $key = $_GET['key'];

    $sql = "SELECT * FROM banks WHERE BNo = '$key'";
    $result = mysqli_query($link, $sql);
    $id='';
  // $members = $mysqli_query("SELECT * FROM `details` WHERE `sn`='$id'");
  // $mem = mysqli_fetch_assoc($members);

?>

<form class="" action="backend.php" method="post">
    <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
    <div class="modal-body">
        <?php foreach ($result as $key => $value): ?>
            <input type="hidden" name="id" value="<?php echo $id = $value['BNo']; ?>">

            <div class="form-group">
                <input type="date" name="tdate" class="form-control"  placeholder="Date" value="<?php echo $value['Date'];?>" required="">
            </div>
            <div class="form-group">
                <input type="text" name="tname"  class="form-control"  placeholder="Name" value="<?php echo $value['Name'];?>" required="">
            </div>
            <div class="form-group">
                <input type="text" name="tcheck" class="form-control"  placeholder="Check No." value="<?php echo $value['CheckNo'];?>">
            </div> 
            <div class="form-group">
                <input type="text" name="tamount" class="form-control numberformat"  placeholder="Amount" value="<?php echo number_format($value['Amount']); ?>">
            </div>
            <div class="form-group">
                <input type="text" name="tcustomer" class="form-control"  placeholder="Details" value="<?php echo $value['Details'];?>">
            </div>
             <div class="form-group">
        <small><strong> CHECKY STATUS: </strong></small><br>
        <label class="radio-inline"><input type="radio" value="Okay" name="status" >Okay</label> &nbsp;  
      <label class="radio-inline"><input type="radio" value="Declined" name="status" >Declined</label> 
     
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