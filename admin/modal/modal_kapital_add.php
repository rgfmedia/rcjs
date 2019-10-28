<div class="modal fade" id="kapitalModal" tabindex="-1" role="dialog" aria-labelledby="kapitalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kapitalModalLabel">Add Capital</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-group" action="<?php echo htmlspecialchars('kapital.php'); ?>" method="post">
              <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Kind" name="kind" value="">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Sacks" name="sacks" value="">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Number of pigs" name="nopigs" value="">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Kilo" name="kilo" value=""> 
              </div>
              <div class="form-group">
                <input class="form-control numberformat" type="text" placeholder="Total" name="total" value="">
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
