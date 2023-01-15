<?php

use Mpdf\Utils\PdfDate;

$pdf = new FPDF("L", "cm", "A4");

$pdf->SetMargins(2, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Image('assets/logo/mts.png', 2.5, 0.3, 3, 2.5);

$pdf->SetFont('Times', 'B', 14);
$pdf->SetX(8);
$pdf->MultiCell(15, 0.7, "MADRASAH TSANAWIYAH LABORATOIUM JAMBI", 0, 'C');
$pdf->SetFont('Times', '', 12);
$pdf->SetX(8);
$pdf->MultiCell(15, 0.7, 'Alamat: Jl. Arif Rahman Hakim, No. 111, Simpang IV Sipin
', 0, 'C');
$pdf->SetFont('Times', '', 12);
$pdf->SetX(8);
$pdf->MultiCell(15, 0.7, 'Kecamatan Telanaipura, Kota Jambi, Kode Pos : 36361
', 0, 'C');
$pdf->Line(2, 3.1, 28, 3.1);
$pdf->SetLineWidth(0.09);
$pdf->Line(2, 3.2, 28, 3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Times', 'B', 11);
$pdf->MultiCell(27, 0.7, '' . $ket . '', 0, 'C');
$pdf->ln(0.5);


$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(0.5);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'NIP', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'BULAN', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'TOTAL JAM', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'EKUIVALENSI', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'JUMLAH PRESENSI', 1, 0, 'C');

$pdf->ln();

if (!empty($queryp)) {
    $no = 1;
    foreach ($queryp as $a) {
        $jml_presensi = ((int)$a->total_jam  + (int)$a->ekuivalensi_jam);
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(0.5);
        $pdf->Cell(1, 0.6, $no++, 1, 0, 'C');
        $pdf->Cell(5, 0.6, $a->nip, 1, 0, 'C');
        $pdf->Cell(5, 0.6, $a->nama_bulan, 1, 0, 'C');
        $pdf->Cell(5, 0.6, $a->total_jam . ' Jam', 1, 0, 'C');
        $pdf->Cell(5, 0.6, $a->ekuivalensi_jam . ' Jam', 1, 0, 'C');
        $pdf->Cell(4, 0.6, $jml_presensi . ' jam', 1, 0, 'C');
        $pdf->ln();
    }
}
$pdf->ln(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(4.5, 0.6, "Di cetak pada : " . date("d/m/Y"), 0, 0, 'C');
$pdf->ln(1);
$pdf->Output("Laporan Kinerja Pegawai.pdf", "I");
