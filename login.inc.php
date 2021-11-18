<?php
if(isset($_POST['username'])&& isset($_POST['password'])){
    $username=trim($_POST['username']);
    $password=$_POST['password'];


    //hash password
    $password=generatehash($password);

    if(!empty($username)&&!empty($password)){
                $sql="SELECT id from users where username='$username'and password='$password' ";

                $sql_run=mysqli_query($link,$sql);
                $table_rows=mysqli_num_rows($sql_run);

                if($table_rows==0){

                $row_err='Invalid Username or Password';

                 }else if($table_rows==1){
                  
                $row=mysqli_fetch_assoc($sql_run);
                    $user_id=$_SESSION['user']=$row['id'];
                    header('location:index.php');
                }
           
    }else{ 
        $username_error='User name cannot be Empty';
        $password_error='User name cannot be Empty';
    }
}
?>
