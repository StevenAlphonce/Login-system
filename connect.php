<?php

//FUNCTION FOR CONNECTION
function connect($host,$user,$password,$database){

    $link=mysqli_connect($host,$user,$password,$database) or die('Problem connecting to server');

    return $link;
}

$link=connect('localhost','root','','afsaacademy');

//generate hash function;
function generatehash($data){
    return  $data=trim(md5($data));
 }

 
 
?>
