<?php
    require_once 'app/Model/User.php';

    if(isset($_SESSION['username'])){
        header('location: index.php?home');
    }

    $errors = [];
    if($_POST){
        $user = new \App\Model\User();
        $user->login($_POST['name'],$_POST['password']);
        $errors = $user->errors;
    }
?>
<div class="container">
    <h1 class="text-center">Login</h1>
    <form name="login" method="post" action="?page=login">
        <div class="mb-3 mt-5">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?php if($_POST){ echo $_POST['name']; } ?>" >
            <?php
            if(isset($errors['name'])){
                ?>
                <small class="text-danger"><?php echo  $errors['name']; ?></small>
                <?php
            }
            ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <?php
            if(isset($errors['password'])){
                ?>
                <small class="text-danger"><?php echo  $errors['password']; ?></small>
                <?php
            }
            ?>
        </div>
        <div class="mb-3 ">
            <a href="?page=signup">Create New Account</a>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>