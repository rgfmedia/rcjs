<div class="modal fade" id="expensesModal" tabindex="-1" role="dialog" aria-labelledby="expensesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="expensesModalLabel">Add Expenses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-group" action="<?php echo htmlspecialchars('expenses.php'); ?>" method="post">
              <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
              <table style="width:100%;">

                  <tr>
                          <td> <input class="form-control" type="date" placeholder="Date" name="date" value=""> </td>
                          <td> <input class="form-control" type="text" placeholder="Kind of Expenses" name="kexpenses" value=""> </td>
                          <td> <input class="form-control" type="text" placeholder="Sacks" name="sacks" value=""> </td>
                          <td> <input class="form-control numberformat" type="text" placeholder="Expenses" name="expenses" value=""> </td>
                  </tr>

              </table>

      </div>
      <div class="modal-footer">
          <input type="submit" class="btn btn-success" name="addExpenses" value="ADD">
        </form>
      </div>
    </div>
  </div>
</div>
