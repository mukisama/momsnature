<div class="container">
  <h3 class="page-header">Payment Method</h3>
	<div class="row">
        <div class="col-lg-10 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-inbox"></h4><br/>Cheque
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-transfer"></h4><br/>Bank Transfer
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-home"></h4><br/>Bank Deposit
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-list"></h4><br/>Cash Term
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-usd"></h4><br/>Cash (direct)
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">

                <div class="bhoechie-tab-content active">
                    <center>
                      <div class="form">
                      <?php echo $this->Form->create('Payment',array(
                        'enctype'=>'multipart/form-data',
                        'class' => 'form-horizontal',
                        'role' => 'form',
                        'inputDefaults' => array(
                          'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                          'div' => array('class' => 'form-group'),
                          'class' => array('form-control'),
                          'label' => array('class' => 'col-lg-2 control-label'),
                          'between' => '<div class="col-lg-9">',
                          'after' => '</div>',
                          'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                      ))); ?>
                      <br/>
                        <fieldset>
                        <?php
                          echo $this->Form->input('transaction_number', array('label'=>'Order No','value'=>$transaction_no));
                          echo $this->Form->input('amount',array('value'=>$amount));
                          echo $this->Form->hidden('method',array('value'=>'Cheque'));
                          echo $this->Form->input('remarks',array('type'=>'textarea'));
                          echo $this->Form->input('Attachment', array('type'=>'file'));
                        ?>
                        <p class="pull-right">
                            <?php echo $this->Html->link('Pay Later',array('action'=>'skip_payment',$transaction_no),array('class'=>'btn btn-warning')); ?>
                            <?php //echo $this->Html->link('Continue',array('action'=>'payment'),array('class'=>'btn btn-primary')); ?>
                            <?php //echo $this->Form->submit('Continue',array('class'=>'btn btn-primary')); ?>
                            <input class="btn btn-primary" type="submit" value="Continue"/>
                        </p>
                        </fieldset>
                        <?php echo $this->Form->end(); ?>
                      </div>
                    </center>
                </div>
            </div>
        </div>
  </div>
</div>
<script>
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        var method = "";
        switch(index) {
            case 0:
                method = "Cheque";
                break;
            case 1:
                method = "Bank Transfer";
                break;
            case 2:
                method = "Bank Deposit";
                break;
            case 3:
                method = "Cash Term";
                break;
            case 4:
                method = "Cash (direct)";
                break;
        }
        $("#PaymentMethod").val(method);
    });
});
</script>
