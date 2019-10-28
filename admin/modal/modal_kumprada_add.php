<div class="modal fade" id="kumpradaModal" tabindex="-1" role="dialog" aria-labelledby="kumpradaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kumpradaModalLabel">Add Kumprada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-group" action="<?php echo htmlspecialchars('kumprada.php'); ?>" method="post">
            <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
              
            <div class="form-group">
                <input class="form-control" type="date" placeholder="Date" name="date" value="" >
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Driver" name="driver" value="" >
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Kind" name="farm" value="" >
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Number of Pigs" name="no_pigs" value="" >
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Kilos" name="kilos" value="" >
            </div>
            <div class="form-group">
                <input class="form-control numberformat" type="text" placeholder="Price" name="price" value="" >
            </div>
            <div class="form-group">
                <select class="form-control" name="is_paid" required>
                    <option value="0">Unpaid</option>
                    <option value="1">Paid</option>
                </select>
            </div>

      </div>
      <div class="modal-footer">
         <!--  <input type="submit" class="btn btn-success" name="addKumprada" value="ADD"> -->

          <button type="submit" name="addKumprada" class="btn btn-primary btn-sm btn-icon-split">
                  <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">ADD</span>  
              </button>
        </form>
      </div>
    </div>
  </div>
</div>
