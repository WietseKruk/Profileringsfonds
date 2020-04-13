<?php include('server.php')?>
<?php

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
                <a method="post" class="nav-link" href="formulier.php" name="start_form">Start aanvraag</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="info.php">Informatie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="FAQ.php">FAQ</a>
            </li>

            <?php if (!isset($_SESSION['user'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php endif?>
            <?php if(isset($_SESSION['admin'])) : ?>
                <li>
                    <a class="nav-link" href="admin.php">admin</a>
                </li>
            <?php endif?>
            <li>
                <img src="images/globe.png" width="35px">
            </li>
            <li class="nav-item">
                <a  href="#" data-lang="nl">NL</a>
            </li>/
            <li class="nav-item" >
                <a  href="#" data-lang="en">ENG</a>
            </li>


            <?php if (isset($_SESSION['user'])) : ?>
                <div class="success" style="margin-left: 400px; margin-top: 45px; margin-bottom: 45px;">
                    <li class="nav-item" >
                        Ingelogd als <?php echo $_SESSION['user'];?> --- <a style="color: red" href="index.php?logout='1'">Log uit</a>
                    </li>
                </div>
            <?php endif?>
        </ul>
    </div>
    <form class="search form-inline my-2 my-lg-0" action="search.php">
        <input type="search" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</nav>
<!--END NAVBAR-->


<div class="header">
    <h2>Persoonlijke gegevens</h2>
</div>

<form method="post">
    <div><?php include ('errors.php')?></div>
    <div align ="center" class="input-group">
       <p><b>Studentnummer</b>
        <input type="text" name="studentnummer">
    </div>
    <div align ="center" class="input-group">
        <p><b>Achternaam</b>
            <input type="text" name="achternaam"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Roepnaam</b>
            <input type="text" name="roepnaam"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Geboortedatum</b>
            <input type="text" name="geboortedatum"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Adresgegevens</b>
            <input type="text" name="adres"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Postcode</b>
            <input type="text" name="postcode"></p>
    </div>
    <div align ="center" class="input-group">
       <p><b>Woonplaats</b>
           <input type="text" name="woonplaats"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Telefoonnummer</b>
            <input type="text" name="tnummer"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>E-mailadres</b>
        <input type="text" name="email"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>BSN-nummer</b>
            <input type="text" name="bsn"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>IBAN rekeningnummer</b>
            <input type="text" name="iban"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Sta jij op het moment van aanvragen ingeschreven bij NHL Stenden Hogeschool?</b>
            <input type="radio" id="ja" name="ingeschreven" value="ja" checked="checked">
            <label>Ja</label><br>
            <input type="radio" id="nee" name="ingeschreven" value="nee">
            <label>Nee</label><br>
    </div>
    <div align ="center" class="input-group">
        <p><b>Voor welke opleiding sta jij op dit moment ingeschreven?</b></p>
        <input type="text" name="opleiding"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Welke opleidingsvariant volg jij?</b>
            <input type="radio" id="voltijd" name="variant" value="voltijd" checked="checked">
            <label>Voltijd</label><br>
            <input type="radio" id="deeltijd" name="variant" value="deeltijd">
            <label>Deeltijd</label><br>
            <input type="radio" id="duaal" name="variant" value="duaal">
            <label>Duaal</label><br>
    </div>
    <div align ="center" class="input-group">
        <p><b>Per wanneer ben je met je studie gestart?</b></p>
        <input type="text" name="gestart"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>In welk studiejaar zit je?</b>
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
    <div align ="center" class="input-group">
        <p><b>Heb je de studie tussendoor onderbroken</b>
            <input type="radio" id="ja" name="onderbroken" value="ja" checked="checked">
            <label>Ja</label><br>
            <input type="radio" id="nee" name="onderbroken" value="nee">
            <label>Nee</label><br>
    </div>
    <div align ="center" class="input-group">
        <p><b>Heb jij je gedurende de studieonderbreking
                ook uitgeschreven bij NHL Stenden?</b>
            <input type="radio" id="ja" name="uitgeschreven" value="ja" checked="checked">
            <label for="ja">Ja</label><br>
            <input type="radio" id="nee" name="uitgeschreven" value="nee">
            <label for="nee">Nee</label><br>
    </div>
    <div align ="center" class="input-group">
        <p><b>Heb je ook voor andere studie(s)
                ingeschreven gestaan bij NHL Stenden? En zo ja, welke.</b>
            <input type="text" name="andere"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Heb je eerder een inschrijving bij een
                andere instelling (HBO/Universiteit) gehad? Zo ja, bij welke instelling, en welke periode</b>
            <input type="text" name="instelling"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Bijzondere omstandigheden die aanleiding is tot deze aanvraag (kruis aan welke van
                toepassing is):</b>
            <input type="radio" id="optie1" name="aanleiding" value="optie1" checked="checked">
            <label>ziekte of zwangerschap en bevalling;</label><br>
            <input type="radio" id="2e" name="aanleiding" value="optie2">
            <label>een functiestoornis, handicap of chronische ziekte;</label><br>
            <input type="radio" id="3e" name="aanleiding" value="optie3">
            <label>bijzondere familieomstandigheden;</label><br>
            <input type="radio" id="4e" name="aanleiding" value="optie4">
            <label>een onvoldoende studeerbare opleiding;</label><br>
            <input type="radio" id="ouder Jaars" name="aanleiding" value="optie5">
            <label>de door de hogeschool toegekende status van topsporter;</label><br>
            <input type="radio" id="ouder Jaars" name="aanleiding" value="optie6">
            <label>andere dan de in de hierboven genoemde onderdelen bedoelde omstandigheden die, indien
                een daarop gebaseerd verzoek om financiële ondersteuning door het College van Bestuur niet
                zou worden gehonoreerd, zouden leiden tot een onbillijkheid van overwegende aard.</label><br>
            <input type="radio" id="ouder Jaars" name="aanleiding" value="optie7">
            <label for="optie7">activiteiten op bestuurlijk of maatschappelijk gebied die naar het oordeel van het College van
                Bestuur mede in het belang zijn van de hogeschool of van het onderwijs dat de student volgt;</label><br>
    </div>
    <div align ="center" class="input-group">
        <p><b>Hoeveel maanden studievertraging heb je opgelopen
                als gevolg van de hierboven aangegeven bijzondere
                omstandigheid c.q. omstandigheden?</b>
            <input type="text" name="maanden"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Onder welk stelsel van DUO val jij?</b>
            <input type="radio" id="prestatiebeurs" name="duo" value="prestatiebeurs" checked="checked">
            <label>Prestatiebeurs</label><br>
            <input type="radio" id="leenstelsel" name="duo" value="leenstelsel">
            <label>Leenstelsel</label><br></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Heb je recht (gehad) op een extra jaar
                studiefinanciering/aanvullende beurs via DUO?. Zo ja, voeg het bewijs toe bij de bijlagen</b>
            <input type="radio" id="ja" name="extra" value="ja" checked="checked">
            <label>Ja</label><br>
            <input type="radio" id="nee" name="extra" value="nee">
            <label>Nee</label><br></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Indien je een extra jaar studiefinanciering hebt
                aangevraagd, per wanneer is deze ingegaan? Vermeld
                datum.</b>
            <input type="text" name="ingegaan"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Hoeveel maanden financiële ondersteuning vraag je
                aan? (Maximaal 12)</b>
            <input type="text" name="financieel"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Heb je eerder financiële ondersteuning uit het
                Profileringsfonds ontvangen? En zoja, hoeveel maanden in welk jaar</b>
            <input type="text" name="eerder"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Waaruit bestond de door jou aangevoerde bijzondere omstandigheid?</b>
            <input type="text" name="waaruit"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Wanneer vond deze plaats en wanneer geëindigd?</b>
            <input type="text" name="eindig"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Op welke datum en bij wie heb je melding gemaakt van deze bijzondere omstandigheid?</b>
            <input type="text" name="melding"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Op welke datum en bij wie heb je de bijzondere omstandigheid eventueel afgemeld?</b>
            <input type="text" name="afmeld"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Geef aan welke studieonderdelen in welke onderwijsperiode en in welk opleidingsjaar niet
                konden worden gevolgd, voor welke studieonderdelen de mogelijkheid van een herkansing
                bestaat en welke studieonderdelen –wanneer- dienen te worden overgelopen.</b>
            <input type="text" name="studieond"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Wat is de totale duur van de vertraging?</b>
            <input type="text" name="duur"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Op welke wijze heeft de bijzondere omstandigheid het verloop van je studie beïnvloed?</b>
            <input type="text" name="verloop"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Op welke wijze heb je geprobeerd de negatieve gevolgen van de bijzondere omstandigheid voor
                jouw studie dan wel studiefinanciering 1 zoveel mogelijk te beperken dan wel te voorkomen
                (raadplegen decaan, tussentijds uitschrijven/stopzetten studiefinanciering)?</b>
            <input type="text" name="wijze"></p>
    </div>




    <button type="submit" name="submit_form">Submit</button>
</form>


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
