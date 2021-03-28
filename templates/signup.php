<?php
    require_once 'app/Model/User.php';

    if(isset($_SESSION['username'])){
        header('location: index.php?home');
    }

    $errors = [];
    if($_POST){
        $user = new \App\Model\User();
        $user->create([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
        ]);
        $errors = $user->errors;
        if(empty($errors)){
            $_SESSION['username'] = $_POST['name'];
            header('location: index.php?page=home');
        }
    }

?>
<div class="container">
    <h1 class="text-center">Sign Up Form</h1>
    <form name="signup" method="post" action="?page=signup">
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
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php if($_POST){ echo $_POST['email']; } ?>" >
            <?php
            if(isset($errors['email'])){
                ?>
                <small class="text-danger"><?php echo  $errors['email']; ?></small>
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
            <a href="?page=login">I Already Have Account</a>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
