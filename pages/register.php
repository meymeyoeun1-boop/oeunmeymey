<?php
$nameErr = $username = $passwd = '';
$name = $username = '';
    if(isset($_POST['name'],$_POST['username'],$_POST['passwd'],$_POST['confirmPasswd'])) {
        $name = trim($_POST['name']);
        $username = trim($_POST['username']);
        $passwd = trim($_POST['passwd']);
        $confirmPasswd =trim($_POST['confirmPasswd']);
        if(empty($name)){
            $nameErr = 'please input name';
        }
        if(empty($username)){
            $usernameErr = 'please input username';
        }
        if(empty($passwd)){
            $passwdErr = 'please input passwd';
        }
        if($passwd !== $confirmPasswd){
            $passwdErr = 'password does not match!';
        }
        if(usernameExists($username)){
            $usernameErr = 'Please choose another username';
        }
        if(empty($nameErr) && empty($usernameErr) && empty($passwdErr)){
            if (registerUser($name,$username,$passwd)){
                $name = $username = '';
                echo'<div class"alert alert-success" role="alert">
                Registration successful! You cal now <a href="./?page=login" class="alert-link";
                </div>';
            }else{
                echo '<div class="alert alert-danger" role="alert">
                Registration failed! Please try agsin.
                </div>';
            }
        }

    
    }
?>
    
 <form method="post" action="./?page=register">
    <div class="col-md-8 col-lg-6 mx-auto">
         <h3>Register Page</h3>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" value="<?php echo $nameErr ?>"  type="text" class="form-control
             <?php echo empty($nameErr) ? '' : 'is-invalid' ?>">
            <div class ="invalid-feedback"><?php echo $nameErr ?></div>
        </div>
        <div class="mb-3">
            <label class="form-label">username</label>
            <input name="username" value="<?php echo $nameErr ?>" type="text" class="form-control">
            <?php echo empty($usernameErr) ? '' : 'is-invalid' ?>">
             <div class ="invalid-feedback"><?php echo $usernameErr ?></div>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="passwd" type="password" class="form-control">
            <?php echo empty($passwdErr) ? '' : 'is-invalid' ?>">
            <div class ="invalid-feedback"><?php echo $passwdErr ?></div>
        </div>
        <div class="mb-3">
            <label class="form-label" >Confirm Password</label>
            <input name="confirmPasswd"  type="password" class="form-control">
            <?php echo empty($confirmPasswdErr) ? '' : 'is-invalid' ?>">
            <div class ="invalid-feedback"><?php echo $confirmPasswdErr ?></div>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>