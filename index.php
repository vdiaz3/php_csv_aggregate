<?php 

ini_set('display_errors', 1);
setlocale(LC_NUMERIC, 'C');
error_reporting(E_ALL);

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

function read_csv(){
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    $reader->setReadDataOnly(true);
    $objPHPExcel        = $reader->load('FL_insurance_sample.csv');
    $worksheet          = $objPHPExcel->setActiveSheetIndex(0);
    $highestRow         = $worksheet->getHighestRow();
    $highestColumn      = $worksheet->getHighestColumn();
    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
    
    $temp = [];
    $response = [];
    for ($row = 2; $row <= $highestRow; ++$row) {
        for ($col = 1; $col <= $highestColumnIndex; ++$col) {
            $temp[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue(); 
        }
        array_push($response, $temp);
    }

    return $response;
}

$data = read_csv();

$array_county=array();
$array_line=array();
$column="tiv_2012";
foreach ($data as $itemsArray) {

    if(!isset($array_county[$itemsArray[3]][$column])){
        $array_county['county'][$itemsArray[3]][$column]=$itemsArray[9];
    }else{
        $array_county['county'][$itemsArray[3]][$column]=$array_county[$itemsArray[3]][$column]+$itemsArray[9];
    }

    if(!isset($array_line[$itemsArray[16]][$column])){
        $array_line['line'][$itemsArray[16]][$column]=$itemsArray[9];
    }else{
        $array_line['line'][$itemsArray[16]][$column]=$array_line[$itemsArray[16]][$column]+$itemsArray[9];
    }
}

$json_county = json_encode($array_county);
$json_line = json_encode($array_line);
var_dump($json_county);
var_dump($json_county);
file_put_contents("json_county.json", $json_county); 
file_put_contents("json_line.json", $json_line); 
?>