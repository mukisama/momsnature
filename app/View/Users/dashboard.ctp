
  <h1>
    <?php
      $user = $this->Session->read('Auth.User');
      if(!empty($user)) {
          echo 'Welcome, ', $user['username'] , '!';
      }
    ?>
  </h1>
  <h3>Whats New?</h3>

  <div class="row">
    <ul class="bxslider">
    <?php foreach ($products as $product):?>
    <li>
            <?php echo $this->Html->link($this->Html->image($product['Product']['pictures']),
                    array('controller'=>'products','action'=>'view',$product['Product']['id']),
                    array('escape'=>false,'class'=>'thumbnail-view'));?>
            <div class="caption">
                <h5>
                    <?php echo $product['Product']['name'];?>
                </h5>
                <h5>
                    Price:RM
                    <?php echo $product['Product']['agent_price'];?>
                </h5>
            </div>
  </li>
    <?php endforeach;?>
  </ul>
</div>
  <h3 class="sub-header">Purchase list</h3>
  <?php if($orders != null): ?>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Receipt Number</th>
          <th>Status</th>
          <th>Amount(RM)</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $order): ?>
      	<tr>
      		<td><?php echo h($order['Order']['transaction_number']); ?>&nbsp;</td>
          <td><?php echo ($order['Payment']['receipt_number'] == null)? "n/a" : $order['Payment']['receipt_number'] ; ?>&nbsp;</td>
      		<td><?php echo h($order['Order']['order_status']); ?>&nbsp;</td>
      		<td><?php echo h($order['Order']['amount']); ?>&nbsp;</td>
      		<td><?php echo h($order['Order']['created_on']); ?>&nbsp;</td>
      		<td class="actions">
      			<?php echo $this->Html->link(__('View'), array('controller'=>'orders','action' => 'view', $order['Order']['id'])); ?>
      		</td>
      	</tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: echo "No purchase done yet"; ?>
<?php endif; ?>
  <script>
  $(document).ready(function(){
    $('.bxslider').bxSlider({
      minSlides: 3,
      maxSlides: 3,
      slideWidth: 600,
      slideMargin: 10,
      pager: false
    });
  });
  </script>
