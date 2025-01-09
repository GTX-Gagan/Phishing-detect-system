<?php
require_once 'include/config.php';
require_once 'libs/fpdf.php';

$filename = "Daybook Consolidated [Payment]" . date('Y-m-d') . ".pdf";

$sql = "SELECT * FROM duty_board";

mysqli_set_charset($conn, "utf8");
$user_query = mysqli_query($conn, $sql);

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Daybook Consolidated [Payment]', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Police', 1);
$pdf->Cell(30, 10, 'District', 1);
$pdf->Cell(30, 10, 'Unit type', 1);
$pdf->Cell(30, 10, 'From date', 1);
$pdf->Cell(30, 10, 'To date', 1);
$pdf->Ln();

if (mysqli_num_rows($user_query) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($user_query)) {
        // Fetch police details
        $polid = $row['Police_id'];
        $qry = "SELECT * FROM police_details WHERE Police_id = '$polid'";
        $result = mysqli_query($conn, $qry);
        $station = '';

        if ($result && mysqli_num_rows($result) > 0) {
            $row2 = mysqli_fetch_assoc($result);
            $station = $row2['Police_name'];
        }

        // Add row to PDF
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(15, 10, $i, 1);
        $pdf->Cell(40, 10, $station, 1);
        $pdf->Cell(30, 10, $row['District'], 1);
        $pdf->Cell(30, 10, $row['Unit_type'], 1);
        $pdf->Cell(30, 10, $row['From_date'], 1);
        $pdf->Cell(30, 10, $row['To_date'], 1);
        $pdf->Ln();
        $i++;
    }
}

$pdf->Output($filename, 'D');
?>
