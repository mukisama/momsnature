<div class="alert alert-success alert-hover" id="flash_success">
    <button class="close">x</button>
    <i class="fa fa-check"></i> <?php echo $message; ?>
</div>

<script type="text/javascript">
$('#flash_success').addClass('animated fadeInDown');
$( ".close" ).click(function() {
    jQuery('#flash_success').removeClass('fadeInDown');
    jQuery('#flash_success').addClass('fadeOutUp');
});
</script>
