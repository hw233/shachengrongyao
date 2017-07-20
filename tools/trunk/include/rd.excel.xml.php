<?php
/**
 * Created by PhpStorm.
 * User: apple1
 * Date: 15/4/22
 * Time: 下午2:39
 */

//读取Excel生成的XML文件，返回数组
//Excel生成的XML文件数据的我们需要的结构为：
//Worksheet->Table->Row->Cell->Data
function rdExcel_XML($data_file)
{
    $doc = new DOMDocument('1.0', 'UTF-8');
    $doc->load($data_file);

    $worksheets = $doc->getElementsByTagName("Worksheet");

    $xml_data_array = array();
    foreach ($worksheets as $worksheet) {
        $worksheet_ssname = $worksheet->getAttribute('ss:Name');

        $tables = $worksheet->getElementsByTagName("Table");
        foreach ($tables as $table) {
            $rows = $table->getElementsByTagName("Row");
            $irow = 0;
            foreach ($rows as $row) {
                $cells = $row->getElementsByTagName("Cell");
                $icell = 0;
                $xml_data[$irow] = array();
                foreach ($cells as $cell) {
                    $cell_ssindex = $cell->getAttribute('ss:Index');
                    if ($cell_ssindex == "") {
                        $datas = $cell->getElementsByTagName("Data");
                        $xml_data[$irow][$icell] = getData($datas);
                        ++$icell;
                    }
                    else {
                        for ($icell; $icell < $cell_ssindex; $icell++) {
                            if ($icell != $cell_ssindex - 1) {
                                $data = "";
                            } else {
                                $datas = $cell->getElementsByTagName("Data");
                                $data = getData($datas);
                            }
                            $xml_data[$irow][$icell] = $data;
                        }
                    }
                }
                ++$irow;
            }
        }
        $xml_data_array[$worksheet_ssname] = $xml_data;
        unset($xml_data);
    }
    // 去除多余空行
    $xml_data_array_new = array();
    foreach ($xml_data_array as $worksheet_ssname => $xml_data) {
        $xml_data_new = array();
        for ($j = 0; $j < sizeof($xml_data); $j++) { // sheet
            if (!is_line_empty($xml_data[$j]) || $j < ROW_INDEX_DATA_START) {
                $xml_data_new[$j] = $xml_data[$j];
            }
        }
        $xml_data_array_new[trim($worksheet_ssname)] = $xml_data_new;
        unset($xml_data_new);
    }
    return $xml_data_array_new;
}

function getData($datas)
{
    if($datas->item(0) != null)
    {
        $data = $datas->item(0)->nodeValue;
        $data_type = $datas->item(0)->getAttribute('ss:Type');
        switch ($data_type) {
            case "Number":
                if (strcspn($data, ".") > 0) {
                    return floatval($data);
                } else {
                    return intval($data);
                }
            case "String":
                if($data[0] == '[' && $data[strlen($data) - 1] == ']')
                {
                    $data2 = str_replace("\n", '', $data);
                    $data2 = str_replace("\r", '', $data2);
                    $data2 = str_replace('{', '[', $data2);
                    $data2 = str_replace('}', ']', $data2);
                    $data1 = array(
                        "string" => $data,
                        "array" => json_decode($data2,1)
                    );
                    return $data1;
                }else{
                    return $data;
                }
            default:
                return $data;
        }
    }
    else
    {
        return null;
    }
}

// 配置表格式定义
define('ROW_INDEX_SERVER', 0);
define('ROW_INDEX_CLIENT', 1);
define('ROW_INDEX_DESCRIBE', 2);
define('ROW_INDEX_DATA_START', 3);

// 根据需求去除不用字段
function removeNullAttr($table_info, $row_index)
{
    $new_table_info = array();
    foreach ($table_info as $key => $table){
        $new_table = array();
        foreach($table as $i => $row)
        {
            if($i == $row_index || $i >= ROW_INDEX_DESCRIBE)
            {
                $new_row = array();
                for($j = 0; $j < count($row); $j++)
                {
                    if($table[$row_index][$j] != "") {
                        array_push($new_row, $row[$j]);
                    }
                }
                array_push($new_table, $new_row);
            }
        }
        $new_table_info[$key] = $new_table;
    }
    return $new_table_info;
}

function makeMaps($table_info)
{
    $new_table_info = array();
    foreach ($table_info as $key => $table){
        $new_table = array();
        $index_row = $table[0];
        for($i = 1; $i < count($table); $i++)
        {
            $row = array();
            for($j = 0; $j < count($table[$i]); $j++)
            {
                $row[$index_row[$j]] = $table[$i][$j];
            }
            array_push($new_table, $row);
        }
        $new_table_info[$key] = $new_table;
    }
    return $new_table_info;
}