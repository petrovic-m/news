<?php session_start();?>
<?php include_once '../layout/head.php';?>
<?php include_once '../layout/header.php';?>
<?php

require_once '../src/init.php';

$database = new Config();
$conn = $database->getConnection();

$comments = new Comments($conn);

if(isset($_GET['id'])){
    $news_id = $_GET['id'];
    $comments->setId($news_id);
    $_SESSION['news_id'] = $news_id;
    $stmCom = $comments->seeAllComments();
}
?>
<h2 class="text-center display-5">Comments</h2>

    <table class="table table-striped table-dark text-center">
        <thead>
        <tr>
            <th scope="col">Comments</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($stmCom){
            foreach ($stmCom as $row){
            ?>
                <tr>
                    <th scope="row"><?php echo $row['comments']; if($_SESSION['usertype'] == 'admin'){?> &nbsp;<a class="text-danger" href="../src/include/delete_comments.inc.php?id=<?php echo $row['id'] ?>"><i class="bi bi-trash3"></i></a><?php }?></th>
                </tr>
                <?php
            }
        }else{
            return false;
        }?>
        </tbody>
    </table>
    <div class="col-5 mx-auto">
        <form method="POST" action="../src/include/add_comments.inc.php">
            <div class="form">
                <textarea class="form-control border-success" name="comments" placeholder="Text"></textarea>
            </div>
            <br>
            <div class="form text-center">
                <button type="submit" class="btn btn-success text-center">Add comments</button>
            </div>
            <br><br><br>
        </form>
    </div>
<?php ?>
<div class="col-2 mx-auto text-center">
    <button onclick="location.href='index.php'" class="btn btn-success ">Go back</button>
</div>

<?php include_once '../layout/footer.php' ?>