<?php
require_once ('connect.php');
require('fpdf/fpdf.php');

$tgll = $_GET['thn'].'-'.$_GET['bln'].'-'.$_GET['tgl'];

$que = mysqli_query($connect,"insert into simpan values('','".$_GET['namapelapor']."','".$_GET['namakorban']."','".$_GET['jk']."','".$tgll."','".$_GET['lokasi']."','".$_GET['jenis']."','".$_GET['deskripsi']."')");

class PDF extends FPDF
{
// Page header
function Header()
{
  // Logo
  // $this->Image('img/kua.png',6,6,30);
  // Arial bold 15
  $this->SetFont('Arial','B',14);
  // Move to the right
  $this->Cell(80);
  $this->Cell(30,10,'PT. KEBON AGUNG',0,0,'C');

  $this->Ln(5);
  $this->Cell(80);
  $this->Cell(30,10,'KANTOR PENJAMIN ASURANSI ',0,0,'C');

  $this->Ln(5);
  $this->Cell(80);
  $this->Cell(30,10,'KOTA SURABAYA',0,0,'C');

  $this->Ln(5);
  $this->SetFont('Arial','',13);
  $this->Cell(80);
  $this->Cell(30,10,'Jl. Teknik Kimia, Keputih, Sukolilo, Kota Surabaya',0,0,'C');
  // Line break
  $this->setlinewidth(1);
  $this->Line(10,36,200,36);
  $this->setlinewidth(0);
  $this->Line(10,37,200,37);

  //$this->Ln(15);
  //$this->Cell(0,0,'',1,0,'C');
}

// Page footer
function Footer()
{
  // Position at 1.5 cm from bottom
  $this->SetY(-15);
  // Arial italic 8
  $this->SetFont('Arial','I',8);
  // Page number
  $this->Cell(0,10,'',0,0,'R');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Arial','U'.'B',14);
$pdf->Ln(25);
$pdf->Cell(80);
$pdf->Cell(30,10,'SURAT LAPORAN KECELAKAAN',0,0,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','',13);
$pdf->Ln(10);
$pdf->Cell(7);
$pdf->Cell(5,10,'1. Nama Korban',0,0,'L');
$pdf->Cell(60);
$pdf->Cell(30,10,': '.$_GET['namakorban'],0,0,'L');

$pdf->Ln(5);
$pdf->Cell(7);
$pdf->Cell(5,10,'2. Jenis kelamin',0,0,'L');
$pdf->Cell(60);
$pdf->Cell(30,10,': '.$_GET['jk'],0,0,'L');

$pdf->Ln(5);
$pdf->Cell(7);
$pdf->Cell(5,10,'3. Tanggal Kejadian',0,0,'L');
$pdf->Cell(60);
$pdf->Cell(30,10,': '.$_GET['tgl'].'-'.$_GET['bln'].'-'.$_GET['thn'],0,0,'L');

$pdf->Ln(5);
$pdf->Cell(7);
$pdf->Cell(5,10,'4. Lokasi Kejadian',0,0,'L');
$pdf->Cell(60);
$pdf->Cell(30,10,': '.$_GET['lokasi'],0,0,'L');

$pdf->Ln(5);
$pdf->Cell(7);
$pdf->Cell(5,10,'5. Jenis Kecelakaan',0,0,'L');
$pdf->Cell(60);
$pdf->Cell(30,10,': '.$_GET['jenis'],0,0,'L');

$sql = mysqli_query($connect,"Select * From biaya_hotel where Deskripsi ='".$_GET['jenis']."' ");
$dd = mysqli_fetch_array($sql);

// if ($_GET['asuransi'] == 'tangan') {
//   $tangan = 'Rp. 20.000';
// }else {
//   $tangan = 'Rp.10.000';
// }

$pdf->Ln(5);
$pdf->Cell(7);
$pdf->Cell(5,10,'6. Asuransi',0,0,'L');
$pdf->Cell(60);
$pdf->Cell(30,10,': Rp. '.$dd['Biaya'],0,0,'L');

$pdf->Ln(5);
$pdf->Cell(7);
$pdf->Cell(5,10,'7. Deskripsi',0,0,'L');
$pdf->Cell(60);
$pdf->Cell(30,10,': '.$_GET['deskripsi'],0,0,'L');

$pdf->Ln(10);
$pdf->Cell(6);
$pdf->Cell(50,10,'Demikianlah, surat laporan ini dibuat dengan sebenar-benarnya',0,0,'L');

$pdf->Ln(60);
$pdf->Cell(10);
$pdf->Cell(174,10,''.$_GET['lokasi'].date(',d-M-Y'),0,0,'R');

$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(168,10,'Atas Nama ',0,0,'R');

$pdf->Ln(30);
$pdf->Cell(10);
$pdf->Cell(160,10,' '.$_GET['namapelapor'],0,0,'R');


$pdf->Output();