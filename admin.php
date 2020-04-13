<?php include('server.php')?>
<?php
if(isset($_GET['logout'])){session_destroy(); unset($_SESSION['user']); unset($_SESSION['id']); header('location: index.php');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create account</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/bootstrap-4.4.1-dist/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                <a  href="admin.php?lang=nl" data-lang="nl">NL</a>
            </li>/
            <li class="nav-item" >
                <a  href="admin.php?lang=en" data-lang="en">ENG</a>
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

<!--register account-->



<div class="row">
        <div class="login">
            <p class="sign" align="center">Voeg een gebruiker toe</p>
            <?php include('errors.php') ?>
            <?php if (isset($_SESSION['reg'])) : ?>
                    <p style="text-align: center">
                        <?php echo $_SESSION['reg'];
                        unset($_SESSION['reg']);?>
                    </p>
            <?php endif?>

            <form class="form1" method="post" action="admin.php">
                <input class="un " name="email_1" type="email" align="center" placeholder="E-mail" value="<?php echo $email_1;?>">
                <input class="pass" type="email" name="email_2" align="center" placeholder="Bevestig e-mail" value="<?php echo $email_2;?>">
                <button class="submit" align="center" name="register">Add</button>
        </div>

<!--START AANVRAAG TABEL-->
        <div class="login">
            <div class='users'>
                <table align="center">
                    <h3 align="center">Aanvragen</h3><hr>
                    <tr>
                        <th>Nr.</th>
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Aanvraag</th>
                        <th>Bijlage(n)</th>
                    </tr>
            <?php include('update_admin.php')?>
                </table>
            </div>
        </div>
<!--EINDE AANVRAAG TABEL-->
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
            <div class="footer-copyright text-center py-3 col-3">© 2020 Copyright:
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

</body>
</html>

<!--<script>
var $rows = $('#table tr');
$('#search').keyup(function() {
var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

$rows.show().filter(function() {
var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
return !~text.indexOf(val);
}).hide();
});
</script>-->