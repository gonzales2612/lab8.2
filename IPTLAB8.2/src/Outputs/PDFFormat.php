<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;
use Fpdf\Fpdf;

class PDFFormat implements ProfileFormatter
{
    private $pdf;

    public function setData($profile)
    {
        $this->pdf = new Fpdf();
        $this->pdf->AddPage();

   
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(0, 10, 'Profile of ' . $profile->getName(), 0, 1, 'C');

       
        $imageUrl = 'https://www.auf.edu.ph/home/images/articles/bya.jpg'; 
        $this->pdf->Image($imageUrl, 10, 20, 20);
        $this->pdf->Ln(35); 

        $this->pdf->SetFont('Arial', '', 12);
        
        // Story
        $this->pdf->MultiCell(0, 10, 'Story: ' . $profile->getStory(), 0, 1);
    }

    public function render()
    {
        // Output PDF to browser or save to file
        return $this->pdf->Output();
    }
}
