<?php include 'header.php'; ?>



    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           <div class="modal-header">
               <!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                <h4 class="modal-title" id="myModalLabel"><strong>Update</strong></h4>
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
        <input type="text" name="tcheck" class="form-control"  placeholder="Check No." required="">
    </div> 
    <div class="form-group">
        <input type="number" name="tamount" class="form-control"  placeholder="Amount" required="">
    </div>
        <div class="form-group">

        <input type="text" name="tcustomer" class="form-control"  placeholder="Details" required="">
    </div>

                                  
            </div>    
            <div class="modal-footer">
              <button type="submit" name="newbank" class="btn btn-primary btn-sm">ADD</button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>

            </div>
            </form>  
        </div>
    </div>

<?php include 'footer.php'; ?>