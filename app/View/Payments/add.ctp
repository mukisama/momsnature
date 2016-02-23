<div class="payments form">
<?php echo $this->Form->create('Payment'); ?>
	<fieldset>
		<legend><?php echo __('Add Payment'); ?></legend>
	<?php
		echo $this->Form->input('transaction_number');
		echo $this->Form->input('receipt_number');
		echo $this->Form->input('method');
		echo $this->Form->input('copy');
		echo $this->Form->input('remarks');
		echo $this->Form->input('created_on');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Payments'), array('action' => 'index')); ?></li>
	</ul>
</div>
