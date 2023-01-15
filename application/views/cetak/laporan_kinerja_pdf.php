<?php

$pdf = new FPDF("L", "cm", "A4");

$pdf->SetMargins(1.5, 2, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Image('assets/logo/mts.png', 2.5, 1.3, 3, 2.5);

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
$pdf->Line(1, 4.3, 29, 4.3);
$pdf->SetLineWidth(0.09);
$pdf->Line(1, 4.4, 29, 4.4);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Times', 'B', 11);
$pdf->MultiCell(27, 0.7, '' . $ket . '', 0, 'C');
$pdf->ln(0.5);


$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'NIP', 1, 0, 'C');
$pdf->Cell(5.5, 0.8, 'NAMA', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'BULAN', 1, 0, 'C');
$pdf->Cell(10.5, 0.8, 'KETERANGAN ', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'AKG ', 1, 0, 'C');

$pdf->ln();

if (!empty($query)) {
    $no = 1;

    foreach ($query as $a) {

        $cellWidth = 10.5; //lebar sel
        $cellHeight = 0.8; //tinggi sel satu baris normal

        //periksa apakah teksnya melibihi kolom?
        if ($pdf->GetStringWidth($a->ket) < $cellWidth) {
            //jika tidak, maka tidak melakukan apa-apa
            $line = 1;
        } else {
            //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
            //dengan memisahkan teks agar sesuai dengan lebar sel
            //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel

            $textLength = strlen($a->ket);    //total panjang teks
            $errMargin = 5;        //margin kesalahan lebar sel, untuk jaga-jaga
            $startChar = 0;        //posisi awal karakter untuk setiap baris
            $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
            $textArray = array();    //untuk menampung data untuk setiap baris
            $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)

            while ($startChar < $textLength) { //perulangan sampai akhir teks
                //perulangan sampai karakter maksimum tercapai
                while (
                    $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
                    ($startChar + $maxChar) < $textLength
                ) {
                    $maxChar++;
                    $tmpString = substr($a->ket, $startChar, $maxChar);
                }
                //pindahkan ke baris berikutnya
                $startChar = $startChar + $maxChar;
                //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                array_push($textArray, $tmpString);
                //reset variabel penampung
                $maxChar = 0;
                $tmpString = '';
            }
            //dapatkan jumlah baris
            $line = count($textArray);
        }

        //tulis selnya
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(1, ($line * $cellHeight), $no++, 1, 0, 'C');
        $pdf->Cell(4, ($line * $cellHeight), $a->nip, 1, 0, 'C');
        $pdf->Cell(5.5, ($line * $cellHeight), $a->nama_pegawai, 1, 0, 'C');
        $pdf->Cell(3, ($line * $cellHeight), $a->nama_bulan, 1, 0, 'C');

        //memanfaatkan MultiCell sebagai ganti Cell
        //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
        //ingat posisi x dan y sebelum menulis MultiCell
        $xPos = $pdf->GetX();
        $yPos = $pdf->GetY();
        $pdf->MultiCell($cellWidth, $cellHeight, $a->ket, 1, 'L');

        //kembalikan posisi untuk sel berikutnya di samping MultiCell 
        //dan offset x dengan lebar MultiCell
        $pdf->SetXY($xPos + $cellWidth, $yPos);

        $pdf->Cell(3, ($line * $cellHeight), $a->kegiatan . ' Volume', 1, 1, 'C'); //sesuaikan ketinggian dengan jumlah garis
    }
}

$pdf->ln(1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(4.5, 0.6, "Di cetak pada : " . date("d/m/Y"), 0, 0, 'C');
$pdf->ln(1);
$pdf->Output("Laporan Kinerja Pegawai.pdf", "I");
