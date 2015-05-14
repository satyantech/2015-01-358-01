<?php
    function getSalt(){
        return substr(sha1(strrev(uniqid())), 0, 5);
    }
?>