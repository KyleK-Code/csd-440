<?php
/*
    Name: Kyle Klausen
    Date: 5/22/2026
    Assignment: Module 11 - PDF Report
    Purpose: Creates a PDF report that displays general information about CS2 teams
             and lists all database records from the Module 8 table in a formatted table.
*/

require('fpdf/fpdf.php');

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'CS2 Teams Database Report', 0, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 8, 'Module 11 PDF Report - Kyle Klausen', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);

$pdf->MultiCell(0, 7,
    "Counter-Strike 2, also known as CS2, is a competitive first-person shooter game where professional teams compete in tournaments around the world. The data in this report focuses on several well-known CS2 teams, including their region, ranking, founding year, and estimated prize earnings. This information is useful for comparing teams based on competitive standing, history, and overall success."
);

$pdf->Ln(8);

$sql = "SELECT team_id, team_name, region, ranking, founded_year, prize_earnings 
        FROM kyle_cs2_teams 
        ORDER BY ranking ASC";

$result = mysqli_query($conn, $sql);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 10, 'ID', 1, 0, 'C');
$pdf->Cell(40, 10, 'Team Name', 1, 0, 'C');
$pdf->Cell(35, 10, 'Region', 1, 0, 'C');
$pdf->Cell(25, 10, 'Ranking', 1, 0, 'C');
$pdf->Cell(35, 10, 'Founded', 1, 0, 'C');
$pdf->Cell(35, 10, 'Earnings', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(20, 10, $row['team_id'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['team_name'], 1, 0, 'C');
        $pdf->Cell(35, 10, $row['region'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['ranking'], 1, 0, 'C');
        $pdf->Cell(35, 10, $row['founded_year'], 1, 0, 'C');
        $pdf->Cell(35, 10, '$' . number_format($row['prize_earnings'], 2), 1, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'No records found.', 1, 1, 'C');
}

mysqli_close($conn);

$pdf->Output('I', 'Kyle_CS2_Teams_Report.pdf');
?>