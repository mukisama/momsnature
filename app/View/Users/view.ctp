<div class="users view">
	<!-- profile -->
    <div id="profile" class="tab-pane">
    <section>
  	<div class="panel-body bio-graph-info">
    <h3 class="page-header">Personal Details<?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary col-md-offset-7','escape'=>false));?></h3>
    <div class="row">
    <div class="bio-row">
      <p><span>Username</span>: <?php echo h($user['User']['name']); ?> </p>
    </div>
    <div class="bio-row">
      <p><span>Role</span>: <?php echo h($user['Role']['name']); ?></p>
		</div>
		<div class="bio-row">
  		<p><span>IC Number</span>: <?php echo h($user['User']['ic_no']); ?></p>
		</div>
		<div class="bio-row">
			<p><span>Contact</span>: <?php echo h($user['User']['hp_no']); ?></p>
		</div>
		<div class="bio-row">
			<p><span>Email</span>: <?php echo h($user['User']['email']); ?></p>
		</div>
    <div class="bio-row">
      <p><span>Address</span>: <?php echo h($user['User']['address']); ?></p>
		</div>
    <div class="bio-row">
      <p><span>State</span>: <?php echo $user['State']['name']; ?></p>
  	</div>
    <div class="bio-row">
      <p><span>District </span>: <?php echo $user['District']['name']; ?></p>
  	</div>
	</div>
</div>
</section>
</div>
<!-- edit-profile -->
<div id="profile" class="tab-pane">
<section>
<div class="panel-body bio-graph-info">
<h3 class="page-header">Shop Details</h3>
<div class="row">
<div class="bio-row">
	<p><span>Name</span>: <?php echo h($user['User']['shop_name']); ?> </p>
</div>
<div class="bio-row">
	<p><span>Contact</span>: <?php echo h($user['User']['shop_contact_number']); ?></p>
</div>
<div class="bio-row">
	<p><span>Address</span>: <?php echo h($user['User']['shop_address']); ?></p>
</div>
<div class="bio-row">
	<p><span>URL</span>: <?php echo h($user['User']['shop_link']); ?></p>
</div>
</div>
</div>
</section>
</div>
<?php if($user['User']['role_id']==4): ?>
  <div class="users index">
  	<h3>
      <?php echo __('Agents List'); ?>
      <?php if(AuthComponent::user('role_id')==1){
        echo $this->Html->link(__('Add Agents', true), array('action' => 'addAgents',$user['User']['id']), array('class' => 'btn btn-success col-md-offset-9'));
      };?>
    </h3>
  	<table cellpadding="0" cellspacing="0" class="table table-striped">
  	<thead>
  	<tr>
  			<th><?php echo $this->Paginator->sort('name'); ?></th>
  			<th><?php echo $this->Paginator->sort('ic_no', 'IC'); ?></th>
  			<th><?php echo $this->Paginator->sort('hp_no', 'Mobile no.'); ?></th>
  			<th><?php echo $this->Paginator->sort('email'); ?></th>
  			<th><?php echo $this->Paginator->sort('state_id'); ?></th>
  			<th><?php echo $this->Paginator->sort('role_id'); ?></th>
  			<th>SHOP</th>
  			<th>URL</th>
  			<th class="actions"><?php echo __('Actions'); ?></th>
  	</tr>
  	</thead>
  	<tbody>
  	<?php foreach ($agents as $agent): ?>
  	<tr>
  		<td><?php echo h($agent['User']['name']); ?>&nbsp;</td>
  		<td><?php echo h($agent['User']['ic_no']); ?>&nbsp;</td>
  		<td><?php echo h($agent['User']['hp_no']); ?>&nbsp;</td>
  		<td><?php echo h($agent['User']['email']); ?>&nbsp;</td>
  		<td><?php echo h($agent['State']['name']); ?>&nbsp;</td>
  		<td><?php echo h($agent['Role']['name']); ?>&nbsp;</td>
  		<td><?php echo h($agent['User']['shop_name']); ?>&nbsp;</td>
  		<td><?php echo $agent['User']['shop_link']; ?>&nbsp;</td>
  		<td class="actions">
  			<?php echo $this->Html->link(__('View'), array('action' => 'view', $agent['User']['id'])); ?>
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
<?php endif; ?>
</div>
