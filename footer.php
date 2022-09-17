<?php

/**
 * Theme Footer
 * 
 * @package Auila
 */
?>


<footer>Theme Footer</footer>

<?php wp_footer() ?>
</body>

<?php
if (function_exists('wp_body_open')) {
    #for backward compatability
    wp_body_open();
}
?>

</html>