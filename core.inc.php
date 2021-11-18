<?php
ob_start();
session_start();
$current_file=htmlspecialchars($_SERVER['SCRIPT_NAME']);

if(isset($_SERVER['HTTP_REFERER'])){
$http_referal=$_SERVER['HTTP_REFERER'];
}

//loggedin function
function loggedin(){
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        return true;
    }else{
        return false;
    }
}
//fetch fields using  user session

function field($field){
global $link;
    $query="SELECT $field  FROM users WHERE id='".$_SESSION['user']."'";
    $run_query=mysqli_query($link,$query);
   if( $records=mysqli_fetch_assoc($run_query)){
    return $records=$records[$field];
   }

}