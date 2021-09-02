<?php
require_once 'model/reportes.php';
require_once 'libraries/Carbon.php';
require_once 'libraries/fpdf/fpdf.php';

/**
 * Clase controlador para adminsitrar usuarios
 */

class reportesController
{
    public function test()
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Hello World!');
        $pdf->Output();
    }

    /**
     * Mostar los datos del reporte produccion
     */
    public function consultarProduccion()
    {
        $datos = null;
        try {
            $fechaInicio = isset($_REQUEST['fechaInicio']) ? $_REQUEST['fechaInicio'] : "";
            $fechaInicioProcesada = Carbon\Carbon::createFromFormat('d-m-Y', $fechaInicio)->format('Y-m-d');

            $fechaFinal = isset($_REQUEST['fechaFinal']) ? $_REQUEST['fechaFinal'] : "";
            $fechaFinalProcesada = Carbon\Carbon::createFromFormat('d-m-Y', $fechaFinal)->format('Y-m-d');

            $datos = (new Reporte())->ReporteProduccion($fechaInicioProcesada, $fechaFinalProcesada);
        } catch (Exception $e) {
        }

        require_once 'view/header_dashboard.php';
        require_once 'view/reportes/reporte_produccion.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Mostrar los datos de los pedidos
     */
    public function consultarPedidos()
    {
        $datos = null;
        try {
            $fechaInicio = isset($_REQUEST['fechaInicio']) ? $_REQUEST['fechaInicio'] : "";
            $fechaInicioProcesada = Carbon\Carbon::createFromFormat('d-m-Y', $fechaInicio)->format('Y-m-d');

            $fechaFinal = isset($_REQUEST['fechaFinal']) ? $_REQUEST['fechaFinal'] : "";
            $fechaFinalProcesada = Carbon\Carbon::createFromFormat('d-m-Y', $fechaFinal)->format('Y-m-d');

            $datos = (new Reporte())->ReportePedido($fechaInicioProcesada, $fechaFinalProcesada);
        } catch (Exception $e) {
        }

        require_once 'view/header_dashboard.php';
        require_once 'view/reportes/reporte_pedido.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Generar el reporte pdf de la produccion
     */
    public function generarReporteProduccionPDF()
    {
        try {
            $fechaInicio = $_REQUEST['fechaInicio'];
            $fechaIniciopProcesada = Carbon\Carbon::createFromFormat('d-m-Y', $fechaInicio)->format('Y-m-d');

            $fechaFinal = $_REQUEST['fechaFinal'];
            $fechaFinalProcesada  = Carbon\Carbon::createFromFormat('d-m-Y', $fechaFinal)->format('Y-m-d');

            $result = (new Reporte())->ReporteProduccion($fechaIniciopProcesada,  $fechaFinalProcesada);
            $header = "";

            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(40, 10, 'Reporte de produccion del ' . $fechaInicio . ' al ' . $fechaFinal . '');
            $pdf->Ln();
            $pdf->SetFont('Arial', 'B', 10);


            $header = array("Cod", "Fecha", "Nombre Empleado", "Cant Panes", "Cant Masas", "Sueldo", "Bono");
            // Column widths
            $w = array(15, 20, 70, 23, 23, 17, 17);
            // Header
            for ($i = 0; $i < count($header); $i++)
                $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'L');
            $pdf->Ln();

            $pdf->SetFont('Arial', '', 7);
            foreach ($result as $row) {
                $pdf->Cell($w[0], 8, $row['cod'], 1, 'L');
                $pdf->Cell($w[1], 8, date("d-m-Y", strtotime($row['fecha'])), 1, 'L');
                $pdf->Cell($w[2], 8, $row['empleado'], 1, 'L');
                $pdf->Cell($w[3], 8, $row['panes'], 1, 'L');
                $pdf->Cell($w[4], 8, round($row['masas'], 2), 1, 'L');
                $pdf->Cell($w[5], 8, $row['sueldo'], 1, 'L');
                $pdf->Cell($w[6], 8, $row['bono'], 1, 'L');

                $pdf->Ln();
            }
            $pdf->Cell(array_sum($w), 0, '', 'T');
            $pdf->Output();
        } catch (Exception $e) {
        }
    }

    /**
     * Generar el reporte pdf de los pedidos
     */
    public function generarReportePedidoPDF()
    {
        try {
            $fechaInicio = $_REQUEST['fechaInicio'];
            $fechaIniciopProcesada = Carbon\Carbon::createFromFormat('d-m-Y', $fechaInicio)->format('Y-m-d');

            $fechaFinal = $_REQUEST['fechaFinal'];
            $fechaFinalProcesada  = Carbon\Carbon::createFromFormat('d-m-Y', $fechaFinal)->format('Y-m-d');

            $result = (new Reporte())->ReportePedido($fechaIniciopProcesada,  $fechaFinalProcesada);
            $header = "";

            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(40, 10, 'Reporte de pedidos del ' . $fechaInicio . ' al ' . $fechaFinal . '');
            $pdf->Ln();
            $pdf->SetFont('Arial', 'B', 10);


            $header = array("Cod", "Cliente", "Fecha", "Cantidad", "Precio", "Masas");
            // Column widths
            $w = array(15, 70, 20, 23, 23, 17);
            // Header
            for ($i = 0; $i < count($header); $i++)
                $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'L');
            $pdf->Ln();

            $pdf->SetFont('Arial', '', 7);
            foreach ($result as $row) {
                $pdf->Cell($w[0], 8, $row['cod'], 1, 'L');
                $pdf->Cell($w[1], 8, $row['cliente'], 1, 'L');
                $pdf->Cell($w[2], 8, date("d-m-Y", strtotime($row['fecha'])), 1, 'L');
                $pdf->Cell($w[3], 8, $row['cantidad'], 1, 'L');
                $pdf->Cell($w[4], 8, $row['precio'], 1, 'L');
                $pdf->Cell($w[5], 8, $row['masas'], 1, 'L');

                $pdf->Ln();
            }
            $pdf->Cell(array_sum($w), 0, '', 'T');
            $pdf->Output();
        } catch (Exception $e) {
        }
    }
}
