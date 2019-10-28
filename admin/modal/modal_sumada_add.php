<div class="modal fade" id="sumadaModal" tabindex="-1" role="dialog" aria-labelledby="sumadaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sumadaModalLabel">Add Sumada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-group" action="<?php echo htmlspecialchars('sumada.php'); ?>" method="post">
              <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
               <div class="form-group">
                           <input class="form-control" type="date" placeholder="Date" name="date" value=""> 
                         </div>
                          <div class="form-group">
                          <input class="form-control" type="text" placeholder="Kind" name="kind" value=""> 
                        </div>
                         <div class="form-group">
                           <input class="form-control" type="text" placeholder="Sacks" name="sacks" value=""> 
                         </div>
                          <div class="form-group">
                           <input class="form-control" type="text" placeholder="Number of Pigs" name="no_pigs" value=""> 
                         </div>
                          <div class="form-group">
                           <input class="form-control" type="text" placeholder="Kilos" name="kilos" value=""> 
                         </div>
                          <div class="form-group">
                          <input class="form-control numberformat" type="text" placeholder="Expenses" name="expenses" value=""> 
                        </div>
               
      </div>
      <div class="modal-footer">
        <button type="submit" name="addSumada" class="btn btn-primary btn-sm btn-icon-split">
                  <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">ADD</span>  
              </button>
          <!-- <input type="submit" class="btn btn-success" name="addSumada" value="ADD"> -->
        </form>
      </div>
    </div>
  </div>
</div>
 