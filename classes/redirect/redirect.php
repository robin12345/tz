<?php

class Redirect {
    public function redir($name,$url) {
        $lockurl = "http://".$_SERVER['HTTP_HOST'].$name."/".$url;
        header("Location: $lockurl");
    }
}