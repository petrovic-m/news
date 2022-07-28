<?php if(isset($_SESSION['username'])){ ?>
<div class="conteiner-fluid ">
<nav class="col-12 bg-dark ">
    <ul class="nav">
        <?php if($_SESSION['usertype'] == 'admin'){ ?>
        <li class="nav-item">
            <a class="nav-link text-success" href="../admin_page/">Home</a>
        </li>
        <?php }?>
        <li class="nav-item">
            <a class="nav-link text-success" href="../user_page/">News</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-success" href="../logout.php">Logout</a>
        </li>
    </ul>
</nav>
<?php }?>