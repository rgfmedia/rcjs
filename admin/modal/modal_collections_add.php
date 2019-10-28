<div class="modal fade" id="collectionsModal" tabindex="-1" role="dialog" aria-labelledby="collectionsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="collectionsModalLabel">Add Collection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="<?php echo htmlspecialchars('collections.php'); ?>" method="post">
        <!-- <input type="text" name="getDate" value="<?php echo isset($_GET['date']) ? $_GET['date'] : '' ; ?>"> -->
                  <div class="form-group">
                     <input class="form-control" type="text" placeholder="Collector Name" name="clcname" value="" required> 
                  </div>
                    <div class="form-group"> Date of collection <input class="form-control" type="date" placeholder="Enter Date" name="date" value="" required> </div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Customer Name" name="cusname" value=""></div>
                    <!-- <div class="form-group"> Date of delivery <input class="form-control searchdate" type="date" name="datedelivered" value=""></div> -->
                    <div class="form-group"><input class="form-control numberformat" type="text" placeholder="T.A.C Amount" name="tacamnt" value=""> </div>
                    <div class="form-group"> <input class="form-control" type="text" placeholder="Check #" name="chckno" value=""> </div>
                    <div class="form-group"> <input class="form-control" type="text" placeholder="Kind of Expenses" name="koe" value=""> </div>
                    <div class="form-group"> <input class="form-control numberformat" type="text" placeholder="Expenses Amount" name="ea" value=""> </div>
                    <div class="form-group"> <input class="form-control" type="text" placeholder="Damage" name="damage" value=""> </div>
                    <div class="form-group"> <input class="form-control" type="text" placeholder="Damage Kilos" name="damagekg" value=""></div>
                    <div class="form-group"><input class="form-control numberformat" type="text" placeholder="Damage Amount" name="damamount" value=""></div>
                    <div class="form-group"> <input class="form-control" type="text" placeholder="Bali Name" name="baliname" value=""> </div>
                    <div class="form-group"> <input class="form-control numberformat" type="text" placeholder="Bali Amount" name="baliamnt" value=""></div>

                

    </div>
      <div class="modal-footer">
          
          <button type="submit" name="addCollection" class="btn btn-primary btn-sm btn-icon-split">
                  <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">ADD</span>  
              </button>
        </form>
      </div>
    </div>
  </div>
</div>