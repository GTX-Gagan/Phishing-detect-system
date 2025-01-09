<?php
require_once 'include/config.php';
require_once 'libs/fpdf.php'; 

$filename = "Citizen_Committee_" . date('Y-m-d') . ".pdf";

$sql = "SELECT * FROM citizen_commitee";

$res = mysqli_query($conn, $sql);

$pdf = new FPDF('L'); // 'L' for landscape mode

$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 10); // Reduce font size
$pdf->Cell(0, 10, 'Citizen Committee', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 8); // Reduce font size
$pdf->Cell(8, 8, 'ID', 1); // Reduce cell width
$pdf->Cell(20, 8, 'Name', 1); // Reduce cell width
$pdf->Cell(20, 8, 'Father name', 1); // Reduce cell width
$pdf->Cell(20, 8, 'Citizen type', 1); // Reduce cell width
$pdf->Cell(25, 8, 'Area', 1); // Reduce cell width
$pdf->Cell(8, 8, 'Age', 1); // Reduce cell width
$pdf->Cell(15, 8, 'Religion', 1); // Reduce cell width
$pdf->Cell(30, 8, 'Address', 1); // Reduce cell width
$pdf->Cell(15, 8, 'State', 1); // Reduce cell width
$pdf->Cell(30, 8, 'District', 1); // Reduce cell width
$pdf->Cell(15, 8, 'Pincode', 1); // Reduce cell width
$pdf->Cell(20, 8, 'Phone', 1); // Reduce cell width
$pdf->Cell(25, 8, 'Station', 1); // Reduce cell width
$pdf->Cell(15, 8, 'City', 1); // Reduce cell width
$pdf->Ln();

if (mysqli_num_rows($res) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        // Fetch station details
        $staid = $row['Station_id'];
        $qry = "SELECT * FROM station_details WHERE Station_id = '$staid'";
        $result = mysqli_query($conn, $qry);
        $station = '';

        if ($result && mysqli_num_rows($result) > 0) {
            $row2 = mysqli_fetch_assoc($result);
            $station = $row2['Name'];
        }

        // Add row to PDF
        $pdf->SetFont('Arial', '', 8); // Reduce font size
        $pdf->Cell(8, 8, $i, 1); // Reduce cell width
        $pdf->Cell(20, 8, $row['Name'], 1); // Reduce cell width
        $pdf->Cell(20, 8, $row['Father_name'], 1); // Reduce cell width
        $pdf->Cell(20, 8, $row['Citizen_type'], 1); // Reduce cell width
        $pdf->Cell(25, 8, $row['Area'], 1); // Reduce cell width
        $pdf->Cell(8, 8, $row['Age'], 1); // Reduce cell width
        $pdf->Cell(15, 8, $row['Religion'], 1); // Reduce cell width
        $pdf->Cell(30, 8, $row['Address'], 1); // Reduce cell width
        $pdf->Cell(15, 8, $row['State'], 1); // Reduce cell width
        $pdf->Cell(30, 8, $row['District'], 1); // Reduce cell width
        $pdf->Cell(15, 8, $row['Pincode'], 1); // Reduce cell width
        $pdf->Cell(20, 8, $row['Phone'], 1); // Reduce cell width
        $pdf->Cell(25, 8, $station, 1); // Reduce cell width
        $pdf->Cell(15, 8, $row['City'], 1); // Reduce cell width
        $pdf->Ln();
        $i++;
    }
}

$pdf->Output($filename, 'D');
?>
