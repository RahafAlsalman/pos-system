<?php

use Core\Helpers\Helper; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTU POS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/styles.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
</head>
<div class="admin-view">
    <?php if (isset($_SESSION['user'])) : ?>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/dashboard?id=<?= $_SESSION['user']['user_id'] ?>">
                    <img src="data:image/png;base64,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" alt="Logo" width="30" height="23" class="d-inline-block align-text-top">
                    <strong>HTU Marckit</strong>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <?php if (Helper::check_permission(['user:create'])) : 
                            ?>
                    <li class="nav-item">
                            <a class="navbar-brand" href="/dashboard?id=<?= $_SESSION['user']['user_id'] ?>">Home</a>
                        </li>
                        <?php endif?>
                        <li class="nav-item">
                            <a class="navbar-brand" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
                <form>
                <?= $_SESSION['user']['display_name'] ?>
                    <a href="/profiles?id=<?= $_SESSION['user']['user_id']?>">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="rounded-circle " width="40">
                    </a>
                </form>


            </div>
        </nav>
    <?php endif ?>
    <?php if (isset($_SESSION['user'])) : ?>
        
     <!-- //   var_dump($_SERVER['REQUEST_URI']);
    //   $url=$_SERVER['REQUEST_URI'];
    //   print_r(explode("?",$url))  ;
    //   $url = array_filter($url);
// $endofurl = $url[0];
// var_dump($endofurl );
// $r = $_SERVER['REQUEST_URI']; 
// $r = explode('?', $r);
// $r = array_filter($r);
// $r = array_merge($r, array()); 
// $r = preg_replace('/\?.*/', '', $r);

// $endofurl = $r[0];
// echo $endofurl;
       -->
   
 
 <?php if ($_SERVER["REQUEST_URI"]!=="/transactions/create") :?>
    <?php //if($_SESSION["is_admin_view"]=== false):?>


            <div id="admin-area" class="row">
                <div class="col-2 admin-links">
                    <ul class="list-group list-group-flush mt-3">
                        <ul class="list-group list-group-flush mt-3">
                            
                            <li class="list-group-item">
                                <a href="/profiles?id=<?= $_SESSION['user']['user_id'] ?>">Your Profile</a>
                            </li>
                            <div class="dropdown">

                            </div>
                           <?php if (Helper::check_permission(['transaction:create'])) : 
                            ?>
                            <li class="list-group-item">
                                <a href="/transactions/create">Selling Page</a>
                            </li>
                            <?php endif;
                            
                            
                             if (Helper::check_permission(['item:read'])) : 
                            ?>
                            <li class="list-group-item">
                                <a href="/items?id=<?= $_SESSION['user']['user_id'] ?>">Stock Page</a>
                            </li>
                            <?php endif;
                             if (Helper::check_permission(['user:read'])) :
                             ?>
                             <li class="list-group-item">
                                 <a href="/users?id=<?= $_SESSION['user']['user_id'] ?>">Users Page</a>
                             </li>
                             <?php endif;
                              if (Helper::check_permission(['transaction:read'])) :
                                ?>
                                <li class="list-group-item">
                                    <a href="/transactions">Transactions Page</a>
                                </li>
                                <?php  endif;

                            if (Helper::check_permission(['item:create'])) :?>
                            <li class="list-group-item">
                                <a href="/items/create?id=<?= $_SESSION['user']['user_id'] ?>">Create item</a>
                            </li>
                            <?php endif;
                           
                            if (Helper::check_permission(['user:create'])) :
                            ?>
                            <li class="list-group-item">
                                <a href="/users/create">Create User</a>
                            </li>
                            <?php endif; 
                         
                             if (Helper::check_permission(['transaction:edit'])) :
                            ?>
                            <li class="list-group-item">
                                <a href="/transactions/edit">Edit Transactions</a>
                            </li>
                            <?php endif?>
                        </ul>
                    <?php endif ?>
                <?php endif ?>
             
                </div>
                <div class="col-10 admin-area-content">

                    <div class="container my-5">