<div class="payments form">
<?php echo $this->Form->create('Payment',array(
	'class' => 'form-horizontal',
	'role' => 'form',
	'inputDefaults' => array(
		'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
		'div' => array('class' => 'form-group'),
		'class' => array('form-control'),
		'label' => array('class' => 'col-lg-2 control-label'),
		'between' => '<div class="col-lg-3">',
		'after' => '</div>',
		'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
))); ?>
	<fieldset>
		<legend><?php echo __('Payment Processing (Edit)'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('transaction_number',array('label'=>'Order no.'));
		$options = array('Cheque'=>'Cheque','Bank Transfer'=>'Bank Transfer','Bank Depost'=>'Bank Depost','Cash Term'=>'Cash Term','Cash (direct)'=>'Cash (direct)');
		echo $this->Form->input('method',array('options'=>$options));
		echo $this->Form->input('remarks');
		echo $this->Form->input('copy',array('label'=>'Attachment', 'type'=>'file'));

		?>
		<div class="form-group">
			<label class="col-lg-2 control-label">Approve?</label>
			<input type="checkbox" name="data[Payment][isApproved]" class="" <?php if($this->request->data['Payment']['isApproved']==true):?>checked="checked"<?php endif; ?></input>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
