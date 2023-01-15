<?php

$pdf = new FPDF("P", "cm", "A4");

$pdf->SetMargins(1, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Image('assets/logo/mts.png', 1, 0.3, 3, 2.5);

$pdf->SetFont('Times', 'B', 14);
$pdf->SetX(3.5);
$pdf->MultiCell(15, 0.7, "MADRASAH TSANAWIYAH LABORATOIUM JAMBI", 0, 'C');
$pdf->SetFont('Times', '', 12);
$pdf->SetX(3.5);
$pdf->MultiCell(15, 0.7, 'Alamat: Jl. Arif Rahman Hakim, No. 111, Kel. Simpang IV Sipin
', 0, 'C');
$pdf->SetFont('Times', '', 12);
$pdf->SetX(3.5);
$pdf->MultiCell(15, 0.7, 'Kecamatan Telanaipura, Kota Jambi, Kode Pos : 36361
', 0, 'C');
$pdf->Line(1, 3.2, 20, 3.2);
$pdf->SetLineWidth(0.09);
$pdf->Line(1, 3.1, 20, 3.1);
$pdf->SetLineWidth(0);
$pdf->ln(0.5);
$pdf->SetFont('Times', 'B', 14);
$pdf->MultiCell(19.5, 0.7, 'PENILAIAN KINERJA GURU', 0, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(19.5, 0.7, 'Bulan ' . '' . $query2['nama_bulan'] . '', 0, 'C');
$pdf->ln(1);

$pdf->SetFont('Times', '', 12);
$pdf->Cell(0.5);
$pdf->Cell(7, 1, 'Nama Pegawai', 0, 0, 'L');
$pdf->Cell(7, 1, ': ' . '' . $query2['nama_pegawai'] . '', 0, 0, 'L');
$pdf->ln(1);
$pdf->Cell(0.5);
$pdf->Cell(7, 1, 'Nomor Induk Pegawai', 0, 0, 'L');
$pdf->Cell(7, 1, ': ' . '' . $query2['nip'] . '', 0, 0, 'L');
$pdf->ln(1);
$pdf->Cell(0.5);
$pdf->Cell(7, 1, 'Kegiatan', 0, 0, 'L');
$pdf->Cell(7, 1, ': ' . '' . $query['kegiatan'] . '' . ' Volume', 0, 0, 'L');
$pdf->ln(1);
$pdf->Cell(0.5);
$pdf->Cell(7, 1, 'Jumlah Presensi', 0, 0, 'L');
$jml_presensi = ((int)$query2['total_jam']  + (int)$query2['ekuivalensi_jam']);
$pdf->Cell(7, 1, ': ' . '' . $jml_presensi . '' . ' Jam', 0, 0, 'L');
$pdf->ln(1);
$pdf->Cell(0.5);
$pdf->Cell(7, 1, 'Penilaian Kepala Sekolah', 0, 0, 'L');
$jml_jawaban = ($query3['jawaban'] + $query3['jawaban2'] + $query3['jawaban3'] + $query3['jawaban4'] + $query3['jawaban5'] + $query3['jawaban6'] + $query3['jawaban7'] + $query3['jawaban8'] + $query3['jawaban9'] + $query3['jawaban10']);
$pdf->Cell(7, 1, ': ' . '' . $jml_jawaban . '' . ' Poin', 0, 0, 'L');
//garis
$pdf->Line(1.5, 11, 20, 11);
$pdf->SetLineWidth(0);

$pdf->ln(1);
$pdf->Cell(0.5);
$pdf->Cell(7, 1, 'Hasil Penilaian', 0, 0, 'L');
$jml_jawaban = ($query3['jawaban'] + $query3['jawaban2'] + $query3['jawaban3'] + $query3['jawaban4'] + $query3['jawaban5'] + $query3['jawaban6'] + $query3['jawaban7'] + $query3['jawaban8'] + $query3['jawaban9'] + $query3['jawaban10']);
$jml_presensi = ((int)$query2['total_jam']  + (int)$query2['ekuivalensi_jam']);
$total_presensi = ((int)$query2['total_sehari']  * (int)$query2['jml_hari'] + (int)$query2['ekuivalensi']);
$total_kegiatan = '60';
$total_jawaban = '50';
$hasil_penilaian = (($query['kegiatan'] / $total_kegiatan * '100') * ($jml_presensi / $total_presensi) * ($jml_jawaban / $total_jawaban));
$pdf->Cell(7, 1, ': ' . '' . round($hasil_penilaian) . '' . ' Poin', 0, 0, 'L');
$pdf->ln(1);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0.5);
$pdf->Cell(7, 1, 'PREDIKAT', 0, 0, 'L');
$jml_jawaban = ($query3['jawaban'] + $query3['jawaban2'] + $query3['jawaban3'] + $query3['jawaban4'] + $query3['jawaban5'] + $query3['jawaban6'] + $query3['jawaban7'] + $query3['jawaban8'] + $query3['jawaban9'] + $query3['jawaban10']);
$jml_presensi = ((int)$query2['total_jam']  + (int)$query2['ekuivalensi_jam']);
$total_presensi = ((int)$query2['total_sehari']  * (int)$query2['jml_hari'] + (int)$query2['ekuivalensi']);
$total_kegiatan = '60';
$total_jawaban = '50';
$hasil_penilaian = (($query['kegiatan'] / $total_kegiatan * '100') * ($jml_presensi / $total_presensi) * ($jml_jawaban / $total_jawaban));
if ($hasil_penilaian == '') {
    $predikat = 'TIDAK DI TEMUKAN';
} else if ($hasil_penilaian >= '80') {
    $predikat = 'SANGAT BAIK';
} else if ($hasil_penilaian > '60') {
    $predikat = 'BAIK';
} else if ($hasil_penilaian > '50') {
    $predikat = 'CUKUP';
} else {
    $predikat = 'KURANG';
}
$pdf->Cell(7, 1, ': ' . '' . $predikat . '', 0, 0, 'L');

//waktu & ttd
$pdf->SetFont('Times', '', 12);
$pdf->ln(2);
$pdf->Cell(18.5, 1, 'Jambi, ' . '' . $tgl_cetak . '', 0, 0, 'R');
$pdf->ln(3.5);
$pdf->Cell('', 1, 'Mahmud MY, S. Ag., M. Pd', 0, 0, 'R');




// $pdf->ln(1);
// $pdf->SetFont('Arial', '', 10);
// $pdf->Cell(4.5, 0.6, "Di cetak pada : " . date("d/m/Y"), 0, 0, 'C');
// $pdf->ln(1);
$pdf->Output("Penilaian Kinerja Guru.pdf", "I");
