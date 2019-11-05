<div class="modal fade " id="kumpradaModal" tabindex="-1" role="dialog" aria-labelledby="kumpradaModalLabel" aria-hidden="true">
  <div class="modal-dialog kumprada" role="document">
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
              
            <div class="form-group form-inline ">
                <input class="form-control" type="date" placeholder="Date" name="date" value="">
                &nbsp; &nbsp;
                <input class="form-control" type="text" placeholder="Enter Farm name" name="farm" value="" >

            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Driver" name="driver" value="" width="80%" >
            </div>
            <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Pigs" name="farm" value="" disabled="">
                 &nbsp;
                <input class="form-control" type="text" placeholder="Feeds" name="farm" value="" disabled="">
            </div>
            <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="# of Pigs" name="no_pigs" value="" >
                 &nbsp;
                <input class="form-control" type="text" placeholder="Kilos" name="fdkilos" value="" >
            </div>
            <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Kilos" name="kilos" value="" >
                 &nbsp;
                 <input class="form-control" type="text" placeholder="Price" name="feedprice" value="" >
            </div>
            <div class="form-group form-inline">
                <input class="form-control numberformat" type="text" placeholder="Price" name="price" value="" width="50%" >
            </div>
            <div class="form-group">
                <select class="form-control" name="is_paid" required>
                    <option value="0">Unpaid</option>
                    <option value="1">Paid</option>
                </select>
            </div>
            <hr>
              <div class="form-group">
            <b>EXPENSES</b>
          </div>
            <div class="form-inline form-group">
                <input class="form-control" type="text" placeholder="Ahente" name="Ahente" value="" >
                &nbsp;
                <input class="form-control" type="text" placeholder="Price" name="aprice" value="" >
            </div>
            <div class="form-inline form-group">
                <input class="form-control"  placeholder="SOP" name="Ahente" value="" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Price" name="sopprice" value="" >

            </div>
            <div class="form-inline form-group">
                <input class="form-control"  placeholder="REYNAN" name="Ahente" value="" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Price" name="rprice" value="" >

            </div>
            <div class="form-inline form-group">
                <input class="form-control"  placeholder="Driver" name="Ahente" value="" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Price" name="driverprice" value="" >
            </div>
            <div class="form-inline form-group">
                <input class="form-control"  placeholder="Labor" name="Ahente" value="" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Price" name="lprice" value="" >

            </div>
            <div class="form-inline form-group">
                <input class="form-control"  placeholder="Truck" name="Ahente" value="" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Price" name="tprice" value="" >

            </div>
            <div class="form-inline form-group">
                <input class="form-control"  placeholder="Expenses" name="Ahente" value="" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Price" name="eprice" value="" >

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
