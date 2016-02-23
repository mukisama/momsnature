<div class="payments index">
	<h3><?php echo __('Payments'); ?></h3>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('transaction_number','Order Number'); ?></th>
			<th><?php echo $this->Paginator->sort('receipt_number'); ?></th>
			<th><?php echo $this->Paginator->sort('method'); ?></th>
			<th><?php echo $this->Paginator->sort('remarks'); ?></th>
      <th>Status</th>
			<th><?php echo $this->Paginator->sort('created_on','Date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($payments as $payment): ?>
	<tr>
		<td><?php echo h($payment['Payment']['transaction_number']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['receipt_number']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['method']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['remarks']); ?>&nbsp;</td>
    <td><?php echo ($payment['Payment']['isApproved'] == 1)? "<span class='label label-success'>Approved</span>" : "<span class='label label-warning'>Pending</span>"; ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['created_on']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $payment['Payment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $payment['Payment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $payment['Payment']['id']), array('confirm' => __('Are you sure you want to delete payment %s?', $payment['Payment']['transaction_number']))); ?>
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
