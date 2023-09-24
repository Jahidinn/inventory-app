<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class ExcelController extends Controller
{
    public function index()
    {
    }

    public function ExportExcel($customer_data)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {

            $spreadSheet = new Spreadsheet();
            $sheet = $spreadSheet->getActiveSheet();
            $sheet->getDefaultColumnDimension()->setWidth(20);
            foreach (range('8', '30') as $columnID) {
                $sheet->mergeCells('C' . $columnID . ':I' . $columnID);
            }

            $sheet->fromArray($customer_data, NULL, 'B8', 'D8');
            $sheet->mergeCells('B2:D3');
            $sheet->mergeCells('E2:G2');
            $sheet->mergeCells('E3:G3');
            $sheet->mergeCells('H2:X3');
            $sheet->mergeCells('Y2:Z2');
            $sheet->mergeCells('Y3:Z3');

            $sheet->mergeCells('B5:D5');
            $sheet->mergeCells('E5:G5');
            $sheet->mergeCells('H5:I5');
            $sheet->mergeCells('J5:P5');
            $sheet->mergeCells('Q5:R5');
            $sheet->mergeCells('S5:Z5');

            $sheet->getRowDImension('2')->setRowHeight('20');
            $sheet->getRowDImension('3')->setRowHeight('40');
            $sheet->getRowDImension('4')->setRowHeight('5');
            $sheet->getRowDImension('5')->setRowHeight('20');
            $sheet->getRowDImension('6')->setRowHeight('7');
            $sheet->getRowDImension('7')->setRowHeight('30');

            $sheet->getColumnDImension('A')->setWidth('4');
            $sheet->getColumnDImension('L')->setWidth('8');
            $sheet->getColumnDImension('M')->setWidth('35');
            $sheet->getColumnDImension('Z')->setWidth('35');
            foreach (range('B', 'K') as $columnID) {
                $sheet->getColumnDImension($columnID)->setWidth('5');
            }
            foreach (range('N', 'Y') as $columnID) {
                $sheet->getColumnDImension($columnID)->setWidth('5');
            }

            //border

            $spreadSheet
                ->getActiveSheet()
                ->getStyle('B2:Z3')
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THICK)
                ->setColor(new Color('0000'));
            $spreadSheet
                ->getActiveSheet()
                ->getStyle('E2:G3')
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THICK)
                ->setColor(new Color('0000'));
            $spreadSheet
                ->getActiveSheet()
                ->getStyle('H2:X3')
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THICK)
                ->setColor(new Color('0000'));

            $spreadSheet
                ->getActiveSheet()
                ->getStyle('B5:Z5')
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THICK)
                ->setColor(new Color('0000'));
            $spreadSheet
                ->getActiveSheet()
                ->getStyle('B7:Z7')
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THICK)
                ->setColor(new Color('0000'));

            $buttomBorder = 20 + 10;
            $spreadSheet
                ->getActiveSheet()
                ->getStyle('B2:Z' . $buttomBorder)
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THICK)
                ->setColor(new Color('0000'));

            //endborder
            $sheet->getCell('H2')->setValue("REKAP EVALUASI PRODUKSI MASAL" . "\n" . "製 品 紹 介" . "\n" . "(12.456.789.0)");
            $sheet->getStyle('H2')->getAlignment()->setWrapText(true);
            $sheet->getStyle('H:X')->getAlignment()->setVertical('center');
            $sheet->getStyle('2:3')->getAlignment()->setHorizontal('center');

            //color
            $sheet->getStyle('E2:G2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('c0c1c2');

            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }
    /**
     *This function loads the customer data from the database then converts it
     * into an Array that will be exported to Excel
     */
    function exportData()
    {
        $data = DB::table('items')->orderBy('id', 'DESC')->get();
        $data_array[] = array("id", "Nama", "", "", "", "", "", "", "Kode",);
        foreach ($data as $data_item) {
            $data_array[] = array(
                'id' => $data_item->id,
                'name' => $data_item->name,
                '1' => '', '2' => '', '3' => '', '4' => '', '5' => '', '6' => '',
                'kode' => $data_item->item_id,
            );
        }
        $this->ExportExcel($data_array);
    }
}
