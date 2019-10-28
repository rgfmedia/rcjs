<?php require 'header.php'; ?>

    <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <form action="print.php" method="POST" target="_blank">
            <div class="form-inline">
 <input type="date" name="from" class="form-control" required> &nbsp; 
              <input type="date" name="to" class="form-control" required> &nbsp; <input type="text" name="tname" class="form-control" placeholder="Customer" required> &nbsp;
            <button type="submit" name="search" class="d-none d-md-inline-block btn btn-md btn-primary shadow-sm" ><i class="fas fa-print fa-sm text-white-50"></i> Print Report</button> 
          </div>
          </form>
          </div>
          <!-- Content Row -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Delivery (Monthly)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
                    $sql = "SELECT * FROM delivery";
                      $result = mysqli_query($link, $sql);
                      $realDate = new DateTime($date);
                      $realDate = $realDate->format('F');
                      $monthlyDelivery=0;
                      foreach ($result as $key => $value) {
                          $sqlDate = new DateTime($value['Date']);
                          $sqlDate = $sqlDate->format('F');
                          if ($realDate == $sqlDate) {
                              $monthlyDelivery += $value['Kg'] * $value['Price'];
                          }
                      }
                      echo '&#x20b1;' . number_format($monthlyDelivery,2);
                  ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="query.php?keyname=Collection" style="text-decoration: none;">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Collection Count</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                        $sql = "SELECT count(id) FROM collection";
                        $result = mysqli_query($link, $sql);
                        echo '' . number_format(mysqli_fetch_assoc($result)["count(id)"]);
                    ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-hands fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="query.php?keyname=Delivery" style="text-decoration: none;">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Delivery Count</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">    
                        <?php
                          $sql = "SELECT count(D_ID) FROM delivery";
                          $result = mysqli_query($link, $sql);
                          echo '' . number_format(mysqli_fetch_assoc($result)["count(D_ID)"]);
                        ?>
                      </div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-car fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="" style="text-decoration: none;">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">BALI Transaction Count</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                        $sql = "SELECT count(id) as allbali FROM bali";
                        $result = mysqli_query($link, $sql);
                        echo '' . number_format(mysqli_fetch_assoc($result)["allbali"]);
                    ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div><!-- Content Row -->
  <table>
    
  </table>





















</div>
         
</div>
<!-- End of Main Content -->

  <?php require 'footer.php'; ?>