<?php 
    if (!isset($_COOKIE['page_refreshed_1'])) {
        setcookie('page_refreshed_1', 1, time()+3600);
        echo '<script>location.reload();</script>';
    }
?>