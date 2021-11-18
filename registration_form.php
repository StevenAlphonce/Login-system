<?php
include 'core.inc.php';
include 'connect.php';

if(!loggedin()){
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['first_name']) && isset($_POST['surname'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            $confirm_password=$_POST['confirm_password'];
            $first_name=$_POST['first_name'];
            $surname=$_POST['surname'];

             // hash password
             $hash_password=md5($password);

        if(!empty($username) && !empty($password) && !empty($confirm_password) && !empty($first_name) && !empty($surname)){
            

            if($password != $confirm_password){
                $confirm_error="Password not match.";
                 }else{
                        $sql="SELECT  username FROM users WHERE username='".$username."'";
                        $sql_run=mysqli_query($link,$sql);
                        $table_row=mysqli_num_rows($sql_run);
                        if($table_row==1){
                            echo 'User name '.$username.' Exist';
                        }else{
                            
                            $sql_insert="INSERT INTO users  VALUES (NULL, '".$username."', '".$hash_password."', '".$first_name."', '$surname')";
                                
                                if($sql_run=mysqli_query($link,$sql_insert)){
                                    
                                    header('location:success.php');

                                }else{
                                    echo "Sorry,We couldn\'t register you this time please try again later!!";
                                }
                        }
                    }
    }else {
        echo '<p style="color:red;"> All field are required</p>';
    }
}

?>

<form action="<?php echo $current_file; ?>" method="POST">
        User Name:<br>
        <input type="text" name="username"  value="<?php echo $username;?>" placeholder="User Name">
        <br>
        <?php echo '<small style="color:yellow;">'.$username_empty.'</small>';?>
        <br>
        Password:<br>
        <input type="password" name="password"  placeholder="Password">
        <br>
        <?php echo '<small style="color:yellow;">'.$password_empty.'</small>';?>
        <br>
        Confirm Password:<br>
        <input type="password" name="confirm_password" placeholder="Password">
        <br>
        <?php echo '<small style="color:red;">'.$confirm_error.'</small>';?>
        <br>
        First Name:<br>
        <input type="text" name="first_name" value="<?php echo $first_name;?>" placeholder="First Name">
        <br>
        <?php echo '<small style="color:yellow;">'.$first_name_empty.'</small>';?>
        <br>
        Surname :<br>
        <input type="text" name="surname" value="<?php echo $surname;?>" placeholder="Surname"> 
        <br>
        <?php echo '<small style="color:yellow;">'.$surname_empty.'</small>';?>
        <br>
        <input type="submit" value="Register" > <p>You have an Account <a href="login_form.php"> Log in</a></p>
</form>

<?php
}else if(loggedin()){

    //registered;
    echo "you\'r registered.";
}
?>