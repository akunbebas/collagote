<?php

define('BASE','collagote/learning/php');

function getUriElement($depth=1){
    // php function to get information about request
    $uri = $_SERVER['REQUEST_URI'];
    
    // memisahkan uri berdasarkan (/) 
    $token = explode('/',$uri);
    var_dump($token); echo "<br/>";
    
    $base_token = explode('/', constant('BASE'));
    
    $token = $token[sizeof($base_token)+$depth];
    
    // memisahkan token berdasar extensi
    $dest = explode('.',$token);
    
    return $dest; // return array('about','php')
}


function getContent($depth=1){
    
    $arr_uri = getUriElement(); // contoh hasil = about; $arr_uri=array('about','php')
    
    if(count($arr_uri) == 2 or count($arr_uri) == 1){
        $uri_name = $arr_uri[0].".php";
        $uri_subfix = $arr_uri[1]; // <-- ignore it
        if(checkUrlFiles($uri_name)){
            include 'content/'.$uri_name;
        } else if(empty($token)) {
            include 'content/index.php';
        } else {
            include 'template/404.htm';
        }
    } else if(empty($token)) {
        include 'content/index.php';
    }
    
}

function checkUrlFiles($file){
        if(file_exists('content/'.$file)){
            return true;
        } else {
            return false;
        }
}

function connectToMysql(){
    
    $db_addr = "localhost";
    $db_user = "root";
    $db_pass = "toor";
    
    // part to connect with mysql
    $con=mysql_connect($db_addr,$db_user,$db_pass) or die ("koneksi dengan database gagal");
    mysql_select_db("employees",$con) or die ("database tidak ada");

}


?>