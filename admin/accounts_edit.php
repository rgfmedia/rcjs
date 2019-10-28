<?php
    include '../backend/db.php';
    $key = $_GET['key'];

    $sql = "SELECT * FROM users WHERE id = '$key'";
    $result = mysqli_query($link, $sql);
    
  // $members = $mysqli_query("SELECT * FROM `details` WHERE `sn`='$id'");
  // $mem = mysqli_fetch_assoc($members);

?>


<form id="regform" class="" action="accounts.php" method="post">
        <div class="modal-body">
            <?php foreach ($result as $key => $value): ?>
                <input type="hidden" name="id" value="<?php echo $id = $value['id']; ?>">
                 <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter your name" name="name" value="<?php echo $value['Name']; ?>" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Username" name="username" value="<?php echo $value['username']; ?>" required>
                </div>
                <div class="form-group">
                    <input class="form-control" id="pass1" type="password" placeholder="New Password" name="password">
                </div>
                <div class="form-group">
                    <input class="form-control" id="pass2" type="password" placeholder="Confirm Password">
                    <span class="err" style="color:red"></span>
                </div>
                <div class="form-group">
                    Use current password <input id="cbox" type="checkbox" name="current">
                </div>
                <div class="form-group">
                    <select class="form-control" name="role" required>
                        <option selected disabled> Select Role </option>
                        <option <?php echo ($value['roles'] != 'admin')?'':'selected'; ?> value="admin">Admin</option>
                        <option <?php echo ($value['roles'] != 'secretary')?'':'selected'; ?> value="secretary">Secretary</option>
                    </select>
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
            <button id="delete" class="btn btn-danger btn-sm btn-icon-split" name="delete" onclick="return confirm('Are you sure you want to delete?');">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Delete</span>
            </button>
        </div>
    </form>
</div>
<script type="text/javascript" src="../js/addCommas.js"></script>
<script type="text/javascript">
(function($) {
    'use strict';

    var pass1 = $('#pass1'),
        pass2 = $('#pass2');


    $('#regform').submit(function(e){

        if ($('#delete').click()) {
            return;
        }        
        if ($('#cbox').prop('checked') == true) { return; }
        else {
            if (pass1.val() != '' && pass2.val() != '') {
                if (pass1.val() == pass2.val()) { return; }
            }
            else { $('.err').text('Empty Password').show(); }
        }
        if (pass1.val() != pass2.val()) {
            $('.err').text('Password did not match').show();
        }
        
        pass1.val('').focus();
        pass2.val('');
        e.preventDefault();
    });

    $('#cbox').click(function(e){
        // pass1.val('').attr('disabled','true');
        // pass2.val('');
        if ($(this).prop('checked') == true) {
            pass1.val('').attr('disabled','true');
            pass2.val('').attr('disabled','true');
            $('.err').hide();   
        } else {
            pass1.removeAttr('disabled');
            pass2.removeAttr('disabled');
        }
        
    })

})(jQuery);
</script>