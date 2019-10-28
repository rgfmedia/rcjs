<?php include_once('header.php'); ?>

 <div class="container-fluid">
         
          <div class="card shadow mb-4">


            <div class="card-header ">
                 <h6 class=" text-primary"><i class="fas fa-fw fa-home"></i> Collectibles Records</h6>

            </div>
                    <div class="card-body">
                        <!-- <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group" style="">
                                <input class="form-control" placeholder="Search Name" type="date" name="searchDate" style="width: 200px; margin-right: 5px;  float: left;">
                                <input class="btn btn-success" type="submit" value="Search" name="search" >
                            </div>
                        </form> -->

                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <div class="form-inline">
                        <div class="form-horizontal">
                          <small>Select Date:</small><br>
                          <input id="fromdate" class="form-control" type="date" name="searchDate" required="">
                        </div>
                        &nbsp;

                        <div class="form-horizontal">
                          <br>
                          <button class="btn btn-primary btn-md btn-icon-split" type="submit" name="search">
                                     <span class="icon ">
                                        <i class="fas fa-search"></i>
                                      </span>
                                      
                           </button>
                        </div>
                      </div>
                       </form>
                        <?php if (isset($_GET['date'])): ?>
                            <?php include 'table-collectibles.php'; ?>
                        <?php else: ?>
                            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#expensesModal" style="margin-bottom:5px;">
                                ADD
                            </button> -->
                            <?php include 'table-collectibles.php'; ?>
                        <?php endif; ?>

     </div>

          </div>
   </div>
</div>
<?php include_once('footer.php'); ?>
