<?php
require './core.inc.php';
require './connect.php';

if(loggedin()){
    //$id='';
    $username=field('username');
    $firstname=field('first_name');
    $surname=field('surname');
 echo 'Welcome  '.$username.'<br><a href="./logout.php">Log out</a><br>';
 echo $firstname.'  '.$surname;
}else{
include './login_form.php';
}

?>