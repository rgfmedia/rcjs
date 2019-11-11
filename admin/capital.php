<?php include_once('header.php'); ?>

<?php

	if (isset($_GET['search_date']) || isset($_GET['search_farm'])) {
		

		if (!isset($_GET['search_date']) && isset($_GET['search_farm'])) {
			$s_farm = $_GET['search_farm'];
			$sqlCapital = "SELECT * FROM kapital WHERE farm = '$s_farm'";
		} elseif (isset($_GET['search_date']) AND !isset($_GET['search_farm'])) {
			$s_date = $_GET['search_date'];
			$sqlCapital = "SELECT * FROM kapital WHERE date = '$s_date'";
		} else {
			$s_date = $_GET['search_date'];
			$s_farm = $_GET['search_farm'];
			$sqlCapital = "SELECT * FROM kapital WHERE date = '$s_date' AND farm = '$s_farm'";
		}
		

	} elseif (isset($_POST['search'])) {
		
		$date = $_POST['date'];
		$farm = $_POST['farm'];
		$link = $_SERVER['PHP_SELF'];
		if (!empty($date) && empty($farm)) {
			header('location:'.$link.'?search_date='.$date);
		} elseif (!empty($farm) && empty($date)) {
			header('location:'.$link.'?search_farm='.$farm);
		} elseif (!empty($farm) && !empty($date)) {
			header('location:'.$link.'?search_date='.$date.'&search_farm='.$farm);
		} else {
			header('location:'.$link);
		}
	} else {

		$sqlCapital = "SELECT * FROM kapital ORDER BY transaction DESC";
		
	}

	$resultCapital = mysqli_query($link, $sqlCapital) or die('Error querying database CAPITAL1.');

?>

<div class="container-fluid">
	<label><STRONG>Capital</STRONG></label>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group form-inline">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input class="form-control" type="date" placeholder="Date" name="date" value="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="">
                &nbsp;
                <button name="search" class="btn btn-md btn-primary">Search</button>
            </form>
              </div>
              <hr>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th>Date</th>
					<th>Farm</th>
					<th>Amount</th>
					<th>Expenses</th>
					<th>Total</th>
					<th>Transaction</th>
				</tr>
			</thead>
			<tbody>

				
				<?php 


					$datest = array();
					$dateC = '';
					$pskey = 0;
					$keyrow = array();
					foreach ($resultCapital as $key => $value) {
						$datest[]=$value;	
					}
					foreach ($resultCapital as $key => $value) {
						if ($dateC != $value['date']) {
							foreach ($datest as $k => $dates) {
								if ($value['date'] == $dates['date']) {
									$pskey++;
									unset($datest[$k]);
								} else { break; }
							}
							$keyrow[$key] = $pskey;

						}
						$dateC = $value['date']; $pskey = 0;
					}

					$dateC = '';




					foreach ($resultCapital as $key => $value): 

						$valDate = $value['date'];
						$valFarm = $value['farm'];
						$sqlKumprada = "SELECT * FROM kumprada WHERE date = '$valDate' AND farm = '$valFarm'";
						$kumpradaResult = mysqli_query($link, $sqlKumprada) or die('Error querying database KUMPRADA.');
						$res = mysqli_fetch_assoc($kumpradaResult);


				?>
					<tr>
						<?php if ($dateC != $value['date']): ?>
							<td rowspan="<?php echo $keyrow[$key]; ?>"><?php echo $value['date']; ?></td>
						<?php endif; ?>

						<td><?php echo $value['farm']; ?></td>

						<td>
							<?php 
								$amount = $res['pig_kilo'] * $res['pig_price'] + $res['feeds_price'];
								echo number_format($amount,2); 
							?>
						</td>
						<td>
							<?php
								$expenses =  $res['total_expenses'];
								echo number_format($expenses,2); 
							?>		
						</td>
						<td>
							<?php echo number_format($amount+$expenses, 2) ?>
						</td>

						<?php if ($dateC != $value['date']): ?>
							<td rowspan="<?php echo $keyrow[$key]; ?>">

								<a href="<?php echo (isset($_GET['search_date']) || isset($_GET['search_farm']))? $_SERVER['REQUEST_URI'].'&' : '?';?>transaction_no=<?php echo $value['transaction'].'&date='.$value['date'];?>"><?php echo $value['transaction']; ?></a>

								
									
							</td>
						<?php endif; ?>
					</tr>
				<?php $dateC = $value['date']; endforeach; ?>		
			</tbody>
			
		</table>
	</div>
</div>
	<div class="row">
	<div class="col-sm-6">
		
		<?php
			if (isset($_GET['transaction_no']) AND isset($_GET['date'])):
				$getDate = $_GET['date'];
				$sql = "SELECT * FROM kumprada WHERE date = '$getDate'";
				$result1 = mysqli_query($link, $sql) or die('Error querying database kumprada.');
				
				$sqlCapital1 = "SELECT * FROM kapital WHERE date = '$getDate'";
				$resultCapital1 = mysqli_query($link, $sqlCapital1) or die('Error querying database CAPITAL1.');
				$getCapital1 = mysqli_fetch_assoc($resultCapital1);

		?>


		<label><STRONG>Date: </STRONG></label>
		<label><?php echo $_GET['date']; ?></label>
		
		<?php $amount = 0; $expnses = 0; $totalCapital = 0; foreach ($result1 as $key => $value): ?>
			<div class="form-group form-inline">


	                <input class="form-control" type="text" placeholder="Farm" name="farm" value="<?php echo $value['farm']; ?>" disabled="">
	                &nbsp;
	                <input class="form-control" type="text" placeholder="" name="farm" value="<?php $amount = $value['pig_kilo'] * $value['pig_price'] + $value['feeds_price'];
								echo number_format($amount,2); ?>" disabled="">
	                &nbsp;
	              
	                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Expenses" disabled="">
	                &nbsp;
	                <input class="form-control" type="text" placeholder="" name="farm" value="<?php $expnses = $value['total_expenses']; echo number_format($expnses,2); ?>" disabled="">
	                &nbsp;
	               
	        </div>
        <?php $totalCapital += $amount + $expnses;  endforeach; ?>
        
        <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="TOTAL CAPITAL" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="<?php echo number_format($totalCapital,2); ?>" disabled="">
                &nbsp;               
        </div>
		<hr width="78%" align="left">
		<div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="REMITANCE" disabled="">
                &nbsp;
                <input class="form-control " type="text" id=num1 placeholder="" name="farm" value="<?php echo $getCapital1['remittance']; ?>" disabled="">
                &nbsp;
               
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Bali" disabled="">
                &nbsp;
                <input class="form-control " type="text" id=num2 placeholder="" name="farm" value="<?php echo $getCapital1['bali']; ?>" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Collectibles" disabled="">
                &nbsp;
                <input class="form-control " type="text" id=num3 placeholder="" name="farm" value="<?php echo $getCapital1['collectible']; ?>" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Feeds" disabled="">
                &nbsp;
                <input class="form-control autoAdd" type="text" id=num4 placeholder="Enter Feeds" name="farm" value="" >
                &nbsp;
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Salin" disabled="">
                &nbsp;
                <input class="form-control autoAdd" type="text" id=num5 placeholder="Enter Salin" name="farm" value="" >

                </div>
         <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Total Net" disabled="">
                &nbsp;
                <input class="form-control " type="text" id="totalnet" placeholder="" name="farm" value="" disabled="" >
               
        </div>




	</div>

	<div class="col-sm-6">
		<b><strong>STOCK</strong></b>
		
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>Date</th>
				<th>Farm</th>
				<th>Heads</th>
				<th>Kilos</th>
			</tr>
		</thead>
		<tbody>
			<?php $heads = 0; $kilo = 0; foreach ($result1 as $key => $value): ?>
			<tr>
				<td><?php echo $value['date']; ?></td>
				<td><?php echo $value['farm']; ?></td>
				<td>
					<?php
						$heads += $value['no_pigs'];
						echo  $value['no_pigs'];
					?>	
				</td>
				<td>
					<?php
						$kilo += $value['pig_kilo'];
						echo $value['pig_kilo'];
					?>
					
				</td>
			</tr>
		<?php endforeach; ?>
		<!-- 	<tr>
				<td>10/11/2019</td>
				<td>JUX</td>
				<td></td>
				<td></td>
			</tr> -->
			<tr>
				<td colspan="2">Total</td>
				
				<td><?php echo $heads; ?></td>
				<td><?php echo $kilo; ?></td>
			</tr>
		</tbody>
		</table>

	</div>
	<?php
		endif;
	?>
</div>
</div>

<?php include_once('footer.php'); ?>

<script type="text/javascript">
    (function($) {
        'use strict';

        $('.autoAdd').on('keyup', function(){
            var num1 = $('#num1').val(),
            	num2 = $('#num2').val(),
            	num3 = $('#num3').val(),
            	num4 = $('#num4').val(),
            	num5 = $('#num5').val();
        	
            var total = Number(num1) + Number(num2) + Number(num3) + Number(num4) + Number(num5);
            
            $('#totalnet').val(addCommas(total));

        });
        function addCommas(x) {
        var parts = x.toString().split('.');
        parts[0] = parts[0]
                   .replace(/\D/g, "")
                   .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    })(jQuery);;
</script>
