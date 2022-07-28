<?php session_start();
ob_start();

if(isset($_SESSION['username'])) {
    if ($_SESSION['usertype'] == 'admin') {
        header('Location: admin_page/');
    } elseif ($_SESSION['usertype'] == 'user') {
        header('Location: user_page/');
    }
}

?>

<?php include_once 'layout/head.php';?>
<?php include_once 'layout/header.php';?>
<div class="col-6 mx-auto m-5 p-5 border">
    <h1 class="text-center">Login</h1>
    <form method="POST" action="src/include/login.inc.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control border-success" id="username" name="username" aria-describedby="usernameHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control border-success " name="password" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Login</button>
        </div>
        <div class="mb-3 form-check">
            <br>
            <p>If you don't have account <a href="signup.php" class="text-success">signup</a></p>
        </div>
    </form>
</div>

<?php include_once 'layout/footer.php'; ?>