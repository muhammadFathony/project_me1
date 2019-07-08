<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Muhammad Fathony');
$pdf->SetTitle('Laporan Daftar Barang');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

$heading = <<<EOD
<h3>LAPORAN DATA BARANG</h3>
EOD;

$pdf->WriteHTMLCell(0, 0, '', '', $heading, 0, 1, 0, true, 'C', true);
$pdf->Ln(1);
$table = '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo base_url();?>assets/img/newrealJansen.png" type="image/ico" />
<style>
    .ok {}
    .table {border-collapse: collapse; width: 100%;}
    .kategori {border: 1px solid #f2f2f2;}
    .nomor{width: 20%;}
</style>
</head>
<body>';

$table .= '<table>';
$urut =0;
$nomor =0;
$group = '-';
foreach ($data as $key ) {
   $nomor++;
   $urut++;
   if ($group == '-' || $group!=$key['id_kategori']) {
     $kat = $key['kategori'];
     if ($group != '-')
      $table .='</table>';
$table .= '<table class="table">  
          <tr>
            <th class="ok"></th>
            <th></th>
            <th></th>
          </tr>';
$table .= '<thead>
        <tr><td class="kategori">Kategori : '.$key['kategori'].'</td></tr>
    </thead>
    <tr style="background-color: #f2f2f2;">
    <th class="nomor">Nomor</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Stok</th>
  </tr>';
  $nomor =1;
}
$group = $key['id_kategori'];
if ($urut == 500) {
  $nomor = 0;
  $table .='<div class="pagebreak"> </div>';
}

$table .= '<tr>
    <td class="nomor">'.$nomor.'</td>
    <td>'.$key['kd_barang'].'</td>
    <td>'.$key['nm_barang'].'</td>
    <td>'.$key['min_stok'].'</td>
  </tr>';
}
$table .= '</table>';

$table .= '</body>
           </html>';
$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);
//Close and output PDF document
$pdf->Output('lap_daftar_barang.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+