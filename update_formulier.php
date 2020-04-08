<?php
//
////variable initialize
//if(isset($_POST['submit_form'])){
//    $snr = $_POST['studentnummer'];
//    $l_name = $_POST['achternaam'];
//    $f_name = $_POST['roepnaam'];
//    $dob = $_POST['geboortedatum'];
//    $address = $_POST['adres'];
////    $f_name = $_POST[''];
////    $f_name = $_POST[''];
////    $f_name = $_POST[''];
////    $f_name = $_POST[''];
////    $f_name = $_POST[''];
////    $f_name = $_POST[''];
//
//   require ('C:\wamp64\bin\apache\apache2.4.41\htdocs\fpdf.php');
//
//    $pdf = new FPDF();
//
//    $pdf->AddPage();
//
//    $pdf->SetFont("Arial", "B",16);
//
//    $pdf->Cell(0,10,"$f_name's formulier", 1, 1,'C');
//
//    $pdf->Cell(50,10,"Studentnummer: ",1,0);
//    $pdf->Cell(65,10,$snr,1,1);
//
//    $pdf->Cell(50,10,"Achternaam: ",1,0);
//    $pdf->Cell(65,10,$l_name,1,1);
//
//    $pdf->Cell(50,10,"Roepnaam: ",1,0);
//    $pdf->Cell(65,10,$f_name,1,1);
//
//    $pdf->Cell(50,10,"Geboortedatum: ",1,0);
//    $pdf->Cell(65,10,$dob,1,1);
//
//    $pdf->Cell(50,10,"Adress: ",1,0);
//    $pdf->Cell(65,10,$address,1,1);
//
//    $id = $_SESSION['id'];
//    $path = "C:/wamp64/bin/apache/apache2.4.41/htdocs/public_html/".$id.".pdf";
//
//    $pdf->Output("$path","F");
//
//    $query = "INSERT INTO formulier (path, uID) VALUES('$path', '$id')";
//    mysqli_query($conn, $query);
//
//}
//
//
//?>