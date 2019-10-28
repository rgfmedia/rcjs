<div class="modal fade" id="baliModal" tabindex="-1" role="dialog" aria-labelledby="baliModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="baliModalLabel">Add Bali</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="<?php echo htmlspecialchars('bali.php'); ?>" method="post">
        
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Name" name="name" value="" >
            </div>
            <div class="form-group">
              <input class="form-control numberformat" type="text" placeholder="Amount" name="amount" value="" >
            </div>
            <div class="form-group">
              <input class="form-control" type="date" placeholder="Date" name="date" value="" >
            </div>
            
    </div>
      <div class="modal-footer">
          <button type="submit" name="addBali" class="btn btn-primary btn-sm btn-icon-split">
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
