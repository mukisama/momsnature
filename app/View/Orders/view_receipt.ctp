<div class="users view">
  <h3>Receipt Details</h3>
	<!-- profile -->
    <div id="profile" class="tab-pane">
    <section>
  	<div class="panel-body bio-graph-info">

  <div class="row">
    <div class="col-md-3">
      <p><b><span>Payment From</span>: </b></p>
    </div>
		<div class="col-md-3">
		</div>
    <div class="col-md-3">
      <p><b><span>Date of Receipt:</span>:</b></p>
		</div>
		<div class="col-md-3">
			<?php
      $date = date("d-M-Y",strtotime($order['Payment']['created_on']));
      echo $date;
       ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<?php echo h($order['User']['shop_name']).","; ?>
		</div>
		<div class="col-md-3">
			<p><b><span>Receipt Number:</span>:</b></p>
		</div>
		<div class="col-md-3">
			<?php echo h($order['Payment']['receipt_number']); ?>
		</div>
	</div>
  <div class="row">
    <div class="col-md-6">
      <?php echo h($order['User']['shop_address']); ?>
    </div>
    <div class="col-md-3">
      <p><b><span>Order Number:</span>:</b></p>
    </div>
    <div class="col-md-3">
      <?php echo h($order['Order']['transaction_number']); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?php echo h($order['User']['shop_contact_number']); ?>
    </div>
  </div>
	</div>
	</section>
	</div>
</div>
<br/>
<div class="orders index">
	<p>Payment for the Purchases of the following:-</p>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
	<tr>
			<th>No</th>
			<th>Product Name</th>
      <th>SKU No</th>
      <th>RM/unit</th>
			<th>Quantity</th>
			<th>Total</th>
	</tr>
	</thead>
	<tbody>
  <?php $total = "" ?>
	<?php foreach ($items as $item): ?>
	<tr>
		<td>#</td>
		<td><?php echo h($item['Product']['name']); ?>&nbsp;</td>
		<td><?php echo h($item['Product']['SKU']); ?>&nbsp;</td>
		<td><?php echo h($item['Product']['agent_price']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['quantity']); ?>&nbsp;</td>
    <td><?php echo h($item['Item']['amount']); ?>&nbsp;</td>
	</tr>
  <?php $total += $item['Item']['amount']; ?>
<?php endforeach; ?>
  <tr>
    <td colspan="5" align="right"><b> Total (RM) </b></td>
    <td><?php echo $total ?></td>
  <tr>
	</tbody>
	</table>
</div>
<?php echo $this->Html->link(__('PDF'), array('action' => 'viewReceipt', 'ext' => 'pdf',$order['Order']['transaction_number'])); ?>
