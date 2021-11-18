<!--including login scripts-->
<?php require_once "login.inc.php";
//echo $user_id?>

<form action="<?php echo $current_file;?>" method="POST">
   User Name:
   <br><input type="text" name="username">
   <small><?php echo '<p style="color:red;"<br>'.$username_error.'</p>';?></small>
   <br>
   Password:<br>
   <input type="password" name="password">
   <small><?php echo '<p style="color:red;"<br>'.$password_error.'</p>';?></small>
   <br>
    <input type="submit" value="Login"><br> or <p><a href="registration_form.php">Create Account</a><p>
    <small><?php echo '<p style="color:red;"<br>'.$row_err.'</p>';?></small>
</form>
</body>
</html>