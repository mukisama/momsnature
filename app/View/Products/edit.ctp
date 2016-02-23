<div class="products form">
<?php echo $this->Form->create('Product',array(
	'enctype'=>'multipart/form-data',
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
		<legend><?php echo __('Edit Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('SKU');
		echo $this->Form->input('category_id');
		echo $this->Form->input('type_id');
		echo $this->Form->input('description');
		echo $this->Form->input('manufacturer');
		echo $this->Form->input('wholeseller_price');
		echo $this->Form->input('agent_price');
		echo $this->Form->input('pictures', array('type' => 'file'));
	?>
	<div class="form-group">
		<label class="col-lg-2 control-label">Active?</label>
		<div class="col-lg-3">
			<div class="input-control">
				<input type="checkbox" name="data[Product][isActive]" class="" <?php if($this->request->data['Product']['isActive']==true):?>checked="checked"<?php endif; ?></input>
		</div>
		</div>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
