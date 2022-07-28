<?php session_start();
ob_start();
if(!isset($_SESSION['username'])){header('Location: ../index.php');}
if(isset($_SESSION['username'])){
    if($_SESSION['usertype'] == 'user'){
        header("Location: ../user_page/");
    }
}
?>

<?php include_once '../layout/head.php';?>
<?php include_once '../layout/header.php';?>
<div class="col-6 mx-auto m-5 p-5 border">
    <h1 class="text-center">Add posts</h1>
    <form method="POST" action="../src/include/add_news.inc.php">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control border-success" id="title" name="title" aria-describedby="titleHelp">
        </div>
        <div class="form-floating">
            <textarea class="form-control border-success" name="body" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Comments</label>
        </div>
        <br>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Add news</button>
        </div>
    </form>
</div>


    <h2 class="text-center display-5">Users</h2>

    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Usertype</th>
        </tr>
        </thead>
        <tbody>
        <?php

        require_once '../src/init.php';

        $database = new Config();
        $conn = $database->getConnection();

        $users = new Users($conn);

        $stm = $users->viewUsers();

        if($stm){
            foreach ($stm as $row){

            ?>
        <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['usertype']; ?></td>
        </tr>
                <?php
            }
        }else{
            return false;
        }?>
        </tbody>
    </table>

    <h2 class="text-center display-5">Posts</h2>

    <div class="row">
        <?php
        $news = new News($conn);

        $stmNews = $news->viewNews();

        if($stmNews){
            foreach ($stmNews as $row){

        ?>
        <div class="col-3 border mx-auto text-center m-3 p-3">
            <div class="col-12 border-bottom border-success"><h1><?php echo $row['title']; ?></h1></div>
            <div class="col-12">
                <br>
                <p><?php echo $row['body']; ?></p>
            </div>
            <a href="../src/include/delete.inc.php?id=<?php echo $row['id'] ?>" class="btn btn-danger fs-5">
                <i class="bi bi-trash3"></i>
            </a>

        </div>
            <?php }}else{return false;}?>
    </div>

<?php include_once '../layout/footer.php'; ?>