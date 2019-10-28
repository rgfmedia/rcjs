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
<body id="print" onload="window.print()">


<?php

echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#print').modal('show');
          });
          </script>";


include '../backend/db.php';
    if (isset($_POST['search'])) {


        $from = $_POST['from'];
        $to = $_POST['to'];
        $customer = $_POST['tname'];

        $sql = "SELECT * FROM collectibles WHERE customer='$customer' AND date_collected BETWEEN '$from' AND '$to' ORDER BY id ASC";

    }

    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($result);


?>
<?php if (empty($data)): ?>
  <br>
  <center> No Records Found.</center> 
<?php else: ?>
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
Date of collection as of  <?php echo date('m/d/Y' ,strtotime($getfrom)); ?> to <?php echo date('m/d/Y' ,strtotime($getto)); ?>
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
            <?php 
                $name1=array();
                $keyrow=array();
                $array_date=array();
                $name='';
                $dates='';
                $pskey=0;
                $name2='';
                $rowspan=1;
                $total=0;
                $tac=0;



                foreach ($result as $key => $value) { 

                    $rowspan+=$key;
                    $tac = $value['tac'];
                    //$totalCollectibles+=$value['price']*$value['total_kilo'] - $value['tac'];
                    $name1[]=$value;
                    if (!in_array($value['date_delivery'], $array_date)) {
                        $total += $value['price']*$value['total_kilo'];
                    }
                    $array_date[]=$value['date_delivery'];
                    
                }
                $total = $total-$tac;

                $array_date=array();

                foreach ($result as $key => $value) {
                    if ($name2 != $value['collector_name'] OR $dates != $value['date_collected']) {
                        foreach ($name1 as $k => $names) {
                            if ($names['collector_name'] == $value['collector_name'] AND $names['date_collected'] == $value['date_collected']) {
                                $pskey++;
                            unset($name1[$k]);
                            } else { break; }
                        }
                        $keyrow[$key] = $pskey;
                    }
                    $name2 = $value['collector_name']; $dates = $value['date_collected']; $pskey = 0;
                }
                $dates = '';
                foreach ($result as $key => $value): ?>

                    
                    
                    <tr>
                        <?php if ($key==0): ?>
                            <td rowspan="<?php echo $rowspan; ?>"><?php echo $value['customer']; ?> </td>     
                        <?php endif ?>                        
                        
                        <?php if (!in_array($value['date_delivery'], $array_date)): ?>
                            <td><?php echo $value['date_delivery']; ?> </td>
                            <td><?php echo $value['number_of_heads']; ?> </td>
                            <td><?php echo $value['total_kilo']; ?> </td>
                            <td><?php echo $value['price']; ?> </td>
                            <td><?php echo number_format($value['total_kilo'] * $value['price']); ?> </td>
                        <?php else: ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php endif ?>

                        <?php if ($name != $value['collector_name'] OR $dates != $value['date_collected']): ?>
                            <td rowspan="<?php echo $keyrow[$key]; ?>"><?php echo number_format($value['collections']); ?> </td>    
                        <?php endif ?>
                        

                        <?php if ($key==0): ?>
                            <td rowspan="<?php echo $rowspan; ?>"><?php echo number_format($total); ?> </td>     
                        <?php endif ?>
                        
                        <?php if ($name != $value['collector_name'] OR $dates != $value['date_collected']): ?>
                            <td rowspan="<?php echo $keyrow[$key]; ?>"><?php echo $value['date_collected']; ?> </td>
                            
                            <td rowspan="<?php echo $keyrow[$key]; ?>"><?php echo $value['collector_name'] ?> </td>
                        <?php endif ?>
                        
                    </tr>    
                    
                <?php $name = $value['collector_name']; $array_date[]=$value['date_delivery']; $dates = $value['date_collected']; endforeach; ?>
                    
        </tbody>
    </table>
</div>
<?php endif; ?>

</html>
</body>