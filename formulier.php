<?php include('server.php')?>
<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if(isset($_GET['logout'])){session_destroy(); unset($_SESSION['user']); unset($_SESSION['id']); header('location: index.php');}?>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body style="background: url(images/bg-page-white.png) no-repeat center center fixed; background-size: cover; ">
<!-- START NAVBAR -->
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
                <a  href="formulier.php?lang=nl" data-lang="nl">NL</a>
            </li>/
            <li class="nav-item" >
                <a  href="formulier.php?lang=en" data-lang="en">ENG</a>
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
<!--END NAVBAR-->


<div class="header">
    <h1>Aanvraag</h1>
</div>
<div class="container">
<form class="form-horizontal" method="post" enctype="multipart/form-data" >
<?php include ('errors.php')?>
    <h2><?php echo $lang['Persoonlijke gegevens'] ?></h2>
    <br>
        <div class="row">

            <div class="test col-sm-6">
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                           <p><b><?php echo $lang['studentennr'] ?></b>
                            <input type="text" name="studentnummer" size="50">
                               <input type="hidden" name="1" value="1" ></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Uw studentennummer zoals vermeld op studentenkaart.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b><?php echo $lang['achternaam'] ?></b>
                            <input type="text" name="achternaam" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Zoals vermeld op paspoort.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b><?php echo $lang['voornaam'] ?></b>
                                <input type="text" name="roepnaam" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Zoals vermeld op paspoort.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b><?php echo $lang['geboorte'] ?></b>
                                <input type="text" name="geboortedatum" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Zoals vermeld op paspoort.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b><?php echo $lang['Adresgegevens'] ?></b>
                                <input type="text" name="adres" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Woonplaats.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b><?php echo $lang['Postcode'] ?></b>
                                <input type="text" name="postcode" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Postcode.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="test col-sm-6">
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                           <p><b><?php echo $lang['Woonplaats'] ?></b>
                               <input type="text" name="woonplaats" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Uw woonplaats.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b><?php echo $lang['Telefoonnummer'] ?></b>
                                <input type="text" name="tnummer" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Telefoonnummer.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b><?php echo $lang['E-mailadres'] ?></b>
                            <input type="text" name="email" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Uw E-mailadres.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b><?php echo $lang['BSN-nummer'] ?></b>
                                <input type="text" name="bsn" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Uw BSN nummer
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b><?php echo $lang['IBAN rekeningnummer'] ?></b>
                                <input type="text" name="iban" size="50"></p>
                        </div>
                        <div class="col-sm-4">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               Uw rekeningnummer.
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h2><?php echo $lang['Gegevens opleiding'] ?></h2>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-12">
                            <p><b><?php echo $lang['ingeschreven'] ?></b></p>
                        </div>
                        <div class="col-sm-10">
                                <input type="radio" id="ja" name="ingeschreven" value="ja" checked="checked">
                                <label><?php echo $lang['ja'] ?></label><br>
                                <input type="radio" id="nee" name="ingeschreven" value="nee">
                                <label><?php echo $lang['nee'] ?></label><br>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                                       ...
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-10">
                            <p><b><?php echo $lang['Welkeopleiding'] ?></b></p>
                            <input size="50" type="text"  name="opleiding"></p>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               ...
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-12">
                            <p><b>14. Welke opleidingsvariant volg jij?</b>
                            </p>
                        </div>
                        <div class="col-sm-10">
                                <input type="radio" id="voltijd" name="variant" value="voltijd" checked="checked">
                                <label>Voltijd</label><br>
                                <input type="radio" id="deeltijd" name="variant" value="deeltijd">
                                <label>Deeltijd</label><br>
                                <input type="radio" id="duaal" name="variant" value="duaal">
                                <label>Duaal</label><br>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               ...
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-10">
                            <p><b>15. Per wanneer ben je met je studie gestart?</b></p>
                            <input type="text" name="gestart" size="50"></p>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               ...
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-10">
                            <p><b>16. In welk studiejaar zit je?</b>
                            </p>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               ....
                            </span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <input type="radio" id="1e jaars" name="jaar" value="1e jaars" checked="checked">
                                <label>1e jaars</label><br>
                                <input type="radio" id="2e jaars" name="jaar" value="2e jaars">
                                <label>2e jaars</label><br>
                                <input type="radio" id="3e jaars" name="jaar" value="3e jaars">
                                <label>3e jaars</label><br>
                                <input type="radio" id="4e jaars" name="jaar" value="4e jaars">
                                <label>4e jaars</label><br>
                                <input type="radio" id="oudere jaars" name="jaar" value="ouder jaars">
                                <label>Ouder jaars</label><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-10">
                            <p><b><?php echo $lang['onderbroken'] ?></b>
                            </p>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               ...
                            </span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <input type="radio" id="ja" name="onderbroken" value="ja" checked="checked">
                                <label><?php echo $lang['ja'] ?></label><br>
                                <input type="radio" id="nee" name="onderbroken" value="nee">
                                <label><?php echo $lang['nee'] ?></label><br>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-10">
                            <p><b><?php echo $lang['uitgeschreven'] ?></b>
                            </p>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               ...
                            </span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <input type="radio" id="ja" name="uitgeschreven" value="ja" checked="checked">
                                <label for="ja">Ja</label><br>
                                <input type="radio" id="nee" name="uitgeschreven" value="nee">
                                <label for="nee"><?php echo $lang['nee'] ?></label><br>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-10">
                            <p><b>19. Heb je ook voor andere studie(s)
                                    ingeschreven gestaan bij NHL Stenden? En zo ja, welke.</b>
                                <input type="text" name="andere" size="50"></p>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               ...
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-10">
                            <p><b>20. Heb je eerder een inschrijving bij een
                                    andere instelling (HBO/Universiteit) gehad? Zo ja, bij welke instelling, en welke periode</b>
                                <input type="text" name="instelling" size="50"></p>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               ...
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h2><?php echo $lang['bijzonder'] ?></h2>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="formvragen">
                    <div class="row">
                        <div class="col-sm-10">
                            <p><b>21. Bijzondere omstandigheden die aanleiding is tot deze aanvraag (kruis aan welke van
                                    toepassing is):</b>
                            </p>
                        </div>
                        <div class="col-sm-2">
                            <div id="hover-div">
                                <i class="fas fa-info-circle"></i>
                                <span id="hover-element">
                               ...
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="radio" id="optie1" name="aanleiding" value="optie1" checked="checked">
                            Ziekte of zwangerschap en bevalling;<br><br>
                            <input type="radio" id="2e" name="aanleiding" value="optie2">
                            Een functiestoornis, handicap of chronische ziekte;<br><br>
                            <input type="radio" id="3e" name="aanleiding" value="optie3">
                            bijzondere familieomstandigheden;<br><br>
                            <input type="radio" id="4e" name="aanleiding" value="optie4">
                            Een onvoldoende studeerbare opleiding;<br><br>

                            <input type="radio" id="ouder Jaars" name="aanleiding" value="optie5">
                           De door de hogeschool toegekende status van topsporter;<br><br>
                        </div>
                        <div class="col-sm-4">
                            <input type="radio" id="ouder Jaars" name="aanleiding" value="optie6">
                            Andere dan de in de hierboven genoemde onderdelen bedoelde omstandigheden die, indien
                                een daarop gebaseerd verzoek om financiële ondersteuning door het College van Bestuur niet
                                zou worden gehonoreerd, zouden leiden tot een onbillijkheid van overwegende aard.<br><br>

                        </div>
                        <div class="col-sm-4">
                            <input type="radio" id="ouder Jaars" name="aanleiding" value="optie7">
                            Activiteiten op bestuurlijk of maatschappelijk gebied die naar het oordeel van het College van
                                Bestuur mede in het belang zijn van de hogeschool of van het onderwijs dat de student volgt;<br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h2>Gegevens opleiding</h2>
        <br>

            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-11">
                        <p><b>22. Hoeveel maanden studievertraging heb je opgelopen
                                als gevolg van de hierboven aangegeven bijzondere
                                omstandigheid c.q. omstandigheden?</b><br>
                            <input type="text" name="maanden" size="120"></p>
                    </div>
                    <div class="col-sm-1">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="formvragen">
                        <div class="row">
                            <div class="col-sm-8">
                                <p><b>23. Onder welk stelsel van DUO val jij?</b>
                                </p>
                            </div>
                            <div class="col-sm-2">
                                <div id="hover-div">
                                    <i class="fas fa-info-circle"></i>
                                    <span id="hover-element">
                                   ...
                                </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input type="radio" id="prestatiebeurs" name="duo" value="prestatiebeurs" checked="checked">
                                <label>Prestatiebeurs</label><br>
                                <input type="radio" id="leenstelsel" name="duo" value="leenstelsel">
                                <label>Leenstelsel</label><br></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="formvragen">
                        <div class="row">
                            <div class="col-sm-10">
                                <p><b>24. Heb je recht (gehad) op een extra jaar
                                        studiefinanciering/aanvullende beurs via DUO?. Zo ja, voeg het bewijs toe bij de bijlagen</b>
                                </p>
                            </div>
                            <div class="col-sm-2">
                                <div id="hover-div">
                                    <i class="fas fa-info-circle"></i>
                                    <span id="hover-element">
                                   ...
                                </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <input type="radio" id="ja" name="extra" value="ja" checked="checked">
                                    <label>Ja</label><br>
                                    <input type="radio" id="nee" name="extra" value="nee">
                                    <label>Nee</label><br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b>25. Indien je een extra jaar studiefinanciering hebt
                                aangevraagd, per wanneer is deze ingegaan? Vermeld
                                datum.</b>
                            <input type="text" name="ingegaan" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b>26. Hoeveel maanden financiële ondersteuning vraag je
                                aan? (Maximaal 12)</b><br>
                            <input type="text" name="financieel" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                    <p><b>27. Heb je eerder financiële ondersteuning uit het
                            Profileringsfonds ontvangen? En zoja, hoeveel maanden in welk jaar</b>
                        <input type="text" name="eerder" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b>28. Waaruit bestond de door jou aangevoerde bijzondere omstandigheid?</b><br>
                            <input type="text" name="waaruit" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b>29. Wanneer vond deze plaats en wanneer geëindigd?</b><br>
                            <input type="text" name="eindig" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b>30. Op welke datum en bij wie heb je melding gemaakt van deze bijzondere omstandigheid?</b><br>
                            <input type="text" name="melding" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b>31. Op welke datum en bij wie heb je de bijzondere omstandigheid eventueel afgemeld?</b><br>
                            <input type="text" name="afmeld" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b> 32. Geef aan welke studieonderdelen in welke onderwijsperiode en in welk opleidingsjaar niet
                                konden worden gevolgd, voor welke studieonderdelen de mogelijkheid van een herkansing
                                bestaat en welke studieonderdelen –wanneer- dienen te worden overgelopen.</b><br>
                            <input type="text" name="studieond" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b> 33. Wat is de totale duur van de vertraging?</b><br>
                            <input type="text" name="duur" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b> 34. Op welke wijze heeft de bijzondere omstandigheid het verloop van je studie beïnvloed?</b><br>
                            <input type="text" name="verloop" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formvragen">
                <div class="row">
                    <div class="col-sm-10">
                        <p><b> 35. Op welke wijze heb je geprobeerd de negatieve gevolgen van de bijzondere omstandigheid voor
                                jouw studie dan wel studiefinanciering 1 zoveel mogelijk te beperken dan wel te voorkomen
                                (raadplegen decaan, tussentijds uitschrijven/stopzetten studiefinanciering)?</b><br>
                            <input type="text" name="wijze" size="120"></p>
                    </div>
                    <div class="col-sm-2">
                        <div id="hover-div">
                            <i class="fas fa-info-circle"></i>
                            <span id="hover-element">
                           ...
                        </span>
                        </div>
                    </div>
                </div>
            </div>



    <input id="file" name="file" type="file" />
    <button type="submit" name="submit_form">Submit</button>

</form>
</div>

        <!-- Footer -->
        <footer class="footer">
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
