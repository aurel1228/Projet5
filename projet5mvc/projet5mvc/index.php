<?php   

$url = '';
if(isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

if($url == '') {
    require 'home.php';
} elseif($url[0] == 'article' AND !empty($url[1])) {
    require 'article.php';
} else {
    require '404.php';
}