<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('dashboard');
		echo $this->Html->css('jquery.bxslider.css');
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('bootstrap.min');

	?>

</head>
<body>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="error-template">
                  <h1>
                      Oops!</h1>
                  <h2>
                      404 Not Found</h2>
                  <div class="error-details">
                      Sorry, an error has occured, Requested page not found!
                  </div>
                  <div class="error-actions">
                      <a href="http://www.momsnature.com.my" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                          Take Me Home </a>&nbsp;&nbsp;<a href="http://www.momsnature.com.my" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                  </div>
              </div>
          </div>
      </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<?php echo $this->Html->script('ie10-viewport-bug-workaround.js');?>
		<?php	echo $this->Html->script('jquery.bxslider.js');	?>

</body>
</html>
