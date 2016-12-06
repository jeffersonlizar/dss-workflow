<?php 
require('fpdf/fpdf.php');
class PDF_MC_TABLE extends FPDF{
    var $widths;
    var $aligns;


    var $fecha_inicial;
    var $fecha_final;
    var $fecha;
    var $hora;
    var $usuario;
    var $categoria;

     
    // Cabecera de página
    function data($fecha,$hora,$usuario,$fecha_inicial,$fecha_final,$categoria){
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->usuario = $usuario;
        $this->fecha_inicial = $fecha_inicial;
        $this->fecha_final = $fecha_final;
        $this->categoria = $categoria;
    }

    function Header()
    {
        // Logo
        $this->Image(base_url().'public/img/dss-icon.png',10,8,12);
        // Arial bold 15
        $this->SetFont('Arial','B',10);
        // Movernos a la derecha
        $this->Cell(17);
        // Título
        $this->SetFont('Arial','B',10);
        $this->Cell(58,10,utf8_decode('Sistema de Soporte a Decisiones'),0,0,'C');
        $this->Cell(90);
        $this->SetFont('Arial','',10);
        $this->Cell(33,5,utf8_decode('Fecha: '.$this->fecha),0,2,'C');
        $this->Cell(33,5,utf8_decode('Hora: '.$this->hora),0,2,'C');
        $this->Cell(27,5,utf8_decode('Usuario: '.$this->usuario),0,1,'C');
        $this->Cell(34,5,utf8_decode('Desde: '.$this->fecha_inicial),0,2,'C');
        $this->Cell(33,5,utf8_decode('Hasta: '.$this->fecha_final),0,1,'C');
        
        $this->Cell(33,5,utf8_decode('Filtrado por: '),0,1,'C');
        $this->Cell(50,5,utf8_decode('Categoria: '.$this->categoria),0,1);

        $this->Cell(80);
        $this->SetFont('Arial','BU',12);
        $this->Cell(40,10,utf8_decode('Reporte de Categoría'),0,0,'C');
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
    }


    function SetWidths($w){
        //set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a){
        //set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data){
        //calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h = 10 * $nb;
        //issue a page break first if needed
        $this->CheckPageBreak($h);
        //draw the cells of the row
        for ($i = 0 ; $i < count($data); $i++){
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
            //save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //draw the border
            $this->Rect($x,$y,$w,$h);
            //print the text
            $this->MultiCell($w,10,$data[$i],0,$a);
            //put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h){
        //if the height h would cause an overflow, add a new page inmediately
        if ($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt){
        //computes the number of lines a MultiCell of width w will take
        $cw = $this->CurrentFont['cw'];
        if ($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
        $s = str_replace("\r",'',$txt);
        $nb = strlen($s);
        if($nb>0 and $s[$nb-1] =="\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while($i<$nb){
            $c = $s[$i];
            if($c=="\n"){
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c==' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l>$wmax){
                if($sep==-1){
                    if($i==$j)
                        $i++;
                }
                else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }


    
}



?>
