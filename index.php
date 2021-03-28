<?php
include 'templates/header.php';

session_start();

$page = isset($_GET['page']) ? $_GET['page']:'home';

if ($page == 'home'){
    include 'templates/home.php';
}elseif ($page == 'login'){
    include 'templates/login.php';
}elseif ($page == 'signup'){
    include 'templates/signup.php';
}else if ($page == 'logout'){
    include 'templates/logout.php';
} else {
    header('location: index.php');
}

?>

<?php
include 'templates/footer.php';
?>


