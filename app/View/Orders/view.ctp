<div class="users view">
  <h3>Order Details</h3>
	<!-- profile -->
    <div id="profile" class="tab-pane">
    <section>
  	<div class="panel-body bio-graph-info">

    <div class="row">
    <div class="col-md-3">
      <p><b><span>Order Number</span>: </b></p>
    </div>
		<div class="col-md-3">
			<?php echo h($order['Order']['transaction_number']); ?>
		</div>
    <div class="col-md-3">
      <p><b><span>Status</span>:</b></p>
		</div>
		<div class="col-md-3">
			<?php echo h($order['Order']['order_status']); ?>
			<?php
				if($order['Order']['order_status'] === "Pending Payment" && $order['Order']['user_id'] == AuthComponent::user('id')){
					echo $this->Html->link('Pay Now',array('controller'=>'carts','action'=>'payment',$order['Order']['transaction_number']),array('class'=>'btn btn-sm btn-warning'));
				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
  		<p><b><span>Amount (RM)</span>:</b></p>
		</div>
		<div class="col-md-3">
			<?php echo h($order['Order']['amount']); ?>
		</div>
		<div class="col-md-3">
			<p><b><span>Ordered by</span>:</b></p>
		</div>
		<div class="col-md-3">
			<?php echo h($order['User']['name']); ?>
		</div>
	</div>
  <div class="row">
    <div class="col-md-3">
      <p><b><span>Receipt Number</span>:</b></p>
    </div>
    <div class="col-md-3">
      <?php echo ($order['Payment']['receipt_number'] == null)? "n/a" : $this->Html->link($order['Payment']['receipt_number'],array('controller'=>'orders','action'=>'viewReceipt',$order['Order']['transaction_number'])); ?>
    </div>
  </div>
	</div>
	</section>
	</div>
</div>

<div class="orders index">
	<h3>Items List</h3>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
	<tr>
			<th>No</th>
			<th>Item</th>
			<th>Quantity</th>
			<th>Amount (RM)</th>
			<th>Remarks</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($items as $item): ?>
	<tr>
		<td>#</td>
		<td><?php echo h($item['Product']['name']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['amount']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['remarks']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
