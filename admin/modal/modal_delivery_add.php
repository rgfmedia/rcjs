<div class="modal fade" id="deliveryModal" tabindex="-1" role="dialog" aria-labelledby="deliveryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deliveryModalLabel">Add Delivery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-group" action="<?php echo htmlspecialchars('delivery.php'); ?>" method="post">
             
             <div class="form-group">
               <input class="form-control" type="date" placeholder="Enter Date" name="date" value="" required> 
             </div>
             <div class="form-group">
              <input class="form-control" type="text" placeholder="Customer" name="name" value="" required>
             </div>
             <div class="form-group">
              <input class="form-control" type="text" placeholder="Mark #" name="mark" value=""> 
             </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Number of Heads" name="numheads" value="">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Kilo" name="kilo" value="">
              </div>
              <div class="form-group">
                <input class="form-control numberformat" type="text" placeholder="Price" name="price" value="">
              </div>

      </div>
      <div class="modal-footer">
         
              <button type="submit" name="add" class="btn btn-primary btn-sm btn-icon-split">
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
