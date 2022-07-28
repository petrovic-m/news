<?php session_start();
ob_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');}
?>

<?php include_once '../layout/head.php';?>
<?php include_once '../layout/header.php';?>
    <div class="row">
        <?php

        require_once '../src/init.php';
        $database = new Config();
        $conn = $database->getConnection();

        $news = new News($conn);

        $stmNews = $news->viewNews();
        if($stmNews){
            unset($_SESSION['news_id']);
            foreach ($stmNews as $row){
                $_SESSION['news_id'] =  $row['id'];
                echo '<br>';
            ?>
        <div class="col-3 border mx-auto text-center m-5 p-3">
            <div class="col-12 border-bottom border-success"><h1><?php echo $row['title'];?></h1></div>
            <div class="col-12">
                <br>
                <p><?php echo $row['body'];?></p>
            </div>
            <a href="see_comments.php?id=<?php echo $_SESSION['news_id']; ?>" class="btn btn-success fs-5">
                View Comments
            </a>

        </div>
                <?php }}else{   return false;}?>
    </div>


<?php include_once '../layout/footer.php'?>