<div class="row">
    <div class="col-lg-5 col-md-5 pop">
				<span class="img-label">Click to view</span>
        <?php echo $this->Html->link($this->Html->image($payment['Payment']['copy'],array('height'=>480,'width'=>'400')),
                array('action'=>'../img/'.$payment['Payment']['copy']),
                array('target'=>'_blank', 'escape'=> false));?>
    </div>

    <div class="col-lg-6 col-md-6">
				<label style="color:#337ab7">Order Number</label>
        <h4><?php echo $payment['Payment']['transaction_number'];?></h4>
				<label style="color:#337ab7">Payment Method</label>
				<h4><?php echo $payment['Payment']['method'];?></h4>
        <label style="color:#337ab7">Payment Status</label>
				<h4><?php echo ($payment['Payment']['isApproved'])? "Approved" : "Not Approved";?></h4>
				<label style="color:#337ab7">Remarks</label>
        <h4><?php echo ($payment['Payment']['remarks'] == null)? "-" : $payment['Payment']['remarks'];?></h4>
        <p>
            <?php if($payment['Payment']['isApproved'] == 0): ?>
              <?php echo $this->Form->create('Payment', array('action' =>'approve'));?>
              <?php echo $this->Form->hidden('id',array('value'=>$payment['Payment']['id']))?>
              <?php echo $this->Form->submit('Approve Payment',array('class'=>'btn-success btn'));?>
              <?php echo $this->Form->end();?>
            <?php endif; ?>
        </p>
    </div>
</div>
