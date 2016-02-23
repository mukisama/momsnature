<div class="users index">
  <h3>
    <?php echo __('Agents List'); ?>
  </h3>
  <table cellpadding="0" cellspacing="0" class="table table-striped">
  <thead>
  <tr>
      <th><?php echo $this->Paginator->sort('name'); ?></th>
      <th><?php echo $this->Paginator->sort('ic_no', 'IC'); ?></th>
      <th><?php echo $this->Paginator->sort('hp_no', 'Mobile no.'); ?></th>
      <th><?php echo $this->Paginator->sort('email'); ?></th>
      <th><?php echo $this->Paginator->sort('state_id'); ?></th>
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
    <td><?php echo h($agent['User']['shop_name']); ?>&nbsp;</td>
    <td><?php echo $agent['User']['shop_link']; ?>&nbsp;</td>
    <td class="actions">
      <?php echo $this->Html->link(__('View'), array('action' => 'view', $agent['User']['id'])); ?>
      <?php echo $this->Form->postLink(__('Add'), array('action' => 'addAgents', 'wholeseller'=>$wholeseller, 'agent'=>$agent['User']['id']),array(	'confirm' => __('Are you sure you want to add agent?'))); ?>
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
