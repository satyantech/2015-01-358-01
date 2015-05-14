<?php
    echo $code = substr(sha1(strrev(uniqid())),0,10);
?>