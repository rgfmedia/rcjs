<?php include_once('header.php'); ?>
<?php
    
    if (isset($_POST['create'])) {
        
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];

        $sql = "INSERT INTO users VALUES (null, '$name', '$role', '$username', '$password', now())";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

    }

?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Create Account Section</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        
        <div class="card-body">

            <form id="regform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter your name" name="name" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Username" name="username" required>
                </div>
                <div class="form-group">
                    <input class="form-control" id="pass1" type="password" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                    <input class="form-control" id="pass2" type="password" placeholder="Confirm Password"  required>
                    <span class="err" style="color:red"></span>
                </div>
                <div class="form-group">
                    <select class="form-control" name="role" required>
                        <option selected disabled> Select Role </option>
                        <option value="admin">Admin</option>
                        <option value="secretary">Secretary</option>
                    </select>
                </div>
                <div class="form-group pull-right">
                    <input class="btn btn-success" type="submit" id="registerSubmit" name="create" value="Create"> 
                </div>
            </form>

        </div>

        </div>
    </div>
</div>





<?php include_once('footer.php'); ?>

<script type="text/javascript">
(function($) {
    'use strict';

    $('#regform').submit(function(e){
        
        var pass1 = $('#pass1'),
            pass2 = $('#pass2');
        if (pass1.val() == pass2.val()) {
            return;
        }
        $('.err').text('Password did not match').show();
        pass1.val('').focus();
        pass2.val('');
        e.preventDefault();
    });

})(jQuery);
</script>