<?php include('server.php')?>
<?php
if(isset($_GET['logout'])){session_destroy(); unset($_SESSION['user']); unset($_SESSION['id']); header('location: index.php');}
?>

<!--123PHP.Test.Email123@gmail.com profilering-->


<!DOCTYPE html>
<head>
    <title>Profileringsfonds landing page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/bootstrap-4.4.1-dist/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body style="background: url(images/bg-page-white.png) no-repeat center center fixed; background-size: cover; ">
<!-- navbar -->
<nav class="navbar navbar-expand-sm justify-content-between" >
    <!-- Links -->
    <div id="links">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="index.php">
                    <img src="images/Logo1.png" alt="logo" style="width:150px;">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php"><?php echo $lang['startpagina'] ?></a>
            </li>
            <li class="nav-item">
                <a method="post" class="nav-link" href="formulier.php" name="start_form"><?php echo $lang['startaanvraag'] ?></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="FAQ.php"><?php echo $lang['faq'] ?></a>
            </li>

            <?php if (!isset($_SESSION['user'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><?php echo $lang['login'] ?></a>
                </li>
            <?php endif?>
            <?php if(isset($_SESSION['admin'])) : ?>
                <li>
                    <a class="nav-link" href="admin.php"><?php echo $lang['medewerker'] ?></a>
                </li>
            <?php endif?>
            <li>
                <img src="images/globe.png" width="35px">
            </li>
            <li class="nav-item">
                <a  href="index.php?lang=nl" data-lang="nl">NL</a>
            </li>/
            <li class="nav-item" >
                <a  href="index.php?lang=en" data-lang="en">ENG</a>
            </li>


            <?php if (isset($_SESSION['user'])) : ?>
                <div class="success" style="margin-left: 400px; margin-top: 45px; margin-bottom: 45px;">
                    <li class="nav-item" >
                      <p>  <?php echo $lang['Loggedin'] ?></p> <?php echo $_SESSION['user'];?> --- <a style="color: red" href="index.php?logout='1'"> <?php echo $lang['logout'] ?></a>
                    </li>
                </div>
            <?php endif?>
        </ul>
    </div>
    <form class="search form-inline my-2 my-lg-0" action="search.php">
            <input type="search" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </form>
</nav>



<!-- jumbotron -->
<div class="jumbotron" style="background-image: url(https://image.freepik.com/free-vector/seamless-chaotic-square-pattern-background-vector-graphic-design-from-random-rotated-squares-with-opacity-effect_1164-1118.jpg);">
    <h1 class="display-3"><?php echo $lang['profileringsfonds'] ?></h1>
    <p class="lead">NHL Stenden University of Applied Sciences</p>
    <hr class="my-2">
    <p class="lead">
       <br><br><a class="btn btn-primary btn-lg" href="formulier.php" role="button"><?php echo $lang['staraanvraag2'] ?></a>
    </p>
</div>
<div class="content">
    <p class="maintext">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet blanditiis eligendi error, laboriosam magni nemo nisi, non odio omnis sapiente tempore velit veritatis! Blanditiis laudantium magnam praesentium sapiente sint.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto corporis dolorem ea eaque eligendi excepturi fugit, laboriosam maxime molestiae odit officiis perspiciatis, placeat, porro quae quidem repudiandae rerum tenetur? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium asperiores dolor dolorum ea, eligendi et ex labore nemo neque porro, quae, quasi rem sequi soluta totam veritatis voluptatem. Eveniet, quis?Ad beatae doloribus magnam maxime sint temporibus unde veniam vitae voluptatem. Accusamus aut cum dicta dolore eius eveniet, facere facilis laudantium libero nobis provident quidem sapiente tempore tenetur velit voluptatem.Amet assumenda atque consequuntur corporis, doloremque eum facere id inventore, nemo nesciunt nobis nulla officia, quia repellat sunt totam voluptatibus. Ad dolore explicabo harum labore laudantium, quae quaerat voluptate voluptatum!Asperiores cumque dolores dolorum esse fuga maxime quidem reiciendis saepe vitae voluptatum! Accusantium amet debitis deserunt explicabo nemo nihil obcaecati officia quasi, quos repudiandae sapiente temporibus velit voluptas! Molestias, officiis!A aut consectetur dolor earum ex expedita id, illum ipsam laboriosam magni minus modi necessitatibus nihil nisi obcaecati officiis quae quaerat recusandae repudiandae sapiente, sed sint totam ut vero voluptatibus.Accusantium aspernatur autem consectetur delectus dolorum, earum eius esse fugit harum hic impedit incidunt molestiae necessitatibus nihil odit quas, reiciendis reprehenderit tempora unde vitae. Blanditiis deleniti doloremque est maxime minima?Alias impedit iste laboriosam maxime molestias nisi nulla odit optio repellendus similique? Ab architecto atque ipsa necessitatibus obcaecati, officia quam rerum voluptas! A enim esse illum omnis quo. Minima, minus. asperiores culpa dicta eaque natus sed. Animi aspernatur, culpa esse, facere iste laboriosam molestias necessitatibus officia praesentium recusandae reiciendis sapiente sunt vel! Animi maiores nisi possimus quo tenetur. Saepe.Exercitationem praesentium reiciendis sapiente? Asperiores consectetur enim excepturi nobis qui totam. Error explicabo iure, iusto laborum libero porro quo? Dicta error ex modi mollitia, nostrum optio praesentium repellat repudiandae voluptas!Enim error optio tempore. Aliquid blanditiis dicta distinctio esse quam recusandae similique tempore. Alias autem in incidunt inventore modi quo repellendus similique suscipit velit? Aliquam doloribus ipsam mollitia optio voluptatum?

    </p>
</div>






<!-- Footer -->
<footer class="footer fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="footer text-center py-3 col-3">
                <a href="https://start.nhlstenden.com/">
                    <img src="images/Logo1.png" alt="logo" style="width:50px;">
                </a>
            </div>
            <div class="footer-copyright text-center py-3 col-3">
                © 2020 Copyright:
                <a href="https://nhlstenden.com/"> Nhlstenden.com</a>
            </div>
            <div class="footer text-center py-3 col-3">
            <a href="https://intranet.nhlstenden.com/" style="font-family: sans-serif; font-size: 20px; color: black">
                <img src="images/intranetblue.png" alt="Intranet" style="width:50px">
            </a>
            </div>
            <div class="footer text-center py-3 col-3">
                <a href="https://trello.com/b/Aa0nRn8M/selecta">
                    <img src="images/selecta.png" alt="selecta" style="width:100px;">
                </a>
            </div>
        </div>
    </div>
</footer>

