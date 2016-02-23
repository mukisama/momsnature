
<div class="row">
    <div class="col-lg-4 col-md-4">
			<!--'$product['Product']['pictures']-->
        <?php echo $this->Html->image($product['Product']['pictures'],array('class'=>'thumbnail-view'));?>
    </div>

    <div class="col-lg-8 col-md-8">
        <h2 class="page-header"><?php echo $product['Product']['name'];?></h2>
        <h3>
            Price: RM
            <?php echo $product['Product']['agent_price'];?> per unit
        </h3>
        <h3>Item Details</h3>
        <p><?php echo $product['Product']['description'];?></p>
        <p>
            <?php echo $this->Form->create('Cart',array('id'=>'add-form','url'=>array('controller'=>'carts','action'=>'add')));?>
            <?php echo $this->Form->hidden('product_id',array('value'=>$product['Product']['id']))?>
            <?php echo $this->Html->link('Back',array('action'=>'catalogue'),array('class'=>'btn btn-lg btn-primary')); ?>
            <input type="submit" class="btn-success btn btn-lg" value="Add to Cart"></input>
            <?php //echo $this->Form->submit('Add to cart',array('class'=>'btn-success btn btn-lg'));?>
            <?php echo $this->Form->end();?>
        </p>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#add-form').submit(function(e){
        e.preventDefault();
        var tis = $(this);
        $.post(tis.attr('action'),tis.serialize(),function(data){
            $('#cart-counter').text(data);
        });
    });
});
</script>
