<div class="modal fade" id="stocksModal" tabindex="-1" role="dialog" aria-labelledby="stocksModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stocksModalLabel">Add Stocks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="<?php echo htmlspecialchars('stocks.php'); ?>" method="post">
        <!-- <input type="text" name="getDate" value="<?php echo isset($_GET['date']) ? $_GET['date'] : '' ; ?>"> -->
            <input class="form-control" type="date" placeholder="Date" name="date" value="">
            <input class="form-control" type="text" placeholder="Name" name="driver" value="">
            <input class="form-control" type="text" placeholder="Kind" name="kind" value="">
            <input class="form-control" type="text" placeholder="No.of Heads" name="noheads" value="">
            <input class="form-control numberformat" type="text" placeholder="Kilos" name="kilos" value="">
    </div>
      <div class="modal-footer">
          <input type="submit" class="btn btn-success" name="addStocks" value="ADD">
        </form>
      </div>
    </div>
  </div>
</div>
