
<div class="container">
    <div class="well well-sm">
        <strong>Products</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span>List</a>
            <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>

    <div id="products" class="row list-group">
		<?php foreach($products as $product): ?>
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <?php echo $this->Html->image($product['Product']['pictures'],array('class'=>'thumbnail'));?>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading"><?php echo $product['Product']['name'];?></h4>
                    <p class="group inner list-group-item-text"><?php
                    $truncated_descr = (strlen($product['Product']['description']) > 150) ? substr($product['Product']['description'], 0, 150) . '...' : $product['Product']['description'];
                    echo $truncated_descr;
                    ?></p>
										<div class="row">
                        <div class="col-xs-12 col-md-6">
													Price: RM<?php echo $product['Product']['agent_price'];?>
                        </div>
                    </div>
                    <br/>
                      <div class="view-product">
                      <?php echo $this->Html->link(__('View', true), array('action' => 'view', $product['Product']['id']), array('class' => 'btn btn-lg btn-success'));?>
                      </div>

                </div>

            </div>
        </div>
			<?php endforeach ?>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>
