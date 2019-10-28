<?php include_once('header.php'); ?>
<?php
    
    if (isset($_POST['update'])) {
        $cbox='';
        $password='';
        if (isset($_POST['current'])) $cbox = $_POST['current']; 
        else $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        
        $role = $_POST['role'];

        if ($cbox == 'on')  $sql = "UPDATE users SET Name='$name', roles='$role', username='$username' WHERE id='$id'";
        else  $sql = "UPDATE users SET Name='$name', roles='$role', username='$username', password='$password' WHERE id='$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        
    }
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id = '$id'";
        mysqli_query($link,$sql);
    }

    $sql="SELECT * FROM users ORDER BY created_at DESC";
    $result = mysqli_query($link,$sql);

?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> All Account Section</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        
        <div class="card-body">



            <div class="table-responsive">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>ROLES</th>
                            <th>NAME</th>
                            <th>USERNAME</th>
                            <th>ACCOUNT CREATED</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($result as $key => $value): ?>
                            <tr>
                                <td><?php echo $value['roles']; ?></td>
                                <td><?php echo $value['Name']; ?></td>
                                <td><?php echo $value['username']; ?></td>
                                <td><?php echo  date('F d, Y' ,strtotime($value['created_at'])); ?></td>
                                <td>
                                    <center>
                                        <button class="btn btn-primary btn-sm" data-namekey="<?php echo $value['id']; ?>" data-toggle="modal" data-target="#accountEdit">
                                            <span class="icon ">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </button>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>