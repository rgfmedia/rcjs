<?php include_once('header.php'); ?>
<?php
    if (isset($_POST['addEmployee'])) {
        // code...
        $position = $_POST['position'];
        $name = $_POST['name'];
        $salary = str_replace(',', '', $_POST['salary']);
        
        $sql = "INSERT INTO employee VALUES (null, '$position', '$name', '$salary', '$date')";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        header('location:employee.php');
    }
    if (isset($_POST['update'])) {
        // code...
        
        $id = $_POST['id'];
        $position = $_POST['position'];
        $name = $_POST['name'];
        $salary = str_replace(',', '', $_POST['salary']);

        $sql = "UPDATE employee SET position='$position', name='$name', salary='$salary' WHERE id='$id'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');

        
        header('location:employee.php');
        
    }
    if (isset($_POST['delete'])) {
        // code...
        
        $key = $_POST['id'];

        $sql = "DELETE FROM employee WHERE id = '$key'";
        $result = mysqli_query($link, $sql) or die('Error querying database.');
        
        header('location:employee.php');
        
    }
    $sql="SELECT * FROM employee ORDER BY id DESC";
    $result = mysqli_query($link,$sql);
?>
<div class="container-fluid">
    <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Employee Management Section</h6>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">    
            <button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#employeeAdd">
               <span class="icon text-white-50">
                  <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">New</span>
            </button>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>POSITION</th>
                            <th>NAME</th>
                            <th>SALARY</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($result as $key => $value): ?>        
                        
                            <tr>
                                <td><?php echo $value['position'];?></td>
                                <td><?php echo $value['name'];?></td>
                                <td><?php echo '&#x20b1; '. number_format($value['salary']);?></td>
                                <td>
                                    <center>
                                        <button class="btn btn-primary btn-sm" data-namekey="<?php echo $value['id']; ?>" data-toggle="modal" data-target="#employeeEdit">
                                            <span class="icon ">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </button>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>


        </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>