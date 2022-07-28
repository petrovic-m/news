<?php session_start();
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

        <h1 class="text-center">Sign up</h1>
        <form method="POST" action="src/include/signup.inc.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control border-success" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control border-success" id="username" name="username" aria-describedby="usernameHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control border-success " name="password" id="exampleInputPassword1">
            </div>
            <br>
            <div class="mb-3">
                <select class="form-select" name="usertype" aria-label="Default select example">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <br>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Sign up</button>
            </div>
            <div class="mb-3 form-check">
                <br>
                <p>If you have account <a href="index.php" class="text-success">login</a></p>
            </div>
        </form>
    </div>

<?php include_once 'layout/footer.php'; ?>