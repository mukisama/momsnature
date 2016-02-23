<div class="table-responsive">
	<h3><?php echo __('Products List'); ?>
<?php echo $this->Html->link(__('Add New', true), array('action' => 'add'), array('class' => 'btn btn-success col-md-offset-9'));?>
	</h3>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('SKU'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('wholeseller_price'); ?></th>
			<th><?php echo $this->Paginator->sort('agent_price'); ?></th>
			<th><?php echo $this->Paginator->sort('isActive','Active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['SKU']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Category']['description'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['Type']['description'], array('controller' => 'types', 'action' => 'view', $product['Type']['id'])); ?>
		</td>
		<td><?php echo h($product['Product']['wholeseller_price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['agent_price']); ?>&nbsp;</td>
		<td><?php if($product['Product']['isActive']){ echo "Yes";}else{ echo "No";}?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array(	'confirm' => __('Are you sure you want to delete item %s?', $product['Product']['SKU']))); ?>
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
<!--<span class="glyphicon glyphicon-ok" style="color:green"></span>-->
