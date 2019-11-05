<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Print</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <style type="text/css">
      body{
        padding-top: 30px;
         color: black;

      }
table{
margin: auto;
}

  
       thead{
text-align: center;
background-color: #4f74df;
     color: black;
    }
    table, thead{
        margin: auto;
        padding: 5px;
        width: 100%;
        
        text-align: center;
    }
    th{
        padding: 5px;
        
        
    }
    tbody,td{
        
        padding: 5px;
text-align: center;
    }
.p{
text-align:left;
}
.b{
border: solid 1px;
}

  </style>
<!-- <body id="print" onload="window.print()"> -->

<body>


<div class="container-fluid">
<table border="0">
<tr>
<th width="45%"> <img class="m" src="../img/pig.png" width="100px" height="100px" align="right"></i></th>
<th width="55%"><p class="p"><strong>RCSJ LIVESTOCK DEALER</strong><br>
<small>BRGY. NIAGSAM, JARO, LEYTE</small> <br>
<small>VAT REG. TIN: 281-020-488-000</small>
<br></p></th>
</tr>
</table>

<center>
Date of collection as of  <!-- <?php echo date('m/d/Y' ,strtotime($getfrom)); ?> --> to <!-- <?php echo date('m/d/Y' ,strtotime($getto)); ?> -->
</center>
<p class="pull-left">
    CUSTOMER COPY
</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CUSTOMER NAME</th>
                <th>DATE OF DELIVERY</th>
                <th>NO. OF HEADS</th>
                <th>PRICE</th>            
                <th>COLLECTION</th>
                <th>DATE OF COLLECTION</th>
                <th>COLLECTOR NAME</th>
                <!-- <th>DAMAGE</th>
                <th>DAMAGE KILOS RETURNED</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
            <tr>
                <th>Total Delivery</th>
                <th colspan="6"></th> 
            </tr>
             <tr>
                <th>Total Collection</th>
                <th colspan="6"></th> 
            </tr>
             <tr>
                <th>Total Balance</th>
                <th colspan="6"></th> 
            </tr>
                    
        </tbody>
    </table>
</div>


</html>
</body>