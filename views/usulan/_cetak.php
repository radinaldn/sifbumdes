<?php
require_once Yii::$app->getBasePath() . '/extensions/pdf/fpdf.php';

/**
 * Created by PhpStorm.
 * User: radinaldn
 * Date: 28/05/18
 * Time: 12:04
 */

Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
$headers = Yii::$app->response->headers;
$headers->add('Content-Type', 'application/pdf');

//echo "<pre>";
//print_r($model);
//exit();

$kategori = "Rekap Usulan ".Yii::$app->user->identity->idKategori->nama;

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image(Yii::$app->getBasePath(). '/extensions/pdf/logo/pekanbaru_logo_100px.png',1,1);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,"Dinas Pemberdayaan Masyarakat dan Desa",0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0812-6850-497',0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Delima, Tampan, Kota Pekanbaru, Riau 28292',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : http://pmd.riau.go.id email : Sekretariat@Bpmpbangdes.Riau.Go.Id',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1,3.2,28.5,3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7, $kategori,0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Urusan', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Kelurahan/Desa', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Target', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Kebutuhan', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;

foreach ($model as $data) {
    $pdf->Cell(1, 0.8, $no , 1, 0, 'C');
    $pdf->Cell(5, 0.8, $data['urusan'],1, 0, 'C');
    $pdf->Cell(4.5, 0.8, $data['tanggal'], 1, 0,'C');
    $pdf->Cell(6, 0.8, $data['nama_keldesa'], 1, 0,'C');
    $pdf->Cell(6, 0.8, $data['target'],1, 0, 'C');
    $pdf->Cell(4.5, 0.8, $data['kebutuhan'],1, 1, 'C');

    $no++;

}

$pdf->Output("laporan_surat.pdf","I");

 ?>

