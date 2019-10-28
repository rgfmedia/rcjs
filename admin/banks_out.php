<?php include_once('header.php'); ?>
<style type="text/css">
    .success{
        background-color: green;
        color: white;
    }
    .danger{
        background-color: red;
        color: white;
    }
</style>

    
        <!-- content-wrapper ends -->
        <div class="container-fluid">
            <h6 class=" text-primary pull-right"><i class="fas fa-fw fa-home"></i> Banks Records</h6>
          <div class="card shadow mb-4">


            <div class="card-header py-3">
            <?php if (!isset($_GET['date'])): ?>
               <button class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#newbankout">
                   <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">New</span>
               </button>
            <?php endif; ?>
            </div>
                    <div class="card-body">
                        
                       
                        
                        
                        <!-- <p class="card-description">
                            Add class
                            <code>.table-bordered</code>
                        </p> -->

                       <!-- 
                            <a href="#" class="btn btn-success pull-right">ADD</a>
                            <br> -->
                       
                        
  <div class="table-responsive">                              
<?php

        
        echo "<table class='table table-bordered'  id='dataTable' width='100%' cellspacing='0'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Date</th>";
                echo "<th>Recieved by</th>";
                echo "<th>Check #</th>";
                
                echo "<th>Details</th>";
                echo "<th>Amount</th>";
                echo "<th>Action</th>";
               

            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            include '../db_connect.php';
 
// Attempt select query execution
$sql = "SELECT * FROM banks where IO='out' ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
             // echo '<form action="" method="POST">';

            echo "<tr>";
                ?>
                <td class='<?php if($row['Status']=="Okay"){echo "success";} else{echo "danger";}; ?>'> <?php echo date('m/d/Y',strtotime($row['Date'])); ?></td>
                <td class='<?php if($row['Status']=="Okay"){echo "success";} else{echo "danger";}; ?>'> <?php echo  $row['Name']; ?></td>
                <td class='<?php if($row['Status']=="Okay"){echo "success";} else{echo "danger";}; ?>'> <?php echo  $row['CheckNo'];  $amount[] = $row['Amount'];?></td>
                <td class='<?php if($row['Status']=="Okay"){echo "success";} else{echo "danger";}; ?>'> <?php echo  $row['Details']; ?></td>
                <td class='<?php if($row['Status']=="Okay"){echo "success";} else{echo "danger";}; ?>'> <?php echo "&#x20b1;".  number_format($row['Amount'],2); ?></td> 
               <?php
                echo '<input type="hidden" name="bno" value='. $row["BNo"] .'>';
                echo "<td>" ?>
                <center>
                <button class="btn btn-primary btn-sm" data-namekey="<?php  echo  $row["BNo"]; ?>" data-toggle="modal" data-target="#bankModalEdit_out">
                    <span class="icon ">
                        <i class="fas fa-edit"></i>
                    </span>
                </button>
                </center>
        <?php
            echo "</td>";
            echo "</tr>";
            // echo "</form>";
        }
        // echo "<tr>";
        //  echo "<td ></td>";
        //   echo "<td ></td>";
        //    echo "<td ></td>";
        //     echo "<td ></td>";
       

        // echo "<td>&#x20b1; ". number_format(array_sum($amount),2) ."</td>";
        //  echo "<td ></td>";
        
        // echo "</tr>";
           // Free result set
        mysqli_free_result($result);
    } else{
        
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
        echo "</tbody>";
        echo "</table>";

?>



        </div>
</div>


<div class="modal fade" id="newbankout" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content">
           <div class="modal-header btn-primary">
               
                <h5 class="modal-title" id="myModalLabel"><strong>Add bank record</strong></h5>
            </div>
            <div class="modal-body">
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <input type="date" name="tdate" class="form-control"  placeholder="Date" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="tname"  class="form-control"  placeholder="Name" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="tcheck" class="form-control"  placeholder="Check No.">
                    </div> 
                    <div class="form-group">
                        <input type="text" name="tamount" class="form-control"  placeholder="Amount">
                    </div>
        <div class="form-group">
        <input type="text" name="tcustomer" class="form-control"  placeholder="Details">
    </div>
    <div class="form-group">
        <small><strong> CHECKY STATUS: </strong></small><br>
        <label class="radio-inline"><input type="radio" value="Okay" name="status" required>Okay</label> &nbsp;  
      <label class="radio-inline"><input type="radio" value="Declined" name="status" required>Declined</label> 
     
    </div>

                                  
            </div>    
            <div class="modal-footer">
                <div class="my-2"></div>
              <button type="submit" name="newbankout" class="btn btn-primary btn-sm btn-icon-split">
                  <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Submit</span>  
              </button>
              <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>

            </div>
            </form>  
        </div>
    </div>
</div>


                
       </div>
   </div>
</div>
<?php include 'backend.php'; ?>
<?php include_once('footer.php'); ?>


