<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>MOMSNATURE AGENT PORTAL</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('dashboard');
		echo $this->Html->css('jquery.bxslider.css');
		echo $this->Html->css('animate.css');
		echo $this->Html->css('font-awesome.min');
		//echo $this->Html->css('sweetalert.css');
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('bootstrap.min');
	?>

<style>
.label{
  font-weight: bold;
}
.table {
    border-collapse: collapse;
}
.table td { border-bottom: 1px solid #000; }
</style>
</head>
<body>
    <div class="container-fluid">
      <div class="row">
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="users view">
          <h3>Receipt Details</h3>
        	<!-- profile -->
            <div id="profile" class="tab-pane">
            <section>
          	<div class="panel-body bio-graph-info">

          <table width="100%">
          <tr>
            <td class="label">Payment by</td>
            <td></td>
            <td class="label">Date of Receipt</td>
            <td><?php
            $date = date("d-M-Y",strtotime($order['Payment']['created_on']));
            echo $date;
             ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo h($order['User']['shop_name']).","; ?></td>
            <td class="label">Receipt Number</td>
            <td><?php echo h($order['Payment']['receipt_number']); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo h($order['User']['shop_address']); ?></td>
            <td class="label">Order Number</td>
            <td><?php echo h($order['Order']['transaction_number']); ?></td>
          </tr>
        </table>
        <br/>
        <div class="orders index">
        	<p>Payment for the Purchases of the following:-</p>
        	<table cellpadding="5" cellspacing="5" class="table">
        	<thead>
        	<tr>
        			<th>Product Name</th>
              <th>SKU No</th>
              <th>RM/unit</th>
        			<th>Quantity</th>
        			<th>Total(RM)</th>
        	</tr>
        	</thead>
        	<tbody>
          <?php $total = "" ?>
        	<?php foreach ($items as $item): ?>
        	<tr>
        		<td><?php echo h($item['Product']['name']); ?>&nbsp;</td>
        		<td><?php echo h($item['Product']['SKU']); ?>&nbsp;</td>
        		<td><?php echo h($item['Product']['agent_price']); ?>&nbsp;</td>
        		<td><?php echo h($item['Item']['quantity']); ?>&nbsp;</td>
            <td><?php echo h($item['Item']['amount']); ?>&nbsp;</td>
        	</tr>
          <?php $total += $item['Item']['amount']; ?>
        <?php endforeach; ?>
          <tr>
            <td colspan="4" align="right"><b> Total (RM) </b></td>
            <td><?php echo $total ?></td>
          </tr>
        	</tbody>
        	</table>
        </div>
				</div>
      </div>
    </div>
</body>
</html>
