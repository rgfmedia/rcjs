<?php include '../db_connect.php';
ob_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/mystyle.css" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style type="text/css">
    .select{
      width: 80%;
      padding: 5px;
      margin-left: 20px;
    }
           thead{
text-align: center;
background-color: #4f74df;
    color: white;
   
    }
    tbody{
      color: black;
    }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Stockyards</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-plus"></i>
          <span>New Transactions</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           <a class="collapse-item" href="kumprada.php"><i class="fas fa-fw fa-box"></i> Kumprada</a>
            <a class="collapse-item" href="delivery.php"><i class="fas fa-fw fa-car"></i> Delivery</a>
            <a class="collapse-item" href="collections.php"><i class="fas fa-fw fa-hands"></i> Collections</a>
            <!-- <a class="collapse-item" href="collectibles.php"><i class="fas fa-fw fa-list"></i> Collectibles</a> -->
             <a class="collapse-item" href="kapital.php"><i class="fas fa-fw fa-coins"></i> Capital</a>
           <a class="collapse-item" href="banks.php"><i class="fas fa-fw fa-credit-card"></i> Bank In Records</a>
            <a class="collapse-item" href="banks_out.php"><i class="fas fa-fw fa-credit-card"></i> Bank Out Records</a>
            <!-- <a class="collapse-item" href="expenses.php"><i class="fas fa-fw fa-bookmark"></i> Expenses</a> -->
          
            <!-- <a class="collapse-item" href="sumada.php"><i class="fas fa-fw fa-list"></i> Sumada</a> -->
            <!-- <a class="collapse-item" href="stocks.php"><i class="fas fa-fw fa-arrow-right"></i> Pig Stocks</a> -->
            <!-- <a class="collapse-item" href="bali.php"><i class="fas fa-fw fa-coins"></i> Bali</a> -->
            <!-- <a class="collapse-item" href="inventory.php"><i class="fas fa-fw fa-flag"></i> Inventory</a> -->
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Previous Transactions</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Select Date:</h6>
            <input type="date" class="select filterDate" name="" value="<?php if (isset($_GET['date'])) {echo $_GET['date'];}?>">
            <hr class="sidebar-divider">

          <ul class="nav flex-column sub-menu">
           <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'kumprada.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="kumprada.php"><i class="fas fa-fw fa-box"></i> Kumprada </a>
            </li>
            <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'delivery.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="delivery.php"><i class="fas fa-fw fa-car"></i> Delivery </a>
            </li>
             <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'collections.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="collections.php"><i class="fas fa-fw fa-hands"></i> Collections </a>
            </li>
            <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'kapital.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="kapital.php"><i class="fas fa-fw fa-coins"></i> Capital</a>
            </li>
            <!-- <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'collectibles.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="collectibles.php"><i class="fas fa-fw fa-list"></i> Collectibles </a>
            </li> -->
           
            <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'banks.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="banks.php"><i class="fas fa-fw fa-credit-card"></i> Bank In Records</a>
            </li>
            <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'banks.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="banks_out.php"><i class="fas fa-fw fa-credit-card"></i> Bank Out Records</a>
            </li>
            <!-- <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'expenses.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="expenses.php"><i class="fas fa-fw fa-bookmark"></i> Expenses</a>
            </li> -->
            
            <!-- <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'sumada.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="sumada.php"><i class="fas fa-fw fa-list"></i> Sumada</a>
            </li> -->
            <!-- <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'stocks.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="stocks.php"><i class="fas fa-fw fa-arrow-right"></i> Pig Stock</a>
            </li> -->
            <!-- <li class="nav-item hide-item <?php echo basename($_SERVER['PHP_SELF']) == 'bali.php' ? 'active' : ''; ?> d-none">
              <a class="collapse-item _link" href="bali.php"><i class="fas fa-fw fa-coins"></i> Bali</a>
            </li> -->
          </ul>

          </div>

        </div>
      </li>
      <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accountManagement" aria-expanded="true" aria-controls="accountManagement">
            <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Account Settings</span>
          </a>
        <div id="accountManagement" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="register.php"><i class="fas fa-fw fa-user"></i> Create new account</a>
                <a class="collapse-item" href="accounts.php"><i class="fas fa-fw fa-hands"></i> All accounts</a>
            </div>
        </div>
      </li> -->
    <!-- Divider -->
  
  

    <li class="nav-item">
      <a class="nav-link" href="bali.php"><i class="fas fa-fw fa-coins fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Bali</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="collectibles.php"><i class="fas fa-fw fa-list fa-sm fa-fw mr-2 text-gray-400"></i> 
        <span> Collectibles </span>
      </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="sumada.php"><i class="fas fa-fw fa-list fa-sm fa-fw mr-2 text-gray-400"></i> <span>Admin Inventory</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="inventory.php"><i class="fas fa-fw fa-flag fa-sm fa-fw mr-2 text-gray-400"></i> <span>Secretary Inventory</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="employee.php"><i class="fas fa-fw fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Employee Management</span>
      </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accountManagement" aria-expanded="true" aria-controls="accountManagement">
          <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Account Settings</span>
        </a>
      <div id="accountManagement" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="register.php"><i class="fas fa-fw fa-user"></i> Create new account</a>
              <a class="collapse-item" href="accounts.php"><i class="fas fa-fw fa-hands"></i> All accounts</a>
          </div>
      </div>
    </li>
      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="result.php" method="POST">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search Name" aria-label="Search" aria-describedby="basic-addon2" style="margin-top: 2px;" name="names">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="searchname">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
       <!--  -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

         
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <?php 
      include '../backend/db.php';
      date_default_timezone_set('Asia/Manila');
      $date = date('Y-m-d'); 
      $realDate = new DateTime($date);
      $realDate = $realDate->format('F');
    ?>