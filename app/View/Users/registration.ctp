<div class="users form">
<?php echo $this->Form->create('User', array(
	'enctype'=>'multipart/form-data',
	'class' => 'form-horizontal',
	'role' => 'form',
	'inputDefaults' => array(
    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
    'div' => array('class' => 'form-group'),
    'label' => array('class' => 'col-lg-2 control-label'),
    'between' => '<div class="col-lg-3">',
    'after' => '</div>',
    'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
))); ?>
	<fieldset>
		<h2>Registration</h2>
		<br/>
		<h4 class="page-header">User Details</h4>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('name', array('label' => array('text' => 'Full Name', 'class' => 'col-lg-2 control-label')));
		echo $this->Form->input('ic_no',array('label' => array('text' => 'IC Number', 'class' => 'col-lg-2 control-label')));
		echo $this->Form->input('hp_no', array('label' => array('text' => 'Contact Number', 'class' => 'col-lg-2 control-label')));
		echo $this->Form->input('email');
		echo $this->Form->input('address');
		echo $this->Form->input('state_id', array('empty'=>'Please select..'));
		echo $this->Form->input('district_id', array('empty'=>'Please select..'));
		echo $this->Form->hidden('role_id',array('value'=>$role_id));
		//echo $this->Form->input('copy', array('type'=>'file','label' => array('text' => 'Attachment', 'class' => 'col-lg-2 control-label')));

	?>
	<div class="form-group"><label for="UserCopy" class="col-lg-2 control-label">Attachment</label><div class="col-lg-3"><div class="input file"><input type="file" name="data[User][copy]" class="form-control" id="UserCopy"/><small><i>Please upload a copy of your MyKad</i></small></div></div></div>
	<h4 class="page-header">Shop Details</h4>
	<?php
		echo $this->Form->input('shop_name');
		echo $this->Form->input('shop_address');
		echo $this->Form->input('shop_contact_number',array('label' => array('text' => 'Contact Number', 'class' => 'col-lg-2 control-label')));
		echo $this->Form->input('shop_link',array('label' => array('text' => 'Website URL (if any)', 'class' => 'col-lg-2 control-label')));
	?>
	</fieldset>
	<?php echo $this->Form->submit('Submit',array('class'=>'btn btn-primary')); ?>
</div>
<?php
$this->Js->get('#UserStateId')->event('change',
	$this->Js->request(array(
		'controller'=>'districts',
		'action'=>'getByState'
		), array(
		'update'=>'#UserDistrictId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
		))
	))
);
?>
