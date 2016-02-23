<?php
ob_start();
phpinfo();
$info = ob_get_contents();
ob_end_clean();
?>
