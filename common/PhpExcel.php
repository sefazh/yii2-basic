<?php
/**
 * YiiBasic
 * @Author: zhuangxiaofan
 * @Date: 2017/2/27
 * @Time: 16:44
 */

namespace app\common;


class PhpExcel
{
    public static function read($excelFile)
    {
        $phpexcel=new \PHPExcel();

//        if ($format == "xls") {
//            $excelReader = \PHPExcel_IOFactory::createReader('Excel5');
//        } else {
//            $excelReader = \PHPExcel_IOFactory::createReader('Excel2007');
//        }
        $excelReader = \PHPExcel_IOFactory::createReader('Excel2007');

        $phpexcel    = $excelReader->load($excelFile)->getSheet(0);//载入文件并获取第一个sheet
        $total_line  = $phpexcel->getHighestRow();//总行数
        $total_column= $phpexcel->getHighestColumn();//总列数

        $result = array();
        if($total_line > 1){
            for($row = 1; $row <= $total_line; $row++){
                $rowData = array();
                for($column = 'A'; $column <= $total_column; $column++){
                    $rowData[] = trim($phpexcel->getCell($column.$row)->getValue());
                }

                $result[] = $rowData;
            }
        }

        return $result;
//        if ($ok == 1){
//            $this->redirect(array('index']);
//        } else{
//            echo "<script>alert('操作失败');window.history.back();</script>";
//        }
    }
}