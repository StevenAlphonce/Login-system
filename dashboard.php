<?php
include 'core.inc.php';

if(!loggedin()){
    header('location:login_form.php');
}



echo 'there we are';
?>