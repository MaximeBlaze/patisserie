<?php
require '../lib/php/dbConnect.php';
require '../lib/php/classes/Connexion.class.php';
require '../lib/php/classes/utilisateur.class.php';
require '../lib/php/classes/utilisateurDB.class.php';
require '../../admin/lib/fpdf/fpdf.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);

$obj = new utilisateurDB($cnx);
$liste = $obj->getAllUSser();
$nbrG = count($liste);

class PDF extends FPDF
{
// En-tête
    function Header()
    {
        $this->Image('../../lib/CSS/Images/entete-pdf.jpg',0.5,0.5,20);
    }
    
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,28,'PDF Maxime Blaze  => Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$pdf = new PDF('P','cm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$x = 3;
$y = 6;
$pdf->SetFont('Arial','B',16);
$pdf->SetXY(1, 4.5);
$pdf->cell(0,0,utf8_decode('Utilisateurs'),0,0,'C');
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','B',12);
$pdf->cell(2,1,utf8_decode('NOM'),0,0,'C');
$pdf->cell(4,1,utf8_decode('PRENOM'),0,0,'C');
$pdf->cell(2,1,utf8_decode('LOGIN'),0,0,'C');
$pdf->cell(4,1,utf8_decode('ADRESSE'),0,0,'C');
$pdf->cell(5,1,utf8_decode('COMPTE'),0,0,'C');


$pdf->SetFont('Arial','',12);
$y++;
$y++;
for($i=0;$i<$nbrG;$i++)
{
    if($i==6)
    {
        $pdf->AddPage();
        $x = 3;
        $y = 5;
        $pdf->SetXY($x, $y);
        $pdf->SetFont('Arial','B',12);
        $pdf->cell(2,1,utf8_decode('NOM'),0,0,'C');
        $pdf->cell(4,1,utf8_decode('PRENOM'),0,0,'C');
        $pdf->cell(2,1,utf8_decode('LOGIN'),0,0,'C');
        $pdf->cell(4,1,utf8_decode('ADRESSE'),0,0,'C');
        $pdf->cell(5,1,utf8_decode('COMPTE'),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $y = 7;
    }
    $pdf->SetXY($x,$y);
    $pdf->cell(2,2,utf8_decode($liste[$i]->NOM),0,0,'C');
    $pdf->SetXY($x+3,$y);
    $pdf->cell(2,2,utf8_decode($liste[$i]->PRENOM),0,0,'C');
    $pdf->SetXY($x+6,$y);
    $pdf->cell(2,2,utf8_decode($liste[$i]->LOGIN),0,0,'C');
    $pdf->SetXY($x+9,$y);
    $pdf->cell(2,2,utf8_decode($liste[$i]->ADRESSE),0,0,'C');
    $pdf->SetXY($x+12,$y);
    $pdf->cell(5,2,utf8_decode($liste[$i]->NUMERO_COMPTE),0,0,'C');
    $y+=3;
}
ob_start();
$pdf->Output();
ob_end_flush();