<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>MOMSNATURE AGENT PORTAL</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('dashboard');
		echo $this->Html->css('jquery.bxslider.css');
		echo $this->Html->css('animate.css');
		echo $this->Html->css('font-awesome.min');
		//echo $this->Html->css('sweetalert.css');
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('bootstrap.min');
		//echo $this->Html->script('sweetalert.min.js');
	?>
</head>
<body>
<?php $user = $this->Session->read('Auth.User') ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MOMSNATURE AGENT PORTAL</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
						<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge" id="cart-counter">'.$count.'</span>',
		                                        array('controller'=>'carts','action'=>'view'),array('escape'=>false));?></li>
            <li><?php echo $this->Html->link('Profile',array('controller'=>'users','action'=>'view',AuthComponent::user('id'))) ?></li>
            <li><?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout')) ?></li>
          </ul>
					<!--
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
				-->
				<div>
				</div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link('Home',array('controller'=>'users','action'=>'dashboard')) ?></li>
            <li><?php echo $this->Html->link('Order List',array('controller'=>'orders','action'=>'index')) ?></li>
            <li><?php echo $this->Html->link('View Products',array('controller'=>'products','action'=>'catalogue')) ?></li>
            <li><?php echo $this->Html->link( 'Visit Main Website', 'http://www.momsnature.com.my' ); ?></li>
						<?php if(AuthComponent::user('role_id') == 1){
							echo "<li><a href='#' style='background-color: #e1e1e1;'>Admin Functions</a></li>";
							echo "<li>".$this->Html->link('Products List',array('controller'=>'products','action'=>'index'))."</li>";
							echo "<li>".$this->Html->link('Order List',array('controller'=>'orders','action'=>'admin_view'))."</li>";
							echo "<li>".$this->Html->link('Payment List',array('controller'=>'payments','action'=>'index'))."</li>";
							echo "<li>".$this->Html->link('User List',array('controller'=>'users','action'=>'index'))."</li>";
							echo "<li>".$this->Html->link('Generate Link',array('controller'=>'users','action'=>'generateLink'))."</li>";
						}?>
          </ul>
        </div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<?php echo $this->Html->script('ie10-viewport-bug-workaround.js');?>
		<?php	echo $this->Html->script('jquery.bxslider.js');	?>
		<?php
			if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
			// Writes cached scripts
			?>

</body>
</html>
