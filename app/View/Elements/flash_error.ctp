<div class="alert alert-danger alert-hover" id="flash_error">
    <button class="close">x</button>
    <i class="fa fa-cross"></i> <?php echo $message; ?>
</div>

<script type="text/javascript">
$('#flash_error').addClass('animated fadeInDown');
$( ".close" ).click(function() {
    jQuery('#flash_error').removeClass('fadeInDown');
    jQuery('#flash_error').addClass('fadeOutUp');
});
</script>
