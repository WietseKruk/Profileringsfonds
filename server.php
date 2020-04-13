<?php
session_start();

//variable init
$errors = array();
$email_1 ="";
$email_2 ="";

//db variables
$host = 'localhost';
$name = 'root';
$pass = '';
$database = 'profileringsfonds';

    //verbinding met database + errormsg
    $conn = mysqli_connect($host, $name, $pass, $database);
    $query = "SELECT * FROM users";

     if(mysqli_connect_errno($conn)){
         echo "Kon geen verbinding maken met de database: " . mysqli_connect_error($conn);
         exit();
     }



//registreren
if(isset($_POST['register'])){
    //Haalt de emailadressen veilig uit de inputvelden
    $email_1 = mysqli_real_escape_string($conn, $_POST['email_1']);
    $email_2 = mysqli_real_escape_string($conn, $_POST['email_2']);

    //Als er fouten zijn push naar array
    if(empty($email_1)){array_push($errors,"E-mail moet ingevuld worden");}
    if(empty($email_2)){array_push($errors,"Bevestig e-mail moet ingevuld worden");}
    if($email_1 != $email_2){array_push($errors,"De e-mail adressen komen niet overeen");}

    //check of de gebruiker al bestaat, zo ja, push error naar array
    $user_check_query = "SELECT * FROM users WHERE email='$email_1' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user){array_push($errors, "Deze gebruiker bestaat al");}

    //wachtwoord hashen en gebruiker registeren als er geen errors zijn
    if(count($errors) == 0){
        //password gen
        function genPassword($length = 10) {
            return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        }
        $password = genPassword();
        $password_hashed = md5($password);
        $query = "INSERT INTO users (email, password) VALUES('$email_1', '$password_hashed')";
        mysqli_query($conn, $query);

        //Session ID zetten
        $_SESSION['reg'] = $email_1 . " succesvol toegevoegd met wachtwoord " . $password;
        $email_1 = "";
        $email_2 = "";
    }
}


    //login
     if(isset($_POST['login_user'])){
         //sanitize input
         $email = mysqli_real_escape_string($conn, $_POST['email']);
         $password = mysqli_real_escape_string($conn, $_POST['password']);
         //errors als input leeg is
         if(empty($email)){array_push($errors, "Ongeldige gebruikersnaam");}
         if(empty($password)){array_push($errors, "Ongeldig wachtwoord");}

         if(count($errors) == 0){
             $password = md5($password);
             $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
             $result = mysqli_query($conn, $query);

             //als result maar 1 regel is(dus als er maar 1 account bestaat die aan de voorwarden voldoet)
             if(mysqli_num_rows($result) == 1){
                 while($row = $result->fetch_assoc()) {
                     $firstlogin = $row['firstlogin'];
                     if($firstlogin == 1){
                         $_SESSION['id'] = $row['uID'];
                         header('location: changepassword.php');
                     }
                     else{
                     $_SESSION['id'] = $row['uID'];
                     $_SESSION['type'] = $row['type'];
                     $_SESSION['user'] = $email;
                     header('location: index.php');}
                     if(isset($_SESSION['type'])){
                         if($_SESSION['type'] == 1){
                             $_SESSION['admin'] = true;
                         }
                     }
                 }
             }
         } else {array_push($errors, "Ongeldige gebruikersnaam/wachtwoord combinatie");}
     }



if(isset($_POST['submit_form'])) {
    $snr = $_POST['studentnummer'];
    $l_name = $_POST['achternaam'];
    $f_name = $_POST['roepnaam'];
    $dob = $_POST['geboortedatum'];
    $address = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $wp = $_POST['woonplaats'];
    $tnummer = $_POST['tnummer'];
    $mail = $_POST['email'];
    $bsn = $_POST['bsn'];
    $iban = $_POST['iban'];
    $inschr = $_POST['ingeschreven'];
    $opleiding = $_POST['opleiding'];
    $variant = $_POST['variant'];
    $gestart = $_POST['gestart'];
    $jaar = $_POST['jaar'];
    $onderbroken = $_POST['onderbroken'];
    $uitschr = $_POST['uitgeschreven'];
    $andere = $_POST['andere'];
    $instel = $_POST['instelling'];
    $aanl = $_POST['aanleiding'];
    $maand = $_POST['maanden'];
    $duo = $_POST['duo'];
    $extra = $_POST['extra'];
    $ingeg = $_POST['ingegaan'];
    $finance = $_POST['financieel'];
    $eerder = $_POST['eerder'];
    $waaruit = $_POST['waaruit'];
    $eindig = $_POST['eindig'];
    $melding = $_POST['melding'];
    $afmeld = $_POST['afmeld'];
    $studieond = $_POST['studieond'];
    $duur = $_POST['duur'];
    $verloop = $_POST['verloop'];
    $wijze = $_POST['wijze'];

    if (empty($snr)) {
        array_push($errors, "Je hebt veld 1 niet ingevuld");
    }
    if (empty($l_name)) {
        array_push($errors, "Je hebt veld 2 niet ingevuld");
    }
    if (empty($f_name)) {
        array_push($errors, "Je hebt veld 3 niet ingevuld");
    }
    if (empty($dob)) {
        array_push($errors, "Je hebt veld 4 niet ingevuld");
    }
    if (empty($address)) {
        array_push($errors, "Je hebt veld 5 niet ingevuld");
    }
    if (empty($postcode)) {
        array_push($errors, "Je hebt veld 6 niet ingevuld");
    }
    if (empty($wp)) {
        array_push($errors, "Je hebt veld 7 niet ingevuld");
    }
    if (empty($tnummer)) {
        array_push($errors, "Je hebt veld 8 niet ingevuld");
    }
    if (empty($mail)) {
        array_push($errors, "Je hebt veld 9 niet ingevuld");
    }
    if (empty($bsn)) {
        array_push($errors, "Je hebt veld 10 niet ingevuld");
    }
    if (empty($iban)) {
        array_push($errors, "Je hebt veld 11 niet ingevuld");
    }
    if (empty($opleiding)) {
        array_push($errors, "Je hebt veld 13 niet ingevuld");
    }
    if (empty($gestart)) {
        array_push($errors, "Je hebt veld 15 niet ingevuld");
    }
    if (empty($andere)) {
        array_push($errors, "Je hebt veld 19 niet ingevuld");
    }
    if (empty($instel)) {
        array_push($errors, "Je hebt veld 20 niet ingevuld");
    }
    if (empty($maand)) {
        array_push($errors, "Je hebt veld 22 niet ingevuld");
    }
    if (empty($ingeg)) {
        array_push($errors, "Je hebt veld 25 niet ingevuld");
    }
    if (empty($finance)) {
        array_push($errors, "Je hebt veld 26 niet ingevuld");
    }
    if (empty($eerder)) {
        array_push($errors, "Je hebt veld 27 niet ingevuld");
    }
    if (empty($waaruit)) {
        array_push($errors, "Je hebt veld 28 niet ingevuld");
    }
    if (empty($eindig)) {
        array_push($errors, "Je hebt veld 29 niet ingevuld");
    }
    if (empty($melding)) {
        array_push($errors, "Je hebt veld 30 niet ingevuld");
    }
    if (empty($afmeld)) {
        array_push($errors, "Je hebt veld 31 niet ingevuld");
    }
    if (empty($studieond)) {
        array_push($errors, "Je hebt veld 32 niet ingevuld");
    }
    if (empty($duur)) {
        array_push($errors, "Je hebt veld 33 niet ingevuld");
    }
    if (empty($verloop)) {
        array_push($errors, "Je hebt veld 34 niet ingevuld");
    }
    if (empty($wijze)) {
        array_push($errors, "Je hebt veld 35 niet ingevuld");
    }

//    $f_name = $_POST[''];
//    $f_name = $_POST[''];
//    $f_name = $_POST[''];

    if (count($errors) == 0) {

        require('C:\wamp64\bin\apache\apache2.4.41\htdocs\fpdf.php');

        $pdf = new FPDF();

        $pdf->AddPage();

        $pdf->SetFont("Arial", "B", 10);

        $pdf->Cell(140, 10, "$f_name's Persoonsgegevens", 1, 1, 'C');

        $pdf->Cell(65, 10, "Studentnummer: ", 1, 0);
        $pdf->Cell(75, 10, $snr, 1, 1);

        $pdf->Cell(65, 10, "Achternaam: ", 1, 0);
        $pdf->Cell(75, 10, $l_name, 1, 1);

        $pdf->Cell(65, 10, "Roepnaam: ", 1, 0);
        $pdf->Cell(75, 10, $f_name, 1, 1);

        $pdf->Cell(65, 10, "Geboortedatum: ", 1, 0);
        $pdf->Cell(75, 10, $dob, 1, 1);

        $pdf->Cell(65, 10, "Adres: ", 1, 0);
        $pdf->Cell(75, 10, $address, 1, 1);

        $pdf->Cell(65, 10, "Postcode: ", 1, 0);
        $pdf->Cell(75, 10, $postcode, 1, 1);

        $pdf->Cell(65, 10, "Woonplaats: ", 1, 0);
        $pdf->Cell(75, 10, $wp, 1, 1);

        $pdf->Cell(65, 10, "Telefoonnummer: ", 1, 0);
        $pdf->Cell(75, 10, $tnummer, 1, 1);

        $pdf->Cell(65, 10, "E-mailadres: ", 1, 0);
        $pdf->Cell(75, 10, $mail, 1, 1);

        $pdf->Cell(65, 10, "BSN-nummer: ", 1, 0);
        $pdf->Cell(75, 10, $bsn, 1, 1);

        $pdf->Cell(65, 10, "Iban Rekeningnummer: ", 1, 0);
        $pdf->Cell(75, 10, $iban, 1, 1);

        $pdf->AddPage();

        $pdf->SetFont("Arial", "B", 16);

        $pdf->Cell(140, 10, "$f_name's Antwoorden", 1, 1, 'C');

        $pdf->Cell(65, 10, "Vraag 1", 1, 0);
        $pdf->Cell(75, 10, $inschr, 1, 1);

        $pdf->Cell(65, 10, "Vraag 2", 1, 0);
        $pdf->Cell(75, 10, $opleiding, 1, 1);

        $pdf->Cell(65, 10, "Vraag 3", 1, 0);
        $pdf->Cell(75, 10, $variant, 1, 1);

        $pdf->Cell(65, 10, "Vraag 4", 1, 0);
        $pdf->Cell(75, 10, $gestart, 1, 1);

        $pdf->Cell(65, 10, "Vraag 5", 1, 0);
        $pdf->Cell(75, 10, $jaar, 1, 1);

        $pdf->Cell(65, 10, "Vraag 6", 1, 0);
        $pdf->Cell(75, 10, $onderbroken, 1, 1);

        $pdf->Cell(65, 10, "Vraag 7", 1, 0);
        $pdf->Cell(75, 10, $uitschr, 1, 1);

        $pdf->Cell(65, 10, "Vraag 8", 1, 0);
        $pdf->Cell(75, 10, $andere, 1, 1);

        $pdf->Cell(65, 10, "Vraag 9", 1, 0);
        $pdf->Cell(75, 10, $instel, 1, 1);

        $pdf->Cell(65, 10, "Vraag 10", 1, 0);
        $pdf->Cell(75, 10, $andere, 1, 1);

        $pdf->Cell(65, 10, "Vraag 11", 1, 0);
        $pdf->Cell(75, 10, $aanl, 1, 1);

        $pdf->Cell(65, 10, "Vraag 12", 1, 0);
        $pdf->Cell(75, 10, $maand, 1, 1);

        $pdf->Cell(65, 10, "Vraag 13", 1, 0);
        $pdf->Cell(75, 10, $duo, 1, 1);

        $pdf->Cell(65, 10, "Vraag 14", 1, 0);
        $pdf->Cell(75, 10, $extra, 1, 1);

        $pdf->Cell(65, 10, "Vraag 15", 1, 0);
        $pdf->Cell(75, 10, $ingeg, 1, 1);

        $pdf->Cell(65, 10, "Vraag 16", 1, 0);
        $pdf->Cell(75, 10, $finance, 1, 1);

        $pdf->Cell(65, 10, "Vraag 17", 1, 0);
        $pdf->Cell(75, 10, $eerder, 1, 1);

        $pdf->Cell(65, 10, "Vraag 18", 1, 0);
        $pdf->Cell(75, 10, $waaruit, 1, 1);

        $pdf->Cell(65, 10, "Vraag 19", 1, 0);
        $pdf->Cell(75, 10, $eindig, 1, 1);

        $pdf->Cell(65, 10, "Vraag 20", 1, 0);
        $pdf->Cell(75, 10, $melding, 1, 1);

        $pdf->Cell(65, 10, "Vraag 21", 1, 0);
        $pdf->Cell(75, 10, $afmeld, 1, 1);

        $pdf->Cell(65, 10, "Vraag 22", 1, 0);
        $pdf->Cell(75, 10, $studieond, 1, 1);

        $pdf->Cell(65, 10, "Vraag 23", 1, 0);
        $pdf->Cell(75, 10, $duur, 1, 1);

        $pdf->Cell(65, 10, "Vraag 24", 1, 0);
        $pdf->Cell(75, 10, $verloop, 1, 1);

        $pdf->Cell(65, 10, "Vraag 25", 1, 0);
        $pdf->Cell(75, 10, $wijze, 1, 1);


        $id = $_SESSION['id'];
        $user = $_SESSION['user'];
        $fullpath = "C:/wamp64/www/periode3/Selecta/Profileringsfonds/public_html/" . $id . ".pdf";
        $dbpath = "/periode3/Selecta/Profileringsfonds/public_html/" . $id . ".pdf";
        if (!empty($id)) {
            $pdf->Output("$fullpath", "F");
            $query = "INSERT INTO formulier (path, uID, uName) VALUES('$dbpath', '$id', '$user')";
            mysqli_query($conn, $query);
        }
    }
}


if (isset($_POST['change_pass'])){
    $current_pass = mysqli_real_escape_string($conn, $_POST['current_pass']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['new_password_1']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['new_password_2']);

    //Als er fouten zijn push naar array
    if(empty($current_pass)){array_push($errors,"Huidig wachtwoord moet ingevuld worden");}
    if(empty($pass1)){array_push($errors,"Nieuw wachtwoord moet ingevuld worden");}
    if(empty($pass2)){array_push($errors,"Bevestig wachtwoord moet ingevuld worden");}
    if($pass1 != $pass2){array_push($errors,"De twee wachtwoorden komen niet overeen");}
    if($current_pass == $pass1 || $current_pass == $pass2){array_push($errors, "U moet een nieuw wachtwoord invoeren");}
    $id = $_SESSION['id'];
    if(count($errors) == 0){
        $password = md5($current_pass);
        $query = "SELECT * FROM users WHERE password='$password' AND uID = '$id'";
        $result1 = mysqli_query($conn, $query);

        if(mysqli_num_rows($result1) == 1){
            $new_pass = md5($pass1);
            $query = "UPDATE users SET password = '$new_pass', firstlogin = '0' WHERE password='$password' AND uID = '$id'";
            mysqli_query($conn, $query);
            while($row = $result1->fetch_assoc()) {
                    $_SESSION['id'] = $row['uID'];
                    $_SESSION['type'] = $row['type'];
                    $_SESSION['user'] = $row['email'];
            }header('location:index.php');
        }
    }

}


     //wachtwoord veranderen
     if(isset($_POST['change_pass'])){
         $pass_1 = mysqli_real_escape_string($conn, $_POST['new_password_1']);
         $pass_2 = mysqli_real_escape_string($conn, $_POST['new_password_2']);

         //push errors
         if(empty($pass_1)){array_push($errors,"Wachtwoord is leeg");}
         if(empty($pass_2)){array_push($errors,"Bevestig wachtwoord is leeg");}
         if($pass_1 != $pass_2){array_push($errors,"De wachtwoorden komen niet overeen");}

         //wachtwoord hashen en updaten als er geen errors zijn
         if(count($errors) == 0){
             $pass = md5($pass_1);
             $id = $_SESSION['id'];
             $user =  $_SESSION['user'];
             $query = "UPDATE users SET password = '$pass', firstlogin = '0' WHERE uID = '$id' AND email = '$user'";
             mysqli_query($conn, $query);
             mysqli_close($conn);
             header('location: index.php');
         }
     }





























     // Tabel alles is not null van formulier tabel
