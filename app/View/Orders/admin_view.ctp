<div class="orders index">
	<h3><?php echo __('Orders'); ?></h3>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('transaction_number','Order Number'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id','Ordered by'); ?></th>
			<th><?php echo $this->Paginator->sort('order_status'); ?></th>
			<th><?php echo $this->Paginator->sort('amount','Amount (RM)'); ?></th>
			<th><?php echo $this->Paginator->sort('created_on','Date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo h($order['Order']['transaction_number']); ?>&nbsp;</td>
		<td><?php echo h($order['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['order_status']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['amount']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['created_on']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
