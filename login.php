<?php
require 'loader.php';

if($_POST) {
    $user = new User($_POST['email'], $_POST['password']);
    $errors = $validator->validate($user);
    if(count($errors) == 0) {
        $result = $db->search($user->getEmail());
        if($result) {
            if($auth->validatePassword($user->getPassword(), $result['password'])){
                //dd('ENTRE');
                $auth->login($user->getEmail());
                redirect('profile.php');
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require 'head.php'; ?>
    <body>
        <div class="container">
            <h1 class="text-center">Login!</h1>
            <form action="" method="post" class="col-md-6 offset-md-3">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <?php if(isset($errors['email'])):?>
                <span class="alert alert-danger"> <?=$errors['email'] ?></span>
                <?php endif;?>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </body>
</html>