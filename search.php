<?php
if(isset($_GET['post_type'])) {
    $type = $_GET['post_type'];
    if($type == 'any') {
        load_template(TEMPLATEPATH . '/search-global.php');
    } elseif($type == 'praca') {
        load_template(TEMPLATEPATH . '/search-job.php');
    }
}
?>
