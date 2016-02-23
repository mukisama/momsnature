<?php echo $this->Form->create('Cart',array('id'=>'update','url'=>array('action'=>'update')));?>
<div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h3>Order List</h3>
      </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $total=0;?>
                <?php foreach ($products as $product):?>
                <tr>
                    <td><?php echo $product['Product']['name'];?></td>
                    <td>RM<?php echo $product['Product']['agent_price'];?></td>
                    <td>
                        <div class="col-xs-3">
                            <?php echo $this->Form->hidden('product_id.',array('value'=>$product['Product']['id']));?>
                            <?php echo $this->Form->input('count.',array('type'=>'number', 'label'=>false,
                                    'class'=>'form-control input-sm item-count', 'value'=>$product['Product']['count']));?>
                        </div>
                    </td>
                    <td>RM<?php echo number_format(($product['Product']['count']*$product['Product']['agent_price']), 2); ?></td>
                </tr>
                <?php $total = $total + ($product['Product']['count']*$product['Product']['agent_price']);?>
                <?php endforeach;?>

                <tr class="success">
                    <td colspan=3></td>
                    <td>RM<?php echo number_format($total, 2);?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php echo $this->Form->end(); ?>
        <p class="text-right">
            <?php
              echo $this->Html->link('Continue Shopping',array('controller'=>'products','action'=>'catalogue'), array('class'=>'btn btn-primary'));
              echo "&nbsp;";
              if($products != null){
                echo $this->Html->link('Checkout', array('action'=>'checkout'), array('class'=>'btn btn-success'));
                //echo $this->Form->submit('Checkout',array('class'=>'btn btn-success','div'=>false));
              }else{
                echo $this->Html->link('Checkout', array('action'=>''), array('class'=>'btn btn-success','disabled'=>true));
                //echo $this->Form->submit('Checkout',array('class'=>'btn btn-success','div'=>false, 'disabled'=>true));
              }
            ?>
        </p>
    </div>
</div>
<?php echo $this->Form->end();?>
<script type="text/javascript">
$(document).ready(function(){
  $(".item-count").on('change', function(){
    $("#update").submit();
  });
});
</script>
