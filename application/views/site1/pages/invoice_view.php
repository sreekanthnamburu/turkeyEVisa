<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="<?php echo base_url();?>css/invoice.css">
	</head>
	<body onLoad="window.print()">
		<header>
			<h1>Invoice</h1>
			<address >
				<p>Turkey Visa Pro</p>
				<p>3-5 Excelsior House Balfour Road, Ilford, Essex IG1 4HP</p>
				<p>0800 133 7567</p>
			</address>
			<span><img alt="" src="<?php echo base_url();?>images/Logo.png"</span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address >
				<p><b><?=explode('?|',$firstname)[0];?></b></p>
				<p><?=$address?></p>
				<p><?=$phone;?></p>
			</address>
                       
			<table class="meta">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span ><?=$invoiceid?></span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
					<td><span ><?=$paymentdate?$paymentdate:$createddate?></span></td>
				</tr>
				<tr>
					<th><span >Amount Paid</span></th>
					<td><span id="prefix" >$</span><span><?=$paymentdetails['total']?></span></td>
				</tr>
			</table>
             <table class="meta" style="width:20%">
				<tr>
					<td style="border:none;padding:0;"><?=$qrcode;?></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Name</span></th>
						<th><span >Description</span></th>
						<th><span >Embassy Fee</span></th>
						<th><span >Service fee</span></th>
						<th><span >Price</span></th>
					</tr>
				</thead>
				<tbody>
                <?php $visa=explode('?|',$firstname);?>
                <?php foreach($visa as $name){?>
					<tr>
						<td><span><?=$name;?></span></td>
						<td><span >Turkey Visa Payment</span></td>
						<td><span data-prefix>$</span><span ><?=$paymentdetails['price']?></span></td>
						<td><span data-prefix>$</span><span ><?=$paymentdetails['service_fee']?></span></td>
						<td><span data-prefix>$</span><span><?=$paymentdetails['price']+$paymentdetails['service_fee']?></span></td>
					</tr>
                    <?php }?>
                    <tr>
						<td colspan="4" style="font-weight:bold;font-size:16px;text-align:right">Grand Total</td>
						<td style="font-weight:bold;font-size:16px;text-align:right"><span data-prefix>$</span><span><?=$paymentdetails['total']?></span></td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span >Total Embassy Fee</span></th>
					<td><span data-prefix>$</span><span><?=$paymentdetails['price']*$paymentdetails['applicants']?></span></td>
				</tr>
				<tr>
					<th><span >Total Service Fee</span></th>
					<td><span data-prefix>$</span><span ><?=$paymentdetails['service_fee']*$paymentdetails['applicants']?></span></td>
				</tr>
				<tr>
					<th style="font-weight:bold;font-size:16px;text-align:right"><span>Grand Total</span></th>
					<td style="font-weight:bold;font-size:16px;text-align:right"><span data-prefix>$</span><span><?=$paymentdetails['total']?></span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span >Additional Notes</span></h1>
			<div >
				<p>This Is Computer generation slip. no need to signature authentication</p>
			</div>
		</aside>
	</body>
</html>